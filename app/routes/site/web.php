<?php

use App\Core\Http\Router;

use App\Controllers\Site\Web\FaqController;
use App\Controllers\Site\Web\HomeController;
use App\Controllers\Site\Web\LoginController;
use App\Controllers\Site\Web\PrivacyController;
use App\Controllers\Site\Web\RegisterController;
use App\Controllers\Site\Web\TermsController;

$router->group('/', [], function (Router $router) {
  $router->get('/', HomeController::class . ':index')->as('home_page');
  $router->get('/privacy', PrivacyController::class . ':index')->as('privacy_page');
  $router->get('/terms', TermsController::class . ':index')->as('terms_page');
  $router->get('/faq', FaqController::class . ':index')->as('faq_page');

  $router->get('/login', LoginController::class . ':index')->as('user_login_page');
  $router->get('/register', RegisterController::class . ':index')->as('user_register_page');
});