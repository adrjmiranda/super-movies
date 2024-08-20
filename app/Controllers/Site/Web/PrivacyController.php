<?php

namespace App\Controllers\Site\Web;

use App\Core\Controller\Base;
use App\Core\Http\Request;
use App\Core\Http\Response;

class PrivacyController extends Base
{
  public function __construct()
  {
    parent::__construct(SITE_VIEW_PATH);
  }

  public function index(Request $request, Response $response, array $params): Response
  {
    $view = $this->render('pages.privacy');
    $response->setBody($view);

    return $response;
  }
}