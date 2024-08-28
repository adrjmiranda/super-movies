<?php

namespace App\Middlewares\Site\Web;

use App\Config\Flash;
use App\Config\FlashType;
use App\Config\Session;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\Http\Router;

class VerifyCSRFTokenMiddleware
{
  public function __invoke(Request $request, Response $response, callable $next)
  {
    $sessionCsrfToken = Session::get('csrf_token_user');
    $requestCsrfToken = $request->getPostParam('csrf_token_user');

    if ($sessionCsrfToken !== $requestCsrfToken) {
      Flash::set(['csrf' => 'Invalid credentials'], FlashType::Error);
      Router::back();
    }

    return $next($request, $response);
  }
}