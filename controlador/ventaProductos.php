
<?php
session_start();
if (
    isset($_POST['existencia_producto']) && !empty($_POST['existencia_producto']) &&
    isset($_POST['cantidadComprar']) && !empty($_POST['cantidadComprar']) &&
    isset($_POST['id_producto']) && !empty($_POST['id_producto'])
) {
    $existenciaProducto = $_POST['existencia_producto'];
    $idProducto = $_POST['id_producto'];
    $cantidadComprar = $_POST['cantidadComprar'];
    $fechahoy = date('Y-m-d');
    $totalProductos = $existenciaProducto - $cantidadComprar;
    if ($totalProductos < 0) {
        $_SESSION['compra'] = 'No hay existencias suficientes';
        header("Location: ../vista/productosClientes.php");

        // if ($cantidadComprar<=0) {
        //     $_SESSION['compra'] = 'Curioso hp';
        //     header("Location: ../vista/productosClientes.php");
        // }
    } else {
        //sleep(2);
        $_SESSION['compra'] = 'OK';
        try {
            // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
            //$pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");
            $pdo = new PDO("mysql:host=localhost;dbname=id21435812_peluqueria_canino_feliz", "id21435812_calde17", "Bruno1702!");
            // Configurar el manejo de errores y excepciones.
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Paso 2: Preparar una consulta SQL usando consultas preparadas.
            // Consulta preparada para evitar inyección de SQL

            $consulta = "SELECT ventas_producto from producto WHERE id_producto = $idProducto";
            $stmt2 = $pdo->prepare($consulta);
            $stmt2->execute();



            // Captura los datos de la consulta, captura una sola fila
            $fila = $stmt2->fetch(PDO::FETCH_ASSOC);
            $maxVentas = $fila['ventas_producto'];

            $totalVentas = $maxVentas + $cantidadComprar;
            $sql = "UPDATE producto set existencia_producto=:totalProductos,fecha_venta=:fechahoy,ventas_producto=:totalVentas WHERE id_producto = :idProducto";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_STR);
            $stmt->bindParam(':totalProductos', $totalProductos, PDO::PARAM_STR);
            $stmt->bindParam(':totalVentas', $totalVentas, PDO::PARAM_STR);
            $stmt->bindParam(':fechahoy', $fechahoy, PDO::PARAM_STR);
            //$stmt->bindParam(':ventasProducto', $ventasProducto, PDO::PARAM_STR);
            $stmt->execute();



            
            $id = $_SESSION["idUsuario"];
            //    echo $id;


            $sqlTablaVenta = ("INSERT INTO venta(usuario_id_usuario,fecha_venta) VALUES (:id, :fechahoy )");
            $stmt3 = $pdo->prepare($sqlTablaVenta);
            $stmt3->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt3->bindParam(':fechahoy', $fechahoy, PDO::PARAM_STR);
            $stmt3->execute();




            $consultaIDVENTA = "SELECT id_venta from venta WHERE usuario_id_usuario= $id";
            $stmt4 = $pdo->prepare($consultaIDVENTA);
            $stmt4->execute();
            // Captura los datos de la consulta, captura una sola fila
            $fila4 = $stmt4->fetch(PDO::FETCH_ASSOC);
            $id_venta = $fila4['id_venta'];

            $idventa = $id_venta;

            // echo $idventa;



            $sqlTablaHasProductos = ("INSERT INTO producto_has_venta(producto_id_producto,Venta_id_venta,cantidad_producto,fecha,id_usuario_fk) VALUES (:idProducto,:idventa,:cantidadComprar,:fechahoy,:id)");
           //echo $id;
            $stmt5 = $pdo->prepare($sqlTablaHasProductos);
            $stmt5->bindParam(':idProducto', $idProducto, PDO::PARAM_STR);
            // echo $idProducto;
            $stmt5->bindParam(':idventa', $idventa, PDO::PARAM_STR);
            $stmt5->bindParam(':cantidadComprar', $cantidadComprar, PDO::PARAM_STR);
            //echo $cantidadComprar;
            $stmt5->bindParam(':fechahoy', $fechahoy, PDO::PARAM_STR);
            $stmt5->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt5->execute();


            header("Location: ../vista/productosClientes.php");
        } catch (PDOException $e) {
            // Manejo de errores en caso de que ocurra una excepción.
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    $_SESSION['compra'] = 'No hay existencias suficientes';
    header("Location: ../vista/productosClientes.php");
}

?>