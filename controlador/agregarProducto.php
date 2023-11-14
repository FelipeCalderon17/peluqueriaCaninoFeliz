<?php
session_start();
// Se hace el llamado del modelo de conexión y consultas
if (
    isset($_POST['nombreProducto']) && !empty($_POST['nombreProducto']) &&
    isset($_POST['urlImagen']) && !empty($_POST['urlImagen']) &&
    isset($_POST['estadoProducto']) && !empty($_POST['estadoProducto']) &&
    isset($_POST['tipoProducto']) && !empty($_POST['tipoProducto'])  &&
    isset($_POST['existenciaProducto']) && !empty($_POST['existenciaProducto']) &&
    isset($_POST['descripcionProducto']) && !empty($_POST['descripcionProducto']) &&
    isset($_POST['precioProducto']) && !empty($_POST['precioProducto'])
) {
    sleep(2);
    $nombreProducto = $_POST['nombreProducto'];
    $urlImagen = $_POST['urlImagen'];
    $estadoProducto = $_POST['estadoProducto'];
    $tipoProducto = $_POST['tipoProducto'];
    $existenciaProducto = $_POST['existenciaProducto'];
    $descripcionProducto = $_POST['descripcionProducto'];
    $precioProducto = $_POST['precioProducto'];

    //$id_usuario = $_POST['id_usuario'];
    // Se instancia la clase PDO para la conexión a la base de datos
    // $sql2 = new MySQL();
    // $pdo = $sql2->conectar();
    // Se instancia la clase PDO para la conexión a la base de datos
    include("../modelo/MySQL.php");
    $conexion = new MySQL();
    $pdo = $conexion->conectar();

    // $sql2 = "SELECT * FROM peliculas WHERE nombre=:nombrePeli AND estado=1";
    // $stmt2 = $pdo->prepare($sql2);
    // $stmt2->bindParam(':nombrePeli', $nombrePelicula, PDO::PARAM_STR);
    // $stmt2->execute();

    // if ($stmt2->rowCount() > 0) {
    //     $_SESSION['mensaje'] = "Ya existe una Pelicula igual en la Base de Datos";
    //     $_SESSION['mensajeTitu'] = "Error al Agregar";
    //     header("Location:../vista/agregarPeliculas.php");
    // } else {
    // Consulta preparada para evitar inyección de SQL
    $sql = "INSERT INTO producto (nombre_producto,estado_producto,tipo_producto,existencia_producto,descripcion_producto,precio_producto,urlImagen) VALUES(:nombreProducto,:estadoProducto,:tipoProducto,:existenciaProducto,:descripcionProducto,:precioProducto,:urlImagen)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombreProducto', $nombreProducto, PDO::PARAM_STR);
    $stmt->bindParam(':estadoProducto', $estadoProducto, PDO::PARAM_STR);
    $stmt->bindParam(':tipoProducto', $tipoProducto, PDO::PARAM_STR);
    $stmt->bindParam(':existenciaProducto', $existenciaProducto, PDO::PARAM_STR);
    $stmt->bindParam(':descripcionProducto', $existenciaProducto, PDO::PARAM_STR);
    $stmt->bindParam(':precioProducto', $precioProducto, PDO::PARAM_STR);
    $stmt->bindParam(':urlImagen', $urlImagen, PDO::PARAM_STR);

    $stmt->execute();

    // $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);


    // $_SESSION['mensaje'] = "La Pelicula Fue Agregada Correctamente";
    // $_SESSION['mensajeTitu'] = "Pelicula Agregada";
    header("Location:../vista/productosClientes.php");
} else {
    // $_SESSION['mensaje'] = "No deje Campos Vacios";
    // $_SESSION['mensajeTitu'] = "Error al Agregar";
    header("Location:../vista/error.php");
}
//require_once '../modelo/MySQL.php';
