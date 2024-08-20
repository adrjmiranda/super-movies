<?php
use App\Core\Template\View;

View:: extends('layouts.master');
?>

<?php View::include('partials.main_banner'); ?>
<?php View::include('partials.featured_films'); ?>
<?php View::include('partials.categories_bar'); ?>
<?php View::include('partials.movie_list'); ?>
<?php View::include('partials.movie_pagination'); ?>