<?php

namespace App\Core\Http;

use Exception;

class Router
{
  use RouteRules;

  private array $enabledMethods = [
    'GET',
    'POST',
    'DELETE',
    'PUT',
    'PATCH',
  ];

  private Request $request;
  private Response $response;
  private array $dynamicRoutes = [];
  private array $staticRoutes = [];

  public function __construct()
  {
    $this->request = new Request();
    $this->response = new Response();
  }

  public function __call($method, $args)
  {
    $this->validateRouteMethod($method);
    $path = $this->validateAndFormatPath($args[0] ?? '');
    $handler = $this->validateHandler($args[1] ?? '');

    $this->add(strtoupper($method), $path, $handler);
  }

  private function validateRouteMethod(string $method): void
  {
    if (!in_array(strtoupper($method), $this->enabledMethods)) {
      throw new Exception("Method {$method} Is Not Enable", 500);
    }
  }

  private function validateAndFormatPath(string $path): string
  {
    if (empty($path)) {
      throw new Exception("Path Parameter Was Not Defined When Adding The Route", 500);
    }
    return $path === '/' ? $path : rtrim($path, '/');
  }

  private function validateHandler(string $handler): string
  {
    if (empty($handler)) {
      throw new Exception("The Handler Parameter Was Not Passed When Adding The Class", 500);
    }

    $handlerItems = explode(':', $handler);

    $controllerNamespace = $handlerItems[0] ?? '';
    $action = $handlerItems[1] ?? '';

    if (!class_exists($controllerNamespace)) {
      throw new Exception("Controller {$controllerNamespace} Does Not Exist", 500);
    }

    if (!method_exists($controllerNamespace, $action)) {
      throw new Exception("Method {$action} Does Not Exist In Controller {$controllerNamespace}", 500);
    }

    return $handler;
  }

  private function add(string $method, string $path, string $handler): void
  {
    RouteHelper::checksRouteConflict($method, $path, $this->staticRoutes, $this->dynamicRoutes);

    if (RouteHelper::hasADynamicPart($path)) {
      $this->dynamicRoutes[$method][$path] = $handler;
    } else {
      $this->staticRoutes[$method][$path] = $handler;
    }
  }

  public function run(): void
  {
    $uri = $this->request->getUri();
    $method = $this->request->getMethod();

    [$controllerNamespace, $action, $params] = $this->resolveRoute($method, $uri);

    if (is_null($controllerNamespace) || is_null($action)) {
      throw new Exception("Page Not Found", 404);
    }

    $controllerInstance = new $controllerNamespace();
    $response = $controllerInstance->$action($this->request, $this->response, $params);

    $response->send();
  }

  private function resolveRoute(string $method, string $uri): array
  {
    if ($handler = $this->findStaticRoute($method, $uri)) {
      return $this->resolveHandler($handler);
    }

    if ($handlerData = $this->findDynamicRoute($method, $uri)) {
      return $this->resolveHandler($handlerData['handler'], $handlerData['params']);
    }

    return [null, null, []];
  }

  private function findStaticRoute(string $method, string $uri): ?string
  {
    return $this->staticRoutes[$method][$uri] ?? null;
  }

  private function findDynamicRoute(string $method, string $uri): ?array
  {
    if (isset($this->dynamicRoutes[$method])) {
      $uriSegments = array_values(array_filter(explode('/', $uri)));
      foreach ($this->dynamicRoutes[$method] as $path => $handler) {
        $pathSegments = array_values(array_filter(explode('/', $path)));
        if (count($pathSegments) < count($uriSegments)) {
          continue;
        }

        if ($params = $this->matchDynamicRoute($uriSegments, $pathSegments)) {
          return ['handler' => $handler, 'params' => $params];
        }
      }
    }

    return null;
  }

  private function matchDynamicRoute(array $uriSegments, array $pathSegments): ?array
  {
    $params = [];
    $verifiedSegmentsOfTheUri = 0;

    foreach ($uriSegments as $key => $uriSegment) {
      $verifiedSegmentsOfTheUri += 1;

      if (array_key_exists($pathSegments[$key], $this->paramsPatternList)) {
        if (!preg_match($this->paramsPatternList[$pathSegments[$key]], $uriSegment)) {
          return null;
        } else {
          $params[] = $uriSegment;
        }
      } else if ($pathSegments[$key] !== $uriSegment) {
        return null;
      }
    }

    return $verifiedSegmentsOfTheUri === count($uriSegments) ? $params : null;
  }

  private function resolveHandler(string $handler, array $params = []): array
  {
    $handlerParts = explode(':', $handler);
    $controllerNamespace = $handlerParts[0] ?? null;
    $action = $handlerParts[1] ?? null;

    return [$controllerNamespace, $action, $params];
  }
}