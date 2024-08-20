<?php

namespace App\Core\Http;

class Response
{
  private int $statusCode = 200;
  private array $headers = [];
  private ?string $body = null;
  private array $cookies = [];
  private string $protocolVersion = 'HTTP/1.1';
  private ?string $charset = 'UTF-8';
  private string $contentType = 'text/html';

  public function __construct(int $statusCode = 200, ?string $body = null, array $headers = [])
  {
    $this->statusCode = $statusCode;
    $this->body = $body;
    $this->headers = $headers;
  }

  public function setStatusCode(int $statusCode): self
  {
    $this->statusCode = $statusCode;
    return $this;
  }

  public function addHeader(string $name, string $value): self
  {
    $this->headers[$name] = $value;
    return $this;
  }

  public function setBody(?string $body): self
  {
    $this->body = $body;
    return $this;
  }

  public function addCookies(string $name, string $value, array $options = []): self
  {
    $this->cookies[] = compact('name', 'value', 'options');
    return $this;
  }

  public function setProtocolVersion(string $protocolVersion): self
  {
    $this->protocolVersion = $protocolVersion;
    return $this;
  }

  public function setCharset(?string $charset): self
  {
    $this->charset = $charset;
    return $this;
  }

  public function setContentType(string $contentType): self
  {
    $this->contentType = $contentType;
    return $this;
  }

  public function send(): void
  {
    header("{$this->protocolVersion} {$this->statusCode}");

    if (!array_key_exists('Content-Type', $this->headers)) {
      header("Content-Type: {$this->contentType}; charset={$this->charset}");
    }

    foreach ($this->headers as $name => $value) {
      header("$name: $value");
    }

    foreach ($this->cookies as $cookie) {
      setcookie($cookie['name'], $cookie['value'], $cookie['options']);
    }

    if (!is_null($this->body)) {
      echo $this->body;
    }

    exit;
  }
}