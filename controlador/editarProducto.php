<?php
session_start();
$_POST['nombreProducto'] = trim($_POST['nombreProducto']);
$_POST['urlImagen'] = trim($_POST['urlImagen']);
$_POST['id_producto'] = trim($_POST['id_producto']);
$_POST['estadoProducto'] = trim($_POST['estadoProducto']);
$_POST['tipoProducto'] = trim($_POST['tipoProducto']);
$_POST['existenciaProducto'] = trim($_POST['existenciaProducto']);
$_POST['descripcionProducto'] = trim($_POST['descripcionProducto']);
$_POST['precio_producto'] = trim($_POST['precio_producto']);
if (
    isset($_POST['nombreProducto']) && !empty($_POST['nombreProducto']) &&
    isset($_POST['urlImagen']) && !empty($_POST['urlImagen']) &&
    isset($_POST['id_producto']) && !empty($_POST['id_producto']) &&
    isset($_POST['estadoProducto']) && !empty($_POST['estadoProducto']) &&
    isset($_POST['tipoProducto']) && !empty($_POST['tipoProducto'])  &&
    isset($_POST['existenciaProducto']) && !empty($_POST['existenciaProducto']) &&
    isset($_POST['descripcionProducto']) && !empty($_POST['descripcionProducto']) &&
    isset($_POST['precio_producto']) && !empty($_POST['precio_producto'])
) {
    $id = $_POST['id_producto'];
    $nombreProducto = $_POST['nombreProducto'];
    $urlImagen = $_POST['urlImagen'];
    $estadoProducto = $_POST['estadoProducto'];
    $tipoProducto = $_POST['tipoProducto'];
    $existenciaProducto = $_POST['existenciaProducto'];
    $descripcionProducto = $_POST['descripcionProducto'];
    $precioProducto = $_POST['precio_producto'];
    $fechahoy = date('Y-m-d');
    try {
        sleep(2);
        $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");
    } catch (PDOException $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }

    $sql = "UPDATE producto SET nombre_producto = :nombreProducto, existencia_producto=:existenciaProducto, tipo_producto =:tipoProducto,estado_producto= :estadoProducto, descripcion_producto=:descripcionProducto,precio_producto=:precio_producto,urlImagen=:urlImagen,fecha_venta=:fechahoy WHERE id_producto = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_STR);
    $stmt->bindParam(":nombreProducto", $nombreProducto, PDO::PARAM_STR);
    $stmt->bindParam(":existenciaProducto", $existenciaProducto, PDO::PARAM_STR);
    $stmt->bindParam(":tipoProducto", $tipoProducto, PDO::PARAM_STR);
    $stmt->bindParam(":estadoProducto", $estadoProducto, PDO::PARAM_STR);
    $stmt->bindParam(":descripcionProducto", $descripcionProducto, PDO::PARAM_STR);
    $stmt->bindParam(":precio_producto", $precioProducto, PDO::PARAM_STR);
    $stmt->bindParam(":urlImagen", $urlImagen, PDO::PARAM_STR);
    $stmt->bindParam(":fechahoy", $fechahoy, PDO::PARAM_STR);
    $stmt->execute();

    // Captura los datos de la consulta, captura una sola fila
    $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['agregar'] = "EDITAR";
    header("Location: ../vista/productosTrabajador.php");
} else {
    $_SESSION['errorEditar'] = "EDITAR";
    header("Location: ../vista/productosTrabajador.php");
}

// Paso 6: Cerrar la conexión a la base de datos.
$pdo = null;
