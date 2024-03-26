<?php
require('../includes/config.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['cedula']) && isset($_POST['rnc'])) {
        // Retrieve form data
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";
        $cedula = $_POST['cedula'];
        $rnc = $_POST['rnc'];

        // Check if both front and back photos of the ID card are uploaded
        if (
            isset($_FILES['subir_foto_cedula_frontal']) && 
            $_FILES['subir_foto_cedula_frontal']['error'] === UPLOAD_ERR_OK &&
            isset($_FILES['subir_foto_cedula_posterior']) && 
            $_FILES['subir_foto_cedula_posterior']['error'] === UPLOAD_ERR_OK
        ) {
            // Define upload directory
            $upload_directory = "uploads/";

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
            // Prepare SQL statement to insert data into the clientes table
            $stmt = $db->prepare("INSERT INTO clientes (Nombre, Apellido, Direccion, Cedula, CedulaPath, RNC, FechaCreacion, FechaModificacion) 
                                   VALUES (:nombre, :apellido, :direccion, :cedula, :cedula_path, :rnc, NOW(), NOW())");
            
            // Bind parameters
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':cedula_path', $cedula_path_mixed);
            $stmt->bindParam(':rnc', $rnc);
            
            // Execute the statement
            $stmt->execute();
            
            echo 'guay mi madre';
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
