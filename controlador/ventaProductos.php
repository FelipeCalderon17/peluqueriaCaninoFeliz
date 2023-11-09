
<?php
session_start();
if (
    isset($_POST['existencia_producto']) && !empty($_POST['existencia_producto']) &&
    isset($_POST['cantidadComprar']) && !empty($_POST['cantidadComprar']) &&
    isset($_POST['id_producto']) && !empty($_POST['id_producto'])
) {
    $existenciaProducto = $_POST['existencia_producto'];
    $cantidadComprar = $_POST['cantidadComprar'];
    $idProducto = $_POST['id_producto'];
    $totalProductos = $existenciaProducto - $cantidadComprar;
    if ($totalProductos < 0) {
        $_SESSION['compra'] = 'No hay existencias suficientes';
        header("Location: ../vista/productosClientes.php");
    } else {
        $_SESSION['compra'] = 'OK';
        try {
            // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
            $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");

            // Configurar el manejo de errores y excepciones.
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Paso 2: Preparar una consulta SQL usando consultas preparadas.
            // Consulta preparada para evitar inyección de SQL
            $sql = "UPDATE producto set existencia_producto=:totalProductos  WHERE id_producto = :idProducto";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_STR);
            $stmt->bindParam(':totalProductos', $totalProductos, PDO::PARAM_STR);
            $stmt->execute();
            header("Location: ../vista/productosClientes.php");
        } catch (PDOException $e) {
            // Manejo de errores en caso de que ocurra una excepción.
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    echo "malo";
}

?>