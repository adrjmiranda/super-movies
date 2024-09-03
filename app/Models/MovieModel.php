<?php

namespace App\Models;

class MovieModel
{
  public readonly int $id;
  public readonly string $title;
  public readonly string $slug;
  public readonly string $description;
  public readonly string $release_date;
  public readonly int $duration;
  public readonly int $category_id;
  public readonly string $created_at;
  public readonly string $updated_at;
}