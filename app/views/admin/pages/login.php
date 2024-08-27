<?php
/**
 * @var App\Core\Template\View $this
 */

$this->extends('layouts.auth', [
	'page_title' => 'SuperMovies | Admin Login'
]);
?>

<div class="container">
	<div class="auth">
		<div class="auth_content">
			<form action="<?= $this->linkTo('admin_login') ?>" method="post" class="auth_form">
				<div class="auth_logo">
					<a href="#" class="logo">
						<i class="bi bi-film"></i>
						<span>SuperMovies</span>
					</a>
				</div>

				<input type="hidden" name="csrf_token" value="<?= $this->escape($csrf_token) ?>">

				<div class="auth_input_field">
					<label for="email">E-mail</label>
					<input type="email" name="email" placeholder="email@example.com"
						value="<?= $this->escape($post_params['email'] ?? '') ?>" />

					<p class="auth_form_error"><?= $this->getErrorMessage('email') ?></p>
				</div>

				<div class="auth_input_field">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" placeholder="password"
						value="<?= $this->escape($post_params['password'] ?? '') ?>" />

					<p class="auth_form_error"><?= $this->getErrorMessage('password') ?></p>

					<div class="pass_visible_toggle pass">
						<button type="button" class="pass_visible_toggle_show">
							<i class="bi bi-eye"></i>
						</button>
						<button type="button" class="pass_visible_toggle_hidden">
							<i class="bi bi-eye-slash-fill"></i>
						</button>
					</div>
				</div>

				<button class="btn_secondary">Login</button>
			</form>
		</div>
	</div>
</div>