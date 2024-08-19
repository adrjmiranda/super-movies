<?php

namespace App\Core\Template;
use Exception;

class View
{
  use Functions;

  private static string $templatePath;
  private static string $cachePath;

  private static string $parentTemplateName;
  private static array $parentTemplateData;
  private static ?string $parentTemplateContent;

  public static function configCache(string $cachePath = null): void
  {
    self::$cachePath = $cachePath;

    if (!is_null($cachePath)) {
      if (!is_dir($cachePath)) {
        if (!mkdir($cachePath, 0755)) {
          throw new Exception("Failed To Create Cache Directory: $cachePath", 500);
        }
      }
    }
  }

  public static function configBase(string $templatePath, array $variables = []): void
  {
    self::$templatePath = $templatePath;
    self::addTemplateGlobalVariables($variables);

    if (!is_dir($templatePath)) {
      if (!mkdir($templatePath, 0755)) {
        throw new Exception("Failed To Create Template Directory: $templatePath", 500);
      }
    }
  }

  private static function getTemplatePath(string $obTemplateName): ?string
  {
    self::checksTemplateName($obTemplateName);

    $obTemplateName = str_replace('.', '/', $obTemplateName);

    $templateFileName = $obTemplateName . self::TEMP_EXT;
    $viewFile = self::$templatePath . "/$templateFileName";

    if (!file_exists($viewFile)) {
      throw new Exception("Template $templateFileName Does Not Exist", 500);
    }

    return $viewFile;
  }

  private static function render(string $obTemplateName, array $obData = []): ?string
  {
    $view = self::getTemplatePath($obTemplateName);
    $obData = self::getAllData($obData);

    ob_start();

    extract($obData);

    require_once $view;

    $content = ob_get_clean();

    if ($content === false) {
      throw new Exception('Failed To Capture Template Output', 500);
    }

    if (!empty(self::$parentTemplateName)) {
      self::$parentTemplateContent = $content;
      $templateData = array_merge($obData, self::$parentTemplateData);
      $templateName = self::$parentTemplateName;

      self::$parentTemplateName = '';
      self::$parentTemplateData = [];

      return self::render($templateName, $templateData);
    }

    return $content;
  }

  public static function extends(string $parentTemplateName, array $parentTemplateData = [])
  {
    self::$parentTemplateName = $parentTemplateName;
    self::$parentTemplateData = $parentTemplateData;
  }

  public static function load(): void
  {
    echo self::$parentTemplateContent;
    self::$parentTemplateContent = null;
  }

  public static function view(string $obTemplateName, array $obData = []): never
  {
    $content = self::render($obTemplateName, $obData);

    if (is_string($content)) {
      echo $content;
      exit;
    }

    throw new Exception('Unavailable Content', 500);
  }
}