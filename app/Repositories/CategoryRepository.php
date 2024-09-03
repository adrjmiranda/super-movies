<?php

namespace App\Repositories;

use App\Core\Database\Model;
use App\Models\CategoryModel;

class CategoryRepository extends Model
{
  private const TABLE = 'categories';

  public function __construct()
  {
    parent::__construct(self::TABLE, CategoryModel::class);
  }

  public function getNumberOfIdsInATange(array $ids): int
  {
    $items = implode(',', $ids);

    $query = 'SELECT COUNT(*) as count FROM ' . self::TABLE . ' WHERE id IN ' . $items;
    $result = $this->pdo->query($query)->fetch();

    return $result['count'];
  }
}