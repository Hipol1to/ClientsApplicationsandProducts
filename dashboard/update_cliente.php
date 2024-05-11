<?php
// Include the database connection file
require('../includes/config.php');

if ($user->is_logged_in() && !$_SESSION['isAdmin'] && $_SESSION['isProffileValidated'] && $_SESSION['isUserActive']) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProducts/clients/index.php');
  exit();  
} elseif (!$user->is_logged_in()) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProducts/index.php');
  exit();  
} elseif (!isset($_SESSION['ClienteId'])) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProducts/clients/completa_perfil.php');
  exit();
}

// Check if the form is submitted and values are set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editId']) && !isset($_POST['idCliente'])) {
    // Get the data from the POST request
    $editId = $_POST['editId'];
    $editNombre = $_POST['editNombre'];
    $editApellido = $_POST['editApellido'];
    $editDireccion = $_POST['editDireccion'];
    $editCedula = $_POST['editCedula'];
    $editRNC = $_POST['editRNC'];
    $editMontoSolicitado = $_POST['editMontoSolicitado'];
    $editInteres = $_POST['editInteres'];
    $editMontoDeuda = $_POST['editMontoDeuda'];
    $editReenganchado = $_POST['editReenganchado'];
    $editPuntos = $_POST['editPuntos'];
    $editFechaIngreso = $_POST['editFechaIngreso'];
    $editFechaSalida = !empty($_POST['editFechaSalida']) ? $_POST['editFechaSalida'] : null;
    $editMesesEnEmpresa = $_POST['editMesesEnEmpresa'];
    $editTotalPrestado = $_POST['editTotalPrestado'];


    error_log("Received data:");
    error_log("editId: " . $editId);
    error_log("editNombre: " . $editNombre);
    error_log("editApellido: " . $editApellido);
    // Assuming you have a PDO connection named $db
    try {
        // Prepare and execute the SQL update statement
        $stmt = $db->prepare("UPDATE clientes SET 
                                Nombre = :nombre, 
                                Apellido = :apellido, 
                                Direccion = :direccion, 
                                Cedula = :cedula, 
                                RNC = :rnc, 
                                MontoSolicitado = :montoSolicitado, 
                                Interes = :interes, 
                                MontoDeuda = :montoDeuda, 
                                Reenganchado = :reenganchado, 
                                Puntos = :puntos, 
                                FechaIngreso = :fechaIngreso, 
                                FechaSalida = :fechaSalida, 
                                MesesEnEmpresa = :mesesEnEmpresa, 
                                TotalPrestado = :totalPrestado 
                                WHERE Id = :id");
        $stmt->bindParam(':nombre', $editNombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $editApellido, PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $editDireccion, PDO::PARAM_STR);
        $stmt->bindParam(':cedula', $editCedula, PDO::PARAM_STR);
        $stmt->bindParam(':rnc', $editRNC, PDO::PARAM_STR);
        $stmt->bindParam(':montoSolicitado', $editMontoSolicitado, PDO::PARAM_STR);
        $stmt->bindParam(':interes', $editInteres, PDO::PARAM_STR);
        $stmt->bindParam(':montoDeuda', $editMontoDeuda, PDO::PARAM_STR);
        $stmt->bindParam(':reenganchado', $editReenganchado, PDO::PARAM_INT);
        $stmt->bindParam(':puntos', $editPuntos, PDO::PARAM_INT);
        $stmt->bindParam(':fechaIngreso', $editFechaIngreso, PDO::PARAM_STR);
        $stmt->bindParam(':fechaSalida', $editFechaSalida, PDO::PARAM_STR);
        $stmt->bindParam(':mesesEnEmpresa', $editMesesEnEmpresa, PDO::PARAM_INT);
        $stmt->bindParam(':totalPrestado', $editTotalPrestado, PDO::PARAM_STR);
        $stmt->bindParam(':id', $editId, PDO::PARAM_INT);

        $stmt->execute();

        // Check if the update was successful
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Record updated successfully.']);
            error_log(json_encode(['status' => 'success', 'message' => 'Record updated successfully.']));
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No records updated.']);
            error_log(json_encode(['status' => 'error', 'message' => 'No records updated.']));
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage() . ', Fields: ' . json_encode($_POST)]);
        error_log(json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage() . ', Fields: ' . json_encode($_POST)]));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idCliente'])) {
  try {
    //code...
  
  $clientIdToUpdate = $_POST['idCliente'];
  error_log("id to udate" . $clientIdToUpdate);
  $isPerfilValidado = $_POST['isPerfilValidado'];
  error_log("isperfil validado" . $isPerfilValidado);

  $stmt = $db->prepare("UPDATE clientes SET 
                                PerfilValidado = :totalPrestado 
                                WHERE Id = :id");
        $stmt->bindParam(':id', $clientIdToUpdate, PDO::PARAM_STR);
        $stmt->bindParam(':totalPrestado', $isPerfilValidado, PDO::PARAM_STR);

        
        $stmt->execute();

        // Check if the update was successful
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Record updated successfully.']);
            error_log(json_encode(['status' => 'success', 'message' => 'Record updated successfully.']));
            header("location: detalle_perfil.php?id=".$clientIdToUpdate."&success=1");
            exit();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No records updated.']);
            error_log(json_encode(['status' => 'error', 'message' => 'No records updated.']));
            header("location: detalle_prestamo.php?id=".$idPrestamo."&error=1");
            exit();
        }
        } catch (PDOException $e) {
    // Handle database errors
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage() . ', Fields: ' . json_encode($_POST)]);
        error_log(json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage() . ', Fields: ' . json_encode($_POST)]));
  }
} else {
    // Handle the case where the form is not submitted correctly
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
    error_log(json_encode(['status' => 'error', 'message' => 'Invalid request.']));
}
?>
