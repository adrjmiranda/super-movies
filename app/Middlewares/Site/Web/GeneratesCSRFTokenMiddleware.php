<?php

namespace App\Middlewares\Site\Web;

use App\Config\Session;
use App\Core\Http\Request;
use App\Core\Http\Response;

class GeneratesCSRFTokenMiddleware
{
  public function __invoke(Request $request, Response $response, callable $next)
  {
    $csrf_token = bin2hex(random_bytes(48));
    Session::set('csrf_token_user', $csrf_token);

    return $next($request, $response);
  }
}