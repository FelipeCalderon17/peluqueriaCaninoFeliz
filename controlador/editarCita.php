<?php
session_start();
/* $fecha = $_POST['fechaCitaEditar'];
$idCita = $_POST['idCitaEditar'];
$servicios = $_POST['checkServicioEditar'];
echo $fecha;
echo $idCita;
echo $servicios[0]; */
if (
    isset($_POST['idCitaEditar']) && !empty($_POST['idCitaEditar']) &&
    isset($_POST['fechaCitaEditar']) && !empty($_POST['fechaCitaEditar']) && isset($_POST['checkServicioEditar']) && !empty($_POST['checkServicioEditar'])
) {
    $fecha = $_POST['fechaCitaEditar'];
    $idCita = $_POST['idCitaEditar'];
    $servicios = $_POST['checkServicioEditar'];
    $lenghtServicios = count($servicios);
    if ($lenghtServicios > 0) {
        try {
            //$pdo = new PDO("mysql:host=localhost;dbname=id21435812_peluqueria_canino_feliz", "id21435812_calde17", "Bruno1702!");
            $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", "");
        } catch (PDOException $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
        $sql4 = "SELECT fecha_cita,id_cita from cita where estado='Activo'";
        $stmt4 = $pdo->prepare($sql4);
        /*  $stmt4->bindParam(':fechaCita', $fecha, PDO::PARAM_STR); */
        $stmt4->execute();
        $fila4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
        foreach ($fila4 as $fechaC) {
            $fechaComp = str_replace("T", " ", $fecha);
            $fechaComp = $fechaComp . ":00";
            if ($fechaC['fecha_cita'] == $fechaComp && $fechaC['id_cita'] != $idCita) {
                $_SESSION['errorFechaCogidaEditar'] = "ERROR";
                header("Location: ../vista/citasyServicios.php");
            } else if ($fecha < date("Y-m-d H:i:s")) {
                $_SESSION['errorFechaAnteriorEditar'] = "ERROR";
                header("Location: ../vista/citasyServicios.php");
            }
        }
        if (isset($_SESSION['errorFechaAnteriorEditar']) && !empty($_SESSION['errorFechaAnteriorEditar']) || isset($_SESSION['errorFechaCogidaEditar']) && !empty($_SESSION['errorFechaCogidaEditar'])) {
            header("Location: ../vista/citasyServicios.php");
        } else {
            // Consulta preparada para evitar inyección de SQL
            $sql = "UPDATE cita set fecha_cita=:fecha_cita where id_cita=:id_cita";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':fecha_cita', $fecha, PDO::PARAM_STR);
            $stmt->bindParam(':id_cita', $idCita, PDO::PARAM_STR);
            $stmt->execute();

            // Captura los datos de la consulta, captura una sola fila
            $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Consulta preparada para evitar inyección de SQL
            $sql3 = "DELETE FROM servicio where cita_id_cita=:id_cita ";
            $stmt3 = $pdo->prepare($sql3);
            $stmt3->bindParam(':id_cita', $idCita, PDO::PARAM_STR);
            $stmt3->execute();

            // Captura los datos de la consulta, captura una sola fila
            $fila3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

            for ($i = 0; $i < $lenghtServicios; $i++) {
                $sql2 = "INSERT INTO servicio (tipo_servicio,cita_id_cita) VALUES (:tipo_servicio,:id_cita)";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->bindParam(':tipo_servicio', $servicios[$i], PDO::PARAM_STR);
                $stmt2->bindParam(':id_cita', $idCita, PDO::PARAM_STR);
                $stmt2->execute();
            }
            $_SESSION['editarCita'] = "OK";
            header("Location: ../vista/citasyServicios.php");
        }
    } else {
        $_SESSION['errorEditar'] = "OK";
        header("Location: ../vista/citasyServicios.php");
    }
} else {
    $_SESSION['errorEditar'] = "OK";
    header("Location: ../vista/citasyServicios.php");
}
