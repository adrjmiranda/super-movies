<?php

namespace App\Controllers\Admin\Web;

use App\Core\Controller\Base;
use App\Core\Http\Request;
use App\Core\Http\Response;

class DashboardController extends Base
{
  public function __construct()
  {
    parent::__construct(ADMIN_VIEW_PATH);
  }

  public function index(Request $request, Response $response, array $params): Response
  {
    $view = $this->render('pages.home', [
      'session_title' => 'Dashboard'
    ]);
    $response->setBody($view);

    return $response;
  }
}