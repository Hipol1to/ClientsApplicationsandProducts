<?php
// Include the database connection file
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $idInversion = $_POST['addIdInversion'];
    $descripcionParticipacion = $_POST['addDescripcion'];
    $montoInvertido = $_POST['addMontoInvertido'];
    $rendimientoEsperado = $_POST['addRendimientoEsperado'];
    $fechaInicioParticipacion = $_POST['addFechaInicioParticipacion'];
    $fechaFinParticipacion = $_POST['addFechaFinalParticipacion'];

    // Prepare an insert statement
    $sql = "INSERT INTO participaciones (IdInversion, DescripcionParticipacion, MontoInvertido, RendimientoEsperado, FechaInicioParticipacion, FechaFinParticipacion)
            VALUES (:idInversion, :descripcionParticipacion, :montoInvertido, :rendimientoEsperado, :fechaInicioParticipacion, :fechaFinParticipacion)";
    
    if ($stmt = $db->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":idInversion", $idInversion);
        $stmt->bindParam(":descripcionParticipacion", $descripcionParticipacion);
        $stmt->bindParam(":montoInvertido", $montoInvertido);
        $stmt->bindParam(":rendimientoEsperado", $rendimientoEsperado);
        $stmt->bindParam(":fechaInicioParticipacion", $fechaInicioParticipacion);
        $stmt->bindParam(":fechaFinParticipacion", $fechaFinParticipacion);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect back to the page with success message
            $lastParticipacionId = $db->lastInsertId();
            error_log($lastParticipacionId);
        } else {
            // Redirect back to the page with error message
        }
    }

    // Prepare an update statement for inversion
    $sql = "UPDATE inversiones SET  
                                ParticipacionId = :idParticipacion 
                                WHERE Id = :idInversion";
    
    if ($stmt = $db->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":idParticipacion", $lastParticipacionId);
        $stmt->bindParam(":idInversion", $idInversion);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect back to the page with success message
            header("location: detalle_inversion.php?id=".$idInversion."&success=1");
            exit();
        } else {
            // Redirect back to the page with error message
            header("detalle_inversion.php?id=".$idInversion."&error=1");
            error_log("hubo bobo añadiendo la participacion, precisamente ejecutando el query");
            exit();
        }
    }
}
?>
