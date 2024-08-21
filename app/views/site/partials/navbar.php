<?php
/**
 * @var App\Core\Template\View $this
 */
?>

<div class="navbar">
	<div class="container">
		<nav>
			<div class="navbar_logo">
				<?php $this->include('partials.logo', [], true); ?>
			</div>

			<div class="navbar_menu">
				<ul>
					<li>
						<a href="/" class="navbar_link">Home</a>
					</li>

					<li>
						<a href="#" class="navbar_link">News</a>
					</li>

					<li>
						<a href="#" class="navbar_link">Featured</a>
					</li>

					<li>
						<a href="/login" class="btn_primary"><i class="bi bi-person-circle"></i>Login</a>
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