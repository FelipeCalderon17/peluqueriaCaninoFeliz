<?php session_start();
error_reporting(0);
if (isset($_SESSION['errorCorreo'])) {
    $error = $_SESSION['errorCorreo'];
}
if (isset($_SESSION['errorRegistro'])) {
    $errorDatos = $_SESSION['errorRegistro'];
}
if (isset($_SESSION['exito'])) {
    $exito = $_SESSION['exito'];
}
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <?php
    if (!empty($error) && $error == 'OK') {
    ?><script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "El correo ya esta en uso",
            });
        </script> <?php
                    unset($_SESSION['errorCorreo']);
                }
                    ?>
    <?php
    if (!empty($errorDatos) && $errorDatos == 'OK') {
    ?><script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Datos Incompletos",
            });
        </script> <?php
                    unset($_SESSION['errorRegistro']);
                }
                    ?>
    <?php
    if (!empty($exito) && $exito == 'OK') {
    ?><script>
            Swal.fire({
                title: "Buen Trabajo!",
                text: "Te has registrado exitosamente",
                icon: "success"
            });
        </script> <?php
                    unset($_SESSION['exito']);
                }
                    ?>
    <section class="vh-100" style="background-image: url('images/bg_1.jpg');">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem; opacity: 90%;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Iniciar Sesión</h3>

                            <form action="../controlador/login.php" method="post">
                                <div class="form-outline mb-4">
                                    <input type="email" id="correo_usuario" name="correo_usuario" class="form-control form-control-lg" />
                                    <label class="form-label" for="typeEmailX-2">Correo Electronico</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="pass_usuario" name="pass_usuario" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX-2">Contraseña</label>
                                </div>
                                <?php
                                if ($_SESSION["errorLogin"] == 1) {
                                ?>
                                    <div class="form-outline mb-4">
                                        <h4 class="text-danger">Contraseña o Correo incorrecto</h4>
                                    </div>
                                <?php
                                    unset($_SESSION["errorLogin"]);
                                }  ?>




                                <button class="btn btn-primary btn-lg btn-block" type="submit">Iniciar</button>

                            </form>
                            <div class="mb-3 mt-3">
                                <a href="./register.php" class="nav-link">No tengo Cuenta</a>
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