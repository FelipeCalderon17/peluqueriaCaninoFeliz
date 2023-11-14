<!-- <?PHP
        session_start();
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

        ?> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pet Sitting - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php"><span class="flaticon-pawprint-1 mr-2"></span>Canino
                Feliz</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <?php if ($_SESSION['rol_usuario'] == 'administrador') { ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a href="inicio.php" class="nav-link">Inicio</a></li>
                        <li class="nav-item "><a href="productosClientes.php" class="nav-link">Productos</a></li>
                        <li class="nav-item "><a href="clientes.php" class="nav-link">Clientes</a></li>
                        <li class="nav-item "><a href="empleados.php" class="nav-link">Empleados</a></li>
                        <li class="nav-item "><a href="citasyServicios.php" class="nav-link">Citas</a></li>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">

                <h1>
                    <button type="button" class="btn btn-primary mr-md-4 py-3 px-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Registro de productos
                    </button>
                </h1>



                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Productos</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../controlador/agregarProducto.php" method="post">
                                    <!-- <input name="id" value="" type="hiddennn"> -->


                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Imagen Producto URL</label>
                                        <input type="text" class="form-control" id="urlImagen" name="urlImagen">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nombre de producto</label>
                                        <input type="text" class="form-control" id="nombreProducto" name="nombreProducto">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Existencias</label>
                                        <input type="number" class="form-control" id="existenciaProducto" name="existenciaProducto">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tipo</label>
                                        <input type="text" class="form-control" id="tipoProducto" name="tipoProducto">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                                        <input type="text" class="form-control" id="descripcionProducto" name="descripcionProducto">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Precio</label>
                                        <input type="text" class="form-control" id="precioProducto" name="precioProducto">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Estado Producto</label>
                                        <select class=" form-select w-100" aria-label="Default select example" name="estadoProducto">
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>

                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <input type="submit" value="Guardar" id="insertarSweet" class="btn btn-primary">


                                        <script>
                                            document.getElementById('insertarSweet').addEventListener('click', function() {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Confirmado',
                                                    text: 'Agregado Correctamente!',

                                                })
                                            });
                                        </script>
                                    </div>

                                    <!-- <button type="submit" class="btn btn-primary">Guardar</button> -->
                                </form>
                            </div>

                        </div>
                    </div>
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
                                        <li class="list-group-item" style="background-color:green">Categoria: <?php echo $fila['tipo_producto'] ?></li>
                                        <li class="list-group-item" style="color:green">Existencias: <?php echo $fila['existencia_producto'] ?> </li>
                                        <li class="list-group-item" style="color:green">Estado : <?php echo $fila['estado_producto'] ?></li>
                                        <li class="list-group-item" style="color:green">Precio : <?php echo $fila['precio_producto'] ?></li>
                                    </ul>
                                    <div class="card-body">
                                        <button type="submit" id="miBoton" value="Comprar" class="btn btn-primary">Comprar


                                        </button>

                                        <script>
                                            document.getElementById('miBoton').addEventListener('click', function() {
                                                Swal.fire({
                                                    title: 'deseas efectuar la compra?',
                                                    showDenyButton: true,
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Comprar',
                                                    denyButtonText: `salir`,
                                                }).then((result) => {
                                                    /* Read more about isConfirmed, isDenied below */
                                                    if (result.isConfirmed) {
                                                        Swal.fire('Confirmado!', '', 'success')
                                                    } else if (result.isDenied) {
                                                        Swal.fire('Seguro deseas salir?', '', 'info')
                                                    }
                                                })
                                            });
                                        </script>



                                        <button type="button" class="btn btn-success bi bi-pencil" data-bs-toggle="modal" data-bs-target="#editarProducto<?php echo $fila['id_producto'] ?>">
                                        </button>

                                    </div>
                                </div>


                                <div class="modal fade" id="editarProducto<?php echo $fila['id_producto'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Producto</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="post" action="../controlador/editarProducto.php">
                                                <div class="modal-body">
                                                    <input type="text" class="form-control" id="id_usuario" name="id_producto" aria-describedby="emailHelp" value="<?php echo $fila['id_producto'] ?>" hidden>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Nombre Producto</label>
                                                        <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" aria-describedby="emailHelp" value="<?php echo $fila['nombre_producto'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Descripcion Producto</label>
                                                        <input type="text" class="form-control" id="descripcionProducto" name="descripcionProducto" aria-describedby="emailHelp" value="<?php echo $fila['descripcion_producto'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Existencia Producto</label>
                                                        <input type="text" class="form-control" id="existenciaProducto" name="existenciaProducto" aria-describedby="emailHelp" value="<?php echo $fila['existencia_producto'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Tipo Producto</label>
                                                        <input type="text" class="form-control" id="tipoProducto" name="tipoProducto" aria-describedby="emailHelp" value="<?php echo $fila['tipo_producto'] ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Estado Producto</label>
                                                        <select class=" form-select w-100" aria-label="Default select example" name="estadoProducto" value="<?php echo $fila['estado_producto'] ?>">
                                                            <option value="Activo">Activo</option>
                                                            <option value="Inactivo">Inactivo</option>

                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Precio Producto</label>
                                                        <input type="text" class="form-control" id="precio_producto" name="precio_producto" aria-describedby="emailHelp" value="<?php echo $fila['precio_producto'] ?>">
                                                    </div>

                                                    


                                    





                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" value="s" id="actualizarSweet" class="btn btn-primary">Enviar</button>

                                                    <script>
                                                        document.getElementById('actualizarSweet').addEventListener('click', function() {
                                                            Swal.fire({
                                                                icon: 'success',
                                                                title: 'Confirmado',
                                                                text: 'Actualizado Correctamente!',

                                                            })
                                                        });
                                                    </script>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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