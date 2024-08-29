<?php

namespace App\Core\Template;
use Exception;

class View
{
  use Functions;

  private string $parentTemplateName;
  private array $parentTemplateData;
  private ?string $parentTemplateContent;

  public function configCache(string $cachePath = null): void
  {
    if (!is_null($cachePath)) {
      if (!is_dir($cachePath)) {
        if (!mkdir($cachePath, 0755)) {
          throw new Exception("Failed To Create Cache Directory: {$cachePath}", 500);
        }
      }
    }

    $this->cachePath = $cachePath;
  }

  public function configBase(string $templatePath, array $variables = []): void
  {
    if (!is_dir($templatePath)) {
      if (!mkdir($templatePath, 0755)) {
        throw new Exception("Failed To Create Template Directory: {$templatePath}", 500);
      }
    }

    $this->templatePath = $templatePath;
    $this->addTemplateGlobalVariables($variables);
  }

  private function getTemplatePath(string $obTemplateName): ?string
  {
    $this->checksTemplateName($obTemplateName);

    $obTemplateName = str_replace('.', '/', $obTemplateName);

    $templateFileName = $obTemplateName . self::TEMP_EXT;
    $viewFile = $this->templatePath . "/{$templateFileName}";

    if (!file_exists($viewFile)) {
      throw new Exception("Template {$templateFileName} Does Not Exist", 500);
    }

    return $viewFile;
  }

  private function render(string $obTemplateName, array $obData = []): ?string
  {
    $view = $this->getTemplatePath($obTemplateName);
    $obData = $this->getAllData($obData);

    ob_start();

    extract($obData);

    require_once $view;

    $content = ob_get_clean();

    if ($content === false) {
      throw new Exception('Failed To Capture Template Output', 500);
    }

    if (!empty($this->parentTemplateName)) {
      $this->parentTemplateContent = $content;
      $templateData = array_merge($obData, $this->parentTemplateData);
      $templateName = $this->parentTemplateName;

      $this->parentTemplateName = '';
      $this->parentTemplateData = [];

      return $this->render($templateName, $templateData);
    }

    return $content;
  }

  public function extends(string $parentTemplateName, array $parentTemplateData = []): void
  {
    $this->parentTemplateName = $parentTemplateName;
    $this->parentTemplateData = $parentTemplateData;
  }

  public function load(): void
  {
    echo $this->parentTemplateContent;
    $this->parentTemplateContent = null;
  }

  public function view(string $obTemplateName, array $obData = []): ?string
  {
    $content = $this->render($obTemplateName, $obData);

    if (is_string($content)) {
      return $content;
    }

    throw new Exception('Unavailable Content', 500);
  }
}