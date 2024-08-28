<?php

namespace App\Core\Http;

use App\Core\Middleware\Queue;
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
  private array $namedRoutes = [];

  private static ?Router $instance = null;

  private string $groupPrefix = '';
  private array $groupMiddlewares = [];

  private function __construct()
  {
    $this->request = new Request();
    $this->response = new Response();
  }

  public static function getInstance(): Router
  {
    if (is_null(self::$instance)) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  public function routeNameExists(string $name): bool
  {
    return isset($this->namedRoutes[$name]);
  }

  public function addNamedRoute(string $name, Route $route): void
  {
    $this->namedRoutes[$name] = $route;
  }

  private function getRouteByName(string $name): ?Route
  {
    return $this->namedRoutes[$name] ?? null;
  }

  public function urlFor(string $name, array $params = []): ?string
  {
    $route = $this->getRouteByName($name);

    if (is_null($route)) {
      return null;
    }

    $path = $route->getPath();

    foreach ($params as $key => $value) {
      $pattern = "/\{[:?]{$key}\}/";
      $path = preg_replace($pattern, $value, $path);
    }

    return $path;
  }

  public function __call(string $method, array $args): Route
  {
    $this->validateRouteMethod($method);
    $path = $this->validateAndFormatPath($args[0] ?? '');
    $handler = $this->validateHandler($args[1] ?? '');

    return $this->add(strtoupper($method), $path, $handler);
  }

  private function validateRouteMethod(string $method): void
  {
    if (!in_array(strtoupper($method), $this->enabledMethods)) {
      throw new Exception("Method '{$method}' Is Not Enable", 500);
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
      throw new Exception("Controller '{$controllerNamespace}' Does Not Exist", 500);
    }

    if (!method_exists($controllerNamespace, $action)) {
      throw new Exception("Method '{$action}' Does Not Exist In Controller '{$controllerNamespace}'", 500);
    }

    return $handler;
  }

  public function group(string $prefix, array $middlewares = [], callable $callback): void
  {
    $previousGroupPrefix = $this->groupPrefix;
    $previousGroupMiddlewares = $this->groupMiddlewares;

    $this->groupPrefix = $previousGroupPrefix . rtrim($prefix, '/');
    $this->groupMiddlewares = array_merge($previousGroupMiddlewares, $middlewares);

    $callback($this);

    $this->groupPrefix = $previousGroupPrefix;
    $this->groupMiddlewares = $previousGroupMiddlewares;
  }

  private function add(string $method, string $path, string $handler): Route
  {
    $path = $this->groupPrefix . $path;

    RouteHelper::checksRouteConflict($method, $path, $this->staticRoutes, $this->dynamicRoutes);

    $route = new Route($method, $path, $handler, $this);
    $route->setMiddlewares($this->groupMiddlewares);

    if (RouteHelper::hasADynamicPart($path)) {
      $this->dynamicRoutes[$method][$path] = $route;
    } else {
      $this->staticRoutes[$method][$path] = $route;
    }

    return $route;
  }

  public function run(): void
  {
    $uri = $this->request->getUri();
    $method = $this->request->getMethod();

    [$controllerNamespace, $action, $params, $middlewares] = $this->resolveRoute($method, $uri);

    if (is_null($controllerNamespace) || is_null($action)) {
      throw new Exception("Page Not Found", 404);
    }

    $queue = new Queue($middlewares, $this->request, $this->response);
    $queue->run();

    $controllerInstance = new $controllerNamespace();
    $response = $controllerInstance->$action($this->request, $this->response, $params);

    $response->send();
  }

  private function resolveRoute(string $method, string $uri): array
  {
    if ($route = $this->findStaticRoute($method, $uri)) {
      return array_merge($this->resolveHandler($route->getHandler()), [$route->getMiddlewares()]);
    }

    if ($routeData = $this->findDynamicRoute($method, $uri)) {
      return array_merge($this->resolveHandler($routeData['route']->getHandler(), $routeData['params']), [$routeData['route']->getMiddlewares()]);
    }

    return [null, null, [], []];
  }

  private function findStaticRoute(string $method, string $uri): ?Route
  {
    return $this->staticRoutes[$method][$uri] ?? null;
  }

  private function findDynamicRoute(string $method, string $uri): ?array
  {
    if (isset($this->dynamicRoutes[$method])) {
      $uriSegments = array_values(array_filter(explode('/', $uri)));
      foreach ($this->dynamicRoutes[$method] as $path => $route) {
        $pathSegments = array_values(array_filter(explode('/', $path)));
        if (count($pathSegments) < count($uriSegments)) {
          continue;
        }

        if ($params = $this->matchDynamicRoute($uriSegments, $pathSegments)) {
          return ['route' => $route, 'params' => $params];
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

  public static function redirect(string $to): never
  {
    header("Location: $to");
    exit;
  }
}