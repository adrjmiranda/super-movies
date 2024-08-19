<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

define('ROOT_PATH', __DIR__);
define('VIEW_PATH', ROOT_PATH . '/app/views');
define('SITE_VIEW_PATH', VIEW_PATH . '/site');
define('ADMIN_VIEW_PATH', VIEW_PATH . '/admin');

// Get Environment Variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Get DEV MODE
$devMode = $_ENV['APP_ENV'];
if ($devMode === 'local') {
  $whoops = new \Whoops\Run;
  $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
  $whoops->register();
}