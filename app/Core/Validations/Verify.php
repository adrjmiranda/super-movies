<?php

namespace App\Core\Validations;

use App\Models\AdminModel;
use App\Models\MovieModel;
use App\Models\UserModel;
use App\Repositories\AdminRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\MovieRespository;
use App\Repositories\UserRepository;
use Exception;

class Verify
{
  private static function handleException(Exception $exception): void
  {
    $isDev = isDev();
    if ($isDev) {
      throw new Exception($exception->getMessage(), 500);
    } else {
      // TODO: store logs
    }
  }

  public static function getErrors(array $data): array
  {
    $errors = [];

    foreach ($data as $key => $fieldValue) {
      $rules = explode('|', $key);

      foreach (array_values($rules) as $ruleName) {
        $ruleNameParts = explode('@', $ruleName);
        $params = [];

        if (count($ruleNameParts) > 1) {
          $ruleName = $ruleNameParts[0];
          $params = array_slice($ruleNameParts, 1);
        }

        try {
          $result = call_user_func([self::class, $ruleName], $fieldValue, $params);
        } catch (Exception $exception) {
          self::handleException($exception);
        }

        if ($result !== false && is_array($result) && !empty($result)) {
          $fieldName = key($result);
          $fieldMessage = reset($result);
          $errors[$fieldName] = str_replace('_', ' ', $fieldMessage);
          break;
        }
      }
    }

    return $errors;
  }

  private static function __checkexistence(string $email, array $params = []): ?bool
  {
    $userType = $params[0] ?? '';

    if ($userType !== 'user' && $userType !== 'admin') {
      self::handleException(new Exception('User Type Passed To Non-Existent Role', 500));
    }

    $repository = match ($userType) {
      'user' => new UserRepository,
      'admin' => new AdminRepository,
    };

    $user = $repository->findOne('email', $email);

    $model = match ($userType) {
      'user' => UserModel::class,
      'admin' => AdminModel::class,
    };

    return is_a($user, $model);
  }

  private static function userexists(string $email, array $params = []): array|false
  {
    if (!self::__checkexistence($email, $params)) {
      return ['email' => 'User not found'];
    }

    return false;
  }

  private static function registereduser(string $email, array $params = []): array|false
  {
    if (self::__checkexistence($email, $params)) {
      return ['email' => 'Already registered user'];
    }

    return false;
  }

  private static function required(mixed $fieldValue, array $params = []): array|false
  {
    $fieldName = $params[0] ?? '';
    if (!isset($fieldValue) || empty($fieldValue)) {
      return [$fieldName => "The $fieldName field is mandatory"];
    }

    return false;
  }

  private static function name(string $name, array $params = []): array|false
  {
    $pattern = '/^[\p{L} ]+$/u';
    if (!preg_match($pattern, $name)) {
      return ['name' => 'Must be a valid name'];
    }

    return false;
  }

  private static function title(string $title, array $params = []): array|false
  {
    $pattern = '/^.{1,255}$/';
    if (!preg_match($pattern, $title)) {
      return ['title' => 'The title must have a maximum of 255 characters'];
    }

    return false;
  }

  private static function slug(string $slug, array $params = []): array|false
  {
    $moviesRespository = new MovieRespository;
    $movie = $moviesRespository->findOne('slug', $slug);

    $pattern = '/^[a-z-]+$/';

    if (!preg_match($pattern, $slug)) {
      return ['slug' => 'The slug must contain only lowercase letters without accents, and hyphens'];
    }

    if ($movie instanceof MovieModel) {
      return ['slug' => 'The slug must be unique'];
    }

    return false;
  }

  private static function description(string $description, array $params = []): array|false
  {
    $pattern = '/^.{1,65535}$/';

    if (!preg_match($pattern, $description)) {
      return ['description' => 'The description must have a maximum of 65535 characters'];
    }

    return false;
  }

  private static function releasedate(string $date, array $params = []): array|false
  {
    $pattern = '/^\d{4}-\d{2}-\d{2}$/';

    if (!preg_match($pattern, $date)) {
      return ['release_date' => 'Invalid date'];
    }

    [$year, $month, $day] = explode('-', $date);
    $year = (int) $year;
    $month = (int) $month;
    $day = (int) $day;

    if (!februaryDayIsCorrect($day, $month, $year) || !dayAndMonthAreValid($day, $month) || $day < 0 || $month < 0 || $year < 0) {
      return ['release_date' => 'Invalid date'];
    }

    return false;
  }

  private static function duration(int $duration, array $params = []): array|false
  {
    if ($duration < 1) {
      return ['duration' => 'Invalid movie duration'];
    }

    return false;
  }

  private static function categoryid(array $listOfCategoryIds, array $params = []): array|false
  {
    $listOfCategoryIds = array_unique($listOfCategoryIds);
    $categoriesRepository = new CategoryRepository;

    $countOfIdsInTheRange = $categoriesRepository->getNumberOfIdsInATange($listOfCategoryIds);

    if ($countOfIdsInTheRange !== count($listOfCategoryIds)) {
      return ['categories' => 'Invalid submitted categories'];
    }

    return false;
  }

  private static function email(string $email, array $params = []): array|false
  {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      return ['email' => 'Must be a valid email'];
    }

    return false;
  }

  private static function __min__max__length(string $fieldValue, string $rule, array $params = []): array|false
  {
    $text = $fieldValue;
    $number = (int) ($params[0] ?? '');
    $fieldName = $params[1] ?? '';

    if (strlen($text) < $number && $rule === 'least') {
      return [$fieldName => "The $fieldName must have a $rule of $number characters"];
    }

    if (strlen($text) > $number && $rule === 'maximum') {
      return [$fieldName => "The $fieldName must have a $rule of $number characters"];
    }

    return false;
  }

  private static function min(string $fieldValue, array $params = []): array|false
  {
    return self::__min__max__length($fieldValue, 'least', $params);
  }

  private static function max(string $fieldValue, array $params = []): array|false
  {
    return self::__min__max__length($fieldValue, 'maximum', $params);
  }

  private static function password(string $password, array $params = []): array|false
  {
    $password_confirmation = $params[0] ?? '';
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]+$/';

    if (!preg_match($pattern, $password)) {
      return ['password' => 'Include 1 uppercase letter, 1 lowercase letter, and 1 number.'];
    }

    if ($password !== $password_confirmation) {
      return ['password_confirmation' => 'Incorrect password confirmation'];
    }

    return false;
  }
}