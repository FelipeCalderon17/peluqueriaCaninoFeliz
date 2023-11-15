<?php
session_start();
if (
    isset($_POST['fechaInicio']) && !empty($_POST['fechaInicio']) &&
    isset($_POST['fechaFin']) && !empty($_POST['fechaFin'])
) {
    require('../fpdf186/fpdf.php');
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=peluqueria_canino_feliz", "root", '');
    } catch (PDOException $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }
    $pdf = new FPDF();
    $pdf->AddPage();
    // Consulta preparada para evitar inyección de SQL
    $sql = "SELECT nombre_producto, ventas_producto from producto WHERE fecha_venta BETWEEN :fechaInicio AND :fechaFin order by ventas_producto DESC;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':fechaInicio', $fechaInicio, PDO::PARAM_STR);
    $stmt->bindParam(':fechaFin', $fechaFin, PDO::PARAM_STR);
    $stmt->execute();

    // Captura los datos de la consulta, captura una sola fila
    $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() > 0) {
        $pdf->SetFont('Arial', 'B', 30);
        $pdf->Cell(0, 10, 'Reporte de Productos', 0, 1, 'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(35, 10, 'Nombre', 1);
        $pdf->Cell(45, 10, 'Cantidad de Ventas', 1);
        $pdf->Ln(); // Salto de línea después de los encabezados
        $pdf->SetFont('Arial', '', 12);
        // Llenar la tabla con datos
        $ancho_celda = 60;
        $alto_celda = 10;
        foreach ($fila as $producto) {
            $pdf->Cell(35, 10, utf8_decode($producto['nombre_producto']), 1);
            $pdf->Cell(45, 10, utf8_decode($producto['ventas_producto']), 1);
            $pdf->Ln();
        }
    } else {
        $pdf->SetFont('Arial', 'B', 30);
        $pdf->Cell(0, 10, 'Reporte de Productos', 0, 1, 'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell(0, 10, 'No hay Productos en estas fechas', 0, 1, 'C');
    }
    $pdf->Output();
} else {
    echo "malo";
}
