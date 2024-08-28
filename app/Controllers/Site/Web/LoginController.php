<?php

namespace App\Controllers\Site\Web;

use App\Config\Flash;
use App\Config\FlashType;
use App\Config\Session;
use App\Core\Controller\Base;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\Http\Router;
use App\Core\Validations\Verify;
use App\Repositories\UserRepository;

class LoginController extends Base
{
  public function __construct()
  {
    parent::__construct(SITE_VIEW_PATH);
  }

  public function index(Request $request, Response $response, array $params): Response
  {
    $email = $request->getPostParam('email');
    $password = $request->getPostParam('password');

    $postParams = [
      'email' => $email,
      'password' => $password
    ];

    $csrfToken = Session::get('csrf_token_user');
    $view = $this->render('pages.login', [
      'csrf_token_user' => $csrfToken,
      'post_params' => $postParams
    ]);
    $response->setBody($view);

    return $response;
  }

  public function store(Request $request, Response $response, array $params): ?Response
  {
    $email = $request->getPostParam('email');
    $password = $request->getPostParam('password');

    $errors = Verify::getErrors([
      'required@email|userexists@user' => $email,
      'required@password' => $password
    ]);

    if (!empty($errors)) {
      Flash::set($errors, FlashType::Error);
      return $this->index($request, $response, $params);
    }

    $user = (new UserRepository)->findOne('email', $email);
    if (!password_verify($password, $user->password_hash)) {
      Flash::set([
        'password' => 'Incorrect password'
      ], FlashType::Error);
      return $this->index($request, $response, $params);
    }

    Session::set('user', [
      'id' => $user->id,
      'name' => $user->name,
      'email' => $user->email,
    ]);

    Router::redirect('/');

    return $response;
  }
}