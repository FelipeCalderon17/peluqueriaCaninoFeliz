<?php
//Controla el inicio de sesión

//Se verifica que existan datos en el formulario
if (
    isset($_POST['nombreEmpleado']) && !empty($_POST['nombreEmpleado']) &&
    isset($_POST['correoEmpleado']) && !empty($_POST['correoEmpleado']) &&
    isset($_POST['contraseña']) && !empty($_POST['contraseña'])
) {

    require_once '../modelo/mycript.php';
    try {
        // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
        $pdo = new PDO("mysql:host=localhost;dbname=id21435812_peluqueria_canino_feliz", "id21435812_calde17", "Bruno1702!");

        // Configurar el manejo de errores y excepciones.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Paso 2: Preparar una consulta SQL usando consultas preparadas.
        $consultaAgregar = "INSERT INTO usuario(nombre_usuario, correo_usuario, pass_usuario, rol_usuario) VALUES (:nombreEmpleado, :correoEmpleado, :pass, :empleado)";

        // Paso 3: Vincular parámetros a la consulta preparada.
        $nombreEmpleado = $_POST['nombreEmpleado'];
        $correo = $_POST['correoEmpleado'];
        $password = encrypt($_POST['contraseña']);
        $empleado = "empleado";

        $stmt = $pdo->prepare($consultaAgregar);
        $stmt->bindParam(':nombreEmpleado', $nombreEmpleado, PDO::PARAM_STR);
        $stmt->bindParam(':correoEmpleado', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $password, PDO::PARAM_STR);
        $stmt->bindParam(':empleado', $empleado, PDO::PARAM_STR);

        // Paso 4: Ejecutar la consulta preparada.
        $stmt->execute();

        header("Location: ../vista/empleados.php");

        // Paso 6: Cerrar la conexión a la base de datos.
        $pdo = null;
    } catch (PDOException $e) {
        // Manejo de errores en caso de que ocurra una excepción.
        echo "Error: " . $e->getMessage();
    }
}
