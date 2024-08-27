<?php

namespace App\Controllers\Admin\Web;

use App\Config\Session;
use App\Core\Controller\Base;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\Validations\Verify;

class LoginController extends Base
{
  public function __construct()
  {
    parent::__construct(ADMIN_VIEW_PATH);
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

  public function store(Request $request, Response $response, array $params): Response
  {
    $email = $request->getPostParams()['email'] ?? '';
    $password = $request->getPostParams()['password'] ?? '';

    $errors = Verify::getErrors([
      'userexists@admin' => $email,
      'ovo@password' => $password
    ]);

    return $response;
  }
}