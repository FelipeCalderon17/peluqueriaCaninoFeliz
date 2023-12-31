<?php session_start();
error_reporting(0);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100" style="background-image: url('images/bg_1.jpg');">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem; opacity: 90%;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Registro</h3>

                            <form action="../controlador/register.php" method="post">
                                <div class="form-outline mb-3">
                                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" aria-describedby="emailHelp">
                                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                </div>
                                <div class="form-outline mb-3">
                                    <input type="email" class="form-control" id="correo_usuario" name="correo_usuario" aria-describedby="emailHelp">
                                    <label for="exampleInputEmail1" class="form-label">Correo</label>
                                </div>
                                <div class="form-outline mb-3">
                                    <input type="password" class="form-control" id="pass_usuario" name="pass_usuario">
                                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                </div>



                                <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar</button>

                            </form>
                            <div class="mb-3 mt-3">
                                <a href="./index.php" class="nav-link">Ya tengo Cuenta</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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