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

class RegisterController extends Base
{
  public function __construct()
  {
    parent::__construct(SITE_VIEW_PATH);
  }

  public function index(Request $request, Response $response, array $params): Response
  {
    $email = $request->getPostParam('email');
    $name = $request->getPostParam('name');
    $password = $request->getPostParam('password');
    $passwordConfirmation = $request->getPostParam('password_confirmation');

    $postParams = [
      'name' => $name,
      'email' => $email,
      'password' => $password,
      'password_confirmation' => $passwordConfirmation
    ];

    $csrfToken = Session::get('csrf_token_user');
    $view = $this->render('pages.register', [
      'csrf_token_user' => $csrfToken,
      'post_params' => $postParams
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

    $errors = Verify::getErrors([
      'required@name|name' => $name,
      'required@email|email|registereduser@user' => $email,
      "required@password|min@8@password|password@$passwordConfirmation|max@20@password" => $password,
      'required@password_confirmation' => $passwordConfirmation,
    ]);

    if (!empty($errors)) {
      Flash::set($errors, FlashType::Error);
      return $this->index($request, $response, $params);
    }

    $name = preg_replace('/\s+/', ' ', trim($name));
    $email = trim($email);

    $userRepository = new UserRepository;
    $userData = [
      'name' => $name,
      'email' => $email,
      'password_hash' => password_hash($password, PASSWORD_DEFAULT),
    ];
    if ($userRepository->store($userData)) {
      $registeredUser = $userRepository->findOne('email', $email);
      if ($registeredUser !== false) {
        $id = $registeredUser->id;

        Session::set('user', [
          'id' => $id,
          'name' => $name,
          'email' => $email
        ]);
        Router::redirect('/');
      } else {
        Router::redirect('/login');
      }
    } else {
      Flash::set([
        'register' => 'Error when trying to register'
      ], FlashType::Error);
      return $this->index($request, $response, $params);
    }
  }
}