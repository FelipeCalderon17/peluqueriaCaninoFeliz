<?php
try {
    require_once '../modelo/mycript.php';
    // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
    $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");


    // Configurar el manejo de errores y excepciones.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Paso 2: Preparar una consulta SQL usando consultas preparadas.
    $consultaAgregar = "UPDATE usuario SET nombre_usuario = :nombreEmpleado, correo_usuario = :correoEmpleado, pass_usuario = :pass WHERE id_usuario = :idEmpleado";


    // Paso 3: Vincular parámetros a la consulta preparada.
    $idEmpleado = $_POST['id_usuario'];
    $nombreEmpleado = $_POST['nombreEmpleado'];
    $correo = $_POST['correoEmpleado'];
    $password = encrypt($_POST['contraseña']);



    $stmt = $pdo->prepare($consultaAgregar);
    $stmt->bindParam(':idEmpleado', $idEmpleado, PDO::PARAM_STR);
    $stmt->bindParam(':nombreEmpleado', $nombreEmpleado, PDO::PARAM_STR);
    $stmt->bindParam(':correoEmpleado', $correo, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $password, PDO::PARAM_STR);


    // Paso 4: Ejecutar la consulta preparada.
    $stmt->execute();

    header("Location: ../vista/empleados.php");

    // Paso 6: Cerrar la conexión a la base de datos.
    $pdo = null;
} catch (PDOException $e) {
    // Manejo de errores en caso de que ocurra una excepción.
    echo "Error: " . $e->getMessage();
}
