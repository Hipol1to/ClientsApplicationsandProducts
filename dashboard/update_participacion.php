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
} else {
  header('Location: http://localhost/ClientsApplicationsandProducts/index.php');
  exit();
}

// Check if the form is submitted and values are set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editId'])) {
    // Get the data from the POST request
    $editId = $_POST['editId'];
    $editIdInversion = $_POST['editIdInversion'];
    $editIdCliente = $_POST['editIdCliente'];
    $editDescripcionParticipacion = $_POST['editDescripcionParticipacion'];
    $editMontoInvertido = $_POST['editMontoInvertido'];
    $editRendimientoEsperado = $_POST['editRendimientoEsperado'];
    $editFechaInicioParticipacion = $_POST['editFechaInicioParticipacion'];
    $editFechaFinParticipacion = !empty($_POST['editFechaFinParticipacion']) ? $_POST['editFechaFinParticipacion'] : null;
    // Assuming you have a PDO connection named $db
    try {
        // Prepare and execute the SQL update statement
        $stmt = $db->prepare("UPDATE participaciones SET 
                                IdInversion = :idInversion, 
                                IdCliente = :idCliente, 
                                DescripcionParticipacion = :descripcionParticipacion, 
                                MontoInvertido = :montoInvertido, 
                                RendimientoEsperado = :rendimientoEsperado, 
                                FechaInicioParticipacion = :fechaInicioParticipacion, 
                                FechaFinParticipacion = :fechaFinParticipacion 
                                WHERE Id = :id");
        $stmt->bindParam(':idInversion', $editIdInversion, PDO::PARAM_INT);
        $stmt->bindParam(':idCliente', $editIdCliente, PDO::PARAM_INT);
        $stmt->bindParam(':descripcionParticipacion', $editDescripcionParticipacion, PDO::PARAM_STR);
        $stmt->bindParam(':montoInvertido', $editMontoInvertido, PDO::PARAM_STR);
        $stmt->bindParam(':rendimientoEsperado', $editRendimientoEsperado, PDO::PARAM_STR);
        $stmt->bindParam(':fechaInicioParticipacion', $editFechaInicioParticipacion, PDO::PARAM_STR);
        $stmt->bindParam(':fechaFinParticipacion', $editFechaFinParticipacion, PDO::PARAM_STR);
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
  error_log($_POST['editId']);
}
?>
