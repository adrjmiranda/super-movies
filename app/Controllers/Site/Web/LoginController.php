<?php

namespace App\Controllers\Site\Web;

use App\Config\Session;
use App\Core\Controller\Base;
use App\Core\Http\Request;
use App\Core\Http\Response;

class LoginController extends Base
{
  public function __construct()
  {
    parent::__construct(SITE_VIEW_PATH);
  }

  public function index(Request $request, Response $response, array $params): Response
  {
    $csrfToken = Session::get('csrf_token');
    $view = $this->render('pages.login', [
      'csrf_token' => $csrfToken
    ]);
    $response->setBody($view);

    return $response;
  }

  public function store(Request $request, Response $response, array $params): ?Response
  {
    // TODO: login

    return $response;
  }
}