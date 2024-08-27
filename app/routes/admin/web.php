<?php

use App\Core\Http\Router;

// Controllers
use App\Controllers\Admin\Web\LoginController;

// Middlewares
use App\Middlewares\Admin\Web\GeneratesCSRFTokenMiddleware;

$router->group('/admin', [], function (Router $router) {
  $router->group(
    '/',
    [GeneratesCSRFTokenMiddleware::class],
    function (Router $router) {
      $router->get('/login', LoginController::class . ':index')->as('admin_login_page');
    }
  );

  $router->group(
    '/',
    [],
    function (Router $router) {
      $router->post('/login', LoginController::class . ':store')->as('admin_login');
    }
  );
});