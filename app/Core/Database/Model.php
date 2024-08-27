<?php

namespace App\Core\Database;

use PDO;
use Exception;
use PDOException;

class Model
{
  private PDO $pdo;
  private string $table;
  private string $fields = '*';
  private array $conditions = [];
  private array $joins = [];
  private ?int $limit = null;
  private ?int $offset = null;
  private array $updates = [];
  private array $inserts = [];
  private array $bindings = [];
  private array $conditionBindings = [];
  private array $updateBindings = [];
  private string $queryType;

  public function __construct(string $table)
  {
    $this->pdo = Connection::get();
    $this->table = $table;
  }

  public function select(string $fields = '*'): self
  {
    $this->fields = $fields;
    $this->queryType = 'select';
    return $this;
  }

  public function insert(array $data): self
  {
    $this->inserts = $data;
    $this->queryType = 'insert';
    return $this;
  }

  public function update(array $data): self
  {
    $this->updates = $data;
    $this->queryType = 'update';
    return $this;
  }

  public function delete(): self
  {
    $this->queryType = 'delete';
    return $this;
  }

  public function where(string $column, string $operator, mixed $value): self
  {
    $this->conditions[] = "$column $operator ?";
    $this->conditionBindings[] = $value;
    return $this;
  }

  public function join(string $table, string $firstColumn, string $operator, string $secondColumn, string $type = 'INNER'): self
  {
    $this->joins[] = "$type JOIN $table ON $firstColumn $operator $secondColumn";
    return $this;
  }

  public function limit(int $limit): self
  {
    $this->limit = $limit;
    return $this;
  }

  public function offset(int $offset): self
  {
    $this->offset = $offset;
    return $this;
  }

  private function buildSelect(): string
  {
    $sql = "SELECT {$this->fields} FROM {$this->table}";

    if (!empty($this->joins)) {
      $sql .= ' ' . implode(' ', $this->joins);
    }

    if (!empty($this->conditions)) {
      $sql .= ' WHERE ' . implode(' AND ', $this->conditions);
    }

    if ($this->limit !== null) {
      $sql .= " LIMIT {$this->limit}";
    }

    if ($this->offset !== null) {
      $sql .= " OFFSET {$this->offset}";
    }

    return $sql;
  }

  private function buildUpdate(): string
  {
    $updates = implode(', ', array_map(function ($key) {
      $this->updateBindings[] = $this->updates[$key];
      return "$key = ?";
    }, array_keys($this->updates)));

    $sql = "UPDATE {$this->table} SET $updates";

    if (!empty($this->joins)) {
      $sql .= ' ' . implode(' ', $this->joins);
    }

    if (!empty($this->conditions)) {
      $sql .= ' WHERE ' . implode(' AND ', $this->conditions);
    }

    return $sql;
  }

  private function buildInsert(): string
  {
    $columns = implode(', ', array_keys($this->inserts));
    $placeholders = implode(', ', array_fill(0, count($this->inserts), '?'));

    foreach ($this->inserts as $value) {
      $this->bindings[] = $value;
    }

    return "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
  }

  private function buildDelete(): string
  {
    $sql = "DELETE FROM {$this->table}";

    if (!empty($this->conditions)) {
      $sql .= ' WHERE ' . implode(' AND ', $this->conditions);
    }

    return $sql;
  }

  public function execute()
  {
    try {
      $sql = $this->buildQuery();
      $bindings = $this->bindings;
      if ($this->queryType === 'update' || $this->queryType === 'select' || $this->queryType === 'delete') {
        $bindings = array_merge($bindings, $this->conditionBindings);
      }

      $stmt = $this->pdo->prepare($sql);
      $stmt->execute($bindings);

      $result = ($this->queryType === 'select') ? $stmt->fetchAll(PDO::FETCH_ASSOC) : $stmt->rowCount();

      $this->reset();

      return $result;
    } catch (PDOException $pDOException) {
      $this->handleException($pDOException);
    }
  }



  private function buildQuery(): string
  {
    switch ($this->queryType) {
      case 'select':
        return $this->buildSelect();

      case 'insert':
        return $this->buildInsert();

      case 'update':
        return $this->buildUpdate();

      case 'delete':
        return $this->buildDelete();

      default:
        throw new Exception("Invalid Query Type", 500);
    }
  }

  private function reset(): void
  {
    $this->fields = '*';
    $this->conditions = [];
    $this->joins = [];
    $this->limit = null;
    $this->offset = null;
    $this->updates = [];
    $this->inserts = [];
    $this->bindings = [];
    $this->conditionBindings = [];
    $this->updateBindings = [];
    $this->queryType = '';
  }

  private function handleException(PDOException $pDOException): void
  {
    $isDev = isDev();

    if ($isDev) {
      throw new Exception("Database Query Failed: " . $pDOException->getMessage(), $pDOException->getCode());
    }
  }
}
