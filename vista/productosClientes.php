<!-- <?PHP
        session_start();
        if ($_SESSION['login']) {
            //require_once '../modelo/MySQL.php';
            try {
                $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");
            } catch (PDOException $e) {
                die("Error de conexión a la base de datos: " . $e->getMessage());
            }

            // Configurar el manejo de errores y excepciones.
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Paso 2: Preparar una consulta SQL usando consultas preparadas.
            $stmt = $pdo->prepare("SELECT * FROM producto");

            // Paso 4: Ejecutar la consulta preparada.
            $stmt->execute();
            $existenciaProducto = $_POST['id_producto'];
        ?> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pet Sitting - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">


    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
            if (isset($_SESSION['compra']) && $_SESSION['compra'] == 'No hay existencias suficientes') {
    ?><script>
            Swal.fire({
                title: "No puede comprar!",
                text: "No hay suficiente stock !",
                icon: "error"
            });
        </script> <?php
                    unset($_SESSION['compra']);
                } else if (isset($_SESSION['compra']) && $_SESSION['compra'] == 'OK') {
                    ?>
        <script>
            Swal.fire({
                title: "compra correcta!",
                text: "Gracias por tu compra, vuelve pronto!",
                icon: "success"
            });
        </script>


    <?php unset($_SESSION['compra']);
                } ?>


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
                        <li class="nav-item active"><a href="productosTrabajador.php" class="nav-link">Productos</a></li>
                        <li class="nav-item "><a href="clientes.php" class="nav-link">Clientes</a></li>
                        <li class="nav-item "><a href="empleados.php" class="nav-link">Empleados</a></li>
                        <li class="nav-item "><a href="citasyServicios.php" class="nav-link">Citas</a></li>
                        <li class="nav-item "><a href="estadisticas.php" class="nav-link">Estadisticas</a></li>
                        <li class="nav-item "><a href="mascota.php" class="nav-link">Mascotas</a></li>
                    </ul>
                <?php } ?>
                <?php if ($_SESSION['rol_usuario'] == 'cliente') { ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item "><a href="inicio.php" class="nav-link">Inicio</a></li>
                        <li class="nav-item active"><a href="productosClientes.php" class="nav-link">Productos</a></li>
                        <li class="nav-item "><a href="citasyServicios.php" class="nav-link">Citas</a></li>
                        <li class="nav-item "><a href="mascota.php" class="nav-link">Mascotas</a></li>
                    </ul>
                <?php } ?>
                <?php if ($_SESSION['rol_usuario'] == 'empleado') { ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item "><a href="inicio.php" class="nav-link">Inicio</a></li>
                        <li class="nav-item active "><a href="productosTrabajador.php" class="nav-link">Productos</a></li>
                        <li class="nav-item "><a href="clientes.php" class="nav-link">Clientes</a></li>
                        <li class="nav-item "><a href="citasyServicios.php" class="nav-link">Citas</a></li>
                        <li class="nav-item "><a href="mascota.php" class="nav-link">Mascotas</a></li>
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


    <section id="productos" class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container-fluid">
            <div class="row d-flex no-gutters">

                <div class="col-md-12 pl-md-5 py-md-5">
                    <div class="heading-section pt-md-5">
                        <h2 class="mb-4 text-center">Productos</h2>
                    </div>
                    <div class="row">

                        <?php
                        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <div class="col d-flex">

                                <div class="card m-2" style="width: 18rem;">
                                    <img src="<?php echo $fila['urlImagen'] ?>" class="card-img-top" height="300" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $fila['nombre_producto'] ?></h5>
                                        <p class="card-text"><?php echo $fila['descripcion_producto'] ?></p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Categoria: <?php echo $fila['tipo_producto'] ?></li>
                                        <li class="list-group-item" style="color:black">Existencias: <?php echo $fila['existencia_producto'] ?> </li>
                                        <li class="list-group-item" style="color:black">Estado : <?php echo $fila['estado_producto'] ?></li>
                                    </ul>
                                    <div class="card-body">
                                        <input type="submit" value="Comprar" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#compra<?php echo $fila['id_producto'] ?>">

                                    </div>
                                </div>


                            </div>

                            <div class="modal fade" id="compra<?php echo $fila['id_producto'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Selecione la cantidad de productos</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form method="post" action="../controlador/ventaProductos.php">
                                                <div class="mb-3">

                                                    <input type="text" class="form-control" aria-describedby="emailHelp" value="<?php echo $fila['nombre_producto'] ?>" disabled>

                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                                                    <br>
                                                    <input type="number" min="1" name="cantidadComprar" id="" placeholder="escribe la cantidad que deseas comprar...">
                                                    <input class="form-control" type="hidden" aria-describedby="emailHelp" name="id_producto" value="<?php echo $fila['id_producto'] ?>">
                                                    <input type="hidden" class="form-control" id="existencia_producto" name="existencia_producto" aria-describedby="emailHelp" value="<?php echo $fila['existencia_producto'] ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" id="" class="btn btn-primary">Comprar</button>
                                                </div>
                                            </form>







                                        </div>

                                    </div>
                                </div>
                            </div>




                        <?php
                        }
                        ?>

















                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-hover border">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Nommbre Producto</th>
                                <th scope="col">Nommbre Usuario</th>
                                <th scope="col">fecha</th>

                                <th scope="col" class="text-center">Editar</th>
                            </tr>
                        </thead>
                        <tbody><?php
                                try {
                                    // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
                                    $pdo2 = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");
                                    // Configurar el manejo de errores y excepciones.
                                    $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $_SESSION['idUsuario'];
                                    $id_usuario =  $_SESSION['idUsuario'];
                                    // Paso 2: Preparar una consulta SQL usando consultas preparadas.

                                    $stmt2 = $pdo2->prepare("SELECT usuario.nombre_usuario, producto.nombre_producto,producto_has_venta.producto_id_producto,producto_has_venta.cantidad_producto,producto_has_venta.fecha FROM producto
                                    INNER JOIN producto_has_venta ON producto.id_producto = producto_has_venta.producto_id_producto
                                    INNER JOIN usuario ON usuario.id_usuario = producto_has_venta.id_usuario_fk where producto_has_venta.id_usuario_fk=id_usuario");


                                    // Paso 4: Ejecutar la consulta preparada.
                                    $stmt2->execute();

                                    // Paso 5: Recuperar resultados.
                                    while ($fila = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $_SESSION['idUsuario'] ?></th>
                                        <td><?php echo $fila['cantidad_producto'] ?></td>
                                        <td><?php echo $fila['nombre_producto'] ?></td>
                                        <td><?php echo $fila['nombre_usuario'] ?></td>
                                        <td><?php echo $fila['fecha'] ?></td>

                                        <td class="text-center">
                                            <button type="button" class="btn btn-success bi bi-pencil" data-bs-toggle="modal" data-bs-target="#editarCliente<?php echo $_SESSION['idUsuario'] ?> ">
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editarCliente<?php echo $fila['id_usuario'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar cliente</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post" action="../controlador/editarCliente.php">
                                                    <div class="modal-body">
                                                        <input type="text" class="form-control" id="id_usuario" name="id_usuario" aria-describedby="emailHelp" value="<?php echo $fila['id_usuario'] ?>" hidden>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" aria-describedby="emailHelp" value="<?php echo $fila['nombre_usuario'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Correo</label>
                                                            <input type="email" class="form-control" id="correo_usuario" name="correo_usuario" aria-describedby="emailHelp" value="<?php echo $fila['correo_usuario'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                                            <input type="password" class="form-control" id="pass_usuario" name="pass_usuario" value="<?php
                                                                                                                                                        require_once '../modelo/mycript.php';
                                                                                                                                                        echo decrypt($fila['pass_usuario']) ?>">
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
    </section>



    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



</body>

</html>
<?php
        } else {
            /* header("Location: ./index.php"); */
            echo "malo";
        }
