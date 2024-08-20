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
    $path = $args[0] ?? '';
    $handler = $args[1] ?? '';

    if (empty($path)) {
      throw new Exception("Path Parameter Was Not Defined When Adding The Route", 500);
    }

    $path = $path === '/' ? $path : rtrim($path, '/');

    if (empty($handler)) {
      throw new Exception("The Handler Parameter Was Not Passed When Adding The Class", 500);
    }

    $methodIsEnable = in_array(strtoupper($method), $this->enabledMethods);

    if (!$methodIsEnable) {
      throw new Exception("Method {$method} Is Not Enable", 500);
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

    $this->add(strtoupper($method), $path, $handler);
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

  public function run()
  {
    $uri = $this->request->getUri();
    $method = $this->request->getMethod();

    $controllerNamespace = null;
    $action = null;

    if (isset($this->staticRoutes[$method]) && array_key_exists($uri, $this->staticRoutes[$method])) {
      $handler = $this->staticRoutes[$method][$uri];
      $handlerParts = explode(':', $handler);
      $controllerNamespace = $handlerParts[0] ?? null;
      $action = $handlerParts[1] ?? null;

      if (is_null($controllerNamespace) || is_null($action)) {
        throw new Exception("Server Error", 500);
      }
    } else if (isset($this->dynamicRoutes[$method])) {
      $uriSegments = array_values(array_filter(explode('/', $uri)));
      foreach ($this->dynamicRoutes[$method] as $path => $handler) {
        $pathSegments = array_values(array_filter(explode('/', $path)));

        if (count($pathSegments) < count($uriSegments)) {
          continue;
        }

        if (count($pathSegments) > count($uriSegments)) {
          $uriSegments = array_pad($uriSegments, count($pathSegments), '');
        }

        $verifiedSegmentsOfTheUri = 0;
        foreach ($uriSegments as $key => $uriSegment) {
          if (array_key_exists($pathSegments[$key], $this->paramsPatternList)) {
            if (!preg_match($this->paramsPatternList[$pathSegments[$key]], $uriSegment)) {
              $verifiedSegmentsOfTheUri = 0;
            }
          } else if ($pathSegments[$key] !== $uriSegment) {
            $verifiedSegmentsOfTheUri = 0;
          }
          $verifiedSegmentsOfTheUri += 1;
        }

        if ($verifiedSegmentsOfTheUri === count($uriSegments)) {
          $handlerParts = explode(':', $handler);
          $controllerNamespace = $handlerParts[0] ?? null;
          $action = $handlerParts[1] ?? null;

          if (is_null($controllerNamespace) || is_null($action)) {
            throw new Exception("Server Error", 500);
          }
        }
      }
    }

    if (is_null($controllerNamespace) || is_null($action)) {
      throw new Exception("Page Not Found", 404);
    }

    $controllerInstance = new $controllerNamespace();
    $response = $controllerInstance->$action($this->request, $this->response);

    $response->send();
  }
}