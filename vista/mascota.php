<?php session_start();
//require_once '../modelo/MySQL.php';
if ($_SESSION['login']) {
    if (isset($_SESSION['errorMascota'])) {
        $error = $_SESSION['errorMascota'];
    }
    if (isset($_SESSION['exito'])) {
        $exito = $_SESSION['exito'];
    }
    if (isset($_SESSION['errorEditar'])) {
        $errorEditar = $_SESSION['errorEditar'];
    }
    if (isset($_SESSION['exitoEditar'])) {
        $exitoEditar = $_SESSION['exitoEditar'];
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Pet Sitting - Free Bootstrap 4 Template by Colorlib</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
    </head>

    <body>
        <?php
        if (!empty($error) && $error == 'OK') {
        ?><script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Datos incompletos",
                });
            </script> <?php
                        unset($_SESSION['errorMascota']);
                    }
                        ?>
        <?php
        if (!empty($errorEditar) && $errorEditar == 'OK') {
        ?><script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Datos incompletos",
                });
            </script> <?php
                        unset($_SESSION['errorEditar']);
                    }
                        ?>
        <?php
        if (!empty($exito) && $exito == 'OK') {
        ?><script>
                Swal.fire({
                    title: "Buen Trabajo!",
                    text: "Agregado Correctamente",
                    icon: "success"
                });
            </script> <?php
                        unset($_SESSION['exito']);
                    }
                        ?>
        <?php
        if (!empty($exitoEditar) && $exitoEditar == 'OK') {
        ?><script>
                Swal.fire({
                    title: "Buen Trabajo!",
                    text: "Editado Correctamente",
                    icon: "success"
                });
            </script> <?php
                        unset($_SESSION['exitoEditar']);
                    }
                        ?>

        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container-fluid">
                <div class="col-2 d-flex justify-content-center"><a class="navbar-brand" href="inicio.php"><span class="flaticon-pawprint-1 mr-2"></span>Canino
                        Feliz</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span> Menu
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-center collapse navbar-collapse" id="ftco-nav">
                    <?php if ($_SESSION['rol_usuario'] == 'administrador') { ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item "><a href="inicio.php" class="nav-link">Inicio</a></li>
                            <li class="nav-item "><a href="productosTrabajador.php" class="nav-link">Productos</a></li>
                            <li class="nav-item "><a href="clientes.php" class="nav-link">Clientes</a></li>
                            <li class="nav-item "><a href="empleados.php" class="nav-link">Empleados</a></li>
                            <li class="nav-item "><a href="estadisticas.php" class="nav-link">Estadisticas</a></li>
                        </ul>
                    <?php } ?>
                    <?php if ($_SESSION['rol_usuario'] == 'cliente') { ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item "><a href="inicio.php" class="nav-link">Inicio</a></li>
                            <li class="nav-item "><a href="productosClientes.php" class="nav-link">Productos</a></li>
                            <li class="nav-item "><a href="citasyServicios.php" class="nav-link">Citas</a></li>
                            <li class="nav-item active"><a href="mascota.php" class="nav-link">Mascotas</a></li>
                        </ul>
                    <?php } ?>
                    <?php if ($_SESSION['rol_usuario'] == 'empleado') { ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item "><a href="inicio.php" class="nav-link">Inicio</a></li>
                            <li class="nav-item "><a href="productosTrabajador.php" class="nav-link">Productos</a></li>
                            <li class="nav-item "><a href="clientes.php" class="nav-link">Clientes</a></li>
                            <li class="nav-item "><a href="citasyServicios.php" class="nav-link">Citas</a></li>
                            <li class="nav-item active"><a href="mascota.php" class="nav-link">Mascotas</a></li>
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





        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex no-gutters">
                    <div class="col-md-5 d-flex">
                        <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about-1.jpg);">
                        </div>
                    </div>
                    <div class="col-md-7 pl-md-5 py-md-5">
                        <div class="heading-section pt-md-5">
                            <h2 class="mb-4">Agregar Mascotas</h2>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form method="post" action="../controlador/agregarMascota.php">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nombre Mascota</label>
                                        <input type="text" class="form-control" id="nombre_mascota" name="nombre_mascota" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Tipo Mascota</label>
                                        <select class="form-select w-100" id="tipo_mascota" name="tipo_mascota" aria-label="Default select example">
                                            <option value="Perro">Perro</option>
                                            <option value="Gato">Gato</option>
                                            <option value="Bladimir">Bladimir</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Raza</label>
                                        <input type="text" class="form-control" id="raza" name="raza" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Requisitos Especiales</label>
                                        <textarea name="requisitos_especiales" id="requisitos_especiales" rows="5" class="form-control" style="resize: none;"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="usuario_id_usuario" id="usuario_id_usuario" value="<?php echo $_SESSION["idUsuario"] ?>" hidden>

                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr class="border border-secondary border-2 opacity-50">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex no-gutters">
                    <div class="col-md-12 pl-md-5 py-md-5">
                        <div class="heading-section pt-md-5 text-center">
                            <h2 class="mb-4 ">Tabla Mascotas</h2>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card-body">
                                    <table class="table table-striped table-hover border">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nombre Mascota</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Raza</th>
                                                <th scope="col">Requisitos Especiales</th>
                                                <th scope="col">Dueño</th>
                                                <th scope="col" class="text-center">Editar</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php
                                                try {
                                                    // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
                                                    //$pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");
                                                    $pdo = new PDO("mysql:host=localhost;dbname=id21435812_peluqueria_canino_feliz", "id21435812_calde17", "Bruno1702!");
                                                    // Configurar el manejo de errores y excepciones.
                                                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                                    // Paso 2: Preparar una consulta SQL usando consultas preparadas.
                                                    $stmt = $pdo->prepare("SELECT * FROM mascota where usuario_id_usuario=:idUsuario");
                                                    $stmt->bindParam(":idUsuario", $_SESSION['idUsuario'], PDO::PARAM_STR);
                                                    // Paso 4: Ejecutar la consulta preparada.
                                                    $stmt->execute();

                                                    // Paso 5: Recuperar resultados.
                                                    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $fila['id_mascota'] ?></th>
                                                        <td><?php echo $fila['nombre_mascota'] ?></td>
                                                        <td><?php echo $fila['tipo_mascota'] ?></td>
                                                        <td><?php echo $fila['raza'] ?></td>
                                                        <td><?php echo $fila['requisitos_especiales'] ?></td>
                                                        <td><?php
                                                            try {
                                                                // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
                                                                $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");

                                                                // Configurar el manejo de errores y excepciones.
                                                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                                                // Paso 2: Preparar una consulta SQL usando consultas preparadas.
                                                                $stmt2 = $pdo->prepare("SELECT * FROM usuario where id_usuario = :usuario ");
                                                                $usuario = $fila['usuario_id_usuario'];
                                                                $stmt2->bindParam(":usuario", $usuario, PDO::PARAM_STR);
                                                                // Paso 4: Ejecutar la consulta preparada.
                                                                $stmt2->execute();

                                                                // Paso 5: Recuperar resultados.
                                                                while ($fila2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                                    <?php echo $fila2['nombre_usuario'] ?>

                                                            <?php
                                                                }

                                                                // Paso 6: Cerrar la conexión a la base de datos.
                                                                $pdo = null;
                                                            } catch (PDOException $e) {
                                                                // Manejo de errores en caso de que ocurra una excepción.
                                                                echo "Error: " . $e->getMessage();
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-success bi bi-pencil" data-bs-toggle="modal" data-bs-target="#editarMascota<?php echo $fila['id_mascota'] ?> ">
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="editarMascota<?php echo $fila['id_mascota'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Mascota</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form method="post" action="../controlador/editarMascotas.php">
                                                                    <div class="modal-body">
                                                                        <input type="text" class="form-control" id="id_mascotaEdit" name="id_mascotaEdit" value="<?php echo $fila['id_mascota'] ?>" hidden aria-describedby="emailHelp">
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputEmail1" class="form-label">Nombre Mascota</label>
                                                                            <input type="text" class="form-control" id="nombre_mascotaEdit" name="nombre_mascotaEdit" value="<?php echo $fila['nombre_mascota'] ?>" aria-describedby="emailHelp">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputPassword1" class="form-label">Tipo Mascota</label>
                                                                            <select class="form-select w-100" id="tipo_mascotaEdit" name="tipo_mascotaEdit" aria-label="Default select example">
                                                                                <option value="Perro">Perro</option>
                                                                                <option value="Gato">Gato</option>
                                                                                <option value="Bladimir">Bladimir</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputEmail1" class="form-label">Raza</label>
                                                                            <input type="text" class="form-control" id="razaEdit" name="razaEdit" value="<?php echo $fila['raza'] ?>" aria-describedby="emailHelp">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputEmail1" class="form-label">Requisitos Especiales</label>
                                                                            <textarea name="requisitos_especialesEdit" id="requisitos_especialesEdit" rows="5" class="form-control" style="resize: none;"><?php echo $fila['requisitos_especiales'] ?></textarea>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputPassword1" class="form-label">Dueño</label>
                                                                            <select class="form-select w-100" name="usuario_id_usuarioEdit" id="usuario_id_usuarioEdit" aria-label="Default select example">

                                                                                <?php
                                                                                try {
                                                                                    // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
                                                                                    $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");

                                                                                    // Configurar el manejo de errores y excepciones.
                                                                                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                                                                    // Paso 2: Preparar una consulta SQL usando consultas preparadas.
                                                                                    $stmt3 = $pdo->prepare("SELECT * FROM usuario where rol_usuario = 'cliente'");

                                                                                    // Paso 4: Ejecutar la consulta preparada.
                                                                                    $stmt3->execute();

                                                                                    // Paso 5: Recuperar resultados.
                                                                                    while ($fila3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {

                                                                                        if ($fila['usuario_id_usuario'] === $fila3['id_usuario']) {
                                                                                ?>
                                                                                            <option value="<?php echo $fila3['id_usuario'] ?>" selected><?php echo $fila3['nombre_usuario'] ?></option>
                                                                                        <?php } else {
                                                                                        ?>
                                                                                            <option value="<?php echo $fila3['id_usuario'] ?>"><?php echo $fila3['nombre_usuario'] ?></option>
                                                                                        <?php
                                                                                        } ?>
                                                                                <?php
                                                                                    }

                                                                                    // Paso 6: Cerrar la conexión a la base de datos.
                                                                                    $pdo = null;
                                                                                } catch (PDOException $e) {
                                                                                    // Manejo de errores en caso de que ocurra una excepción.
                                                                                    echo "Error: " . $e->getMessage();
                                                                                }
                                                                                ?>

                                                                            </select>
                                                                        </div>




                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                            <?php
                                                        /* echo "idPelicula: " . $fila['idPelicula'] . ", nombrePelicula: " . $fila['nombrePelicula'] . ", fecha: " . $fila['fecha'] . "<br>"; */
                                                    }

                                                    // Paso 6: Cerrar la conexión a la base de datos.
                                                    $pdo = null;
                                                } catch (PDOException $e) {
                                                    // Manejo de errores en caso de que ocurra una excepción.
                                                    echo "Error: " . $e->getMessage();
                                                }
                                            ?>

                                        </tbody>
                                    </table>
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
                    <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                        <h2 class="footer-heading">Petsitting</h2>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        <ul class="ftco-footer-social p-0">
                            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                        <h2 class="footer-heading">Latest News</h2>
                        <div class="block-21 mb-4 d-flex">
                            <a class="img mr-4 rounded" style="background-image: url(images/image_1.jpg);"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
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
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> April 7, 2020</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
                        <h2 class="footer-heading">Quick Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Home</a></li>
                            <li><a href="#" class="py-2 d-block">About</a></li>
                            <li><a href="#" class="py-2 d-block">Services</a></li>
                            <li><a href="#" class="py-2 d-block">Works</a></li>
                            <li><a href="#" class="py-2 d-block">Blog</a></li>
                            <li><a href="#" class="py-2 d-block">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                        <h2 class="footer-heading">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon fa fa-map"></span><span class="text">203 Fake St. Mountain View, San
                                        Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929
                                            210</span></a></li>
                                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 text-center">

                        <p class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template
                            is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </footer>




        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
            </svg></div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
