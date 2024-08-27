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
          $errors[$fieldName] = $fieldMessage;
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
}