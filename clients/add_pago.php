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
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $cuentaRemitente = $_POST['addCuentaRemitente'];
    $tipoCuentaRemitente = $_POST['addCuentaRemitente'];
    $entidadBancariaRemitente = $_POST['addEntidadBancariaRemitente'];
    $cuentaDestinatario = $_POST['addCuentaDestinatario'];
    $tipoCuentaDestinatario = $_POST['addTipoCuentaDestinatario'];
    $entidadBancariaDestinatario = $_POST['addEntidadBancariaDestinatario'];
    $monto = $_POST['addMonto'];
    $tipo = "Transferencia bancaria";
    $prestamoId = isset($_POST['addPrestamoId']) ? $_POST['addPrestamoId'] : null;

    $inversionId = isset($_POST['addInversionId']) ? $_POST['addInversionId'] : null;
    $participacionId = isset($_POST['addParticipacionId']) ? $_POST['addParticipacionId'] : null;
    $fechaDePago = $_POST['addFechaDePago'];
    $pago = null;
  error_log("Payment InvestmentId" . $inversionId);
  error_log("stake identification" . $participacionId);

  //voucher handling
  // Check if both front and back photos of the ID card are uploaded
  if (isset($_FILES['fotoComprobanteDePago']) && $_FILES['fotoComprobanteDePago']['error'] === UPLOAD_ERR_OK) {
    // Define upload directory
    $upload_directory = __DIR__ . "\\uploads\\";

    // Generate unique file names for both photos
    $voucher_file_name = uniqid() . '_front_' . $_FILES['fotoComprobanteDePago']['name'];

    // Move uploaded files to the upload directory
    move_uploaded_file($_FILES['subir_foto_cedula_frontal']['tmp_name'], $upload_directory . $voucher_file_name);

    // Now you can save the file names or their paths to the database
    // Construct the full paths to the uploaded files
    $voucher_path = $upload_directory . $voucher_file_name;
} else {
    // Handle the case where the file uploads failed
    $voucher_path = "Unable to resolve voucher path"; // Set an empty path for front photo
}

    //Query to insert the pago
    // Prepare an insert statement
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
              $motivo = "Pago de préstamo del usuario ". $_SESSION['fullname'];
      }
      error_log("query assigned");
      error_log($sql);
      error_log("^^Query declared^^\n");
      //error_log($participacionId);
      if ($stmt = $db->prepare($sql)) {
          // Bind variables to the prepared statement as parameters
          $stmt->bindParam(":idCliente", $_SESSION['ClienteId']);
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

          $stmt->bindParam(":fechaDePago", $fechaDePago);
          error_log("Client ID: ". $_SESSION['ClienteId']);
          error_log("Cuenta remitente: ". $cuentaRemitente);
          error_log("Tipo cuenta remitente: ". $tipoCuentaRemitente);
          error_log("Entidad bancaria remitente: ". $entidadBancariaRemitente);
          error_log("Cuenta destinatario: ". $cuentaDestinatario);
          error_log("Tipo cuenta destinatario: ". $tipoCuentaDestinatario);
          error_log("Entidad bancaria destinatario: ". $entidadBancariaDestinatario);
          error_log("Monto: ". $monto);
          error_log("Motivo: ". $motivo);
          error_log("Tipo: ". $tipo);
          error_log("PrestamoId: ". $prestamoId);
          error_log("Ruta de Voucher: ". $voucher_path);
          error_log("Fecha de pago: ". $fechaDePago);
          // Attempt to execute the prepared statement
          if ($stmt->execute()) {
              // Redirect back to the page with success message
              $pago = $db->lastInsertId();
              error_log("{$pago}e");
              header("location: detalle_prestamo.php?id=".$prestamoId);
              exit();
          } else {
              // Redirect back to the page with error message
          error_log("error doing query");
          }
      }
/*
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
            header("detalle_inversion.php?id=".$inversionId."&error=1");
            exit();
        }
    }
  } else {
    error_log("all ID was null");
    error_log($prestamoId);
    error_log($inversionId);
    error_log($participacionId);
  }
    */
    
}
?>
