<?php
// Include the database connection file
require('../includes/config.php');

if ($user->is_logged_in() && $_SESSION['isAdmin'] && $_SESSION['isProffileValidated'] && $_SESSION['isUserActive'] && isset($_SESSION['ClienteId'])) {
  header('Location: http://localhost/ClientsApplicationsandProducts/dashboard/index.php');
  exit();  
} elseif (!isset($_SESSION['ClienteId']) && $user->is_logged_in()) {
  header('Location: http://localhost/ClientsApplicationsandProducts/clients/completa_perfil.php');
  exit();
} elseif (!$user->is_logged_in()) {
  header('Location: http://localhost/ClientsApplicationsandProducts/index.php');
  exit();
}
error_log("viejo");
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $idCliente = $_SESSION['ClienteId'];
    $motivo = $_POST['motivo'];
    $montoSolicitado = $_POST['montoSolicitado'];
    //$montoAprobado = $_POST['montoAprobado'];
    //$montoPagado = $_POST['montoPagado'];
    //$tasaDeInteres = $_POST['tasaDeInteres'];
    //$montoRecargo = $_POST['montoRecargo'];
    $remitente = "Inversiones Everest";
    $beneficiario = $_SESSION['fullname'];
    $status = "En proceso";
    //missing fecha pago mensual
    $fechaFinalPrestamo = $_POST['fechaFinalPrestamo'];

    $plazo = $_POST['cantMeses'];
    $cantPagosPorMes = $_POST['cantPagosPorMes'];
    $cuotasTotales = ($plazo * $cantPagosPorMes);
    $diasDePagoDelMes = "";
    for ($i=1; $i <= $cantPagosPorMes ; $i++) {
      $diasDePagoDelMes .= $_POST['diasDePagoDelMes_'.$i];
      if ($cantPagosPorMes >1 && $i != $cantPagosPorMes) {
      $diasDePagoDelMes .= "_";
      }
    }
    
    

    
    
    //$pagoId = $_POST['pagoId'];
    //$fechaPagoMensual = $_POST['fechaPagoMensual'];
    
    
    

    // Prepare an insert statement
    $sql = "INSERT INTO prestamos (IdCliente, Motivo, MontoSolicitado, Remitente, Beneficiario, Status, FechaFinalPrestamo, CuotasTotales, DiasDePagoDelMes, CantPagosPorMes)
            VALUES (:idCliente, :motivo, :montoSolicitado, :remitente, :beneficiario, :status, :fechaFinalPrestamo, :cuotasTotales, :diasDePagoDelMes, :cantPagosPorMes)";
    
    if ($stmt = $db->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":idCliente", $idCliente);
        $stmt->bindParam(":motivo", $motivo);
        $stmt->bindParam(":montoSolicitado", $montoSolicitado);
        $stmt->bindParam(":remitente", $remitente);
        $stmt->bindParam(":beneficiario", $beneficiario);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":fechaFinalPrestamo", $fechaFinalPrestamo);
        $stmt->bindParam(":cuotasTotales", $cuotasTotales);
        $stmt->bindParam(":diasDePagoDelMes", $diasDePagoDelMes);
        $stmt->bindParam(":cantPagosPorMes", $cantPagosPorMes);

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
