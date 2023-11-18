<?php
//Controla el inicio de sesión
session_start();
$_POST['nombre_usuario'] = trim($_POST['nombre_usuario']);
$_POST['correo_usuario'] = trim($_POST['correo_usuario']);
$_POST['pass_usuario'] = trim($_POST['pass_usuario']);
//Se verifica que existan datos en el formulario
if (
    isset($_POST['nombre_usuario']) && !empty($_POST['nombre_usuario']) &&
    isset($_POST['correo_usuario']) && !empty($_POST['correo_usuario']) &&
    isset($_POST['pass_usuario']) && !empty($_POST['pass_usuario'])
) {
    $correo = $_POST['correo_usuario'];
    require_once '../modelo/mycript.php';
    try {
        // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
        //$pdo = new PDO("mysql:host=localhost;dbname=id21435812_peluqueria_canino_feliz", "id21435812_calde17", "Bruno1702!");
        $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");
        // Configurar el manejo de errores y excepciones.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt2 = $pdo->prepare("SELECT correo_usuario from usuario");

        // Paso 3: Vincular parámetros a la consulta preparada.

        // Paso 4: Ejecutar la consulta preparada.
        $stmt2->execute();
        $fila2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($fila2 as $correoBD) {
            if ($correoBD['correo_usuario'] === $correo) {
                $_SESSION['errorCorreoCliente'] = "OK";
            }
        }
        if (isset($_SESSION['errorCorreoCliente']) && !empty($_SESSION['errorCorreoCliente'])) {
            header("Location: ../vista/clientes.php");
        } else {
            // Paso 2: Preparar una consulta SQL usando consultas preparadas.
            $stmt = $pdo->prepare("INSERT INTO usuario (nombre_usuario ,correo_usuario, pass_usuario, rol_usuario) VALUES (:user , :correo , :pass, :cliente)");

            // Paso 3: Vincular parámetros a la consulta preparada.
            $user = $_POST['nombre_usuario'];
            $pass = encrypt($_POST['pass_usuario']);
            $cliente = "cliente";
            $stmt->bindParam(":user", $user, PDO::PARAM_STR);
            $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
            $stmt->bindParam(":pass", $pass, PDO::PARAM_STR);
            $stmt->bindParam(":cliente", $cliente, PDO::PARAM_STR);

            // Paso 4: Ejecutar la consulta preparada.
            $stmt->execute();
            $_SESSION['exitoAgregar'] = "OK";
            header("Location: ../vista/clientes.php");

            // Paso 6: Cerrar la conexión a la base de datos.
            $pdo = null;
        }
    } catch (PDOException $e) {
        // Manejo de errores en caso de que ocurra una excepción.
        echo "Error: " . $e->getMessage();
    }
} else {
    $_SESSION['errorDatosClientes'] = "OK";
    header("Location: ../vista/clientes.php");
}
