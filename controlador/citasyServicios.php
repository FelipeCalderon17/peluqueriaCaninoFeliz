<?php
session_start();
date_default_timezone_set('America/Bogota');
if (
    isset($_POST['idMascota']) && !empty($_POST['idMascota']) &&
    isset($_POST['fechaCita']) && !empty($_POST['fechaCita']) &&
    isset($_POST['checkServicio']) && !empty($_POST['checkServicio'])
) {
    $fecha = $_POST['fechaCita'];
    $idMascota = $_POST['idMascota'];
    $servicios = $_POST['checkServicio'];
    $lenghtServicios = count($servicios);
    try {
        //$pdo = new PDO("mysql:host=localhost;dbname=id21435812_peluqueria_canino_feliz", "id21435812_calde17", "Bruno1702!");
        $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");
    } catch (PDOException $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }
    $sql4 = "SELECT fecha_cita from cita";
    $stmt4 = $pdo->prepare($sql4);
    $stmt4->execute();
    $fila4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
    foreach ($fila4 as $fechaC) {
        $fechaComp = str_replace("T", " ", $fecha);
        $fechaComp = $fechaComp . ":00";
        /* echo $fechaComp;
        echo $fechaC['fecha_cita']; */
        /* echo date("Y-m-d H:i:s"); */
        if ($fechaC['fecha_cita'] == $fechaComp) {
            $_SESSION['errorFechaCogida'] = "ERROR";
            header("Location: ../vista/citasyServicios.php");
        } else if ($fecha < date("Y-m-d H:i:s")) {
            $_SESSION['errorFechaAnterior'] = "ERROR";
            header("Location: ../vista/citasyServicios.php");
        }
    }
    if ($lenghtServicios > 0) {
        // Consulta preparada para evitar inyección de SQL
        $sql = "INSERT INTO cita (fecha_cita,mascota_id_mascota) VALUES (:fecha_cita,:id_mascota)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':fecha_cita', $fecha, PDO::PARAM_STR);
        $stmt->bindParam(':id_mascota', $idMascota, PDO::PARAM_STR);
        $stmt->execute();

        // Captura los datos de la consulta, captura una sola fila
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Consulta preparada para evitar inyección de SQL
        $sql3 = "SELECT MAX(id_cita) as maximo from cita";
        $stmt3 = $pdo->prepare($sql3);
        $stmt3->execute();

        // Captura los datos de la consulta, captura una sola fila
        $fila3 = $stmt3->fetch(PDO::FETCH_ASSOC);
        $max = $fila3['maximo'];
        for ($i = 0; $i < $lenghtServicios; $i++) {
            $sql2 = "INSERT INTO servicio (tipo_servicio,cita_id_cita) VALUES (:tipo_servicio,:id_cita)";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->bindParam(':tipo_servicio', $servicios[$i], PDO::PARAM_STR);
            $stmt2->bindParam(':id_cita', $max, PDO::PARAM_STR);
            $stmt2->execute();
        }
        // Captura los datos de la consulta, captura una sola fila
        $_SESSION['cita'] = "OK";
        /* header("Location: ../vista/citasyServicios.php"); */
    } else {
        $_SESSION['errorCita'] = "Error";
    }
} else {
    $_SESSION['errorCita'] = "Error";
    header("Location: ../vista/citasyServicios.php");
}
