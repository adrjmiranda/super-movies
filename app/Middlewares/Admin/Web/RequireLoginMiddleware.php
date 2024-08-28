<?php

namespace App\Middlewares\Admin\Web;

use App\Config\Session;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\Http\Router;

class RequireLoginMiddleware
{
  public function __invoke(Request $request, Response $response, callable $next)
  {
    $adminData = Session::get('admin');
    if (is_null($adminData)) {
      Router::redirect('/admin/login');
    }

    return $next($request, $response);
  }
}