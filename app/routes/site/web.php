<?php

use App\Core\Http\Router;

// Controllers
use App\Controllers\Site\Web\FaqController;
use App\Controllers\Site\Web\HomeController;
use App\Controllers\Site\Web\LoginController;
use App\Controllers\Site\Web\PrivacyController;
use App\Controllers\Site\Web\RegisterController;
use App\Controllers\Site\Web\TermsController;

// Middlewares
use App\Middlewares\Site\Web\GeneratesCSRFTokenMiddleware;

$router->group('/', [], function (Router $router) {
  $router->get('/', HomeController::class . ':index')->as('home_page');
  $router->get('/privacy', PrivacyController::class . ':index')->as('privacy_page');
  $router->get('/terms', TermsController::class . ':index')->as('terms_page');
  $router->get('/faq', FaqController::class . ':index')->as('faq_page');

  $router->group('/', [], function (Router $router) {
    $router->post('/login', LoginController::class . ':store');
    $router->post('/register', RegisterController::class . ':store');

    $router->group('/', [GeneratesCSRFTokenMiddleware::class], function (Router $router) {
      $router->get('/login', LoginController::class . ':index')->as('user_login_page');
      $router->get('/register', RegisterController::class . ':index')->as('user_register_page');
    });
  });
});