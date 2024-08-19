<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link
			rel="shortcut icon"
			href="../../../../public/favicon.ico"
			type="image/x-icon"
		/>

		<title>SuperMovies</title>

		<!-- Styles -->

		<link
			rel="stylesheet"
			href="../../../../public/assets/css/admin/index.css"
		/>

		<!-- Scripts -->

		<script
			src="../../../../public/assets/js/admin/pass_visible_toggle.js"
			defer
		></script>

		<!-- Google Fonts -->

		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
			rel="stylesheet"
		/>

		<!-- Bootstrap Icons -->

		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
		/>
	</head>
	<body>
		<div class="container">
			<div class="auth">
				<div class="auth_content">
					<form action="#" class="auth_form">
						<div class="auth_logo">
							<a href="#" class="logo">
								<i class="bi bi-film"></i>
								<span>SuperMovies</span>
							</a>
						</div>

						<div class="auth_input_field">
							<label for="email">E-mail</label>
							<input
								type="email"
								name="email"
								placeholder="email@example.com"
							/>
						</div>

						<div class="auth_input_field">
							<label for="password">Password</label>
							<input
								type="password"
								name="password"
								id="password"
								placeholder="password"
							/>

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
	</body>
</html>
