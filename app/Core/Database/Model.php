<?php

namespace App\Core\Database;

class Model extends QueryBuilder
{
  public function __construct(string $table, string $fetchClass)
  {
    parent::__construct($table, $fetchClass);
  }

  public function findOne(string $column, mixed $value): object|false
  {
    $result = $this->select()->where("$column", '=', "$value")->limit(1)->execute();

    return isset($result[0]) ? $result[0] : false;
  }

  public function store(array $data): bool
  {
    $result = $this->insert($data)->execute();

    return $result > 0;
  }
}