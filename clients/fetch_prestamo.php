<?php
require('../includes/config.php');

// Check if the user is logged in
if ($user->is_logged_in() && $_SESSION['isAdmin'] && $_SESSION['isProffileValidated'] && $_SESSION['isUserActive'] && isset($_SESSION['ClienteId'])) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProducts/dashboard/index.php');
  exit();  
} elseif (!isset($_SESSION['ClienteId']) && $user->is_logged_in()) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProducts/clients/completa_perfil.php');
  exit();
} elseif (!$user->is_logged_in()) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProducts/index.php');
  exit();
}

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    // Get the ID parameter
    $id = $_GET['id'];

    // Prepare and execute the query to fetch prestamo details by ID
    $stmt = $db->prepare("SELECT * FROM prestamos WHERE Id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $prestamo = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if prestamo details are found
    if ($prestamo) {
        // Return prestamo details as JSON response
        echo json_encode($prestamo);
    } else {
        // Return error message if prestamo details are not found
        echo json_encode(array('error' => 'Prestamo not found'));
    }
} else {
    // Return error message if ID parameter is missing
    echo json_encode(array('error' => 'ID parameter is missing'));
}
?>
