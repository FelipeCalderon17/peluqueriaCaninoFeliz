<?php

session_start();
// Verificar si el usuario ha iniciado sesión y es un administrador
if ((isset($_SESSION['login']) && $_SESSION['rol_usuario'] == 'administrador')) {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pet Sitting - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

  
</head>

<body>


    <!-- INICIO nav -->

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="inicio.html"><span class="flaticon-pawprint-1 mr-2"></span>Canino
                Feliz</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item "><a href="inicio.php" class="nav-link">Inicio</a></li>
                    <li class="nav-item "><a href="productos.php" class="nav-link">Productos</a></li>
                    <li class="nav-item "><a href="clientes.php" class="nav-link">Clientes</a></li>
                    <li class="nav-item active"><a href="empleados.php" class="nav-link">Empleados</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->





    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row d-flex no-gutters">

            <div class="col-md-7 pl-md-5 py-md-5">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Empleado
                </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Empleado</h1>
                           
                        </div>
                        <div class="modal-body">

                        <div class="col">
                            <form method="post" action="../controlador/agregarEmpleado.php">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nombre Empleado</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" name="nombreEmpleado">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correoEmpleado">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="contraseña">
                                </div>
                               <!--  <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Rol</label>
                                    <select class="form-control form-select w-100" aria-label="Default select example" name="rol">
                                        <option selected disabled ></option>
                                        <option>Empleado</option>
                                    </select>
                                </div> -->

                               <!--  <button type="submit" class="btn btn-primary">Submit</button> -->

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </div>
                            </form>
                            
                        </div>

                        </div>
                       
                        </div>
                    </div>
                    </div>

            </div>

    </section>



   


    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row d-flex no-gutters">
                <div class="col-md-12 pl-md-5 py-md-5">
                    <div class="heading-section pt-md-1 text-center">
                        <h2 class="mb-4 ">Tabla Empleados</h2>
                    </div>
                    <div class="row">
                        <div class="col">

                            <div class="card-body">
                                <table class="table table-striped table-hover border">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre Empleado</th>
                                            <th scope="col">Correo Electronico</th>
                                            <th scope="col">Rol</th>
                                            <th scope="col" class="text-center">Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            try {
                                                // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
                                                $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");

                                                // Configurar el manejo de errores y excepciones.
                                                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                                // Paso 2: Preparar una consulta SQL usando consultas preparadas.
                                                $stmt = $pdo->prepare("SELECT * FROM usuario WHERE rol_usuario = 'Empleado'");

                                                // Paso 4: Ejecutar la consulta preparada.
                                                $stmt->execute();

                                                // Paso 5: Recuperar resultados.
                                                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $fila['id_usuario'] ?></th>
                                                    <td><?php echo $fila['nombre_usuario'] ?></td>
                                                    <td><?php echo $fila['correo_usuario'] ?></td>
                                                    <td><?php echo $fila['rol_usuario'] ?></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-success bi bi-pencil" data-bs-toggle="modal" data-bs-target="#editarEmpleado<?php echo $fila["id_usuario"]?>">
                                                        </button>
                                                    </td>
                                                </tr>

                                                    <!-- INICIO MODAL EDITAR EMPLEADOS -->
                                        <div class="modal fade" id="editarEmpleado<?php echo $fila['id_usuario'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Empleado</h1>
                                
                                                    </div>
                                                        <form method="post" action="../controlador/editarEmpleado.php">
                                                            <div class="modal-body">
                                                        
                                                            <input type="text" class="form-control" id="id_usuario" name="id_usuario" aria-describedby="emailHelp" value="<?php echo $fila['id_usuario'] ?>" hidden>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Nombre Empleado</label>
                                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" name="nombreEmpleado" value="<?php echo $fila['nombre_usuario'] ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                                                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correoEmpleado" value="<?php echo $fila['correo_usuario'] ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                                                <input type="password" class="form-control" id="exampleInputPassword1" name="contraseña" value="<?php require_once '../modelo/mycript.php'; echo decrypt($fila['pass_usuario']) ?>">
                                                            </div>
                                                            <!-- <div class="mb-3">
                                                                <label for="exampleInputPassword1" class="form-label">Rol</label>
                                                                <select class="form-control form-select w-100" aria-label="Default select example" name="rol" value="<?php echo $fila['rol_usuario'] ?>">
                                                                    <option selected disabled ></option>
                                                                    <option>Empleado</option>
                                                                </select>
                                                            </div> -->

                                                        <!--  <button type="submit" class="btn btn-primary">Submit</button> -->

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-primary">Editar</button>
                                                            </div>
                                                    
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



    </div>

    <!-- FIN MODAL EDITAR EMPLEADOS -->

    <!-- INICIO FOOTER -->

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

<!-- FIN FOOTER -->



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
}
else{
    // Redirigir a la página de inicio o mostrar un mensaje de error
    header("Location: inicio.php");
    exit();
}


?>
