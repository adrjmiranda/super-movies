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
			href="../../../../public/assets/css/site/index.css"
		/>

		<!-- Scripts -->

		<script
			src="../../../../public/assets/js/site/navbar_toggle_menu.js"
			defer
		></script>
		<script
			src="../../../../public/assets/js/site/pass_visible_toggle.js"
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
		<!-- Navbar -->

		<div class="navbar">
			<div class="container">
				<nav>
					<div class="navbar_logo">
						<a href="#" class="logo">
							<i class="bi bi-film"></i>
							<span>SuperMovies</span>
						</a>
					</div>

					<div class="navbar_menu">
						<ul>
							<li>
								<a href="#" class="navbar_link">Home</a>
							</li>

							<li>
								<a href="#" class="navbar_link">News</a>
							</li>

							<li>
								<a href="#" class="navbar_link">Featured</a>
							</li>

							<li>
								<a href="#" class="btn_primary"
									><i class="bi bi-person-circle"></i>Login</a
								>
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

		<!-- Profile -->

		<div class="container">
			<div class="profile">
				<h1 class="profile_title">Welcome <span>Jane Doe</span></h1>

				<div class="profile_container">
					<aside class="profile_menu">
						<div class="profile_user_info">
							<div class="profile_user_img">
								<label for="photo">
									<img src="../../../src/img/profile_cover.jpeg" alt="..." />
									<span>Change</span>
								</label>
							</div>
						</div>

						<ul>
							<li>
								<a href="#" class="active">Your data</a>
							</li>

							<li>
								<a href="#">Watching</a>
							</li>

							<li>
								<a href="#">Archived</a>
							</li>
						</ul>
					</aside>

					<div class="profile_content">
						<form action="#" class="profile_form" enctype="multipart/form-data">
							<h3 class="profile_form_title">Update your data</h3>

							<input type="file" id="photo" name="photo" />

							<div class="profile_input_field">
								<label for="name">Name</label>
								<input
									type="text"
									id="name"
									name="name"
									placeholder="Your name"
								/>
							</div>

							<div class="profile_input_field">
								<label for="email">E-mail</label>
								<input
									type="email"
									id="email"
									name="email"
									placeholder="Your email"
								/>
							</div>

							<div class="profile_input_field">
								<label for="password">Password</label>
								<input
									type="password"
									id="password"
									name="password"
									placeholder="Your password"
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

							<div class="profile_input_field">
								<label for="password_confirmation">Password confirmation</label>
								<input
									type="password"
									id="password_confirmation"
									name="password_confirmation"
									placeholder="Your password again"
								/>

								<div class="pass_visible_toggle pass_confirm">
									<button type="button" class="pass_visible_toggle_show">
										<i class="bi bi-eye"></i>
									</button>
									<button type="button" class="pass_visible_toggle_hidden">
										<i class="bi bi-eye-slash-fill"></i>
									</button>
								</div>
							</div>

							<button type="submit" class="btn_primary">Update</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->

		<footer class="footer">
			<div class="container">
				<div class="footer_row">
					<div class="footer_col">
						<div class="footer_logo">
							<a href="#" class="logo">
								<i class="bi bi-film"></i>
								<span>SuperMovies</span>
							</a>
						</div>

						<div class="footer_description">
							<p>
								Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius
								cum error quia autem molestias quidem in fugiat odit sunt magni
								quibusdam, explicabo debitis sapiente optio possimus aliquid
								consequatur. Debitis, voluptatem.
							</p>
						</div>
					</div>

					<div class="footer_col">
						<h5 class="footer_title">Menu</h5>

						<div class="footer_links">
							<ul>
								<li>
									<a href="#" class="navbar_link">Home</a>
								</li>

								<li>
									<a href="#" class="navbar_link">About</a>
								</li>

								<li>
									<a href="#" class="navbar_link">News</a>
								</li>

								<li>
									<a href="#" class="navbar_link">Featured</a>
								</li>

								<li>
									<a href="#" class="navbar_link">Contact</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="footer_col">
						<h5 class="footer_title">Where to find us</h5>

						<div class="footer_contact_info">
							<p class="footer_info">
								<i class="bi bi-geo-fill"></i
								><span>145 SM Street, New York</span>
							</p>
							<p class="footer_info">
								<i class="bi bi-mailbox"></i
								><span>contact@supermovies.com</span>
							</p>
							<p class="footer_info">
								<i class="bi bi-telephone"></i><span>+11 (99) 2233-4455</span>
							</p>
						</div>

						<div class="footer_social_media">
							<a href="#" class="footer_social_link">
								<i class="bi bi-instagram"></i>
							</a>

							<a href="#" class="footer_social_link">
								<i class="bi bi-facebook"></i>
							</a>

							<a href="#" class="footer_social_link">
								<i class="bi bi-twitter-x"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="footer_bottom">
				<p class="container">
					Made with <i class="bi bi-suit-heart"></i> by
					<span>Adriano Miranda</span> &copy; 2024
				</p>
			</div>
		</footer>
	</body>
</html>
