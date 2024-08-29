<?php

namespace App\Controllers\Admin\Web;

use App\Core\Controller\Base;
use App\Core\Http\Request;
use App\Core\Http\Response;

class UsersController extends Base
{
  public function __construct()
  {
    parent::__construct(ADMIN_VIEW_PATH);
  }

  public function index(Request $request, Response $response, array $params): Response
  {
    $view = $this->render('pages.users', [
      'session_title' => 'Users'
    ]);
    $response->setBody($view);

    return $response;
  }
}