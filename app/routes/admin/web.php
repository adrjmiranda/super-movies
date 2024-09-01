<?php

use App\Controllers\Admin\Web\ContactsController;
use App\Controllers\Admin\Web\MoviesController;
use App\Controllers\Admin\Web\UsersController;
use App\Core\Http\Router;

// Controllers
use App\Controllers\Admin\Web\LoginController;
use App\Controllers\Admin\Web\LogoutController;
use App\Controllers\Admin\Web\DashboardController;

// Middlewares
use App\Middlewares\Admin\Web\GeneratesCSRFTokenMiddleware;
use App\Middlewares\Admin\Web\RequireLoginMiddleware;
use App\Middlewares\Admin\Web\RequireLogoutMiddleware;
use App\Middlewares\Admin\Web\VerifyCSRFTokenMiddleware;

$router->group('/admin', [], function (Router $router) {
  $router->group(
    '/',
    [RequireLogoutMiddleware::class],
    function (Router $router) {
      $router->group('/', [VerifyCSRFTokenMiddleware::class], function (Router $router) {
        $router->post('/login', LoginController::class . ':store')->as('admin_login');
      });
      $router->group(
        '/',
        [GeneratesCSRFTokenMiddleware::class],
        function (Router $router) {
          $router->get('/login', LoginController::class . ':index')->as('admin_login_page');
        }
      );
    }
  );

  $router->group('/', [RequireLoginMiddleware::class], function (Router $router) {
    $router->get('/logout', LogoutController::class . ':index')->as('admin_logout');
    $router->get('/dashboard/home', DashboardController::class . ':index')->as('admin_dashboard_page');
    $router->get('/dashboard/users', UsersController::class . ':index')->as('admin_users_page');
    $router->get('/dashboard/movies', MoviesController::class . ':index')->as('admin_movies_page');
    $router->get('/dashboard/contacts', ContactsController::class . ':index')->as('admin_contacts_page');

    $router->group('/', [GeneratesCSRFTokenMiddleware::class], function (Router $router) {
      $router->get('/dashboard/create/movie', MoviesController::class . ':create')->as('admin_movie_creation_page');
    });

    $router->group('/', [VerifyCSRFTokenMiddleware::class], function (Router $router) {
      $router->post('/dashboard/create/movie', MoviesController::class . ':store')->as('admin_movie_creation_store');
    });
  });
});