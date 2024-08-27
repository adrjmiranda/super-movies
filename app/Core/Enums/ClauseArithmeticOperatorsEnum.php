<?php

namespace App\Core\Enums;

enum ClauseArithmeticOperatorsEnum: string
{
  case EqualTo = '=';
  case GreaterThan = '>';
  case GreaterThanOrEqual = '>=';
  case LessThan = '<';
  case LessThanOrEqual = '<=';
  case DifferentFrom = '!=';
}