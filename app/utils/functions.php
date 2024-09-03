<?php

function isDev()
{
  return $_ENV['APP_ENV'] === 'local';
}

function isLeapYear(int $year): bool
{
  if ($year % 4 === 0) {
    if ($year % 100 === 0) {
      if ($year % 400 === 0) {
        return true;
      } else {
        return false;
      }
    } else {
      return true;
    }
  } else {
    return false;
  }
}

function februaryDayIsCorrect(int $day, int $month, int $year): bool
{
  if ($month === 2) {
    return isLeapYear($year) && $day <= 29 || !isLeapYear($year) && $day <= 28;
  }

  return true;
}

function dayAndMonthAreValid(int $day, int $month): bool
{
  switch ($month) {
    case 1:
    case 3:
    case 5:
    case 7:
    case 8:
    case 10:
    case 12:
      return $day <= 31;

    case 4:
    case 6:
    case 9:
    case 11:
      return $day <= 30;

    case 2:
      return $day <= 29;

    default:
      return false;
  }
}