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
  <link rel="shortcut icon" href="<?= $this->escape($base_url) ?>/favicon.ico" type="image/x-icon" />

  <title>SuperMovies</title>

  <!-- Styles -->

  <link rel="stylesheet" href="<?= $this->escape($base_url) ?>/assets/css/admin/index.css" />

  <!-- Scripts -->

  <script src="<?= $this->escape($base_url) ?>/assets/js/admin/pass_visible_toggle.js" defer></script>

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
  <?php $this->load(); ?>
</body>

</html>