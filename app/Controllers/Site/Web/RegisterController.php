<?php

namespace App\Controllers\Site\Web;

use App\Config\Flash;
use App\Config\FlashType;
use App\Config\Session;
use App\Core\Controller\Base;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\Validations\Verify;
use App\Repositories\AdminRepository;

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

    $errors = Verify::getErrors([
      'required@name|name' => $name,
      'required@email|email|registereduser@user' => $email,
      "required@password|password@$passwordConfirmation|min@8@password|max@20@password" => $password,
      'required@password_confirmation' => $passwordConfirmation,
    ]);

    if (!empty($errors)) {
      Flash::set($errors, FlashType::Error);
      return $this->index($request, $response, $params);
    }

    $adminRepository = new AdminRepository;
    // TODO: continue register (store)

    return $response;
  }
}