<?php

namespace App\Core\Controller;

use App\Core\Template\View;

abstract class Base
{
  private string $templatePath;
  private ?string $cachePath = null;
  private ?View $view = null;

  public function __construct(string $templatePath, ?string $cachePath = null)
  {
    $this->templatePath = $templatePath;
    $this->cachePath = $cachePath;
  }

  private function getView()
  {
    if (is_null($this->view)) {
      $this->view = new View();
      $this->view->configBase($this->templatePath);
      $this->view->addTemplateGlobalVariables([
        'base_url' => $_ENV['BASE_URL']
      ]);

      if (!is_null($this->cachePath)) {
        $this->view->configCache($this->cachePath);
      }
    }

    return $this->view;
  }

  protected function render(string $template, array $data = []): string
  {
    $view = $this->getView();
    return $view->view($template, $data);
  }
}