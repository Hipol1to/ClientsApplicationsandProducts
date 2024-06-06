<?php
require('../includes/config.php');

error_log("validations to the process");
if ($user->is_logged_in() && $_SESSION['isAdmin'] && $_SESSION['isProffileValidated'] && $_SESSION['isUserActive'] && isset($_SESSION['ClienteId']) && !$_SESSION['isProffileInReview']) {
  error_log("[PROCESS]you are an admin");
  header('Location: https://inversioneseverest.net/dashboard/index.php');
  exit();  
} elseif ($_SESSION['isProffileInReview'] && $user->is_logged_in()) {
  error_log("[PROCESS]you already sent your proffile");
  header('Location: https://inversioneseverest.net/clients/gracias_por_completar.php');
  exit();
} elseif (!$user->is_logged_in()) {
  error_log("[PROCESS]you are not logged in");
  header('Location: https://inversioneseverest.net/index.php');
  exit();
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  error_log("-----complete proffile process-----");
    // Check if all required fields are filled
    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['cedula'])) {
        // Retrieve form data
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";
        $cedula = $_POST['cedula'];
        $rnc = isset($_POST['rnc']) ? $_POST['rnc'] : null ;
        $noCelular = $_POST['clienteCelular'];

        // Check if both front and back photos of the ID card are uploaded
        if (
            isset($_FILES['subir_foto_cedula_frontal']) && 
            $_FILES['subir_foto_cedula_frontal']['error'] === UPLOAD_ERR_OK &&
            isset($_FILES['subir_foto_cedula_posterior']) && 
            $_FILES['subir_foto_cedula_posterior']['error'] === UPLOAD_ERR_OK
        ) {
            // Define upload directory
            $upload_directory = __DIR__ . "/uploads/";

            // Generate unique file names for both photos
            $front_file_name = uniqid() . '_front_' . $_FILES['subir_foto_cedula_frontal']['name'];
            $back_file_name = uniqid() . '_back_' . $_FILES['subir_foto_cedula_posterior']['name'];

            // Move uploaded files to the upload directory
            move_uploaded_file($_FILES['subir_foto_cedula_frontal']['tmp_name'], $upload_directory . $front_file_name);
            move_uploaded_file($_FILES['subir_foto_cedula_posterior']['tmp_name'], $upload_directory . $back_file_name);

            // Now you can save the file names or their paths to the database
            // Construct the full paths to the uploaded files
            $front_cedula_path = $upload_directory . $front_file_name;
            $back_cedula_path = $upload_directory . $back_file_name;
        } else {
            // Handle the case where the file uploads failed
            $front_cedula_path = ""; // Set an empty path for front photo
            $back_cedula_path = ""; // Set an empty path for back photo
        }

        // Perform database operations to save the user's profile data
        // For demonstration purpose, I'm assuming you're using PDO for database operations
        try {
            $cedula_path_mixed = $front_cedula_path."_.d1vis10n._".$back_cedula_path;
            error_log($cedula_path_mixed);
            if (isset($rnc)) {
              // Prepare SQL statement to insert data into the clientes table
            $queryy = "INSERT INTO clientes (IdUsuario, Nombre, Apellido, Direccion, NoCelular, Cedula, CedulaPath, RNC, PerfilValidado, FechaCreacion, FechaModificacion) 
                                               VALUES (:idusuario, :nombre, :apellido, :direccion, :noCelular, :cedula, :cedula_path, :rnc, 2, NOW(), NOW())";
              $stmt = $db->prepare($queryy);
            
            // Bind parameters
            $stmt->bindParam(':idusuario', $_SESSION['userId']);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':noCelular', $noCelular);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':cedula_path', $cedula_path_mixed);
            $stmt->bindParam(':rnc', $rnc);
            } else {
        $queryy = "INSERT INTO clientes (IdUsuario, Nombre, Apellido, Direccion, NoCelular, Cedula, CedulaPath, PerfilValidado, FechaCreacion, FechaModificacion) 
                                               VALUES (:idusuario, :nombre, :apellido, :direccion, :noCelular, :cedula, :cedula_path, 2, NOW(), NOW())";
              // Prepare SQL statement to insert data into the clientes table
              $stmt = $db->prepare($queryy);
            
            // Bind parameters
            $stmt->bindParam(':idusuario', $_SESSION['userId']);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':noCelular', $noCelular);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':cedula_path', $cedula_path_mixed);
            }
      error_log("Query: " . $queryy);
      error_log("user id: " . $_SESSION['userId']);
      error_log("apellido: " . $apellido);
      error_log("direccion: " . $direccion);
      error_log("noCelular: " . $noCelular);
      error_log("cedula: " . $cedula);
      error_log("cedula_path: " . $cedula_path);   
            
            // Execute the statement
            $stmt->execute();

            $idNewCliente = $db->lastInsertId('Id');
             $stmt = $db->prepare("UPDATE usuarios SET IdCliente = :idcliente WHERE Id = :idusuario");
            // Bind parameters
            $stmt->bindParam(':idusuario', $_SESSION['userId']);
            $stmt->bindParam(':idcliente', $idNewCliente);
            // Execute the statement
            $stmt->execute();

             $_SESSION['isProffileInReview'] = true;
            header('Location: https://inversioneseverest.net/clients/gracias_por_completar.php');
            exit();
            
            echo "Perfil completado exitosamente.";
        } catch (PDOException $e) {
            // Handle database errors
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Handle the case where required fields are not filled
        echo "Por favor, llene todos los campos obligatorios.";
    }
} else {
    // Handle the case where the form is not submitted
    echo "El formulario no fue enviado correctamente.";
}
?>
