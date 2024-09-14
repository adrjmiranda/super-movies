<?php

namespace App\Repositories;

use App\Core\Database\Model;
use App\Models\MovieModel;
use Exception;

class MovieRespository extends Model
{
  private const TABLE = 'categories';

  public function __construct()
  {
    parent::__construct(self::TABLE, MovieModel::class);
  }

  public function store(array $data): bool
  {
    try {
      $this->beginTransaction();

      // TODO: insert movie

      // get categories id
      $categoriesId = $data['categories'];
      unset($data['categories']);

      // TODO: get movie id

      $movieCategoryRepository = new MovieCategoryRepository;

      // TODO: insert categories

      $this->commit();

      // TODO: return result bool
      // ...

    } catch (Exception $exception) {
      $this->rollback();
      return false;
    }
  }
}