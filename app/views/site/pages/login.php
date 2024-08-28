<?php
/**
 * @var App\Core\Template\View $this
 */

$this->extends('layouts.auth', [
	'page_title' => 'SuperMovies | Login'
]);
?>

<div class="auth">
	<?php $this->includeOne('partials.auth_header'); ?>

	<div class="container">
		<div class="auth_content">
			<form action="<?= $this->linkTo('user_login') ?>" class="auth_form">
				<h1 class="auth_title">Login now</h1>

				<p class="auth_form_error"><?= $this->getErrorMessage('csrf') ?></p>

				<input type="hidden" name="csrf_token_user" value="<?= $this->escape($csrf_token_user) ?>">

				<div class="auth_input_field">
					<label for="email">E-mail</label>
					<input type="email" id="email" name="email" placeholder="Your email" />

					<p class="auth_form_error"><?= $this->getErrorMessage('email') ?></p>
				</div>

				<div class="auth_input_field">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" placeholder="Your password" />

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

				<button type="submit" class="btn_primary">Login</button>

				<p class="auth_toggle_text">
					Don't have an account yet? <a href="<?= $this->linkTo('user_register_page') ?>">Register</a>
				</p>
			</form>
		</div>
	</div>
</div>