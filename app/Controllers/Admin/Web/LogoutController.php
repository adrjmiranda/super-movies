<?php

namespace App\Controllers\Admin\Web;
use App\Config\Session;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\Http\Router;

class LogoutController
{
  public function index(Request $request, Response $response, array $params): ?Response
  {
    Session::remove('admin');
    Router::redirect('/admin/login');

    return $response;
  }
}