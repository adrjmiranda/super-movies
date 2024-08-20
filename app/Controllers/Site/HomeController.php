<?php

namespace App\Controllers\Site;

use App\Core\Controller\Base;
use App\Core\Http\Request;
use App\Core\Http\Response;

class HomeController extends Base
{
  public function __construct()
  {
    parent::__construct(SITE_VIEW_PATH);
  }

  public function index(Request $request, Response $response, array $params): Response
  {
    $view = $this->render('pages.home');
    $response->setBody($view);

    return $response;
  }
}