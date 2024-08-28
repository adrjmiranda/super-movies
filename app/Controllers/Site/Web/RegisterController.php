<?php

namespace App\Controllers\Site\Web;

use App\Config\Session;
use App\Core\Controller\Base;
use App\Core\Http\Request;
use App\Core\Http\Response;

class RegisterController extends Base
{
  public function __construct()
  {
    parent::__construct(SITE_VIEW_PATH);
  }

  public function index(Request $request, Response $response, array $params): Response
  {
    $csrfToken = Session::get('csrf_token_user');
    $view = $this->render('pages.register', [
      'csrf_token_user' => $csrfToken
    ]);
    $response->setBody($view);

    return $response;
  }

  public function store(Request $request, Response $response, array $params): ?Response
  {
    $name = $request->getPostParam('name');
    $email = $request->getPostParam('email');
    $password = $request->getPostParam('password');
    $passwordConfirmation = $request->getPostParam('password_confirmation');

    dump($request->getPostParams());
    die();

    return $response;
  }
}