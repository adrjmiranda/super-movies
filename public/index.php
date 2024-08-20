<?php

require_once __DIR__ . '/../bootstrap.php';

use App\Controllers\Site\HomeController;
use App\Core\Http\Router;

$router = new Router;

$router->get('/', HomeController::class . ':index');

$router->run();