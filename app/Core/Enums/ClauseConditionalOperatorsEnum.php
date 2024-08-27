<?php

namespace App\Core\Enums;

enum ClauseConditionalOperatorsEnum: string
{
  case And = 'AND';
  case Or = 'OR';
  case Not = 'NOT';
  case In = 'IN';
}