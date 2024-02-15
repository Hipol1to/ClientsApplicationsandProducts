<?php
require('../includes/config.php');
if (!$user->is_logged_in()) { 
	header('Location: ../index.php'); 
	// exit(); 
}

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    // Get the ID parameter
    $id = $_GET['id'];

    // Assuming you have a PDO connection named $db
    // Prepare and execute the query to fetch cliente details by ID
    $stmt = $db->prepare("SELECT * FROM clientes WHERE Id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if cliente details are found
    if ($cliente) {
        // Return cliente details as JSON response
        echo json_encode($cliente);
    } else {
        // Return error message if cliente details are not found
        echo json_encode(array('error' => 'Cliente not found'));
    }
} else {
    // Return error message if ID parameter is missing
    echo json_encode(array('error' => 'ID parameter is missing'));
}
?>
