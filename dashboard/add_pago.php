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
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $usuarioCliente = $_POST['clientUser'];
    $cuentaRemitente = $_POST['addCuentaRemitente'];
    $tipoCuentaRemitente = $_POST['editTipoCuentaRemitente'];
    $entidadBancariaRemitente = $_POST['addEntidadBancariaRemitente'];
    $cuentaDestinatario = $_POST['addCuentaDestinatario'];
    $tipoCuentaDestinatario = $_POST['addTipoCuentaDestinatario'];
    $entidadBancariaDestinatario = $_POST['addEntidadBancariaDestinatario'];
    $monto = $_POST['addMonto'];
    $motivo = $_POST['addMotivo'];
    $tipo = $_POST['addTipo'];
    $prestamoId = isset($_POST['addPrestamoId']) ? $_POST['addPrestamoId'] : null;

    $inversionId = isset($_POST['addInversionId']) ? $_POST['addInversionId'] : null;
    $participacionId = isset($_POST['addParticipacionId']) ? $_POST['addParticipacionId'] : null;
    $fechaDePago = $_POST['addFechaDePago'];
    $cliente = null;
    $pago = null;
  error_log($inversionId);
  error_log($participacionId);

  //voucher handling
  // Check if both front and back photos of the ID card are uploaded
  if (isset($_FILES['fotoComprobanteDePago']) && $_FILES['fotoComprobanteDePago']['error'] === UPLOAD_ERR_OK) {
    // Define upload directory
    $currentDirectory = __DIR__;
    $parentDirectory = dirname($currentDirectory);
    error_log("file directory: ".$parentDirectory);
    $upload_directory = $parentDirectory . "\\clients\\" . "\\uploads\\";

    // Generate unique file names for both photos
    $voucher_file_name = uniqid() . '_front_' . $_FILES['fotoComprobanteDePago']['name'];

    // Move uploaded files to the upload directory
    $isMoveSuccess = move_uploaded_file($_FILES['fotoComprobanteDePago']['tmp_name'], $upload_directory . $voucher_file_name);

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
    $voucher_path = "Unable to resolve voucher path"; // Set an empty path for front photo
}

    //QUERY to extract ClientId
     // Prepare an insert statement
    $sql = "SELECT clientes.Id as IdCliente
    FROM clientes
    JOIN usuarios
    WHERE clientes.IdUsuario = usuarios.id && usuarios.Usuario = :usuarioCliente";
    
    if ($stmt = $db->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":usuarioCliente", $usuarioCliente);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
            // Redirect back to the page with success message
        } else {
            // Redirect back to the page with error message
            header("detalle_inversion.php?id=".$inversionId."&error=1");
        }
    }



    //Query to insert the pago
    // Prepare an insert statement
    if ($cliente == null) {
    error_log("cliente es null");
  }else {
    if ($participacionId == null && $prestamoId == null) {
      $sql = "INSERT INTO pagos (IdCliente, CuentaRemitente, TipoCuentaRemitente, EntidadBancariaRemitente, 
              CuentaDestinatario, TipoCuentaDestinatario, EntidadBancariaDestinatario, Monto, Motivo, Tipo, 
              InversionId, VoucherPath, FechaDePago)
              VALUES (:idCliente, :cuentaRemitente, :tipoCuentaRemitente, :entidadBancariaRemitente, 
              :cuentaDestinatario, :tipoCuentaDestinatario, :entidadBancariaDestinatario, :monto, :motivo, 
              :tipo, :inversionId, :voucherPath, :fechaDePago)";
    } elseif($participacionId != null) {
      $sql = "INSERT INTO pagos (IdCliente, CuentaRemitente, TipoCuentaRemitente, EntidadBancariaRemitente, 
              CuentaDestinatario, TipoCuentaDestinatario, EntidadBancariaDestinatario, Monto, Motivo, Tipo, 
              InversionId, ParticipacionId, VoucherPath, FechaDePago)
              VALUES (:idCliente, :cuentaRemitente, :tipoCuentaRemitente, :entidadBancariaRemitente, 
              :cuentaDestinatario, :tipoCuentaDestinatario, :entidadBancariaDestinatario, :monto, :motivo, 
              :tipo, :inversionId, :participacionId, :voucherPath, :fechaDePago)";
      } elseif ($prestamoId != null) {
        $sql = "INSERT INTO pagos (IdCliente, CuentaRemitente, TipoCuentaRemitente, EntidadBancariaRemitente, 
              CuentaDestinatario, TipoCuentaDestinatario, EntidadBancariaDestinatario, Monto, Motivo, Tipo, 
              PrestamoId, VoucherPath, FechaDePago)
              VALUES (:idCliente, :cuentaRemitente, :tipoCuentaRemitente, :entidadBancariaRemitente, 
              :cuentaDestinatario, :tipoCuentaDestinatario, :entidadBancariaDestinatario, :monto, :motivo, 
              :tipo, :prestamoId, :voucherPath, :fechaDePago)";
      }
      error_log($sql);
      error_log("wepa");
      error_log($participacionId);
      if ($stmt = $db->prepare($sql)) {
          // Bind variables to the prepared statement as parameters
          $stmt->bindParam(":idCliente", $cliente['IdCliente']);
          $stmt->bindParam(":cuentaRemitente", $cuentaRemitente);
          $stmt->bindParam(":tipoCuentaRemitente", $tipoCuentaRemitente);
          $stmt->bindParam(":entidadBancariaRemitente", $entidadBancariaRemitente);
          $stmt->bindParam(":cuentaDestinatario", $cuentaDestinatario);
          $stmt->bindParam(":tipoCuentaDestinatario", $tipoCuentaDestinatario);
          $stmt->bindParam(":entidadBancariaDestinatario", $entidadBancariaDestinatario);
          $stmt->bindParam(":monto", $monto);
          $stmt->bindParam(":motivo", $motivo);
          $stmt->bindParam(":tipo", $tipo);
          if($inversionId != null) $stmt->bindParam(":inversionId", $inversionId);
          if ($participacionId != null) $stmt->bindParam(":participacionId", $participacionId);
          if ($prestamoId != null) $stmt->bindParam(":prestamoId", $prestamoId);
          $stmt->bindParam(":voucherPath", $voucher_path);
          $stmt->bindParam(":fechaDePago", $fechaDePago);

          // Attempt to execute the prepared statement
          if ($stmt->execute()) {
              // Redirect back to the page with success message
              $pago = $db->lastInsertId();
              error_log("{$pago}e");
          } else {
              // Redirect back to the page with error message
          error_log("error doing query");
          }
      }
    }

