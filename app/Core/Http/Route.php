<?php

namespace App\Core\Http;
use Exception;

class Route
{
  private string $method;
  private string $path;
  private string $handler;
  private ?string $name = null;
  private Router $router;

  public function __construct(string $method, string $path, string $handler, Router $router)
  {
    $this->method = $method;
    $this->path = $path;
    $this->handler = $handler;
    $this->router = $router;
  }

  public function as(string $name): self
  {
    if ($this->router->routeNameExists($name)) {
      throw new Exception("Route Name '{$name} Already Exists.'", 500);
    }

    $this->name = $name;
    $this->router->addNamedRoute($name, $this);
    return $this;
  }

  public function getMethod(): string
  {
    return $this->method;
  }

  public function getPath(): string
  {
    return $this->path;
  }

  public function getHandler(): string
  {
    return $this->handler;
  }

  public function getName(): ?string
  {
    return $this->name;
  }
}