<?php

namespace App\Middlewares\Site\Web;
use App\Core\Http\Request;
use App\Core\Http\Response;

class GeneratesCSRFToken
{
  public function __invoke(Request $request, Response $response, callable $next)
  {
    $csrf_token = bin2hex(random_bytes(48));
    // dump($csrf_token);
    // die();
  }
}