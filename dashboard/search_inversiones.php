<?php
require('../includes/config.php');

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
if (isset($_POST['searchText'], $_POST['searchField'])) {
    // Get the search parameters
    $searchText = $_POST['searchText'];
    $searchField = $_POST['searchField'];

    // Assuming you have a PDO connection named $db
    // Perform the search based on the selected field
    $stmt = $db->prepare("SELECT * FROM inversiones WHERE $searchField LIKE :searchText");
    $stmt->bindValue(':searchText', "%$searchText%", PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the search results
    foreach ($results as $result) {
        echo '<p>' . $result['Id'] . ' - ' . $result['Beneficiario'] . ' - ' . $result['Motivo'] . ' - ' . $result['Status'] . ' - ' . $result['IdCliente'] . ' - ' . $result['Remitente'] . '</p>';
    }
} else {
    // Handle the case where the form is not submitted correctly
    echo "Search parameters are missing.";
}
?>
