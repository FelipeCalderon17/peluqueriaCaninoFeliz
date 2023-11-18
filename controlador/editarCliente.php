<?php
session_start();
$_POST['nombre_usuario'] = trim($_POST['nombre_usuario']);
$_POST['correo_usuario'] = trim($_POST['correo_usuario']);
$_POST['pass_usuario'] = trim($_POST['pass_usuario']);
$_POST['id_usuario'] = trim($_POST['id_usuario']);
if (
    isset($_POST['nombre_usuario']) && !empty($_POST['nombre_usuario']) &&
    isset($_POST['correo_usuario']) && !empty($_POST['correo_usuario']) &&
    isset($_POST['pass_usuario']) && !empty($_POST['pass_usuario']) &&
    isset($_POST['id_usuario']) && !empty($_POST['id_usuario'])
) {
    require_once '../modelo/mycript.php';
    // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
    //$pdo = new PDO("mysql:host=localhost;dbname=id21435812_peluqueria_canino_feliz", "id21435812_calde17", "Bruno1702!");
    $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");

    // Configurar el manejo de errores y excepciones.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Paso 2: Preparar una consulta SQL usando consultas preparadas.
    $stmt = $pdo->prepare("UPDATE usuario SET nombre_usuario = :nombre, correo_usuario = :correo, pass_usuario = :pass WHERE id_usuario = :id");


    // Paso 3: Vincular parámetros a la consulta preparada.
    $id = $_POST['id_usuario'];
    $nombre = $_POST['nombre_usuario'];
    $correo = $_POST['correo_usuario'];
    $pass = encrypt($_POST['pass_usuario']);
    $stmt->bindParam(":id", $id, PDO::PARAM_STR);
    $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
    $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
    $stmt->bindParam(":pass", $pass, PDO::PARAM_STR);

    // Paso 4: Ejecutar la consulta preparada.
    $stmt->execute();
    $_SESSION['exitoEditar'] = "OK";
    header("Location: ../vista/clientes.php");

    // Paso 6: Cerrar la conexión a la base de datos.
    $pdo = null;
} else {
    $_SESSION['errorEditar'] = "OK";
    header("Location: ../vista/clientes.php");
}
