<?php

namespace App\Core\Http;
use Exception;

class RouteHelper
{
  private static string $conflictingStaticRoute;
  private static string $conflictingDynamicRoute;

  public static function hasADynamicPart(string $path): bool
  {
    return preg_match('/\{\?(alphabetical|numeric|any)\}/', $path) || preg_match('/\{\:(alphabetical|numeric|any)\}/', $path);
  }

  private static function staticRouteIsInConflictWithStaticRoute(string $method, string $staticPath, array $staticRotues): bool
  {
    if (isset($staticRotues[$method])) {
      self::$conflictingStaticRoute = $staticPath;
      return array_key_exists($staticPath, $staticRotues[$method]);
    }

    return false;
  }

  private static function staticAndDynamicRouteMatch(string $method, string $path, array $routeList): bool
  {
    $hasADynamicPart = self::hasADynamicPart($path);
    $dynamicItems = [];
    $staticItems = [];

    if (isset($routeList[$method])) {
      foreach ($routeList[$method] as $routePath => $handler) {
        if ($hasADynamicPart) {
          $dynamicItems = array_values(array_filter(explode('/', $path)));
          $staticItems = array_values(array_filter(explode('/', $routePath)));
        } else {
          $dynamicItems = array_values(array_filter(explode('/', $routePath)));
          $staticItems = array_values(array_filter(explode('/', $path)));
        }

        if (count($staticItems) > count($dynamicItems)) {
          continue;
        }

        foreach ($dynamicItems as $key => $value) {
          if (self::hasADynamicPart($value)) {
            unset($dynamicItems[$key]);

            if (isset($staticItems[$key])) {
              unset($staticItems[$key]);
            }
          }
        }


        if ($staticItems === $dynamicItems) {
          if ($hasADynamicPart) {
            self::$conflictingStaticRoute = $path;
          } else {
            self::$conflictingDynamicRoute = $routePath;
          }

          return true;
        }
      }
    }

    return false;
  }

  private static function staticRouteIsInConflictWithDynamicRoute(string $method, string $staticPath, array $dynamicRoutes): bool
  {
    return self::staticAndDynamicRouteMatch($method, $staticPath, $dynamicRoutes);
  }

  private static function dynamicRouteIsInConflictWithStaticRoute(string $method, string $dynamicPath, array $staticRotues): bool
  {
    return self::staticAndDynamicRouteMatch($method, $dynamicPath, $staticRotues);
  }

  private static function removeDynamicPartFromPartList(array $partsList)
  {
    foreach ($partsList as $key => $value) {
      if (self::hasADynamicPart($value)) {
        unset($partsList[$key]);
      }
    }

    return $partsList;
  }

  private static function dynamicRouteIsInConflictWithDynamicRoute(string $method, string $dynamicPath, array $dynamicRoutes): bool
  {
    if (isset($dynamicRoutes[$method])) {
      foreach ($dynamicRoutes[$method] as $path => $handler) {
        $itemsBeingEvaluated = array_values(array_filter(explode('/', $dynamicPath)));
        $itemsAlreadyStored = array_values(array_filter(explode('/', $path)));

        $itemsBeingEvaluated = self::removeDynamicPartFromPartList($itemsBeingEvaluated);
        $itemsAlreadyStored = self::removeDynamicPartFromPartList($itemsAlreadyStored);

        if ($itemsBeingEvaluated === $itemsAlreadyStored) {
          self::$conflictingDynamicRoute = $path;
          return true;
        }
      }
    }

    return false;
  }

  private static function checksStaticRouteConflict(string $method, string $staticPath, array $staticRotues, array $dynamicRoutes): void
  {
    if (self::staticRouteIsInConflictWithStaticRoute($method, $staticPath, $staticRotues)) {
      throw new Exception("Static Route $staticPath Is In Conflict With Static Route " . self::$conflictingStaticRoute, 500);
    }

    if (self::staticRouteIsInConflictWithDynamicRoute($method, $staticPath, $dynamicRoutes)) {
      throw new Exception("Static Route $staticPath Is In Conflict With Dynamic Route " . self::$conflictingDynamicRoute, 500);
    }
  }

  private static function checksDynamicRouteConflict(string $method, string $dynamicPath, array $staticRotues, array $dynamicRoutes): void
  {
    if (self::dynamicRouteIsInConflictWithStaticRoute($method, $dynamicPath, $staticRotues)) {
      throw new Exception("Dynamic Route $dynamicPath Is In Conflict With Static Route " . self::$conflictingStaticRoute, 500);
    }

    if (self::dynamicRouteIsInConflictWithDynamicRoute($method, $dynamicPath, $dynamicRoutes)) {
      throw new Exception("Dynamic Route $dynamicPath Is In Conflict With Dynamic Route " . self::$conflictingDynamicRoute, 500);
    }
  }

  public static function checksRouteConflic(string $method, string $path, array $staticRotues, array $dynamicRoutes): void
  {
    if (self::hasADynamicPart($path)) {
      self::checksDynamicRouteConflict($method, $path, $staticRotues, $dynamicRoutes);
    } else {
      self::checksStaticRouteConflict($method, $path, $staticRotues, $dynamicRoutes);
    }
  }
}