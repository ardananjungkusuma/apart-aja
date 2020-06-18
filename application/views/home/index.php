<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="shortcut icon" href="<?= base_url(); ?>assets/img/logo/logo.png" type="image/x-icon">
	<meta name="description" content="">
	<title><?= $title ?></title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&subset=cyrillic,latin,greek,vietnamese">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/animatecss/animate.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/socicon/css/socicon.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/mobirise/css/style.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/mobirise-slider/style.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/mobirise-gallery/style.css">
	<link rel="preload" as="style" href="<?= base_url(); ?>assets/mobirise/css/mbr-additional.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/mobirise/css/mbr-additional.css" type="text/css">
</head>

<body>
	<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--sticky mbr-navbar--auto-collapse mbr-navbar--transparent" id="menu-u" data-rv-view="133">
		<div class="mbr-navbar__section mbr-section">
			<div class="mbr-section__container container">
				<div class="mbr-navbar__container">
					<div class="mbr-navbar__hamburger mbr-hamburger"><span class="mbr-hamburger__line"></span></div>
					<div class="mbr-navbar__column mbr-navbar__menu">
						<nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
							<div class="mbr-navbar__column">
								<?php
								if ($this->session->userdata('level') == "user") {
								?>
									<ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active mbr-buttons--only-links">
										<li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-danger" href="<?= base_url(); ?>">HOME</a></li>
										<li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-danger" href="<?= base_url(); ?>ruangan">BROWSE APARTEMENT</a></li>
										<li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-danger" href="<?= base_url() ?>user/profile">PROFILE</a></li>
										<li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-danger" href="<?= base_url() ?>auth/logout">LOGOUT</a></li>
									</ul>
								<?php
								} else {
								?>
									<ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active mbr-buttons--only-links">
										<li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-danger" href="<?= base_url(); ?>">HOME</a></li>
										<li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-danger" href="<?= base_url(); ?>ruangan">BROWSE APARTEMENT</a></li>
										<li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-danger" href="<?= base_url() ?>auth/registerUser">DAFTAR</a></li>
										<li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-danger" href="<?= base_url(); ?>auth/loginUser">LOG IN</a></li>
									</ul>
								<?php
								}
								?>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header4-7" data-rv-view="2" style="background-image: url(assets/images/bintaro-plaza-residence-mkpl-overall-view.original-min-2000x1512.jpg);">
		<div class="mbr-box__magnet mbr-box__magnet--sm-padding mbr-box__magnet--center-center mbr-after-navbar">
			<div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(0, 0, 0);"></div>
			<div class="mbr-box__container mbr-section__container container">
				<div class="mbr-box mbr-box--stretched">
					<div class="mbr-box__magnet mbr-box__magnet--center-center">
						<div class="row">
							<div class=" col-sm-8 col-sm-offset-2">
								<div class="mbr-hero animated fadeInUp">
									<h1 class="mbr-hero__text" style="text-shadow: 3px 2px black;">APART AJA</h1>
									<p class="mbr-hero__subtext"><strong style="text-shadow: 2px 2px black;">Buy
											or Sell
											Apartment Online</strong></p>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="features1-a" data-rv-view="5" style="background-color: rgb(255, 255, 255);">


		<div class="mbr-section__container container mbr-section__container--std-top-padding" style="padding-top: 93px;">
			<div class="mbr-section__row row">
				<div class="mbr-section__col col-xs-12 col-sm-4">
					<div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
						<figure class="mbr-figure"><img src="assets/images/ruangtamu-600x400.jpg" class="mbr-figure__img"></figure>
					</div>
					<div class="mbr-section__container mbr-section__container--middle">
						<div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
							<h3 class="mbr-header__text">Single Suite</h3>
						</div>
					</div>
					<div class="mbr-section__container mbr-section__container--middle">
						<div class="mbr-article mbr-article--wysiwyg">
							<p>Single Suite adalah apartemen dengan harga yang murah,cocok untuk anda yang single
								atau bagi anda para mahasiswa yang sedang belajar di suatu universitas
								dengan harga yang murah anda sudah bisa mendapat apartemen.</p>
						</div>
					</div>
					<div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
						<div class="mbr-buttons mbr-buttons--center">
							<form action="<?= base_url(); ?>ruangan" method="POST">
								<input type="hidden" value="Single Suite" name="kategori">
								<button type="submit" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-success">Click For Detail</button>
							</form>
						</div>
					</div>
				</div>
				<div class="mbr-section__col col-xs-12 col-sm-4">
					<div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
						<figure class="mbr-figure"><img src="assets/images/ruangtamu4-600x400.jpg" class="mbr-figure__img"></figure>
					</div>
					<div class="mbr-section__container mbr-section__container--middle">
						<div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
							<h3 class="mbr-header__text">Mini Suite</h3>
						</div>
					</div>
					<div class="mbr-section__container mbr-section__container--middle">
						<div class="mbr-article mbr-article--wysiwyg">
							<p>Mini Suite merupakan sebuah apartemen yang memiliki fasilitas yang lengkap, yang ditujukan untuk kalangan muda yang memiliki keluarga kecil dan pastinya kenyamanan yang terjamin.</p>
						</div>
					</div>
					<div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
						<div class="mbr-buttons mbr-buttons--center">
							<form action="<?= base_url(); ?>ruangan" method="POST">
								<input type="hidden" value="Mini Suite" name="kategori">
								<button type="submit" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-success">Click For Detail</button>
							</form>
						</div>
					</div>
				</div>
				<div class="mbr-section__col col-xs-12 col-sm-4">
					<div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
						<figure class="mbr-figure"><img src="assets/images/galleria-foret-5-600x400.jpg" class="mbr-figure__img"></figure>
					</div>
					<div class="mbr-section__container mbr-section__container--middle">
						<div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
							<h3 class="mbr-header__text">Luxury Suite</h3>
						</div>
					</div>
					<div class="mbr-section__container mbr-section__container--middle">
						<div class="mbr-article mbr-article--wysiwyg">
							<p>Luxury Suite ini adalah apartemen dengan tipe paling mewah kami design untuk anda
								yang bingung mengabiskan uang, di Luxury Suite anda akan mendapat
								sebuah ruangan yang lebih besar dari pada class lainya dan fasilitas yang lebih.</p>
						</div>
					</div>
					<div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
						<div class="mbr-buttons mbr-buttons--center">
							<form action="<?= base_url(); ?>ruangan" method="POST">
								<input type="hidden" value="Luxury Suite" name="kategori">
								<button type="submit" class="mbr-buttons__btn btn btn-wrap btn-xs-lg btn-success">Click For Detail</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="mbr-gallery mbr-section mbr-section--no-padding" id="gallery1-4" data-rv-view="8" style="background-color: rgb(255, 255, 255);">
		<!-- Gallery -->
		<div class=" mbr-gallery-layout-default">
			<div>
				<div class="row mbr-gallery-row no-gutter">
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mbr-gallery-item">
						<a href="#lb-gallery1-4" data-slide-to="0" data-toggle="modal">
							<img src="assets/images/bintaro-plaza-residence-mkpl-overall-view.original-min-2000x1512-800x605.jpg" alt="" title="">
							<span class="icon glyphicon glyphicon-zoom-in"></span>
						</a>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mbr-gallery-item">
						<a href="#lb-gallery1-4" data-slide-to="1" data-toggle="modal">
							<img src="assets/images/vip-apartemen-2-1280x800-800x500.jpg" alt="" title="">
							<span class="icon glyphicon glyphicon-zoom-in"></span>
						</a>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mbr-gallery-item">
						<a href="#lb-gallery1-4" data-slide-to="2" data-toggle="modal">
							<img src="assets/images/kolam-625x417-625x417.jpg" alt="" title="">
							<span class="icon glyphicon glyphicon-zoom-in"></span>
						</a>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mbr-gallery-item">
						<a href="#lb-gallery1-4" data-slide-to="3" data-toggle="modal">
							<img src="assets/images/fasilitas-olahraga-di-apartemen-800x450-800x450.jpg" alt="" title="">
							<span class="icon glyphicon glyphicon-zoom-in"></span>
						</a>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mbr-gallery-item">
						<a href="#lb-gallery1-4" data-slide-to="4" data-toggle="modal">
							<img src="assets/images/6-barsa-fasilitas-gym-1200x700-800x467.jpg" alt="" title="">
							<span class="icon glyphicon glyphicon-zoom-in"></span>
						</a>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mbr-gallery-item">
						<a href="#lb-gallery1-4" data-slide-to="5" data-toggle="modal">
							<img src="assets/images/apart-mewah-1440x960-800x533.jpg" alt="" title="">
							<span class="icon glyphicon glyphicon-zoom-in"></span>
						</a>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mbr-gallery-item">
						<a href="#lb-gallery1-4" data-slide-to="6" data-toggle="modal">
							<img src="assets/images/56280838-1024x683-800x534.jpg" alt="" title="">
							<span class="icon glyphicon glyphicon-zoom-in"></span>
						</a>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mbr-gallery-item">
						<a href="#lb-gallery1-4" data-slide-to="7" data-toggle="modal">
							<img src="assets/images/vip-apartemen-3-2000x1333-800x533.jpg" alt="" title="">
							<span class="icon glyphicon glyphicon-zoom-in"></span>
						</a>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

		<!-- Lightbox -->
		<div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery1-4">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<ol class="carousel-indicators">
							<li data-app-prevent-settings="" data-target="#lb-gallery1-4" data-slide-to="0"></li>
							<li data-app-prevent-settings="" data-target="#lb-gallery1-4" data-slide-to="1"></li>
							<li data-app-prevent-settings="" data-target="#lb-gallery1-4" data-slide-to="2"></li>
							<li data-app-prevent-settings="" data-target="#lb-gallery1-4" data-slide-to="3"></li>
							<li data-app-prevent-settings="" data-target="#lb-gallery1-4" data-slide-to="4"></li>
							<li data-app-prevent-settings="" data-target="#lb-gallery1-4" data-slide-to="5"></li>
							<li data-app-prevent-settings="" data-target="#lb-gallery1-4" data-slide-to="6"></li>
							<li data-app-prevent-settings="" data-target="#lb-gallery1-4" class=" active" data-slide-to="7"></li>
						</ol>
						<div class="carousel-inner">
							<div class="item">
								<img src="assets/images/bintaro-plaza-residence-mkpl-overall-view.original-min-2000x1512.jpg" alt="" title="">
							</div>
							<div class="item">
								<img src="assets/images/vip-apartemen-2-1280x800.jpg" alt="" title="">
							</div>
							<div class="item">
								<img src="assets/images/kolam-625x417.jpg" alt="" title="">
							</div>
							<div class="item">
								<img src="assets/images/fasilitas-olahraga-di-apartemen-800x450.jpg" alt="" title="">
							</div>
							<div class="item">
								<img src="assets/images/6-barsa-fasilitas-gym-1200x700.jpg" alt="" title="">
							</div>
							<div class="item">
								<img src="assets/images/apart-mewah-1440x960.jpg" alt="" title="">
							</div>
							<div class="item">
								<img src="assets/images/56280838-1024x683.jpg" alt="" title="">
							</div>
							<div class="item active">
								<img src="assets/images/vip-apartemen-3-2000x1333.jpg" alt="" title="">
							</div>
						</div>
						<a class="left carousel-control" role="button" data-slide="prev" href="#lb-gallery1-4">
							<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" role="button" data-slide="next" href="#lb-gallery1-4">
							<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>

						<a class="close" href="#" role="button" data-dismiss="modal">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							<span class="sr-only">Close</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="mbr-section mbr-section--relative" id="msg-box4-o" data-rv-view="43" style="background-color: rgb(255, 255, 255);">

		<div class="mbr-section__container mbr-section__container--isolated container" style="padding-top: 93px; padding-bottom: 93px;">
			<div class="row">
				<div class="mbr-box mbr-box--fixed mbr-box--adapted">
					<div class="mbr-box__magnet mbr-box__magnet--top-right mbr-section__left col-sm-6 image-size" style="width: 60%;">
						<figure class="mbr-figure mbr-figure--adapted mbr-figure--caption-inside-bottom mbr-figure--full-width">
							<img src="assets/images/ruangtamu1-1400x933.jpg" class="mbr-figure__img"></figure>
					</div>
					<div class="mbr-box__magnet mbr-class-mbr-box__magnet--center-left col-sm-6 content-size mbr-section__right">
						<div class="mbr-section__container mbr-section__container--middle">
							<div class="mbr-header mbr-header--auto-align mbr-header--wysiwyg">
								<h3 class="mbr-header__text">DAFTAR APARTEMEN</h3>

							</div>
						</div>
						<div class="mbr-section__container mbr-section__container--middle">
							<div class="mbr-article mbr-article--auto-align mbr-article--wysiwyg">
								<p>Bagi Anda yang Ingin mempunyai apartemen dengan harga murah tetapi dengan kualitas
									yang tidak murah,cepat pesan sekarang sebelum kehabisan,hanya tersedia terbatas
									untuk anda yang tercepat</p>
							</div>
						</div>
						<div class="mbr-section__container">
							<div class="mbr-buttons mbr-buttons--auto-align btn-inverse"><a class="mbr-buttons__btn btn btn-lg btn-success" href="<?= base_url(); ?>ruangan">CHECK DAFTAR APARTEMEN</a></div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
</body>