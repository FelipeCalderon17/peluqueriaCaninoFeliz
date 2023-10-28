<?php
//Controla el inicio de sesión

//Se verifica que existan datos en el formulario
if (
    isset($_POST['nombre_usuario']) && !empty($_POST['nombre_usuario']) &&
    isset($_POST['correo_usuario']) && !empty($_POST['correo_usuario']) &&
    isset($_POST['pass_usuario']) && !empty($_POST['pass_usuario'])
) {

    require_once '../modelo/mycript.php';
    try {
        // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
        $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");

        // Configurar el manejo de errores y excepciones.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Paso 2: Preparar una consulta SQL usando consultas preparadas.
        $stmt = $pdo->prepare("INSERT INTO usuario (nombre_usuario ,correo_usuario, pass_usuario, rol_usuario) VALUES (:user , :correo , :pass, :cliente)");

        // Paso 3: Vincular parámetros a la consulta preparada.
        $user = $_POST['nombre_usuario'];
        $correo = $_POST['correo_usuario'];
        $pass = encrypt($_POST['pass_usuario']);
        $cliente = "cliente";
        $stmt->bindParam(":user", $user, PDO::PARAM_STR);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->bindParam(":pass", $pass, PDO::PARAM_STR);
        $stmt->bindParam(":cliente", $cliente, PDO::PARAM_STR);

        // Paso 4: Ejecutar la consulta preparada.
        $stmt->execute();

        header("Location: ../vista/clientes.php");

        // Paso 6: Cerrar la conexión a la base de datos.
        $pdo = null;
    } catch (PDOException $e) {
        // Manejo de errores en caso de que ocurra una excepción.
        echo "Error: " . $e->getMessage();
    }
}
