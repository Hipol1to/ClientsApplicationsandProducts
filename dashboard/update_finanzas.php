<?php
// Include the database connection file
require('../includes/config.php');

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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $dineroencaja = $_POST['dineroencaja'];
    $dineroinvertido = $_POST['dineroinvertido'];
    $dineroenprestamos = $_POST['dineroenprestamos'];

    // Prepare an update statement
    $sql = "UPDATE finanzas SET dineroencaja = :dineroencaja, dineroinvertido = :dineroinvertido, dineroenprestamos = :dineroenprestamos";

    if ($stmt = $db->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":dineroencaja", $dineroencaja);
        $stmt->bindParam(":dineroinvertido", $dineroinvertido);
        $stmt->bindParam(":dineroenprestamos", $dineroenprestamos);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect back to the page with success message
            header("location: http://blackestencio.zapto.org/ClientsApplicationsandProductsSANDBOX/dashboard/index.php?success=1");
            exit();
        } else {
            // Redirect back to the page with error message
            header("location: http://blackestencio.zapto.org/ClientsApplicationsandProductsSANDBOX/dashboard/index.php?error=1");
            exit();
        }
    }
}
?>
