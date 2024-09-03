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
}