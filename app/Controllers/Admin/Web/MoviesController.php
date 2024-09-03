<?php

namespace App\Controllers\Admin\Web;

use App\Config\Session;
use App\Core\Controller\Base;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Repositories\CategoryRepository;

class MoviesController extends Base
{
  public function __construct()
  {
    parent::__construct(ADMIN_VIEW_PATH);
  }

  public function index(Request $request, Response $response, array $params): Response
  {
    $view = $this->render('pages.movies', [
      'session_title' => 'Movies'
    ]);
    $response->setBody($view);

    return $response;
  }

  public function create(Request $request, Response $response, array $params): Response
  {
    $categoriesRepository = new CategoryRepository;
    $categories = $categoriesRepository->all();

    $csrfToken = Session::get('csrf_token_admin');
    $view = $this->render('pages.create_movie', [
      'csrf_token_admin' => $csrfToken,
      'session_title' => 'Create Movie',
      'categories' => $categories
    ]);
    $response->setBody($view);

    return $response;
  }

  public function store(Request $request, Response $response, array $params): Response
  {
    return $response;
  }
}