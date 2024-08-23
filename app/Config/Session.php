<?php

namespace App\Config;

class Session
{
  public static function start(): void
  {
    if (session_status() !== PHP_SESSION_ACTIVE) {
      session_start([
        'cookie_lifetime' => $_ENV['APP_ENV'] === 'local' ? 0 : 86400,
        'cookie_secure' => $_ENV['APP_ENV'] === 'local' ? false : true,
        'cookie_httponly' => true,
        'use_strict_mode' => true,
      ]);
    }
  }

  public static function set(string $key, array|string|float|int $value): void
  {
    self::start();
    $_SESSION[$key] = $value;
  }

  public static function get(string $key): array|string|float|int|null
  {
    self::start();
    return $_SESSION[$key] ?? null;
  }

  public static function remove(string $key): void
  {
    self::start();
    unset($_SESSION[$key]);
  }

  public static function destroy(): void
  {
    self::start();
    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
      );
    }

    session_destroy();
  }
}