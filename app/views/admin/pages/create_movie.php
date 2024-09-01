<?php

/**
 * @var App\Core\Template\View $this
 */

$this->extends('layouts.master', [
  'page_title' => 'SuperMovies | Create Movie'
]);
?>

<div class="dashboard_inner">
  <div class="create_movie">
    <form action="#" method="post" enctype="multipart/form-data" class="create_movie_form">

      <input type="hidden" name="csrf_token_admin" value="<?= $this->escape($csrf_token_admin) ?>">

      <div class="create_movie_preview"></div>

      <div class="create_movie_input_fields">
        <p class="auth_form_error"><?= $this->getErrorMessage('csrf') ?></p>

        <div class="create_movie_input_field">
          <label>Movie:</label>
          <input type="file" name="movie" accept="video/*">
        </div>

        <div class="create_movie_input_field_row">
          <div class="create_movie_input_field">
            <label>Title:</label>
            <input type="text" name="title" placeholder="Movie title">
          </div>

          <div class="create_movie_input_field">
            <label>Slug:</label>
            <input type="text" name="slug" placeholder="Movie slug">
          </div>
        </div>

        <div class="create_movie_input_field_row">
          <div class="create_movie_input_field">
            <label>Duration (min):</label>
            <input type="number" name="duration" min="1" placeholder="Movie duration">
          </div>

          <div class="create_movie_input_field">
            <label>Realease date:</label>
            <input type="date" name="release_date">
          </div>
        </div>

        <div class="create_movie_input_field">
          <label>Description:</label>
          <textarea name="description" placeholder="Film description..."></textarea>
        </div>

        <div class="create_movie_input_field">
          <label>Categories:</label>
          <div class="create_movie_input_field_checkbox">
            <label>
              <input type="checkbox" name="categories[]" value="..."><span>Categorie name</span>
            </label>
          </div>
        </div>
      </div>

      <button type="submit" class="btn-prmiary">Store</button>
    </form>
  </div>
</div>