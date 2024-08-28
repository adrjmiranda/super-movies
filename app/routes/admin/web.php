<?php

use App\Core\Http\Router;

// Controllers
use App\Controllers\Admin\Web\LoginController;
use App\Controllers\Admin\Web\LogoutController;
use App\Controllers\Admin\Web\DashboardController;

// Middlewares
use App\Middlewares\Admin\Web\GeneratesCSRFTokenMiddleware;
use App\Middlewares\Admin\Web\RequireLoginMiddleware;
use App\Middlewares\Admin\Web\RequireLogoutMiddleware;

$router->group('/admin', [], function (Router $router) {
  $router->group(
    '/',
    [GeneratesCSRFTokenMiddleware::class, RequireLogoutMiddleware::class],
    function (Router $router) {
      $router->get('/login', LoginController::class . ':index')->as('admin_login_page');
    }
  );

  $router->group(
    '/',
    [RequireLogoutMiddleware::class],
    function (Router $router) {
      $router->post('/login', LoginController::class . ':store')->as('admin_login');
    }
  );

  $router->group('/', [RequireLoginMiddleware::class], function (Router $router) {
    $router->get('/logout', LogoutController::class . ':index')->as('admin_logout');
    $router->get('/dashboard', DashboardController::class . ':index')->as('admin_dashboard_page');
  });
});