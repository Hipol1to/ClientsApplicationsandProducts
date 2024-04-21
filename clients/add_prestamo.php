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
error_log("dentro de agregar eiprestamo aichivo");
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $idCliente = $_SESSION['ClienteId'];
    $motivo = "Prestamo";
    $montoSolicitado = $_POST['montoSolicitado'];
    $cuota1 = isset($_POST['cuotasNo_1']) ? $_POST['cuotasNo_1'] : null;
    $cuota2 = isset($_POST['cuotasNo_2']) ? $_POST['cuotasNo_2'] : null;
    $cuota3 = isset($_POST['cuotasNo_3']) ? $_POST['cuotasNo_3'] : null;
    $cuota4 = isset($_POST['cuotasNo_4']) ? $_POST['cuotasNo_4'] : null;
    $montoPagoMensual = isset($_POST['montoPagoMensual']) ? $_POST['montoPagoMensual'] : null;
  error_log($montoPagoMensual);
    //$montoAprobado = $_POST['montoAprobado'];
    //$montoPagado = $_POST['montoPagado'];
    //$tasaDeInteres = $_POST['tasaDeInteres'];
    //$montoRecargo = $_POST['montoRecargo'];
    $remitente = "Inversiones Everest";
    $beneficiario = $_SESSION['fullname'];
    $status = "En revision";
    //missing fecha pago mensual
    $fechaFinalPrestamo = $_POST['fechaFinalPrestamo'];

    $plazo = (int)preg_replace('/[^0-9]/', '', $_POST['cantMeses']);
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
    $sql = "INSERT INTO prestamos (IdCliente, Motivo, MontoSolicitado, MontoCuota1, MontoCuota2, MontoCuota3, MontoCuota4, MontoPagoMensual, Remitente, Beneficiario, Status, FechaFinalPrestamo, CuotasTotales, DiasDePagoDelMes, CantPagosPorMes, CantMesesDuracionPrestamo)
            VALUES (:idCliente, :motivo, :montoSolicitado, :montoCuota1, :montoCuota2, :montoCuota3, :montoCuota4, :montoPagoMensual, :remitente, :beneficiario, :status, :fechaFinalPrestamo, :cuotasTotales, :diasDePagoDelMes, :cantPagosPorMes, :cantMesesDuracionPrestamo)";
    
    if ($stmt = $db->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":idCliente", $idCliente);
        $stmt->bindParam(":motivo", $motivo);
        $stmt->bindParam(":montoSolicitado", $montoSolicitado);
        $stmt->bindParam(":montoCuota1", $cuota1);
        $stmt->bindParam(":montoCuota2", $cuota2);
        $stmt->bindParam(":montoCuota3", $cuota3);
        $stmt->bindParam(":montoCuota4", $cuota4);
        $stmt->bindParam(":montoPagoMensual", $montoPagoMensual);
        $stmt->bindParam(":remitente", $remitente);
        $stmt->bindParam(":beneficiario", $beneficiario);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":fechaFinalPrestamo", $fechaFinalPrestamo);
        $stmt->bindParam(":cuotasTotales", $cuotasTotales);
        $stmt->bindParam(":diasDePagoDelMes", $diasDePagoDelMes);
        $stmt->bindParam(":cantPagosPorMes", $cantPagosPorMes);
        $stmt->bindParam(":cantMesesDuracionPrestamo", $plazo);

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
