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

  <link rel="stylesheet" href="<?= $base_url ?>/assets/css/admin/index.css" />

  <!-- Scripts -->

  <script src="<?= $base_url ?>/assets/js/admin/pass_visible_toggle.js" defer></script>
  <script src="<?= $base_url ?>/assets/js/admin/dashboard_toggle_menu.js" defer></script>

  <?php if (!empty($scripts)): ?>
    <?php foreach ($scripts as $name): ?>
      <script src="<?= $base_url ?>/assets/js/admin/<?= $name ?>.js" defer></script>
    <?php endforeach; ?>
  <?php endif; ?>

  <!-- Google Fonts -->

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />

  <!-- Bootstrap Icons -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

  <!-- Datatables -->

  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" />
</head>

<body>
  <div class="dashboard">
    <?php $this->includeOne('partials.dashboard_aside'); ?>

    <div class="dashboard_content">
      <div class="dashboard_header">
        <button type="button" class="dashboard_toggle_menu">
          <i class="bi bi-list"></i>
        </button>

        <div class="dashboard_header_logo">
          <a href="#" class="logo">
            <i class="bi bi-film"></i>
            <span>SuperMovies</span>
          </a>
        </div>

        <div class="dashboard_header_notifications">
          <ul>
            <li>
              <a href="#">
                <i class="bi bi-bell"></i>
              </a>
            </li>

            <li>
              <a href="#">
                <i class="bi bi-question-circle"></i>
              </a>
            </li>

            <li>
              <a href="#">
                <i class="bi bi-postcard"></i>
              </a>
            </li>
          </ul>
        </div>

        <a href="#" class="dashboard_header_user_info">
          <img src="<?= $this->escape($base_url) ?>/assets/img/admin.jpg" alt="..." />
          <span>John Doe</span>
        </a>
      </div>

      <?php $this->includeOne('partials.dashboard_title', [
        'session_title' => $session_title
      ]); ?>

      <?php $this->load(); ?>
    </div>
  </div>
</body>

</html>