<?php

require_once __DIR__ . '/../bootstrap.php';

use App\Core\Template\View;

View::configBase(SITE_VIEW_PATH, ['base_url' => $_ENV['BASE_URL']]);
echo View::view('pages.home', [
  'page_title' => 'TEST',
  'name' => 'Adriano'
]);