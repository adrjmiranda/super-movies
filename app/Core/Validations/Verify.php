<?php

namespace App\Core\Validations;

use App\Models\AdminModel;
use App\Models\UserModel;
use App\Repositories\AdminRepository;
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

  private static function userexists(string $email, array $params = []): array|false
  {
    $userType = $params[0] ?? '';

    if ($userType !== 'user' && $userType !== 'admin') {
      return ['email' => 'User not found'];
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

    if (!is_a($user, $model)) {
      return ['email' => 'User not found'];
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

  private static function email(string $email, array $params = []): array|false
  {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      return ['email' => 'Must be a valid email'];
    }

    return false;
  }

  private static function __min__max__length(string $fieldValue, string $rule, array $params = []): array|false
  {
    $text = $fieldValue;
    $number = (int) ($params[0] ?? '');
    $fieldName = $params[1] ?? '';

    if (strlen($text) < $number) {
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