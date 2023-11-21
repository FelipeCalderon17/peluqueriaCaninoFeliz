<?php
session_start();

if (
    isset($_POST['id_usuario']) && !empty($_POST['id_usuario']) &&
    isset($_POST['nombreEmpleado']) && !empty($_POST['nombreEmpleado']) &&
    isset($_POST['correoEmpleado']) && !empty($_POST['correoEmpleado']) &&
    isset($_POST['contraseña']) && !empty($_POST['contraseña'])
) {

    try {
        require_once '../modelo/mycript.php';

        // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
        //LOCAL
        //$pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");
        $pdo = new PDO("mysql:host=localhost;dbname=id21435812_peluqueria_canino_feliz", "id21435812_calde17", "Bruno1702!");

        // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
        /*  $pdo = new PDO("mysql:host=localhost;dbname=id21435812_peluqueria_canino_feliz", "id21435812_calde17", "Bruno1702!"); */


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

        $_SESSION['EditadoExito'] = "OK";
        header("Location: ../vista/empleados.php");

        // Paso 6: Cerrar la conexión a la base de datos.
        $pdo = null;
    } catch (PDOException $e) {
        // Manejo de errores en caso de que ocurra una excepción.
        echo "Error: " . $e->getMessage();
    }
} else {
    $_SESSION['errorEditado'] = "OK";
    header("Location: ../vista/empleados.php");
}
