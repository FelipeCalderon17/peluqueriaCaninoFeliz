<?php
$id = $_POST['id_producto'];
$nombreProducto = $_POST['nombreProducto'];
$existenciaProducto = $_POST['existenciaProducto'];
$tipoProducto = $_POST['tipoProducto'];
$estadoProducto = $_POST['estadoProducto'];
$descripcionProducto = $_POST['descripcionProducto'];

try {
    $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", '');
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
$sql = "UPDATE producto SET nombre_producto = :nombreProducto, existencia_producto=:existenciaProducto , tipo_producto =:tipoProducto,estado_producto= :estadoProducto, descripcion_producto=:descripcionProducto  WHERE id_producto = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_STR);
$stmt->bindParam(":nombreProducto", $nombreProducto, PDO::PARAM_STR);
$stmt->bindParam(":existenciaProducto", $existenciaProducto, PDO::PARAM_STR);
$stmt->bindParam(":tipoProducto", $tipoProducto, PDO::PARAM_STR);
$stmt->bindParam(":estadoProducto", $estadoProducto, PDO::PARAM_STR);
$stmt->bindParam(":descripcionProducto", $descripcionProducto, PDO::PARAM_STR);
$stmt->execute();

// Captura los datos de la consulta, captura una sola fila
$fila = $stmt->fetchAll(PDO::FETCH_ASSOC);

header("Location: ../vista/productosClientes.php");

// Paso 6: Cerrar la conexión a la base de datos.
$pdo = null;
