<?php
// Include the database connection file
require('../includes/config.php');

if ($user->is_logged_in() && !$_SESSION['isAdmin']) {
  header('Location: http://localhost/ClientsApplicationsandProducts/clients/index.php');
  exit();  
} elseif (!$user->is_logged_in()) {
  header('Location: http://localhost/ClientsApplicationsandProducts/index.php');
  exit();  
}


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_log("we got post");
    // Retrieve form data
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $cedula = $_POST['cedula'];
    $rnc = $_POST['rnc'];
    $monto_solicitado = $_POST['monto_solicitado'];
    $interes = $_POST['interes'];
    $monto_deuda = $_POST['monto_deuda'];
    $reenganchado = $_POST['reenganchado'];
    $puntos = $_POST['puntos'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $fecha_salida = $_POST['fecha_salida'];
    $fecha_salida = !empty($_POST['fecha_salida']) ? $_POST['fecha_salida'] : null;
    $meses_en_empresa = $_POST['meses_en_empresa'];
    $total_prestado = $_POST['total_prestado'];
    error_log($_POST['nombre']);
    error_log($_POST['apellido']);
    error_log($_POST['direccion']);
    error_log($_POST['cedula']);
    error_log($_POST['rnc']);
    error_log($_POST['monto_solicitado']);
    error_log($_POST['interes']);
    error_log($_POST['monto_deuda']);
    error_log($_POST['reenganchado']);
    error_log($_POST['puntos']);
    error_log($_POST['fecha_ingreso']);
    error_log($_POST['fecha_salida']);
    error_log($_POST['meses_en_empresa']);
    error_log($_POST['total_prestado']);
    // Add more fields as needed

    // Prepare an insert statement
    $sql = "INSERT INTO clientes (Nombre, Apellido, Direccion, Cedula, RNC, MontoSolicitado, Interes, MontoDeuda, Reenganchado, Puntos, FechaIngreso, FechaSalida, MesesEnEmpresa, TotalPrestado)
            VALUES (:nombre, :apellido, :direccion, :cedula, :rnc, :monto_solicitado, :interes, :monto_deuda, :reenganchado, :puntos, :fecha_ingreso, :fecha_salida, :meses_en_empresa, :total_prestado)";
    
    if ($stmt = $db->prepare($sql)) {
        error_log("to frio bro");
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":apellido", $apellido);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":cedula", $cedula);
        $stmt->bindParam(":rnc", $rnc);
        $stmt->bindParam(":monto_solicitado", $monto_solicitado);
        $stmt->bindParam(":interes", $interes);
        $stmt->bindParam(":monto_deuda", $monto_deuda);
        $stmt->bindParam(":reenganchado", $reenganchado);
        $stmt->bindParam(":puntos", $puntos);
        $stmt->bindParam(":fecha_ingreso", $fecha_ingreso);
        $stmt->bindParam(":fecha_salida", $fecha_salida);
        $stmt->bindParam(":meses_en_empresa", $meses_en_empresa);
        $stmt->bindParam(":total_prestado", $total_prestado);
        // Bind more variables as needed

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            error_log("to bien");
            // Redirect back to clients.php with success message
            header("location: clients.php?success=1");
            exit();
        } else {
            error_log("bro hubo bobo");
            // Redirect back to clients.php with error message
            header("location: clients.php?error=1");
            exit();
        }
    }
}
?>
