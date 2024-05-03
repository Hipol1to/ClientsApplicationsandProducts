<?php
// Include the database connection file
require('../includes/config.php');

if ($user->is_logged_in() && !$_SESSION['isAdmin'] && $_SESSION['isProffileValidated'] && $_SESSION['isUserActive']) {
  header('Location: https://inversioneseverest.net/clients/index.php');
  exit();  
} elseif (!$user->is_logged_in()) {
  header('Location: https://inversioneseverest.net/index.php');
  exit();  
} elseif (!isset($_SESSION['ClienteId'])) {
  header('Location: https://inversioneseverest.net/clients/completa_perfil.php');
  exit();
}
// Check if the ID parameter is set
if (isset($_POST['id'])) {
    // Get the ID from the POST data
    $id = $_POST['id'];

    try {
        // Prepare and execute the SQL delete statement
        $stmt = $db->prepare("DELETE FROM prestamos WHERE Id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Check if any rows were affected
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            // Respond with success message
            error_log(json_encode(['status' => 'success', 'message' => 'Record deleted successfully.']));
            echo json_encode(['status' => 'success', 'message' => 'Record deleted successfully.']);
        } else {
            // Respond with error message if no rows were affected
            error_log(json_encode(['status' => 'error', 'message' => 'No records deleted.']));
            echo json_encode(['status' => 'error', 'message' => 'No records deleted.']);
        }
    } catch (PDOException $e) {
        // Handle database errors
        error_log(json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]));
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    // Respond with error message if ID parameter is not set
    error_log(json_encode(['status' => 'error', 'message' => 'Invalid request.']));
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>
