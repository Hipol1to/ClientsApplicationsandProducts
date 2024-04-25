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
    $tipoCuentaRemitente = $_POST['addTipoCuentaRemitente'];
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
              $motivo = "Pago de préstamo del usuario ". $_SESSION['username'];
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

              $sql2 = "SELECT * FROM prestamos AS p
                      WHERE p.Id = :id";
            $stmt2 = $db->prepare($sql2);
            $stmt2->bindParam(':id', $prestamoId);
            error_log($sql2);
            $stmt2->execute();
            $erPrestamo = $stmt2->fetch(PDO::FETCH_ASSOC);
            $montoPagoMensual = (float)$erPrestamo['MontoPagoMensual'] - $monto;
            $montoPendiente = (float)$erPrestamo['MontoPendiente'] - $monto;
            $montoPagado = isset($erPrestamo['MontoPagado']) ? (float)$erPrestamo['MontoPagado']: 0.00;
            $newMontoPagado = $montoPagado + $monto;
            $numbers = getSortedDiasDePagoDelMes($erPrestamo['DiasDePagoDelMes']);
            error_log("primerow: ".$numbers[0]);
            $newFechaDePagoMensual = getNextFechaDePagoMensual($numbers, $fechaDePago);
            error_log("nueva fecha".$newFechaDePagoMensual);

            $sql = "UPDATE prestamos SET 
                                PagoId = :idPago,
                                FechaPagoMensual = :fechaPagoMensual,
                                MontoPagoMensual = :montoPagoMensual,
                                MontoPendiente = :montoPendiente,
                                MontoPagado = :montoPagado
                                WHERE Id = :id";
    
            if ($stmt = $db->prepare($sql)) {
                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(":idPago", $pago);
                $stmt->bindParam(":fechaPagoMensual", $newFechaDePagoMensual);
                $stmt->bindParam(":montoPagoMensual", $montoPagoMensual);
                $stmt->bindParam(":montoPendiente", $montoPendiente);
                $stmt->bindParam(":montoPagado", $newMontoPagado);
                $stmt->bindParam(":id", $prestamoId);
                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    error_log("sejcuto");
                    $sqlClient = "SELECT * FROM Clientes WHERE Id = ". $_SESSION['ClienteId'];
                    $resultClient = $db->query($sqlClient);
                    $clienteRecord = $resultClient->fetch(PDO::FETCH_ASSOC);


                    
                    $montoTotalPagadoValue = isset($clienteRecord['MontoTotalPagado']) ? (float)$clienteRecord['MontoTotalPagado'] : 0.00;
                    $newMontoTotalPagado = (float)$montoTotalPagadoValue + $monto;
                        
                    $sqlCliente = "UPDATE Clientes 
                                  SET MontoTotalPagado = ".$newMontoTotalPagado."
                    WHERE Id = ". $_SESSION['ClienteId'];
                    $resultCliente = $db->query($sqlCliente);
                    $clienteRecord = $resultCliente->fetch(PDO::FETCH_ASSOC);


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




              header("location: detalle_prestamo.php?id=".$prestamoId);
              exit();
          } else {
              // Redirect back to the page with error message
          error_log("error doing query");
          }
      }
    }
    function getSortedDiasDePagoDelMes($diasDePagoDelMes) {
        $diasDePagoArray = explode(",", $diasDePagoDelMes);
        $numbers = array();
            foreach ($diasDePagoArray as $string) {
                preg_match_all('!\d+!', $string, $matches);
                foreach ($matches[0] as $match) {
                    $numbers[] = (int) $match;
                }
            }
            // Sort the numbers in ascending order
            sort($numbers);
        return $numbers;
      }
      function getNextFechaDePagoMensual($sortedDiasDePagoArray, $fechaDePago){
            $sortedDiasDePago = $sortedDiasDePagoArray;

            $dateString = $fechaDePago;
            $fechaDePagoMensual = null;
            $isFechaDePagoDefined = false;
            
            for ($i=0; $i < count($sortedDiasDePago); $i++) { 
                $lowestDay = $sortedDiasDePago[$i]; // New day value

                // Create a DateTime object from the date string
                $date = new DateTime($dateString);

                // Set the new day value
                $date->setDate($date->format('Y'), $date->format('m'), $lowestDay);
                error_log("las fecha: ".$date->format('Y-m-d H:i:s'));

                // Format the modified date as a string
                $possibleFechaDePagoMensual = $date->format('Y-m-d');
                error_log("possible fecha de pago: ".$possibleFechaDePagoMensual);
                $formattedFechaDePago = new DateTime($fechaDePago);
                error_log("formatted fecha de pago: ".$formattedFechaDePago->format('Y-m-d'));

                if (!$isFechaDePagoDefined) {
                  if ($possibleFechaDePagoMensual > $formattedFechaDePago) {
                    // Create a DateTime object from the date string
                    $dateObj = new DateTime($possibleFechaDePagoMensual);
                  
                    // Get the modified date as a string
                    $fechaDePagoMensual = $dateObj->format('Y-m-d');
                    error_log("fercha pago mensual: " . $fechaDePagoMensual);
                    $isFechaDePagoDefined = true;
                    return $fechaDePagoMensual;
                  } else {
                    //date time object
                    $dateObj = new DateTime($possibleFechaDePagoMensual);
                  
                    // Add one month to the date
                    $dateObj->modify('+1 month');
                    error_log("fecha con un mes mas: " . $dateObj->format('Y-m-d'));


                    $fechaDePagoMensual = $dateObj;
                    error_log("fercha pago mensuala: " . $fechaDePagoMensual->format('Y-m-d'));
                    if($i == $i < count($sortedDiasDePago) -1) {
                      $fechaDePagoMensual->setDate($date->format('Y'), $date->format('m'), $sortedDiasDePago[0]);
                      error_log("fercha pago mensuala: " . $fechaDePagoMensual->format('Y-m-d'));
                      return $fechaDePagoMensual->format('Y-m-d');
                    }
                    
                  }
                }
            }
      }
?>
