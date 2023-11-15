<?php session_start();
//require_once '../modelo/MySQL.php';
if ($_SESSION['login']) {
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Pet Sitting - Free Bootstrap 4 Template by Colorlib</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="css/animate.css">

		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
		<link rel="stylesheet" href="css/magnific-popup.css">


		<link rel="stylesheet" href="css/bootstrap-datepicker.css">
		<link rel="stylesheet" href="css/jquery.timepicker.css">

		<link rel="stylesheet" href="css/flaticon.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	</head>

	<body>


		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
			<div class="container">
				<a class="navbar-brand" href="inicio.php"><span class="flaticon-pawprint-1 mr-2"></span>Canino
					Feliz</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="fa fa-bars"></span> Menu
				</button>
				<div class="collapse navbar-collapse" id="ftco-nav">
					<?php if ($_SESSION['rol_usuario'] == 'administrador') { ?>
						<ul class="navbar-nav ml-auto">
							<li class="nav-item active"><a href="inicio.php" class="nav-link">Inicio</a></li>
							<li class="nav-item "><a href="productosTrabajador.php" class="nav-link">Productos</a></li>
							<li class="nav-item "><a href="clientes.php" class="nav-link">Clientes</a></li>
							<li class="nav-item "><a href="empleados.php" class="nav-link">Empleados</a></li>
							<li class="nav-item "><a href="citasyServicios.php" class="nav-link">Citas</a></li>
							<li class="nav-item "><a href="estadisticas.php" class="nav-link">Estadisticas</a></li>
						</ul>
					<?php } ?>
					<?php if ($_SESSION['rol_usuario'] == 'cliente') { ?>
						<ul class="navbar-nav ml-auto">
							<li class="nav-item active"><a href="inicio.php" class="nav-link">Inicio</a></li>
							<li class="nav-item "><a href="productosClientes.php" class="nav-link">Productos</a></li>
							<li class="nav-item "><a href="citasyServicios.php" class="nav-link">Citas</a></li>
						</ul>
					<?php } ?>
					<?php if ($_SESSION['rol_usuario'] == 'empleado') { ?>
						<ul class="navbar-nav ml-auto">
							<li class="nav-item active"><a href="inicio.php" class="nav-link">Inicio</a></li>
							<li class="nav-item "><a href="productosTrabajador.php" class="nav-link">Productos</a></li>
							<li class="nav-item "><a href="clientes.php" class="nav-link">Clientes</a></li>
							<li class="nav-item "><a href="citasyServicios.php" class="nav-link">Citas</a></li>
						</ul>
					<?php } ?>
				</div>
				<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i>
							<?php echo $_SESSION["nombreUsuario"] ?> </a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="../controlador/cerrarSesion.php">Cerrar Sesión </a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<!-- END nav -->
		<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
					<div class="col-md-11 ftco-animate text-center">
						<h1 class="mb-4">¿Quieres que tu mascota tenga una buena experiencia?</h1>
						<p><a href="#" class="btn btn-primary mr-md-4 py-3 px-4">Conocer mas <span class="ion-ios-arrow-forward"></span></a></p>
					</div>
				</div>
			</div>
		</div>

		<section class="ftco-section bg-light ftco-no-pt ftco-intro">
			<div class="container">
				<div class="row">
					<div class="col-md-4 d-flex align-self-stretch m-auto px-4 ftco-animate">
						<div class="d-block services text-center">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="flaticon-grooming"></span>
							</div>
							<div class="media-body">
								<h3 class="heading">Aseo Mascotas</h3>
								<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat eum reiciendis tempora.
									Animi, hic? Quisquam, consequuntur! Velit totam ea doloremque placeat quo iste deserunt
									commodi nesciunt explicabo. Et, earum repellendus!</p>
								<a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="ftco-counter" id="section-counter">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="50">0</strong>
							</div>
							<div class="text">
								<span>Clientes</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="8500">0</strong>
							</div>
							<div class="text">
								<span>Profesionales</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="20">0</strong>
							</div>
							<div class="text">
								<span>Productos</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="50">0</strong>
							</div>
							<div class="text">
								<span>Mascotas Atendidas</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container">
				<div class="row d-flex no-gutters">
					<div class="col-md-5 d-flex">
						<div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about-1.jpg);">
						</div>
					</div>
					<div class="col-md-7 pl-md-5 py-md-5">
						<div class="heading-section pt-md-5">
							<h2 class="mb-4">¿Por qué elegirnos?</h2>
						</div>
						<div class="row">
							<div class="col-md-6 services-2 w-100 d-flex">
								<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
								<div class="text pl-3">
									<h4>Consejos de cuidado</h4>
									<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea minima id repellendus
										aperiam quia tempore labore, repellat pariatur? Voluptate commodi ipsam ratione
										corrupti, officia quasi quo ex quibusdam deleniti facere?</p>
								</div>
							</div>
							<div class="col-md-6 services-2 w-100 d-flex">
								<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-customer-service"></span></div>
								<div class="text pl-3">
									<h4>Atención al cliente</h4>
									<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea minima id repellendus
										aperiam quia tempore labore, repellat pariatur? Voluptate commodi ipsam ratione
										corrupti, officia quasi quo ex quibusdam deleniti facere?</p>
								</div>
							</div>
							<div class="col-md-6 services-2 w-100 d-flex">
								<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-emergency-call"></span></div>
								<div class="text pl-3">
									<h4>Servicios de emergencia</h4>
									<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea minima id repellendus
										aperiam quia tempore labore, repellat pariatur? Voluptate commodi ipsam ratione
										corrupti, officia quasi quo ex quibusdam deleniti facere?</p>
								</div>
							</div>
							<div class="col-md-6 services-2 w-100 d-flex">
								<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-veterinarian"></span></div>
								<div class="text pl-3">
									<h4>Ayuda veterinaria</h4>
									<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea minima id repellendus
										aperiam quia tempore labore, repellat pariatur? Voluptate commodi ipsam ratione
										corrupti, officia quasi quo ex quibusdam deleniti facere?</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>






		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-5 mb-4 mb-md-0">
						<h2 class="footer-heading">Cuidado mascotas</h2>
						<p>Nos encargamos del mejor cuidado para tu mascota , utilizando los mejores productos para ellos

						</p>
						<ul class="ftco-footer-social p-0">
							<li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
						</ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Ultimas noticias</h2>
						<div class="block-21 mb-4 d-flex">
							<a class="img mr-4 rounded" style="background-image: url(images/image_1.jpg);"></a>
							<div class="text">
								<h3 class="heading"><a href="#">nuestros paseadores caninos</a></h3>
								<div class="meta">
									<div><a href="#"><span class="icon-calendar"></span> April 7, 2020</a></div>
									<div><a href="#"><span class="icon-person"></span> Admin</a></div>
									<div><a href="#"><span class="icon-chat"></span> 19</a></div>
								</div>
							</div>
						</div>
						<div class="block-21 mb-4 d-flex">
							<a class="img mr-4 rounded" style="background-image: url(images/image_2.jpg);"></a>
							<div class="text">
								<h3 class="heading"><a href="#">Premio al los mas lindos</a></h3>
								<div class="meta">
									<div><a href="#"><span class="icon-calendar"></span> April 7, 2020</a></div>
									<div><a href="#"><span class="icon-person"></span> Admin</a></div>
									<div><a href="#"><span class="icon-chat"></span> 19</a></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Tienes preguntas?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon fa fa-map"></span><span class="text">CTA Cartago, valle del cauca</span></li>
								<li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929
											210</span></a></li>
								<li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">adso@gmail.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</footer>




		<!-- loader -->
		<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
				<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
				<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
			</svg></div>


		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-migrate-3.0.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>
		<script src="js/jquery.waypoints.min.js"></script>
		<script src="js/jquery.stellar.min.js"></script>
		<script src="js/jquery.animateNumber.min.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/jquery.timepicker.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/scrollax.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
		<script src="js/google-map.js"></script>
		<script src="js/main.js"></script>



	</body>

	</html>
<?php
} else {
	header("Location: ./index.php");
}
