<?php

namespace App\Core\Enums;

enum HavingTypeEnum: string
{
  case Sum = 'SUM';
  case Avg = 'AVG';
  case Max = 'MAX';
  case Min = 'MIN';
  case Count = 'COUNT';
}