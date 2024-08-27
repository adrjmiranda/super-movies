<?php

namespace App\Models;

use App\Core\Database\Model;

class AdminModel extends Model
{
  private const TABLE = 'admin';

  public function __construct()
  {
    parent::__construct(self::TABLE);
  }
}