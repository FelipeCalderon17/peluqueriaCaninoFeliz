<?php
session_start();
if ($_SESSION['login']) {
    if (isset($_SESSION['errorCita'])) {
        $error = $_SESSION['errorCita'];
    }
    if (isset($_SESSION['cita'])) {
        $cita = $_SESSION['cita'];
    }
    if (isset($_SESSION['editarCita'])) {
        $editar = $_SESSION['editarCita'];
    }
    if (isset($_SESSION['errorEditar'])) {
        $errorEditar = $_SESSION['errorEditar'];
    }
    if (isset($_SESSION['errorFechaCogida'])) {
        $errorFechaCogida = $_SESSION['errorFechaCogida'];
    }
    if (isset($_SESSION['errorFechaAnterior'])) {
        $errorFechaAnterior = $_SESSION['errorFechaAnterior'];
    }
    if (isset($_SESSION['eliminarCita'])) {
        $eliminar = $_SESSION['eliminarCita'];
    }
    if (isset($_SESSION['errorEliminar'])) {
        $eliminarError = $_SESSION['errorEliminar'];
    }
    if (isset($_SESSION['errorFechaAnteriorEditar'])) {
        $errorFechaAnteriorEditar = $_SESSION['errorFechaAnteriorEditar'];
    }
    if (isset($_SESSION['errorFechaCogidaEditar'])) {
        $errorFechaCogidaEditar = $_SESSION['errorFechaCogidaEditar'];
    }
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=id21435812_peluqueria_canino_feliz", "id21435812_calde17", "Bruno1702!");
        //$pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");
    } catch (PDOException $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }
    $idUsuario = $_SESSION['idUsuario'];
    // Consulta preparada para evitar inyección de SQL
    $sql = "SELECT id_mascota,nombre_mascota FROM mascota WHERE usuario_id_usuario = :idUsuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_STR);
    $stmt->execute();

    // Captura los datos de la consulta, captura una sola fila
    $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Consulta preparada para evitar inyección de SQL
    $sql2 = "SELECT cita.fecha_cita, cita.id_cita,mascota.nombre_mascota FROM cita inner join mascota on id_mascota = mascota_id_mascota inner join usuario on usuario_id_usuario = usuario.id_usuario WHERE usuario.id_usuario = :idUsuario AND cita.estado='Activo'";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':idUsuario', $idUsuario, PDO::PARAM_STR);
    $stmt2->execute();

    // Captura los datos de la consulta, captura una sola fila
    $fila2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);



