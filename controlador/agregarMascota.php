<?php
session_start();
$_POST['nombre_mascota'] = trim($_POST['nombre_mascota']);
$_POST['tipo_mascota'] = trim($_POST['tipo_mascota']);
$_POST['raza'] = trim($_POST['raza']);
$_POST['requisitos_especiales'] = trim($_POST['requisitos_especiales']);
$_POST['usuario_id_usuario'] = trim($_POST['usuario_id_usuario']);
if (
    isset($_POST['nombre_mascota']) && !empty($_POST['nombre_mascota']) &&
    isset($_POST['tipo_mascota']) && !empty($_POST['tipo_mascota']) &&
    isset($_POST['raza']) && !empty($_POST['raza']) &&
    isset($_POST['requisitos_especiales']) && !empty($_POST['requisitos_especiales']) &&
    isset($_POST['usuario_id_usuario']) && !empty($_POST['usuario_id_usuario'])
) {

    require_once '../modelo/mycript.php';
    try {
        // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
        $pdo = new PDO("mysql:host=localhost;dbname=id21435812_peluqueria_canino_feliz", "id21435812_calde17", "Bruno1702!");
        //$pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");
        // Configurar el manejo de errores y excepciones.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Paso 2: Preparar una consulta SQL usando consultas preparadas.
        $stmt = $pdo->prepare("INSERT INTO mascota (nombre_mascota ,tipo_mascota, raza, requisitos_especiales,usuario_id_usuario) VALUES (:nombre , :tipo , :raza, :requisitos,:usuario)");

        // Paso 3: Vincular parámetros a la consulta preparada.
        $nombre = $_POST['nombre_mascota'];
        $tipo = $_POST['tipo_mascota'];
        $raza = $_POST['raza'];
        $requisitos = $_POST['requisitos_especiales'];
        $usuario = $_POST['usuario_id_usuario'];
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);
        $stmt->bindParam(":raza", $raza, PDO::PARAM_STR);
        $stmt->bindParam(":requisitos", $requisitos, PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);

        // Paso 4: Ejecutar la consulta preparada.
        $stmt->execute();
        $_SESSION['exito'] = "OK";
        header("Location: ../vista/mascota.php");

        // Paso 6: Cerrar la conexión a la base de datos.
        $pdo = null;
    } catch (PDOException $e) {
        // Manejo de errores en caso de que ocurra una excepción.
        echo "Error: " . $e->getMessage();
    }
} else {
    $_SESSION['errorMascota'] = "OK";
    header("Location: ../vista/mascota.php");
}
