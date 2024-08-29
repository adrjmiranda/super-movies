<?php

namespace App\Controllers\Admin\Web;

use App\Core\Controller\Base;
use App\Config\Flash;
use App\Config\FlashType;
use App\Core\Http\Router;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\Validations\Verify;
use App\Config\Session;
use App\Repositories\AdminRepository;

class LoginController extends Base
{
  public function __construct()
  {
    parent::__construct(ADMIN_VIEW_PATH);
  }

  public function index(Request $request, Response $response, array $params): Response
  {
    $email = $request->getPostParam('email');
    $password = $request->getPostParam('password');

    $postParams = [
      'email' => $email,
      'password' => $password
    ];

    $csrfToken = Session::get('csrf_token_admin');
    $view = $this->render('pages.login', [
      'csrf_token_admin' => $csrfToken,
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
      'required@email|userexists@admin' => $email,
      'required@password' => $password
    ]);

    if (!empty($errors)) {
      Flash::set($errors, FlashType::Error);
      return $this->index($request, $response, $params);
    }

    $admin = (new AdminRepository)->findOne('email', $email);
    if (!password_verify($password, $admin->password_hash)) {
      Flash::set([
        'password' => 'Incorrect password'
      ], FlashType::Error);
      return $this->index($request, $response, $params);
    }

    Session::set('admin', [
      'name' => $admin->name,
      'email' => $admin->email,
    ]);

    Router::redirect('/admin/dashboard/home');

    return $response;
  }
}