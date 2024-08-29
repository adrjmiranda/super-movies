<?php

namespace App\Core\Template;

use App\Config\Session;
use App\Core\Http\Router;
use App\Config\Flash;
use App\Config\FlashType;
use Exception;

trait Functions
{
  private const TEMP_EXT = '.php';
  private const TEMP_NAME_PATTERN = '/^(?!.*[_.]{2,})(?!^[_.])(?!.*[_.]$)(?=.*\.)[a-z._]{3,}$/';

  private string $templatePath;
  private string $cachePath;
  private array $variables;
  private ?array $errorMessages = [];

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

  public function includeOne(string $partialName, array $includeData = []): void
  {
    $this->include($partialName, false, $includeData);
  }
  public function includeMany(string $partialName, array $includeData = []): void
  {
    $this->include($partialName, true, $includeData);
  }

  private function include(string $partialName, bool $multiple, array $includeData = []): void
  {
    $this->checksTemplateName($partialName);
    $includeData = $this->getAllData($includeData);
    extract($includeData);
    $this->checksTemplateName($partialName);

    if ($multiple) {
      include $this->templatePath . '/' . str_replace('.', '/', $partialName) . self::TEMP_EXT;
    } else {
      include_once $this->templatePath . '/' . str_replace('.', '/', $partialName) . self::TEMP_EXT;
    }
  }

  public function linkTo(string $routeName, array $params = []): ?string
  {
    $router = Router::getInstance();

    return $router->urlFor($routeName, $params);
  }

  public function getErrorMessage(string $key): ?string
  {
    $messages = Flash::get(FlashType::Error);
    $this->errorMessages = !is_null($messages) ? $messages : $this->errorMessages;

    return $this->errorMessages[$key] ?? null;
  }

  public function userIsLoggedIn(): bool
  {
    return !is_null(Session::get('user'));
  }
}