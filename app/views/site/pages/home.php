<?php
/**
 * @var App\Core\Template\View $this
 */

$this->extends('layouts.master', [
  'page_title' => 'SuperMovies | Home'
]);
?>

<?php $this->includeOne('partials.main_banner'); ?>
<?php $this->includeOne('partials.featured_films'); ?>
<?php $this->includeOne('partials.categories_bar'); ?>
<?php $this->includeOne('partials.movie_list'); ?>
<?php $this->includeOne('partials.movie_pagination'); ?>