<?php

require_once __DIR__ . '/../bootstrap.php';

use App\Controllers\Site\HomeController;
use App\Core\Http\Router;

$router = new Router;

$router->get('/', HomeController::class . ':index');
$router->get('/user/show/{:numeric}', HomeController::class . ':index');
$router->get('/user/profile/{?numeric}', HomeController::class . ':index');
$router->get('/user/{:alphabetical}', HomeController::class . ':index');
// $router->get('/user/{:numeric}/update/{:any}', HomeController::class . ':index');
$router->get('/user/{:numeric}/update/{:alphabetical}', HomeController::class . ':index');
$router->get('/user/photo/update/wallpaper', HomeController::class . ':index');
$router->get('/user/photo/update/wallpaper', HomeController::class . ':index');
