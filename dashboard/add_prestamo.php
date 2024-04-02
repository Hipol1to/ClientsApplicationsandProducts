<?php
// Include the database connection file
require('../includes/config.php');

if ($user->is_logged_in() && !$_SESSION['isAdmin'] && $_SESSION['isProffileValidated'] && $_SESSION['isUserActive']) {
  header('Location: http://localhost/ClientsApplicationsandProducts/clients/index.php');
  exit();  
} elseif (!$user->is_logged_in()) {
  header('Location: http://localhost/ClientsApplicationsandProducts/index.php');
  exit();  
} elseif (!isset($_SESSION['ClienteId'])) {
  header('Location: http://localhost/ClientsApplicationsandProducts/clients/completa_perfil.php');
  exit();
} else {
  header('Location: http://localhost/ClientsApplicationsandProducts/index.php');
  exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $motivo = $_POST['motivo'];
    $montoSolicitado = $_POST['montoSolicitado'];
    $montoAprobado = $_POST['montoAprobado'];
    $montoPagado = $_POST['montoPagado'];
    $tasaDeInteres = $_POST['tasaDeInteres'];
    $montoRecargo = $_POST['montoRecargo'];
    $remitente = $_POST['remitente'];
    $beneficiario = $_POST['beneficiario'];
    $status = $_POST['status'];
    $fechaFinalPrestamo = $_POST['fechaFinalPrestamo'];
    $cuotasTotales = $_POST['cuotasTotales'];
    $cantPagosPorMes = $_POST['cantPagosPorMes'];
    $fechaDeAprobacion = $_POST['fechaDeAprobacion'];

    
    $idCliente = $_POST['idCliente'];
    
    
    
    
    
    
    
    
    
    //$pagoId = $_POST['pagoId'];
    $fechaPagoMensual = $_POST['fechaPagoMensual'];
    
    $diasDePagoDelMes = $_POST['diasDePagoDelMes'];
    
    

    // Prepare an insert statement
    $sql = "INSERT INTO prestamos (IdCliente, Motivo, MontoSolicitado, MontoAprobado, MontoPagado, TasaDeInteres, MontoRecargo, Remitente, Beneficiario, Status, PagoId, FechaPagoMensual, FechaFinalPrestamo, CuotasTotales, DiasDePagoDelMes, CantPagosPorMes, FechaDeAprobacion)
            VALUES (:idCliente, :motivo, :montoSolicitado, :montoAprobado, :montoPagado, :tasaDeInteres, :montoRecargo, :remitente, :beneficiario, :status, :pagoId, :fechaPagoMensual, :fechaFinalPrestamo, :cuotasTotales, :diasDePagoDelMes, :cantPagosPorMes, :fechaDeAprobacion)";
    
    if ($stmt = $db->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":idCliente", $idCliente);
        $stmt->bindParam(":motivo", $motivo);
        $stmt->bindParam(":montoSolicitado", $montoSolicitado);
        $stmt->bindParam(":montoAprobado", $montoAprobado);
        $stmt->bindParam(":montoPagado", $montoPagado);
        $stmt->bindParam(":tasaDeInteres", $tasaDeInteres);
        $stmt->bindParam(":montoRecargo", $montoRecargo);
        $stmt->bindParam(":remitente", $remitente);
        $stmt->bindParam(":beneficiario", $beneficiario);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":pagoId", $pagoId);
        $stmt->bindParam(":fechaPagoMensual", $fechaPagoMensual);
        $stmt->bindParam(":fechaFinalPrestamo", $fechaFinalPrestamo);
        $stmt->bindParam(":cuotasTotales", $cuotasTotales);
        $stmt->bindParam(":diasDePagoDelMes", $diasDePagoDelMes);
        $stmt->bindParam(":cantPagosPorMes", $cantPagosPorMes);
        $stmt->bindParam(":fechaDeAprobacion", $fechaDeAprobacion);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect back to prestamos.php with success message
            header("location: prestamos.php?success=1");
            exit();
        } else {
            // Redirect back to prestamos.php with error message
            header("location: prestamos.php?error=1");
            exit();
        }
    }
}
?>
