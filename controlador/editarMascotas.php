<?php
//Controla el inicio de sesión
/* echo $_POST['nombre_mascota'];
echo $_POST['tipo_mascota'];
echo $_POST['raza'];
echo $_POST['requisitos_especiales'];
echo $_POST['usuario_id_usuario']; */
//Se verifica que existan datos en el formulario
if (
    isset($_POST['id_mascotaEdit']) && !empty($_POST['id_mascotaEdit']) &&
    isset($_POST['nombre_mascotaEdit']) && !empty($_POST['nombre_mascotaEdit']) &&
    isset($_POST['tipo_mascotaEdit']) && !empty($_POST['tipo_mascotaEdit']) &&
    isset($_POST['razaEdit']) && !empty($_POST['razaEdit']) &&
    isset($_POST['requisitos_especialesEdit']) && !empty($_POST['requisitos_especialesEdit']) &&
    isset($_POST['usuario_id_usuarioEdit']) && !empty($_POST['usuario_id_usuarioEdit'])
) {

    require_once '../modelo/mycript.php';
    try {
        require_once '../modelo/mycript.php';
        // Paso 1: Crear una instancia de la clase PDO y establecer una conexión a la base de datos.
        $pdo = new PDO("mysql:host=localhost;dbname=id21435812_peluqueria_canino_feliz", "id21435812_calde17", "Bruno1702!");


        // Configurar el manejo de errores y excepciones.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Paso 2: Preparar una consulta SQL usando consultas preparadas.
        $stmt = $pdo->prepare("UPDATE mascota SET nombre_mascota = :nombre, tipo_mascota = :tipo , raza = :raza, requisitos_especiales = :requisitos , usuario_id_usuario = :usuario WHERE id_mascota = :id");


        // Paso 3: Vincular parámetros a la consulta preparada.
        $id = $_POST['id_mascotaEdit'];
        $nombre = $_POST['nombre_mascotaEdit'];
        $tipo = $_POST['tipo_mascotaEdit'];
        $raza = $_POST['razaEdit'];
        $requisitos = $_POST['requisitos_especialesEdit'];
        $usuario = $_POST['usuario_id_usuarioEdit'];
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);
        $stmt->bindParam(":raza", $raza, PDO::PARAM_STR);
        $stmt->bindParam(":requisitos", $requisitos, PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);

        // Paso 4: Ejecutar la consulta preparada.
        $stmt->execute();

        header("Location: ../vista/mascota.php");

        // Paso 6: Cerrar la conexión a la base de datos.
        $pdo = null;
    } catch (PDOException $e) {
        // Manejo de errores en caso de que ocurra una excepción.
        echo "Error: " . $e->getMessage();
    }
}
