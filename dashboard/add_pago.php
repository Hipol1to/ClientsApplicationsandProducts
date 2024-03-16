<?php
// Include the database connection file
require('../includes/config.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $idCliente = $_POST['clientUser'];
    $cuentaRemitente = $_POST['addCuentaRemitente'];
    $tipoCuentaRemitente = $_POST['editTipoCuentaRemitente'];
    $entidadBancariaRemitente = $_POST['addEntidadBancariaRemitente'];
    $cuentaDestinatario = $_POST['addCuentaDestinatario'];
    $tipoCuentaDestinatario = $_POST['addTipoCuentaDestinatario'];
    $entidadBancariaDestinatario = $_POST['addEntidadBancariaDestinatario'];
    $monto = $_POST['addMonto'];
    $motivo = $_POST['addMotivo'];
    $tipo = $_POST['addTipo'];
    $inversionId = $_POST['addInversionId'];
    $participacionId = $_POST['addParticipacionId'];
    $fechaDePago = $_POST['addFechaDePago'];

    // Prepare an insert statement
    $sql = "INSERT INTO pagos (IdCliente, CuentaRemitente, TipoCuentaRemitente, EntidadBancariaRemitente, 
            CuentaDestinatario, TipoCuentaDestinatario, EntidadBancariaDestinatario, Monto, Motivo, Tipo, 
            InversionId, ParticipacionId, FechaDePago)
            VALUES (:idCliente, :cuentaRemitente, :tipoCuentaRemitente, :entidadBancariaRemitente, 
            :cuentaDestinatario, :tipoCuentaDestinatario, :entidadBancariaDestinatario, :monto, :motivo, 
            :tipo, :inversionId, :participacionId, :fechaDePago)";
    
    if ($stmt = $db->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":idCliente", $idCliente);
        $stmt->bindParam(":cuentaRemitente", $cuentaRemitente);
        $stmt->bindParam(":tipoCuentaRemitente", $tipoCuentaRemitente);
        $stmt->bindParam(":entidadBancariaRemitente", $entidadBancariaRemitente);
        $stmt->bindParam(":cuentaDestinatario", $cuentaDestinatario);
        $stmt->bindParam(":tipoCuentaDestinatario", $tipoCuentaDestinatario);
        $stmt->bindParam(":entidadBancariaDestinatario", $entidadBancariaDestinatario);
        $stmt->bindParam(":monto", $monto);
        $stmt->bindParam(":motivo", $motivo);
        $stmt->bindParam(":tipo", $tipo);
        $stmt->bindParam(":inversionId", $inversionId);
        $stmt->bindParam(":participacionId", $participacionId);
        $stmt->bindParam(":fechaDePago", $fechaDePago);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect back to the page with success message
            header("location: detalle_inversion.php?id=".$inversionId."&success=1");
            exit();
        } else {
            // Redirect back to the page with error message
            header("detalle_inversion.php?id=".$inversionId."&error=1");
            exit();
        }
    }
}
?>
