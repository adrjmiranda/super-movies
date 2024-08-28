<?php

namespace App\Models;

class UserModel
{
  public readonly int $id;
  public readonly string $name;
  public readonly string $email;
  public readonly string $password_hash;
  public readonly string $subscription_status;
  public readonly ?int $subscription_id;
  public readonly string $created_at;
  public readonly string $updated_at;
}