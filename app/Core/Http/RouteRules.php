<?php

namespace App\Core\Http;

trait RouteRules
{
  private const NUM_PATTERN_MANDATORY = '/^[1-9]\d*$/';
  private const ALPHA_PATTERN_MANDATORY = '/^[a-zA-Z\-]+$/';
  private const ANY_PATTERN_MANDATORY = '/^[a-zA-Z0-9\-]+$/';

  private const NUM_PATTERN_OPTIONAL = '/^([1-9]\d*)?$/';
  private const ALPHA_PATTERN_OPTIONAL = '/^([a-zA-Z\-]*)$/';
  private const ANY_PATTERN_OPTIONAL = '/^([a-zA-Z0-9\-]*)$/';

  private const ALL_PATTERN_MANDATORY = '/\{\:(alpha|num|any)\}/';
  private const ALL_PATTERN_OPTIONAL = '/\{\?(alpha|num|any)\}/';

  private array $paramsPatternList = [
    '{:num}' => self::NUM_PATTERN_MANDATORY,
    '{:alpha}' => self::ALPHA_PATTERN_MANDATORY,
    '{:any}' => self::ANY_PATTERN_MANDATORY,
    '{?num}' => self::NUM_PATTERN_OPTIONAL,
    '{?alpha}' => self::ALPHA_PATTERN_OPTIONAL,
    '{?any}' => self::ANY_PATTERN_OPTIONAL,
  ];
}