<?php

namespace App\Middlewares\Site\Web;

use App\Core\Http\Request;
use App\Core\Http\Response;

class RequireLoginMiddleware
{
  public function __invoke(Request $request, Response $response, callable $next)
  {
    return $next($request, $response);
  }
}