<?php
// Include the database connection file
require('../includes/config.php');

if ($user->is_logged_in() && !$_SESSION['isAdmin'] && $_SESSION['isProffileValidated'] && $_SESSION['isUserActive']) {
  header('Location: https://inversioneseverest.net/clients/index.php');
  exit();  
} elseif (!$user->is_logged_in()) {
  header('Location: https://inversioneseverest.net/index.php');
  exit();  
} elseif (!isset($_SESSION['ClienteId'])) {
  header('Location: https://inversioneseverest.net/clients/completa_perfil.php');
  exit();
}

// Check if the form is submitted and values are set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editId'])) {
    // Get the data from the POST request
    $editId = $_POST['editId'];
    $editMotivo = !empty($_POST['editMotivo']) ? $_POST['editMotivo'] : null;
    $editTipoDeInversion = !empty($_POST['editTipoDeInversion']) ? $_POST['editTipoDeInversion'] : null;
    $editMontoDividendoEsperado = !empty($_POST['editMontoDividendoEsperado']) ? $_POST['editMontoDividendoEsperado'] : null;
    $editPeriodicidadDividendo = !empty($_POST['editPeriodicidadDividendo']) ? $_POST['editPeriodicidadDividendo'] : null;
    $editFechaPagoDividendo = !empty($_POST['editFechaPagoDividendo']) ? $_POST['editFechaPagoDividendo'] : null;
    $editMontoBono = !empty($_POST['editMontoBono']) ? $_POST['editMontoBono'] : null;
    $editTasaInteresBono = !empty($_POST['editTasaInteresBono']) ? $_POST['editTasaInteresBono'] : null;
    $editPlazoBono = !empty($_POST['editPlazoBono']) ? $_POST['editPlazoBono'] : null;
    $editPeriodicidadInteres = !empty($_POST['editPeriodicidadInteres']) ? $_POST['editPeriodicidadInteres'] : null;
    $editFechaPagoBono = !empty($_POST['editFechaPagoBono']) ? $_POST['editFechaPagoBono'] : null;
    $editMontoFondoInversion = !empty($_POST['editMontoFondoInversion']) ? $_POST['editMontoFondoInversion'] : null;
    $editTarifaAdministracion = !empty($_POST['editTarifaAdministracion']) ? $_POST['editTarifaAdministracion'] : null;
    $editPeriodicidadTarifaAdm = !empty($_POST['editPeriodicidadTarifaAdm']) ? $_POST['editPeriodicidadTarifaAdm'] : null;
    $editCantParticipacion = !empty($_POST['editCantParticipacion']) ? $_POST['editCantParticipacion'] : null;
    $editRendimientoTotal = !empty($_POST['editRendimientoTotal']) ? $_POST['editRendimientoTotal'] : null;
    $editStatus = !empty($_POST['editStatus']) ? $_POST['editStatus'] : null;
    $editFechaPagoInicialInversion = !empty($_POST['editFechaPagoInicialInversion']) ? $_POST['editFechaPagoInicialInversion'] : null;
    $editFechaFinalInversion = !empty($_POST['editFechaFinalInversion']) ? $_POST['editFechaFinalInversion'] : null;
    $editFechaDeAprobacion = !empty($_POST['editFechaDeAprobacion']) ? $_POST['editFechaDeAprobacion'] : null;

    try {
        // Prepare and execute the SQL update statement
        $stmt = $db->prepare("UPDATE inversiones SET 
                                Motivo = :motivo, 
                                TipoDeInversion = :tipoDeInversion, 
                                MontoDividendoEsperado = :montoDividendoEsperado, 
                                PeriodicidadDividendo = :periodicidadDividendo, 
                                FechaPagoDividendo = :fechaPagoDividendo, 
                                MontoBono = :montoBono, 
                                TasaInteresBono = :tasaInteresBono, 
                                PlazoBono = :plazoBono, 
                                PeriodicidadInteres = :periodicidadInteres, 
                                FechaPagoInteres = :fechaPagoBono, 
                                MontoFondoInversion = :montoFondoInversion, 
                                TarifaAdministracion = :tarifaAdministracion, 
                                PeriodicidadTarifaAdm = :periodicidadTarifaAdm, 
                                CantParticipacion = :cantParticipacion, 
                                RendimientoTotal = :rendimientoTotal, 
                                Status = :status, 
                                FechaPagoInicialInversion = :fechaPagoInicialInversion, 
                                FechaFinalInversion = :fechaFinalInversion, 
                                FechaDeAprobacion = :fechaDeAprobacion 
                                WHERE Id = :id");
        $stmt->bindParam(':motivo', $editMotivo, PDO::PARAM_STR);
        $stmt->bindParam(':tipoDeInversion', $editTipoDeInversion, PDO::PARAM_STR);
        $stmt->bindParam(':montoDividendoEsperado', $editMontoDividendoEsperado, PDO::PARAM_STR);
        $stmt->bindParam(':periodicidadDividendo', $editPeriodicidadDividendo, PDO::PARAM_STR);
        $stmt->bindParam(':fechaPagoDividendo', $editFechaPagoDividendo, PDO::PARAM_STR);
        $stmt->bindParam(':montoBono', $editMontoBono, PDO::PARAM_STR);
        $stmt->bindParam(':tasaInteresBono', $editTasaInteresBono, PDO::PARAM_STR);
        $stmt->bindParam(':plazoBono', $editPlazoBono, PDO::PARAM_STR);
        $stmt->bindParam(':periodicidadInteres', $editPeriodicidadInteres, PDO::PARAM_STR);
        $stmt->bindParam(':fechaPagoBono', $editFechaPagoBono, PDO::PARAM_STR);
        $stmt->bindParam(':montoFondoInversion', $editMontoFondoInversion, PDO::PARAM_STR);
        $stmt->bindParam(':tarifaAdministracion', $editTarifaAdministracion, PDO::PARAM_STR);
        $stmt->bindParam(':periodicidadTarifaAdm', $editPeriodicidadTarifaAdm, PDO::PARAM_STR);
        $stmt->bindParam(':cantParticipacion', $editCantParticipacion, PDO::PARAM_STR);
        $stmt->bindParam(':rendimientoTotal', $editRendimientoTotal, PDO::PARAM_STR);
        $stmt->bindParam(':status', $editStatus, PDO::PARAM_STR);
        $stmt->bindParam(':fechaPagoInicialInversion', $editFechaPagoInicialInversion, PDO::PARAM_STR);
        $stmt->bindParam(':fechaFinalInversion', $editFechaFinalInversion, PDO::PARAM_STR);
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
