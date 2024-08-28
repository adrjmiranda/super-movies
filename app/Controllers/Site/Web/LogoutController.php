<?php

namespace App\Controllers\Site\Web;

use App\Config\Session;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\Http\Router;

class LogoutController
{
  public function index(Request $request, Response $response, array $params): ?Response
  {
    Session::remove('user');
    Router::back();

    return $response;
  }
}