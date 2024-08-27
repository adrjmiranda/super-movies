<?php

namespace App\Config;

enum FlashType: string
{
  case Error = 'error';
  case Success = 'success';
}

class Flash
{
  public static function get(FlashType $type): ?array
  {
    $messages = Session::get($type->value . '_flash') ?? null;
    Session::remove($type->value . '_flash');

    return $messages;
  }

  public static function set(array $data, FlashType $type)
  {
    Session::set($type->value . '_flash', $data);
  }
}