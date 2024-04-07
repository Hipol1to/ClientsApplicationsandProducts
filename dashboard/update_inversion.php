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
}

// Check if the form is submitted and values are set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editId'])) {
    // Get the data from the POST request
    $editId = $_POST['editId'];
    $editMotivo = !empty($_POST['editMotivo']) ? $_POST['editMotivo'] : null;
    $editMontoSolicitado = !empty($_POST['editMontoSolicitado']) ? $_POST['editMontoSolicitado'] : null;
    $editMontoAprobado = !empty($_POST['editMontoAprobado']) ? $_POST['editMontoAprobado'] : null;
    $editMontoPagado = !empty($_POST['editMontoPagado']) ? $_POST['editMontoPagado'] : null;
    $editTasaDeInteres = !empty($_POST['editTasaDeInteres']) ? $_POST['editTasaDeInteres'] : null;
    $editMontoRecargo = !empty($_POST['editMontoRecargo']) ? $_POST['editMontoRecargo'] : null;
    $editRemitente = !empty($_POST['editRemitente']) ? $_POST['editRemitente'] : null;
    $editBeneficiario = !empty($_POST['editBeneficiario']) ? $_POST['editBeneficiario'] : null;
    $editStatus = $_POST['editStatus'];
    $editFechaFinalEstimada = !empty($_POST['editFechaFinalEstimada']) ? $_POST['editFechaFinalEstimada'] : null;
    $editCuotasTotales = !empty($_POST['editCuotasTotales']) ? $_POST['editCuotasTotales'] : null;
    $editDiasDePagoDelMes = !empty($_POST['editDiasDePagoDelMes']) ? $_POST['editDiasDePagoDelMes'] : null;
    $editFrecuenciaPagoMensual = !empty($_POST['editFrecuenciaPagoMensual']) ? $_POST['editFrecuenciaPagoMensual'] : null;
    $editFechaDeAprobacion = !empty($_POST['editFechaDeAprobacion']) ? $_POST['editFechaDeAprobacion'] : null;

    try {
        // Prepare and execute the SQL update statement
        $stmt = $db->prepare("UPDATE inversiones SET 
                                Motivo = :motivo, 
                                MontoSolicitado = :montoSolicitado, 
                                MontoAprobado = :montoAprobado, 
                                MontoPagado = :montoPagado, 
                                TasaDeInteres = :tasaDeInteres, 
                                MontoRecargo = :montoRecargo, 
                                Remitente = :remitente, 
                                Beneficiario = :beneficiario, 
                                Status = :status, 
                                FechaFinalEstimada = :fechaFinalEstimada, 
                                CuotasTotales = :cuotasTotales, 
                                DiasDePagoDelMes = :diasDePagoDelMes, 
                                FrecuenciaPagoMensual = :frecuenciaPagoMensual, 
                                FechaDeAprobacion = :fechaDeAprobacion 
                                WHERE Id = :id");
        $stmt->bindParam(':motivo', $editMotivo, PDO::PARAM_STR);
        $stmt->bindParam(':montoSolicitado', $editMontoSolicitado, PDO::PARAM_STR);
        $stmt->bindParam(':montoAprobado', $editMontoAprobado, PDO::PARAM_STR);
        $stmt->bindParam(':montoPagado', $editMontoPagado, PDO::PARAM_STR);
        $stmt->bindParam(':tasaDeInteres', $editTasaDeInteres, PDO::PARAM_STR);
        $stmt->bindParam(':montoRecargo', $editMontoRecargo, PDO::PARAM_STR);
        $stmt->bindParam(':remitente', $editRemitente, PDO::PARAM_STR);
        $stmt->bindParam(':beneficiario', $editBeneficiario, PDO::PARAM_STR);
        $stmt->bindParam(':status', $editStatus, PDO::PARAM_STR);
        $stmt->bindParam(':fechaFinalEstimada', $editFechaFinalEstimada, PDO::PARAM_STR);
        $stmt->bindParam(':cuotasTotales', $editCuotasTotales, PDO::PARAM_INT);
        $stmt->bindParam(':diasDePagoDelMes', $editDiasDePagoDelMes, PDO::PARAM_INT);
        $stmt->bindParam(':frecuenciaPagoMensual', $editFrecuenciaPagoMensual, PDO::PARAM_STR);
        $stmt->bindParam(':fechaDeAprobacion', $editFechaDeAprobacion, PDO::PARAM_STR);
        $stmt->bindParam(':id', $editId, PDO::PARAM_INT);

        $stmt->execute();

        // Check if the update was successful
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            error_log(json_encode(['status' => 'success', 'message' => 'Record updated successfully.']));
        } else {
            error_log(json_encode(['status' => 'error', 'message' => 'No records updated.']));
        }
    } catch (PDOException $e) {
        // Handle database errors
        error_log(json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]));
    }
} else {
    // Handle the case where the form is not submitted correctly
    error_log(json_encode(['status' => 'error', 'message' => 'Invalid request.']));
}
?>
