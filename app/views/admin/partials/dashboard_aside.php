<?php
/**
 * @var App\Core\Template\View $this
 */
?>

<div class="dashboard_aside">
  <div class="dashboard_profile_info">
    <img src="<?= $this->escape($base_url) ?>/assets/img/admin.jpg" alt="..." />

    <div class="dashboard_profile_info_text">
      <span class="dashboard_profile_info_text_name">John Doe</span>
      <span class="dashboard_profile_info_text_status">online</span>
    </div>
  </div>

  <div class="dashboard_menu">
    <button type="button" class="dashboard_close_menu">
      <i class="bi bi-x-lg"></i>
    </button>

    <ul>
      <li>
        <a href="<?= $this->linkTo('admin_dashboard_page') ?>">Dashboard</a>
      </li>

      <li>
        <a href="<?= $this->linkTo('admin_users_page') ?>">Users</a>
      </li>

      <li>
        <a href="<?= $this->linkTo('admin_movies_page') ?>">Movies</a>
      </li>

      <li>
        <a href="<?= $this->linkTo('admin_movie_creation_page') ?>">New Movie</a>
      </li>

      <li>
        <a href="<?= $this->linkTo('admin_contacts_page') ?>">Contacts</a>
      </li>
    </ul>

    <a href="<?= $this->linkTo('admin_logout') ?>" class="dashboard_logout_btn">Logout</a>
  </div>
</div>