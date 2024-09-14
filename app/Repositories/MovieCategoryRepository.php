<?php

namespace App\Repositories;
use App\Core\Database\Model;
use App\Models\MovieCategoryModel;

class MovieCategoryRepository extends Model
{
  private const TABLE = 'movie_categories';

  public function __construct()
  {
    parent::__construct(self::TABLE, MovieCategoryModel::class);
  }
}