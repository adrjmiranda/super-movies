<?php

namespace App\Core\Template;
use Exception;

trait Functions
{
  private const TEMP_EXT = '.php';
  private const TEMP_NAME_PATTERN = '/^(?!.*[_.]{2,})(?!^[_.])(?!.*[_.]$)(?=.*\.)[a-z._]{3,}$/';


  public static function escape(string $content): string
  {
    return htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
  }

  private static function checksTemplateName(string $obTemplateName): void
  {
    if (!preg_match(self::TEMP_NAME_PATTERN, $obTemplateName)) {
      throw new Exception("Invalid template name. Example: [folder].[filename] (without the file extension)", 500);
    }
  }

  public static function include(string $partialName, array $includeData = [], bool $multiple = false): void
  {
    self::checksTemplateName($partialName);
    $includeData['base_url'] = $_ENV['BASE_URL'];
    extract($includeData);
    self::checksTemplateName($partialName);

    if ($multiple) {
      include SITE_VIEW_PATH . '/' . str_replace('.', '/', $partialName) . '.php';
    } else {
      include_once SITE_VIEW_PATH . '/' . str_replace('.', '/', $partialName) . self::TEMP_EXT;
    }
  }
}