<?php

require_once __DIR__ . '/../bootstrap.php';

use App\Core\Template\View;

View::config(SITE_VIEW_PATH);
View::view('home');