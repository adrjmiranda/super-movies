<?php
/**
 * @var App\Core\Template\View $this
 */

$this->extends('layouts.master', [
  'page_title' => 'Home'
]);
?>

<?php $this->include('partials.main_banner'); ?>
<?php $this->include('partials.featured_films'); ?>
<?php $this->include('partials.categories_bar'); ?>
<?php $this->include('partials.movie_list'); ?>
<?php $this->include('partials.movie_pagination'); ?>