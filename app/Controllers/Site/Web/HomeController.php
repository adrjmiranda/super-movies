<?php

namespace App\Controllers\Site\Web;

use App\Core\Controller\Base;
use App\Core\Http\Request;
use App\Core\Http\Response;

class HomeController extends Base
{
  public function __construct()
  {
    parent::__construct(SITE_VIEW_PATH);
  }

  /**
   * Handles the request for the home page.
   * 
   * @param \App\Core\Http\Request $request The HTTP request instance.
   * @param \App\Core\Http\Response $response The HTTP response instance.
   * @param array $params Route parameters.
   * @return \App\Core\Http\Response The HTTP response with the rendered view.
   */
  public function index(Request $request, Response $response, array $params): Response
  {
    $view = $this->render('pages.home');
    $response->setBody($view);

    return $response;
  }
}