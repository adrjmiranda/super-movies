<?php

namespace App\Core\Http;

class Request
{
  private string $uri;
  private string $method;
  private array $headers = [];
  private array|string|null $body = null;
  private array $queryParams = [];
  private array $postParams = [];
  private array $cookies = [];
  private array $files = [];
  private array $serverParams = [];
  private string $ipAddress;

  public function __construct()
  {
    $this->uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->headers = $this->parseHeaders();
    $this->body = file_get_contents('php://input');
    $this->queryParams = $_GET;
    $this->postParams = $_POST;
    $this->cookies = $_COOKIE;
    $this->files = $_FILES;
    $this->serverParams = $_SERVER;
    $this->ipAddress = $_SERVER['REMOTE_ADDR'];
  }

  private function parseHeaders(): array
  {
    $headers = [];
    foreach ($_SERVER as $key => $value) {
      if (strpos($key, 'HTTP_') === 0) {
        $header = str_replace(' ', '_', ucwords(strtolower(str_replace('_', ' ', substr($key, 5)))));
        $headers[$header] = $value;
      }
    }

    return $headers;
  }

  public function getUri(): string
  {
    return $this->uri === '/' ? $this->uri : rtrim($this->uri, '/');
  }

  public function getMethod(): string
  {
    return $this->method;
  }

  public function getHeaders(): array
  {
    return $this->headers;
  }

  public function getBody(): array|string|null
  {
    return $this->body;
  }

  public function getQueryParams(): array
  {
    return $this->queryParams;
  }

  public function getPostParams(): array
  {
    return $this->postParams;
  }

  public function getCookies(): array
  {
    return $this->cookies;
  }

  public function getFiles(): array
  {
    return $this->files;
  }

  public function getServerParams(): array
  {
    return $this->serverParams;
  }

  public function getIpAddress(): string
  {
    return $this->ipAddress;
  }
}