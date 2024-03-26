<?php
require('includes/config.php');

//collect values from the url
$userId = trim($_GET['x']);
$active = trim($_GET['y']);
error_log($userId);
error_log($active);

// If Id is a number and the active token is not empty, carry on
if (is_numeric($userId) && !empty($active)) {
    error_log("estoy dentro");
    // Update users record set the Active column to 'Yes' where the Id and Active value match the ones provided in the array
    $stmt = $db->prepare("UPDATE usuarios SET Active = 1 WHERE Id = :userId AND Active = :active");
    $stmt->execute(array(
        ':userId' => $userId,
        ':active' => 0
    ));

    // If the row was updated, redirect the user
    if ($stmt->rowCount() == 1) {
        // Redirect to login page
        header('Location: login.php?action=active');
        exit;
    } else {
        echo "Tu cuenta no pudo ser activada. Quizás este enlace ha expirado.";
    }
}

?>