<?php
// Include the database connection file
require('../includes/config.php');

// Check if the user is logged in
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
    $editIdCliente = $_POST['editIdCliente'];
    $editCuentaRemitente = $_POST['editCuentaRemitente'];
    $editTipoCuentaRemitente = $_POST['editTipoCuentaRemitente'];
    $editEntidadBancariaRemitente = $_POST['editEntidadBancariaRemitente'];
    $editCuentaDestinatario = $_POST['editCuentaDestinatario'];
    $editTipoCuentaDestinatario = $_POST['editTipoCuentaDestinatario'];
    $editEntidadBancariaDestinatario = $_POST['editEntidadBancariaDestinatario'];
    $editMonto = $_POST['editMonto'];
    $editMotivo = $_POST['editMotivo'];
    $editTipo = $_POST['editTipo'];
    $editInversionId = !empty($_POST['editInversionId']) ? $_POST['editInversionId'] : null;
    $editPrestamoId = !empty($_POST['editPrestamoId']) ? $_POST['editPrestamoId'] : null;
    $editFechaDePago = $_POST['editFechaDePago'];

    // Assuming you have a PDO connection named $db
    try {
        // Prepare and execute the SQL update statement
        $stmt = $db->prepare("UPDATE pagos SET 
                                IdCliente = :idCliente, 
                                CuentaRemitente = :cuentaRemitente, 
                                TipoCuentaRemitente = :tipoCuentaRemitente, 
                                EntidadBancariaRemitente = :entidadBancariaRemitente, 
                                CuentaDestinatario = :cuentaDestinatario, 
                                TipoCuentaDestinatario = :tipoCuentaDestinatario, 
                                EntidadBancariaDestinatario = :entidadBancariaDestinatario, 
                                Monto = :monto, 
                                Motivo = :motivo, 
                                Tipo = :tipo, 
                                InversionId = :inversionId, 
                                PrestamoId = :prestamoId, 
                                FechaDePago = :fechaDePago 
                                WHERE Id = :id");
        $stmt->bindParam(':idCliente', $editIdCliente, PDO::PARAM_INT);
        $stmt->bindParam(':cuentaRemitente', $editCuentaRemitente, PDO::PARAM_STR);
        $stmt->bindParam(':tipoCuentaRemitente', $editTipoCuentaRemitente, PDO::PARAM_STR);
        $stmt->bindParam(':entidadBancariaRemitente', $editEntidadBancariaRemitente, PDO::PARAM_STR);
        $stmt->bindParam(':cuentaDestinatario', $editCuentaDestinatario, PDO::PARAM_STR);
        $stmt->bindParam(':tipoCuentaDestinatario', $editTipoCuentaDestinatario, PDO::PARAM_STR);
        $stmt->bindParam(':entidadBancariaDestinatario', $editEntidadBancariaDestinatario, PDO::PARAM_STR);
        $stmt->bindParam(':monto', $editMonto, PDO::PARAM_STR);
        $stmt->bindParam(':motivo', $editMotivo, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $editTipo, PDO::PARAM_STR);
        $stmt->bindParam(':inversionId', $editInversionId, PDO::PARAM_INT);
        $stmt->bindParam(':prestamoId', $editPrestamoId, PDO::PARAM_INT);
        $stmt->bindParam(':fechaDePago', $editFechaDePago, PDO::PARAM_STR);
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
