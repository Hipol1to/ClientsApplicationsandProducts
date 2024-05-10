<?php
require('../includes/config.php');

// Check if the user is logged in
if ($user->is_logged_in() && !$_SESSION['isAdmin'] && $_SESSION['isProffileValidated'] && $_SESSION['isUserActive']) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProductsSANDBOX/clients/index.php');
  exit();  
} elseif (!$user->is_logged_in()) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProductsSANDBOX/index.php');
  exit();  
} elseif (!isset($_SESSION['ClienteId'])) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProductsSANDBOX/clients/completa_perfil.php');
  exit();
}

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    // Get the ID parameter
    $id = $_GET['id'];

    // Prepare and execute the query to fetch pago details by ID
    $stmt = $db->prepare("SELECT * FROM pagos WHERE Id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $pago = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if pago details are found
    if ($pago) {
        // Return pago details as JSON response
        echo json_encode($pago);
    } else {
        // Return error message if pago details are not found
        echo json_encode(array('error' => 'Pago not found'));
    }
} else {
    // Return error message if ID parameter is missing
    echo json_encode(array('error' => 'ID parameter is missing'));
}
?>
