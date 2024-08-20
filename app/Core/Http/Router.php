<?php

namespace App\Core\Http;
use Exception;

class Router
{
  private const GET = 'GET';
  private const POST = 'POST';
  private const DELETE = 'DELETE';
  private const PUT = 'PUT';
  private const PATCH = 'PATCH';

  private const NUMERIC_PATTERN = '/^[1-9]\d*$/';
  private const ALPHABETICAL_PATTERN = '/^[a-zA-Z\-]+$/';
  private const ANY_PATTERN = '/^[a-zA-Z0-9\-]+$/';

  private Request $request;
  private Response $response;
  private array $dynamicRoutes = [];
  private array $staticRoutes = [];

  public function __construct()
  {
    $this->request = new Request();
    $this->response = new Response();
  }

  private function add(string $method, string $path, string $handler): void
  {
    RouteHelper::checksRouteConflic($method, $path, $this->staticRoutes, $this->dynamicRoutes);

    if (RouteHelper::hasADynamicPart($path)) {
      $this->dynamicRoutes[$method][$path] = $handler;
    } else {
      $this->staticRoutes[$method][$path] = $handler;
    }
  }

  public function get(string $path, string $handler): void
  {
    $this->add(self::GET, $path, $handler);
  }

  public function post(string $path, string $handler): void
  {
    $this->add(self::POST, $path, $handler);
  }

  public function delete(string $path, string $handler): void
  {
    $this->add(self::DELETE, $path, $handler);
  }

  public function put(string $path, string $handler): void
  {
    $this->add(self::PUT, $path, $handler);
  }

  public function patch(string $path, string $handler): void
  {
    $this->add(self::PATCH, $path, $handler);
  }
}