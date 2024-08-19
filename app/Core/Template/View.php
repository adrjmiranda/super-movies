<?php

namespace App\Core\Template;
use Exception;

class View
{
  private const TEMP_EXT = '.php';

  private static string $templatePath;
  private static ?string $cachePath;

  public static function config(string $templatePath, ?string $cachePath = null): void
  {
    self::$templatePath = $templatePath;
    self::$cachePath = $cachePath;

    if (!is_dir($templatePath)) {
      if (!mkdir($templatePath, 0755)) {
        throw new Exception("Failed To Create Template Directory: $templatePath", 500);
      }
    }

    if (!is_null($cachePath)) {
      if (!is_dir($cachePath)) {
        if (!mkdir($cachePath, 0755)) {
          throw new Exception("Failed To Create Cache Directory: $cachePath", 500);
        }
      }
    }
  }

  private static function getTemplatePath(string $obTemplateName): ?string
  {
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
    $obData['base_url'] = $_ENV['BASE_URL'];

    ob_start();

    extract($obData);

    require_once $view;

    $content = ob_get_clean();

    if ($content === false) {
      throw new Exception('Failed To Capture Template Output', 500);
    }

    return $content;
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