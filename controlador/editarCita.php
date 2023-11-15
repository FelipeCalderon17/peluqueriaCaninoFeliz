<?php
session_start();
if (
    isset($_POST['idCitaEditar']) && !empty($_POST['idCitaEditar']) &&
    isset($_POST['fechaCitaEditar']) && !empty($_POST['fechaCitaEditar'])
) {
    $fecha = $_POST['fechaCitaEditar'];
    $idCita = $_POST['idCitaEditar'];
    $servicios = $_POST['checkServicioEditar'];
    $lenghtServicios = count($servicios);
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", '');
    } catch (PDOException $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }

    // Consulta preparada para evitar inyección de SQL
    $sql = "UPDATE cita set fecha_cita=:fecha_cita where id_cita=:id_cita";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':fecha_cita', $fecha, PDO::PARAM_STR);
    $stmt->bindParam(':id_cita', $idCita, PDO::PARAM_STR);
    $stmt->execute();

    // Captura los datos de la consulta, captura una sola fila
    $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Consulta preparada para evitar inyección de SQL
    $sql3 = "DELETE FROM servicio where cita_id_cita=:id_cita ";
    $stmt3 = $pdo->prepare($sql3);
    $stmt3->bindParam(':id_cita', $idCita, PDO::PARAM_STR);
    $stmt3->execute();

    // Captura los datos de la consulta, captura una sola fila
    $fila3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

    for ($i = 0; $i < $lenghtServicios; $i++) {
        $sql2 = "INSERT INTO servicio (tipo_servicio,cita_id_cita) VALUES (:tipo_servicio,:id_cita)";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':tipo_servicio', $servicios[$i], PDO::PARAM_STR);
        $stmt2->bindParam(':id_cita', $idCita, PDO::PARAM_STR);
        $stmt2->execute();
    }
    $_SESSION['editarCita'] = "OK";
    header("Location: ../vista/citasyServicios.php");
} else {
    $_SESSION['errorEditar'] = "OK";
}
