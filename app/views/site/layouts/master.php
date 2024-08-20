<?php
/**
 * @var App\Core\Template\View $this
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="<?= $base_url ?>/favicon.ico" type="image/x-icon" />

	<title><?= $this->escape($page_title) ?></title>

	<!-- Styles -->

	<link rel="stylesheet" href="<?= $base_url ?>/assets/css/site/index.css" />

	<!-- Scripts -->

	<script src="<?= $base_url ?>/assets/js/site/featured_movies_carousel.js" defer></script>
	<script src="<?= $base_url ?>/assets/js/site/categories_bar_scroll.js" defer></script>
	<script src="<?= $base_url ?>/assets/js/site/navbar_toggle_menu.js" defer></script>

	<!-- Google Fonts -->

	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
		rel="stylesheet" />

	<!-- Bootstrap Icons -->

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
	<?php $this->include('partials.navbar'); ?>
	<?php $this->load(); ?>
	<?php $this->include('partials.footer'); ?>
</body>

</html>