<?php
/**
 * @var App\Core\Template\View $this
 */
?>

<div class="navbar">
	<div class="container">
		<nav>
			<div class="navbar_logo">
				<?php $this->includeMany('partials.logo'); ?>
			</div>

			<div class="navbar_menu">
				<ul>
					<li>
						<a href="<?= $this->linkTo('home_page') ?>" class="navbar_link">Home</a>
					</li>

					<li>
						<a href="#" class="navbar_link">News</a>
					</li>

					<li>
						<a href="#" class="navbar_link">Featured</a>
					</li>

					<li>
						<?php if ($this->userIsLoggedIn()): ?>
							<a href="<?= $this->linkTo('user_logout') ?>" class="btn_primary">Logout<i
									class="bi bi-box-arrow-right"></i></a>
						<?php else: ?>
							<a href="<?= $this->linkTo('user_login_page') ?>" class="btn_primary"><i
									class="bi bi-person-circle"></i>Login</a>
						<?php endif; ?>
					</li>
				</ul>

				<form action="#">
					<input type="search" name="search" placeholder="Search" />
					<button type="submit"><i class="bi bi-search"></i></button>
				</form>
			</div>

			<button class="navbar_toggle_menu" type="button">
				<i class="bi bi-three-dots-vertical"></i>
			</button>
		</nav>
	</div>
</div>