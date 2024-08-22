<?php

namespace App\Core\Middleware;

use Closure;
use App\Core\Http\Request;
use App\Core\Http\Response;

class Queue
{
  private array $middlewares;
  private Request $request;
  private Response $response;

  public function __construct(array $middlewares, Request $request, Response $response)
  {
    $this->middlewares = $middlewares;
    $this->request = $request;
    $this->response = $response;
  }

  public function next()
  {
    if (empty($this->middlewares)) {
      return null;
    }

    $middleware = array_shift($this->middlewares);
    $middlewareInstance = new $middleware();

    return $middlewareInstance($this->request, $this->response, Closure::fromCallable([$this, 'next']));
  }

  public function run()
  {
    return $this->next();
  }
}