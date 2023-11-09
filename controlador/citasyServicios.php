<?php
session_start();
if (
    isset($_POST['idMascota']) && !empty($_POST['idMascota']) &&
    isset($_POST['fechaCita']) && !empty($_POST['fechaCita'])
) {
    $fecha = $_POST['fechaCita'];
    $idMascota = $_POST['idMascota'];
    $servicios = $_POST['checkServicio'];
    $lenghtServicios = count($servicios);
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", '');
    } catch (PDOException $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }

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
    header("Location: ../vista/citasyServicios.php");
} else {
    echo "malo";
}
