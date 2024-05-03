<?php
// Include the database connection file
require('../includes/config.php');

// Check if the user is logged in
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


error_log("id?: " . $_POST['editIdForPago']);
// Check if the form is submitted and values are set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editIdForPago'])) {
    // Get the data from the POST request
    $editId = $_POST['editIdForPago'];
    $editIdCliente = $_POST['editIdClienteForPago'];
    $editCuentaRemitente = $_POST['editCuentaRemitenteForPago'];
    $editTipoCuentaRemitente = $_POST['editTipoCuentaRemitenteForPago'];
    $editEntidadBancariaRemitente = $_POST['editEntidadBancariaRemitenteForPago'];
    $editCuentaDestinatario = $_POST['editCuentaDestinatarioForPago'];
    $editTipoCuentaDestinatario = $_POST['editTipoCuentaDestinatarioForPago'];
    $editEntidadBancariaDestinatario = $_POST['editEntidadBancariaDestinatarioForPago'];
    $editMonto = $_POST['editMontoForPago'];
    $editMotivo = $_POST['editMotivoForPago'];
    $editTipo = $_POST['editTipoForPago'];
    $editInversionId = !empty($_POST['editInversionIdForPago']) ? $_POST['editInversionIdForPago'] : null;
    $editPrestamoId = !empty($_POST['editPrestamoIdForPago']) ? $_POST['editPrestamoIdForPago'] : null;
    $editFechaDePago = $_POST['editFechaDePagoForPago'];
    $shouldUpdateImage = false;


    //voucher handling
  // Check if both front and back photos of the ID card are uploaded
  if (isset($_FILES['editComprobanteDePago']) && $_FILES['editComprobanteDePago']['error'] === UPLOAD_ERR_OK) {
    // Define upload directory
    $currentDirectory = __DIR__;
    $parentDirectory = dirname($currentDirectory);
    error_log("file directory: ".$parentDirectory);
    $upload_directory = $parentDirectory . "\\clients\\" . "\\uploads\\";

    if (isset($_POST['editVoucherPath'])) {
      $shouldUpdateImage = true;
      $oldVoucherDirectory = $parentDirectory . "\\clients\\" . $_POST['editVoucherPath'];
      error_log("Path of old voucher: ".$oldVoucherDirectory);
      // Check if the file exists before attempting to remove it
      if (file_exists($oldVoucherDirectory)) {
      error_log("old voucher exist");
          // Attempt to remove the file
          if (unlink($oldVoucherDirectory)) {
              error_log("File removed successfully.");
          } else {
                error_log("Error: Unable to remove the file.");
            }
      } else {
          error_log("Error: File does not exist.");
        }
      }
    // Generate unique file names for both photos
    $voucher_file_name = uniqid() . '_front_' . $_FILES['editComprobanteDePago']['name'];

    // Move uploaded files to the upload directory
    $isMoveSuccess = move_uploaded_file($_FILES['editComprobanteDePago']['tmp_name'], $upload_directory . $voucher_file_name);

    error_log($isMoveSuccess);

    // Now you can save the file names or their paths to the database
    // Construct the full paths to the uploaded files
    $voucher_path = $upload_directory . $voucher_file_name;
    error_log("old voucher path" . $voucher_path);
    $voucher_path = explode("clients\\", $voucher_path);
    $voucher_path = $voucher_path[1];
    error_log("splitted voucher path" . $voucher_path);
} else {
    // Handle the case where the file uploads failed
    $voucher_path = false;
}
error_log("tha voucher " . $voucher_path);



    //PDO connection 
    try {
        // Prepare and execute the SQL update statement
        if (!$voucher_path) {
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
        } else {
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
                                VoucherPath = :voucherPath,
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
        $stmt->bindParam(':voucherPath', $voucher_path, PDO::PARAM_INT);
        $stmt->bindParam(':fechaDePago', $editFechaDePago, PDO::PARAM_STR);
        $stmt->bindParam(':id', $editId, PDO::PARAM_INT);
        }
        

        $stmt->execute();

        // Check if the update was successful
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            error_log(json_encode(['status' => 'success', 'message' => 'Record updated successfully.']));
            header("location: detalle_pago.php?id=".$editId."&success=1");
            exit();
        } else {
            error_log(json_encode(['status' => 'error', 'message' => 'No records updated.']));
            header("location: detalle_pago.php?id=".$editId."&error=1");
            exit();
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
