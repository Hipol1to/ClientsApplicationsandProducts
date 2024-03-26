<?php
// Include the database connection file
require('../includes/config.php');

if ($user->is_logged_in() && !$_SESSION['isAdmin'] && $_SESSION['isProffileValidated'] && $_SESSION['isUserActive']) {
  header('Location: http://localhost/ClientsApplicationsandProducts/clients/index.php');
  exit();  
} elseif (!$user->is_logged_in()) {
  header('Location: http://localhost/ClientsApplicationsandProducts/index.php');
  exit();  
}

// Get the input query parameter
$q = $_REQUEST["q"];

// Perform a database query to fetch usuarios that match the query
$sql = "SELECT * FROM usuarios WHERE usuario LIKE ?";
$stmt = $db->prepare($sql);
$stmt->execute(["%$q%"]);

// Check if there are any rows returned
if ($stmt->rowCount() > 0) {
    // Fetch and output the suggestions as dropdown options
    echo "<a href='#'>";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='option' href='#'>" . $row["Usuario"] . "</div>";
    }
    echo "</a>";
} else {
    echo "<div style='color:red;'>No se han encontrado usuarios</div>";
}
?>