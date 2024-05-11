<?php
require('../includes/config.php');

// Check if the user is logged in
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

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    // Get the ID parameter
    $id = $_GET['id'];

    // Prepare and execute the query to fetch participacion details by ID
    $stmt = $db->prepare("SELECT * FROM participaciones WHERE Id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $participacion = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if participacion details are found
    if ($participacion) {
        // Return participacion details as JSON response
        echo json_encode($participacion);
    error_log(json_encode($participacion));
    } else {
        // Return error message if participacion details are not found
        echo json_encode(array('error' => 'Participacion not found'));
    }
} else {
    // Return error message if ID parameter is missing
    echo json_encode(array('error' => 'ID parameter is missing'));
}
?>
