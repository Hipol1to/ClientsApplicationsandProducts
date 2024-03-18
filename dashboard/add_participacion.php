<?php
// Include the database connection file
require('../includes/config.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $idInversion = $_POST['addIdInversion'];
    $descripcionParticipacion = $_POST['addDescripcion'];
    $montoInvertido = $_POST['addMontoInvertido'];
    $rendimientoEsperado = $_POST['addRendimientoEsperado'];
    $fechaInicioParticipacion = $_POST['addFechaInicioParticipacion'];
    $fechaFinParticipacion = $_POST['addFechaFinalParticipacion'];

    // Prepare an insert statement
    $sql = "INSERT INTO participaciones (IdInversion, DescripcionParticipacion, MontoInvertido, RendimientoEsperado, FechaInicioParticipacion, FechaFinParticipacion)
            VALUES (:idInversion, :descripcionParticipacion, :montoInvertido, :rendimientoEsperado, :fechaInicioParticipacion, :fechaFinParticipacion)";
    
    if ($stmt = $db->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":idInversion", $idInversion);
        $stmt->bindParam(":descripcionParticipacion", $descripcionParticipacion);
        $stmt->bindParam(":montoInvertido", $montoInvertido);
        $stmt->bindParam(":rendimientoEsperado", $rendimientoEsperado);
        $stmt->bindParam(":fechaInicioParticipacion", $fechaInicioParticipacion);
        $stmt->bindParam(":fechaFinParticipacion", $fechaFinParticipacion);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect back to the page with success message
            header("location: detalle_inversion.php?id=".$idInversion."&success=1");
            exit();
        } else {
            // Redirect back to the page with error message
            header("detalle_inversion.php?id=".$idInversion."&error=1");
            exit();
        }
    }

    // Prepare an update statement for inversion
    $sql = "UPDATE inversion SET 
                                Motivo = :motivo, 
                                MontoSolicitado = :montoSolicitado, 
                                MontoAprobado = :montoAprobado, 
                                MontoPagado = :montoPagado, 
                                TasaDeInteres = :tasaDeInteres, 
                                MontoRecargo = :montoRecargo, 
                                Remitente = :remitente, 
                                Beneficiario = :beneficiario, 
                                Status = :status, 
                                FechaFinalPrestamo = :fechaFinalPrestamo, 
                                CuotasTotales = :cuotasTotales, 
                                DiasDePagoDelMes = :diasDePagoDelMes, 
                                CantPagosPorMes = :cantPagosPorMes, 
                                FechaDeAprobacion = :fechaDeAprobacion 
                                WHERE Id = :id";
    
    if ($stmt = $db->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":idInversion", $idInversion);
        $stmt->bindParam(":descripcionParticipacion", $descripcionParticipacion);
        $stmt->bindParam(":montoInvertido", $montoInvertido);
        $stmt->bindParam(":rendimientoEsperado", $rendimientoEsperado);
        $stmt->bindParam(":fechaInicioParticipacion", $fechaInicioParticipacion);
        $stmt->bindParam(":fechaFinParticipacion", $fechaFinParticipacion);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect back to the page with success message
            header("location: detalle_inversion.php?id=".$idInversion."&success=1");
            exit();
        } else {
            // Redirect back to the page with error message
            header("detalle_inversion.php?id=".$idInversion."&error=1");
            exit();
        }
    }
}
?>