error_log("{$usuarioCliente}");
error_log("{$cuentaRemitente}");
error_log("{$tipoCuentaRemitente}");
error_log("$entidadBancariaRemitente}");
error_log("{$cuentaDestinatario}");
error_log("{$tipoCuentaDestinatario}");
error_log("{$entidadBancariaDestinatario}");
error_log("{$monto}");
error_log("{$motivo}");
error_log("{$tipo}");
error_log("{$prestamoId}");
error_log("{$inversionId}");
error_log("{$participacionId}");
error_log("{$fechaDePago}");
error_log($cliente['IdCliente']);
error_log("{$pago}");

    //DETERMINE IF THE PAGO IS FOR INVERSION/PARTICIPACION OR PRESTAMO
    if ($prestamoId != null) {
      //prestamo scenario
      $sql = "UPDATE prestamos SET 
                                PagoId = :idPago  
                                WHERE Id = :id";
    
    if ($stmt = $db->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":idPago", $pago);
        $stmt->bindParam(":id", $prestamoId);
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect back to the page with success message
            header("location: detalle_prestamo.php?id=".$prestamoId."&success=1");
            exit();
        } else {
            // Redirect back to the page with error message
            header("location: detalle_prestamo.php?id=".$prestamoId."&error=1");
            exit();
        }
    } else {
      error_log("hubo un bobo con el query");
    }
  } elseif ($inversionId != null && $participacionId == null) {
    //Inversion type Acciones/Bonos
    $sql = "UPDATE inversiones SET 
                                PagoId = :IdPago  
                                WHERE Id = :id";
    
    if ($stmt = $db->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":IdPago", $pago);
        $stmt->bindParam(":id", $inversionId);
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

  } elseif ($inversionId != null && $participacionId != null) {
    //Inversion type Fondos de inversion
    $sql = "UPDATE inversiones SET 
                                PagoId = :IdPago  
                                WHERE Id = :id";
      error_log("{$pago}");
    
    if ($stmt = $db->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":IdPago", $pago);
        $stmt->bindParam(":id", $inversionId);
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect back to the page with success message
        } else {
            error_log("error adding id for payment to investments table brocompai");
        }
    }

    //update participacion
    $sql = "UPDATE participaciones SET 
                                PagoId = :IdPago  
                                WHERE Id = :participacionId";
      error_log("{$pago}");
    
    if ($stmt = $db->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":IdPago", $pago);
        $stmt->bindParam(":participacionId", $participacionId);
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect back to the page with success message
            header("location: detalle_inversion.php?id=".$inversionId."&success=1");
            exit();
        } else {
            // Redirect back to the page with error message
            header("location: detalle_inversion.php?id=".$inversionId."&error=1");
            exit();
        }
    }
  } else {
    error_log("all ID was null");
    error_log($prestamoId);
    error_log($inversionId);
    error_log($participacionId);
  }
    
    
}
?>
