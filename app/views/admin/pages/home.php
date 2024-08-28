<?php
/**
 * @var App\Core\Template\View $this
 */

$this->extends('layouts.master', [
	'page_title' => 'SuperMovies | Dashboard'
])
	?>

<div class="dashboard">
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
					<a href="#">Dashboard</a>
				</li>

				<li>
					<a href="#">Users</a>
				</li>

				<li>
					<a href="#">Movies</a>
				</li>

				<li>
					<a href="#">Contacts</a>
				</li>
			</ul>

			<a href="<?= $this->linkTo('admin_logout') ?>" class="dashboard_logout_btn">Logout</a>
		</div>
	</div>

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

		<div class="dashboard_title">
			<h1>Dashboard</h1>
		</div>

		<div class="dashboard_inner">Content</div>
	</div>
</div>