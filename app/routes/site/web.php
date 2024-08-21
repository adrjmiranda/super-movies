<?php

use App\Controllers\Site\Web\FaqController;
use App\Controllers\Site\Web\HomeController;
use App\Controllers\Site\Web\LoginController;
use App\Controllers\Site\Web\PrivacyController;
use App\Controllers\Site\Web\RegisterController;
use App\Controllers\Site\Web\TermsController;

$router->get('/', HomeController::class . ':index');
$router->get('/privacy', PrivacyController::class . ':index');
$router->get('/terms', TermsController::class . ':index');
$router->get('/faq', FaqController::class . ':index');

$router->get('/login', LoginController::class . ':index');
$router->get('/register', RegisterController::class . ':index');