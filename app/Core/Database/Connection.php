<?php

namespace App\Core\Database;

use PDO;

class Connection
{
  private static ?PDO $pdo = null;

  public static function get(): PDO
  {
    if (is_null(self::$pdo)) {
      $isDev = isDev();

      $dbHost = $_ENV['DB_HOST'];
      $dbName = $_ENV['DB_NAME'];
      $dbUser = $_ENV['DB_USER'];
      $dbPass = $_ENV['DB_PASS'];

      self::$pdo = new PDO("mysql:dbname=$dbName;host=$dbHost", $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE => $isDev ? PDO::ERRMODE_EXCEPTION : PDO::ERRMODE_SILENT,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      ]);
    }

    return self::$pdo;
  }
}