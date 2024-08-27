<?php

namespace App\Repositories;

use App\Core\Database\Model;
use App\Models\AdminModel;

class UserRepository extends Model
{
  private const TABLE = 'admin';

  public function __construct()
  {
    parent::__construct(self::TABLE, AdminModel::class);
  }
}