<?php
require('../includes/config.php');

// Check if the user is logged in
if (!$user->is_logged_in()) { 
    header('Location: ../index.php'); 
    exit(); 
}

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    // Get the ID parameter
    $id = $_GET['id'];

    // Prepare and execute the query to fetch inversion details by ID
    $stmt = $db->prepare("SELECT * FROM inversiones WHERE Id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $inversion = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if inversion details are found
    if ($inversion) {
        // Return inversion details as JSON response
        echo json_encode($inversion);
    } else {
        // Return error message if inversion details are not found
        echo json_encode(array('error' => 'Inversion not found'));
    }
} else {
    // Return error message if ID parameter is missing
    echo json_encode(array('error' => 'ID parameter is missing'));
}
?>
