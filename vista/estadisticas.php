<?php
session_start();
if ($_SESSION['login']) {
    if (isset($_SESSION['total'])) {
        $total = $_SESSION['total'];
    }
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=id21435812_peluqueria_canino_feliz", "id21435812_calde17", "Bruno1702!");
    } catch (PDOException $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Peluquería Canino Feliz</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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
        <?php
        if (!empty($total) && $total == 'No hay ingresos en estas fechas') {
        ?><script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "No hay ingresos para estas fechas",
                });
            </script> <?php
                        unset($_SESSION['total']);
                    } else if (!empty($total)) {
                        ?>
            <script>
                Swal.fire({
                    title: "<strong>Ingresos en el intervalo de fechas</strong>",
                    icon: "info",
                    html: `
    El total es: <?php echo $total ?>
  `,
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: `
    <i class="fa fa-thumbs-up"></i> Excelente!
  `,
                    confirmButtonAriaLabel: "Thumbs up, Excelente!",
                    cancelButtonText: `
    <i class="fa fa-thumbs-down"></i>
  `,
                    cancelButtonAriaLabel: "Thumbs down, Cerrar"
                });
            </script>
        <?php
                        unset($_SESSION['total']);
                    }
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
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
                            <li class="nav-item "><a href="citasyServicios.php" class="nav-link">Citas</a></li>
                            <li class="nav-item active"><a href="estadisticas.php" class="nav-link">Estadisticas</a></li>
                            <li class="nav-item "><a href="mascota.php" class="nav-link">Mascotas</a></li>
                        </ul>
                    <?php } ?>
                    <?php if ($_SESSION['rol_usuario'] == 'cliente') { ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item "><a href="inicio.php" class="nav-link">Inicio</a></li>
                            <li class="nav-item "><a href="productosClientes.php" class="nav-link">Productos</a></li>
                            <li class="nav-item "><a href="citasyServicios.php" class="nav-link">Citas</a></li>
                            <li class="nav-item "><a href="mascota.php" class="nav-link">Mascotas</a></li>
                        </ul>
                    <?php } ?>
                    <?php if ($_SESSION['rol_usuario'] == 'empleado') { ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item "><a href="inicio.php" class="nav-link">Inicio</a></li>
                            <li class="nav-item "><a href="productosTrabajador.php" class="nav-link">Productos</a></li>
                            <li class="nav-item "><a href="clientes.php" class="nav-link">Clientes</a></li>
                            <li class="nav-item "><a href="citasyServicios.php" class="nav-link">Citas</a></li>
                            <li class="nav-item "><a href="mascota.php" class="nav-link">Mascotas</a></li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <!-- END nav -->
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex no-gutters">
                    <div class="col-md-12 pl-md-5">
                        <div class="heading-section pt-md-5 text-center">
                            <h2 class="mb-4 ">Estadisticas</h2>
                        </div>
                        <div class="row" style="justify-content: center;">
                            <div class="col-6">
                                <div class="card-body">
                                    <h3>Ingresos</h3>
                                    <h4>Seleccione un intervalo de fechas para los ingresos:</h4>
                                    <form method="post" action="../controlador/estadisticaIngresos.php">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Fecha Inicio:</label>
                                            <input type="date" class="form-control" name="fechaInicio" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Fecha Fin:</label>
                                            <input type="date" class="form-control" name="fechaFin">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="justify-content: center;">
                            <div class="col-6">
                                <div class="card-body">
                                    <h3>Reporte Productos Mas Vendidos</h3>
                                    <h4>Seleccione un intervalo de fechas para los productos:</h4>
                                    <form method="post" action="../controlador/pdfProductos.php">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Fecha Inicio:</label>
                                            <input type="date" class="form-control" name="fechaInicio" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Fecha Fin:</label>
                                            <input type="date" class="form-control" name="fechaFin">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="justify-content: center;">
                            <div class="col-10">
                                <div class="card-body">
                                    <h3>Grafica de Servicios</h3>
                                    <div>
                                        <canvas id="myChart"></canvas>
                                    </div>
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
        <?php
        $sql = "SELECT COUNT(tipo_servicio) as count FROM servicio WHERE tipo_servicio = 'Veterinaria'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Captura los datos de la consulta, captura una sola fila
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        $sql2 = "SELECT COUNT(tipo_servicio) as count FROM servicio WHERE tipo_servicio = 'Veterinaria'";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute();

        // Captura los datos de la consulta, captura una sola fila
        $fila2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        $sql3 = "SELECT COUNT(tipo_servicio) as count FROM servicio WHERE tipo_servicio = 'Baño'";
        $stmt3 = $pdo->prepare($sql3);
        $stmt3->execute();

        // Captura los datos de la consulta, captura una sola fila
        $fila3 = $stmt3->fetch(PDO::FETCH_ASSOC);
        $sql4 = "SELECT COUNT(tipo_servicio) as count FROM servicio WHERE tipo_servicio = 'Corte_de_pelo'";
        $stmt4 = $pdo->prepare($sql4);
        $stmt4->execute();

        // Captura los datos de la consulta, captura una sola fila
        $fila4 = $stmt4->fetch(PDO::FETCH_ASSOC);
        $sql5 = "SELECT COUNT(tipo_servicio) as count FROM servicio WHERE tipo_servicio = 'Otros sericios'";
        $stmt5 = $pdo->prepare($sql5);
        $stmt5->execute();

        // Captura los datos de la consulta, captura una sola fila
        $fila5 = $stmt5->fetch(PDO::FETCH_ASSOC);
        ?>
        <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Peluquería', 'Baño', 'Corte de Pelo', 'Veterinaria', 'Otros Servicios'],
                    datasets: [{
                        label: 'Cantidad Servicios',
                        data: [<?php echo $fila2['count'] ?>, <?php echo $fila3['count'] ?>, <?php echo $fila4['count'] ?>, <?php echo $fila['count'] ?>, <?php echo $fila5['count'] ?>],
                        borderWidth: 1,
                        backgroundColor: 'rgb(0,189,86)'
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </body>

    </html>
<?php
} else {
    header("Location: ./index.php");
}
