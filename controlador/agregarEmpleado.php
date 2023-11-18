<?php
session_start();

if (
    isset($_POST['nombreEmpleado']) && !empty($_POST['nombreEmpleado']) &&
    isset($_POST['correoEmpleado']) && !empty($_POST['correoEmpleado']) &&
    isset($_POST['contraseña']) && !empty($_POST['contraseña'])
) {
    require_once '../modelo/mycript.php';

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $correo = $_POST['correoEmpleado'];

        // Verificar si el correo ya existe
        $consultaExistencia = "SELECT COUNT(*) FROM usuario WHERE correo_usuario = :correo";
        $stmtExistencia = $pdo->prepare($consultaExistencia);
        $stmtExistencia->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmtExistencia->execute();

        $cantidadRegistros = $stmtExistencia->fetchColumn();

        if ($cantidadRegistros > 0) {
            // El correo ya existe, muestra un mensaje de error con SweetAlert
            $_SESSION['erroRegistro'] = "errorCreado";
            header("Location: ../vista/empleados.php");
           // echo $error;
        } else {
            // El correo no existe, procede con la inserción
            $consultaAgregar = "INSERT INTO usuario(nombre_usuario, correo_usuario, pass_usuario, rol_usuario) VALUES (:nombreEmpleado, :correoEmpleado, :pass, :empleado)";

            $nombreEmpleado = $_POST['nombreEmpleado'];
            $password = encrypt($_POST['contraseña']);
            $empleado = "empleado";

            $stmtAgregar = $pdo->prepare($consultaAgregar);
            $stmtAgregar->bindParam(':nombreEmpleado', $nombreEmpleado, PDO::PARAM_STR);
            $stmtAgregar->bindParam(':correoEmpleado', $correo, PDO::PARAM_STR);
            $stmtAgregar->bindParam(':pass', $password, PDO::PARAM_STR);
            $stmtAgregar->bindParam(':empleado', $empleado, PDO::PARAM_STR);

            $stmtAgregar->execute();

            // Inserción exitosa, muestra un mensaje de éxito con SweetAlert y redirige a la página de empleados

            $_SESSION['registroExito']="OK";
            header("Location: ../vista/empleados.php");

            
        }

        $pdo = null;
    } catch (PDOException $e) {
        // Manejo de errores en caso de que ocurra una excepción.
        echo "Error: " . $e->getMessage();
    };
}
?>
