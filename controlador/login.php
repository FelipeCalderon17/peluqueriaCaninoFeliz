<?php
//Controla el inicio de sesión

//Se verifica que existan datos en el formulario
if (
    isset($_POST['correo_usuario']) && !empty($_POST['correo_usuario']) &&
    isset($_POST['pass_usuario']) && !empty($_POST['pass_usuario'])
) {
    session_start();
    require_once '../modelo/mycript.php';
    try {
        // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
        $pdo = new PDO("mysql:host=localhost;dbname=id21435812_peluqueria_canino_feliz", "id21435812_calde17", "Bruno1702!");

        // Configurar el manejo de errores y excepciones.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Paso 2: Preparar una consulta SQL usando consultas preparadas.
        $stmt = $pdo->prepare("SELECT id_usuario,nombre_usuario, correo_usuario, pass_usuario,rol_usuario FROM usuario WHERE correo_usuario = :correo && pass_usuario =  :pass");

        // Paso 3: Vincular parámetros a la consulta preparada.
        $correo = $_POST['correo_usuario'];
        $pass = encrypt($_POST['pass_usuario']);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->bindParam(":pass", $pass, PDO::PARAM_STR);

        // Paso 4: Ejecutar la consulta preparada.
        $stmt->execute();
        $_SESSION["login"] = false;
        $_SESSION["errorLogin"] = false;
        echo $_SESSION["errorLogin"];



        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION["login"] = true;
            $_SESSION["idUsuario"] = $fila['id_usuario'];
            $_SESSION["nombreUsuario"] = $fila['nombre_usuario'];
            $_SESSION["rol_usuario"] = $fila['rol_usuario'];
        }


        if ($_SESSION["login"] == true) {
            header("Location: ../vista/inicio.php");
            $_SESSION["errorLogin"] = false;
        } else {
            $_SESSION["errorLogin"] = true;
            header("Location: ../vista/index.php");
        }

        // Paso 6: Cerrar la conexión a la base de datos.
        $pdo = null;
    } catch (PDOException $e) {
        // Manejo de errores en caso de que ocurra una excepción.
        echo "Error: " . $e->getMessage();
    }
}
