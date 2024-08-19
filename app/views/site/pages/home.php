<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="<?= $base_url ?>/favicon.ico" type="image/x-icon" />

	<title>SuperMovies</title>

	<!-- Styles -->

	<link rel="stylesheet" href="<?= $base_url ?>/assets/css/site/index.css" />

	<!-- Scripts -->

	<script src="<?= $base_url ?>/assets/js/site/featured_movies_carousel.js" defer></script>
	<script src="<?= $base_url ?>/assets/js/site/categories_bar_scroll.js" defer></script>
	<script src="<?= $base_url ?>/assets/js/site/navbar_toggle_menu.js" defer></script>

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
							<a href="#" class="btn_primary"><i class="bi bi-person-circle"></i>Login</a>
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

	<!-- Main Banner -->

	<div class="container">
		<div class="main_banner">
			<div class="main_banner_img"></div>

			<div class="main_banner_info">
				<div class="movie_title">
					<h2>Avengers</h2>
				</div>

				<div class="movie_info">
					<div class="movie_review">
						<i class="bi bi-star-fill"></i>
						<span>8.6</span>
					</div>

					<div class="movie_genres">
						<span>Action</span>
						<span>Adventure</span>
					</div>
				</div>

				<div class="movie_description">
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Et
						facilis expedita explicabo aliquam maiores corporis dolor fugiat
						doloribus laudantium? Placeat sed impedit incidunt aspernatur
						provident repudiandae tempore doloribus ea dolores?
					</p>
				</div>

				<a href="#" class="btn_primary">Watch now</a>
			</div>

			<div class="film"></div>
		</div>
	</div>

	<!-- Featured Films -->

	<div class="container">
		<div class="featured_movies">
			<h3>Featured Films</h3>

			<div class="featured_movies_slides">
				<div class="featured_movies_container">
					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_1.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>John wick 2</span>
						</div>
					</a>

					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_2.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>Jatten</span>
						</div>
					</a>

					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_3.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>T-Rex</span>
						</div>
					</a>

					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>Star wars - Rogue one</span>
						</div>
					</a>

					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_1.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>John wick 2</span>
						</div>
					</a>

					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_2.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>Jatten</span>
						</div>
					</a>

					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_3.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>T-Rex</span>
						</div>
					</a>

					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>Star wars - Rogue one</span>
						</div>
					</a>

					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_1.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>John wick 2</span>
						</div>
					</a>

					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_2.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>Jatten</span>
						</div>
					</a>

					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_3.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>T-Rex</span>
						</div>
					</a>

					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>Star wars - Rogue one</span>
						</div>
					</a>

					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_1.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>John wick 2</span>
						</div>
					</a>

					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_2.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>Jatten</span>
						</div>
					</a>

					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_3.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>T-Rex</span>
						</div>
					</a>

					<a href="#" class="featured_movie_slide_card">
						<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

						<div class="featured_movie_slide_card_info">
							<span>Star wars - Rogue one</span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Categories Bar -->

	<div class="container">
		<div class="categories_bar">
			<ul>
				<li>
					<a href="#" class="active">All</a>
				</li>

				<li>
					<a href="#">Action</a>
				</li>

				<li>
					<a href="#">Adventure</a>
				</li>

				<li>
					<a href="#">Comedy</a>
				</li>

				<li>
					<a href="#">Drama</a>
				</li>

				<li>
					<a href="#">Science fiction</a>
				</li>

				<li>
					<a href="#">Fantasy</a>
				</li>

				<li>
					<a href="#">Suspense</a>
				</li>

				<li>
					<a href="#">Terror</a>
				</li>

				<li>
					<a href="#">Romance</a>
				</li>

				<li>
					<a href="#">Animation</a>
				</li>

				<li>
					<a href="#">Musical</a>
				</li>

				<li>
					<a href="#">Documentary</a>
				</li>

				<li>
					<a href="#">War</a>
				</li>

				<li>
					<a href="#">Western</a>
				</li>

				<li>
					<a href="#">Police officer</a>
				</li>

				<li>
					<a href="#">Mystery</a>
				</li>

				<li>
					<a href="#">Biography</a>
				</li>

				<li>
					<a href="#">History</a>
				</li>

				<li>
					<a href="#">Sport</a>
				</li>

				<li>
					<a href="#">Family</a>
				</li>

				<li>
					<a href="#">Children's</a>
				</li>

				<li>
					<a href="#">Crime</a>
				</li>

				<li>
					<a href="#">Cult</a>
				</li>

				<li>
					<a href="#">Superhero</a>
				</li>

				<li>
					<a href="#">Noir</a>
				</li>

				<li>
					<a href="#">Epic</a>
				</li>

				<li>
					<a href="#">Psychological Thriller</a>
				</li>

				<li>
					<a href="#">Apocalyptic/Post-Apocalyptic</a>
				</li>

				<li>
					<a href="#">Martial arts</a>
				</li>

				<li>
					<a href="#">Experimental Cinema</a>
				</li>
			</ul>
		</div>
	</div>

	<!-- Movie List -->

	<div class="container">
		<div class="movie_list">
			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one XXETWETWETWE</span>
				</div>
			</a>

			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one</span>
				</div>
			</a>

			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one</span>
				</div>
			</a>

			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one</span>
				</div>
			</a>

			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one</span>
				</div>
			</a>

			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one</span>
				</div>
			</a>

			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one</span>
				</div>
			</a>

			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one</span>
				</div>
			</a>

			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one</span>
				</div>
			</a>

			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one</span>
				</div>
			</a>

			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one</span>
				</div>
			</a>

			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one</span>
				</div>
			</a>

			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one</span>
				</div>
			</a>

			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one</span>
				</div>
			</a>

			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one</span>
				</div>
			</a>

			<a href="#" class="movie_list_card">
				<img src="<?= $base_url ?>/assets/img/movie_cover_4.jpg" alt="..." />

				<div class="movie_list_card_review">
					<i class="bi bi-star-fill"></i>
					<span>7.5</span>
				</div>

				<div class="movie_list_card_title">
					<span>Star wars - Rogue one</span>
				</div>
			</a>
		</div>
	</div>

	<!-- Movie Pagination -->

	<div class="container">
		<div class="movie_pagination">
			<div class="movie_pagination_prev">
				<a href="#">
					<i class="bi bi-caret-left-fill"></i>
				</a>
			</div>

			<div class="movie_pagination_pages">
				<a href="#">1</a>
				<a href="#" class="active">2</a>
				<a href="#">3</a>
				<a href="#">4</a>
				<span href="#">...</span>
				<a href="#">20</a>
			</div>

			<div class="movie_pagination_next">
				<a href="#">
					<i class="bi bi-caret-right-fill"></i>
				</a>
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
							<i class="bi bi-geo-fill"></i><span>145 SM Street, New York</span>
						</p>
						<p class="footer_info">
							<i class="bi bi-mailbox"></i><span>contact@supermovies.com</span>
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