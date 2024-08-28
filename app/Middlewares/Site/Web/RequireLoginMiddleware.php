<?php

namespace App\Middlewares\Site\Web;

use App\Config\Session;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\Http\Router;

class RequireLoginMiddleware
{
  public function __invoke(Request $request, Response $response, callable $next)
  {
    $userData = Session::get('user');
    if (is_null($userData)) {
      Router::redirect('/login');
    }

    return $next($request, $response);
  }
}