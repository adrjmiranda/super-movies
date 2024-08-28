<?php

namespace App\Repositories;

use App\Core\Database\Model;
use App\Models\UserModel;

class UserRepository extends Model
{
  private const TABLE = 'users';

  public function __construct()
  {
    parent::__construct(self::TABLE, UserModel::class);
  }
}