?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Peluquería Canino Feliz</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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
        if (!empty($error) && $error == 'Error') {
        ?><script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "No has seleccionado ningun servicio",
                });
            </script> <?php
                        unset($_SESSION['errorCita']);
                    }
                        ?>
        <?php
        if (!empty($errorEditar) && $errorEditar == 'OK') {
        ?><script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Error editando la cita, revisa los datos",
                });
            </script> <?php
                        unset($_SESSION['errorEditar']);
                    }
                        ?>
        <?php
        if (!empty($cita) && $cita == 'OK') {
        ?><script>
                Swal.fire({
                    title: "Buen Trabajo!",
                    text: "Cita agendada",
                    icon: "success"
                });
            </script> <?php
                        unset($_SESSION['cita']);
                    }
                        ?>
        <?php
        if (!empty($editar) && $editar == 'OK') {
        ?><script>
                Swal.fire({
                    title: "Buen Trabajo!",
                    text: "Cita editada correctamente",
                    icon: "success"
                });
            </script> <?php
                        unset($_SESSION['editarCita']);
                    }
                        ?>
        <?php
        if (!empty($eliminar) && $eliminar == 'OK') {
        ?><script>
                Swal.fire({
                    title: "Buen Trabajo!",
                    text: "Cita eliminada correctamente",
                    icon: "success"
                });
            </script> <?php
                        unset($_SESSION['eliminarCita']);
                    }
                        ?>
        <?php
        if (!empty($errorFechaCogida) && $errorFechaCogida == 'ERROR') {
        ?><script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "La fecha que escogiste no esta disponible",
                });
            </script> <?php
                        unset($_SESSION['errorFechaCogida']);
                    }
                        ?>
        <?php
        if (!empty($errorFechaAnterior) && $errorFechaAnterior == 'ERROR') {
        ?><script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "La fecha que escogiste es antigua a la de hoy",
                });
            </script> <?php
                        unset($_SESSION['errorFechaAnterior']);
                    }
                        ?>
        <?php
        if (!empty($eliminarError) && $eliminarError == 'OK') {
        ?><script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Error eliminando la cita",
                });
            </script> <?php
                        unset($_SESSION['errorEliminar']);
                    }
                        ?>
        <?php
        if (!empty($errorFechaAnteriorEditar) && $errorFechaAnteriorEditar == 'ERROR') {
        ?><script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "La fecha que escogiste es anterior",
                });
            </script> <?php
                        unset($_SESSION['errorFechaAnteriorEditar']);
                    }
                        ?>
        <?php
        if (!empty($errorFechaCogidaEditar) && $errorFechaCogidaEditar == 'ERROR') {
        ?><script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "La fecha que escogiste no esta disponible",
                });
            </script> <?php
                        unset($_SESSION['errorFechaCogidaEditar']);
                    }
                        ?>

        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="inicio.html"><span class="flaticon-pawprint-1 mr-2"></span>Canino
                    Feliz</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span> Menu
                </button>
                <div class="collapse navbar-collapse" id="ftco-nav">
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
                            <li class="nav-item active"><a href="citasyServicios.php" class="nav-link">Citas</a></li>
                            <li class="nav-item "><a href="mascota.php" class="nav-link">Mascotas</a></li>
                        </ul>
                    <?php } ?>
                    <?php if ($_SESSION['rol_usuario'] == 'empleado') { ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item "><a href="inicio.php" class="nav-link">Inicio</a></li>
                            <li class="nav-item "><a href="productosTrabajador.php" class="nav-link">Productos</a></li>
                            <li class="nav-item "><a href="clientes.php" class="nav-link">Clientes</a></li>
                            <li class="nav-item active"><a href="citasyServicios.php" class="nav-link">Citas</a></li>
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





        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex no-gutters">
                    <div class="col-md-5 d-flex">
                        <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about-1.jpg);">
                        </div>
                    </div>
                    <div class="col-md-7 pl-md-5 py-md-5">
                        <div class="heading-section pt-md-5">
                            <h2 class="mb-4">Agenda tu cita</h2>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form method="post" action="../controlador/citasyServicios.php">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Escoge tu mascota</label>
                                        <select class="form-control form-select w-100" name="idMascota" aria-label="Default select example">
                                            <?php
                                            foreach ($fila as $mascota) {
                                            ?>
                                                <option value="<?php echo $mascota['id_mascota'] ?>"><?php echo $mascota['nombre_mascota'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Fecha</label>
                                        <input type="datetime-local" class="form-control" name="fechaCita">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Servicios</label>
                                        <br>
                                        <input type="checkbox" name="checkServicio[]" id="" value="Peluqueria" style="margin-right: 1%;"><label for="checkServicio[]">Peluquería</label>
                                        <br>
                                        <input type="checkbox" name="checkServicio[]" id="" value="Corte_de_pelo" style="margin-right: 1%;"><label for="checkServicio[]">Corte de pelo</label>
                                        <br>
                                        <input type="checkbox" name="checkServicio[]" id="" value="Baño" style="margin-right: 1%;"><label for="checkServicio[]">Baño</label>
                                        <br>
                                        <input type="checkbox" name="checkServicio[]" id="" value="Veterinaria" style="margin-right: 1%;"><label for="checkServicio[]">Veterinaria</label>
                                        <br>
                                        <input type="checkbox" name="checkServicio[]" id="" value="Otros sericios" style="margin-right: 1%;"><label for="checkServicio[]">Otros Servicios</label>
                                    </div>

                                    <button type=" submit" class="btn btn-primary">Agendar Cita</button>
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
                            <h2 class="mb-4 ">Tabla de Citas</h2>
                        </div>
                        <div class="row">
                            <div class="col">

                                <div class="card-body">
                                    <table class="table table-striped table-hover border">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Fecha Cita</th>
                                                <th scope="col">Mascota</th>
                                                <th scope="col">Servicios</th>
                                                <th scope="col" class="text-center">Editar</th>
                                                <th scope="col" class="text-center">Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($fila2 as $cita) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $cita['id_cita'] ?></td>
                                                    <td><?php echo $cita['fecha_cita'] ?></td>
                                                    <td><?php echo $cita['nombre_mascota'] ?></td>
                                                    <?php
                                                    $sql3 = "SELECT tipo_servicio from servicio where cita_id_cita=:idCita";
                                                    $stmt3 = $pdo->prepare($sql3);
                                                    $stmt3->bindParam(':idCita', $cita['id_cita'], PDO::PARAM_STR);
                                                    $stmt3->execute();
                                                    $fila3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
                                                    ?>
                                                    <td>
                                                        <ul>
                                                            <?php
                                                            foreach ($fila3 as $servicio) {
                                                            ?>
                                                                <li><?php echo $servicio['tipo_servicio'] ?></li>
                                                            <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-success bi bi-pencil" data-bs-toggle="modal" data-bs-target="#editarCita<?php echo $cita['id_cita'] ?>">
                                                        </button>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-danger bi bi-trash" data-bs-toggle="modal" data-bs-target="#eliminarCita<?php echo $cita['id_cita'] ?>">
                                                        </button>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="editarCita<?php echo $cita['id_cita'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar cita</h1>
                                                            </div>
                                                            <form method="post" action="../controlador/editarCita.php">
                                                                <div class="modal-body">
                                                                    <input type="text" class="form-control" name="idCitaEditar" aria-describedby="emailHelp" value="<?php echo $cita['id_cita'] ?>" hidden>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Fecha cita</label>
                                                                        <input type="datetime-local" class="form-control" id="fechaCitaEditar" name="fechaCitaEditar" aria-describedby="emailHelp" value="<?php echo $cita['fecha_cita'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Servicios</label>
                                                                        <p>Servicios Actuales (No olvides tambien checkear tus servicios actuales):</p>
                                                                        <ul>
                                                                            <?php
                                                                            $sql4 = "SELECT tipo_servicio from servicio where cita_id_cita=:idCita";
                                                                            $stmt4 = $pdo->prepare($sql4);
                                                                            $stmt4->bindParam(':idCita', $cita['id_cita'], PDO::PARAM_STR);
                                                                            $stmt4->execute();
                                                                            $fila4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
                                                                            foreach ($fila4 as $ser) {
                                                                            ?>
                                                                                <li><?php echo $ser['tipo_servicio'] ?></li>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </ul>
                                                                        <br>
                                                                        <input type="checkbox" name="checkServicioEditar[]" id="" value="Peluqueria" style="margin-right: 1%;"><label for="checkServicioEditar[]">Peluquería</label>
                                                                        <br>
                                                                        <input type="checkbox" name="checkServicioEditar[]" id="" value="Corte_de_pelo" style="margin-right: 1%;"><label for="checkServicioEditar[]">Corte de pelo</label>
                                                                        <br>
                                                                        <input type="checkbox" name="checkServicioEditar[]" id="" value="Baño" style="margin-right: 1%;"><label for="checkServicioEditar[]">Baño</label>
                                                                        <br>
                                                                        <input type="checkbox" name="checkServicioEditar[]" id="" value="Veterinaria" style="margin-right: 1%;"><label for="checkServicioEditar[]">Veterinaria</label>
                                                                        <br>
                                                                        <input type="checkbox" name="checkServicioEditar[]" id="" value="Otros sericios" style="margin-right: 1%;"><label for="checkServicioEditar[]">Otros Servicios</label>
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
                                                <div class="modal fade" id="eliminarCita<?php echo $cita['id_cita'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Desea eliminar la cita?</h1>
                                                            </div>
                                                            <form method="post" action="../controlador/eliminarCita.php">
                                                                <div class="modal-footer">
                                                                    <input type="text" class="form-control" name="idCitaEliminar" aria-describedby="emailHelp" value="<?php echo $cita['id_cita'] ?>" hidden>
                                                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
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
