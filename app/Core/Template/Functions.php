<?php

namespace App\Core\Template;
use Exception;

trait Functions
{
  private const TEMP_EXT = '.php';
  private const TEMP_NAME_PATTERN = '/^(?!.*[_.]{2,})(?!^[_.])(?!.*[_.]$)(?=.*\.)[a-z._]{3,}$/';

  private array $variables;

  public function addTemplateGlobalVariables(array $variables = [])
  {
    $this->variables = $variables;
  }

  private function getAllData(array $data = []): array
  {
    return array_merge($data, $this->variables);
  }

  private function checksTemplateName(string $obTemplateName): void
  {
    if (!preg_match(self::TEMP_NAME_PATTERN, $obTemplateName)) {
      throw new Exception("Invalid template name. Example: [folder].[filename] (without the file extension)", 500);
    }
  }

  public function escape(string $content): string
  {
    return htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
  }

  public function include(string $partialName, array $includeData = [], bool $multiple = false): void
  {
    $this->checksTemplateName($partialName);
    $includeData = $this->getAllData($includeData);
    extract($includeData);
    $this->checksTemplateName($partialName);

    if ($multiple) {
      include SITE_VIEW_PATH . '/' . str_replace('.', '/', $partialName) . self::TEMP_EXT;
    } else {
      include_once SITE_VIEW_PATH . '/' . str_replace('.', '/', $partialName) . self::TEMP_EXT;
    }
  }
}