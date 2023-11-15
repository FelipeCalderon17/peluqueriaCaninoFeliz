<?php
session_start();
if (
    isset($_POST['fechaInicio']) && !empty($_POST['fechaInicio']) &&
    isset($_POST['fechaFin']) && !empty($_POST['fechaFin'])
) {
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", '');
    } catch (PDOException $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }

    // Consulta preparada para evitar inyección de SQL
    $sql = "select SUM(precio_producto) as total from producto where fecha_venta BETWEEN :fechaInicio AND :fechaFin";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':fechaInicio', $fechaInicio, PDO::PARAM_STR);
    $stmt->bindParam(':fechaFin', $fechaFin, PDO::PARAM_STR);
    $stmt->execute();

    // Captura los datos de la consulta, captura una sola fila
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!empty($fila['total'])) {
        $_SESSION['total'] = $fila['total'];
        header("Location: ../vista/estadisticas.php");
    } else {
        $_SESSION['total'] = 'No hay ingresos en estas fechas';
        header("Location: ../vista/estadisticas.php");
    }
} else {
    echo "malo";
}
