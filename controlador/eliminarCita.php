<?php
session_start();
if (
    isset($_POST['idCitaEliminar']) && !empty($_POST['idCitaEliminar'])
) {
    $idCita = $_POST['idCitaEliminar'];
    try {
        //$pdo = new PDO("mysql:host=localhost;dbname=id21435812_peluqueria_canino_feliz", "id21435812_calde17", "Bruno1702!");
        $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");
    } catch (PDOException $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }

    // Consulta preparada para evitar inyección de SQL
    $sql = "UPDATE cita set estado='Inactivo' where id_cita=:id_cita";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_cita', $idCita, PDO::PARAM_STR);
    $stmt->execute();

    // Captura los datos de la consulta, captura una sola fila
    $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['eliminarCita'] = "OK";
    header("Location: ../vista/citasyServicios.php");
} else {
    $_SESSION['errorEliminar'] = "OK";
    header("Location: ../vista/citasyServicios.php");
}
