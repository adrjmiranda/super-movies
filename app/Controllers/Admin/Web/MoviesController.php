<?php

namespace App\Controllers\Admin\Web;

use App\Config\Flash;
use App\Config\FlashType;
use App\Config\Session;
use App\Core\Controller\Base;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\Validations\Verify;
use App\Repositories\CategoryRepository;
use App\Repositories\MovieRespository;

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

    $title = $request->getPostParam('title');
    $slug = $request->getPostParam('slug');
    $duration = (int) $request->getPostParam('duration');
    $date = $request->getPostParam('date');
    $description = $request->getPostParam('description');
    $postCategories = empty($request->getPostParam('categories')) ? [] : $request->getPostParam('categories');

    $postParams = [
      'title' => $title,
      'slug' => $slug,
      'duration' => $duration,
      'date' => $date,
      'description' => $description,
      'post_categories' => $postCategories,
    ];

    $csrfToken = Session::get('csrf_token_admin');
    $view = $this->render('pages.create_movie', [
      'csrf_token_admin' => $csrfToken,
      'session_title' => 'Create Movie',
      'categories' => $categories,
      'post_params' => $postParams
    ]);
    $response->setBody($view);

    return $response;
  }

  public function store(Request $request, Response $response, array $params): Response
  {
    $title = $request->getPostParam('title');
    $slug = $request->getPostParam('slug');
    $duration = (int) $request->getPostParam('duration');
    $date = $request->getPostParam('date');
    $description = $request->getPostParam('description');

    $categories = empty($request->getPostParam('categories')) ? [] : $request->getPostParam('categories');
    $categories = array_unique($categories);

    $video = $request->getFiles()['movie'];

    $errors = Verify::getErrors([
      "required@movie|video" => $video,
      "required@title|title" => $title,
      "required@slug|slug" => $slug,
      "required@duration|duration" => $duration,
      "required@release_date|releasedate" => $date,
      "required@description|description" => $description,
      "required@categories|categoryid" => $categories,
    ]);

    if (!empty($errors)) {
      Flash::set($errors, FlashType::Error);
      return $this->create($request, $response, $params);
    }

    $title = preg_replace('/\s+/', ' ', trim($title));
    $slug = trim($slug);

    $movieRepository = new MovieRespository;

    return $response;
  }
}