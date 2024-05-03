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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $motivo = isset($_POST['motivo']) ? $_POST['motivo'] : null ;
    $tipoDeInversion = isset($_POST['tipoDeInversion']) ? $_POST['tipoDeInversion'] : null ;
    $montoDividendoEsperado = isset($_POST['montoDividendoEsperado']) ? $_POST['montoDividendoEsperado'] : 0 ;
    $periodicidadDividendo = isset($_POST['periodicidadDividendo']) ? $_POST['periodicidadDividendo'] : null ;
    $fechaPagoDividendo = isset($_POST['fechaPagoDividendo']) ? $_POST['fechaPagoDividendo'] : null ;
    $montoBono = isset($_POST['montoBono']) && !empty($_POST['montoBono']) ? $_POST['montoBono'] : 0.00 ;
  error_log("wepaww".$montoBono);
    $tasaInteresBono = isset($_POST['tasaInteresBono']) ? $_POST['tasaInteresBono'] : null ;
    $plazoBono = isset($_POST['plazoBono']) ? $_POST['plazoBono'] : null ;
    $periodicidadInteres = isset($_POST['periodicidadInteres']) ? $_POST['periodicidadInteres'] : null ;
    $fechaPagoInteres =isset($_POST['fechaPagoInteres']) ? $_POST['fechaPagoInteres'] : null ;
    //$montoFondoInversion = $_POST['montoFondoInversion'];
    //$tarifaAdministracion = $_POST['tarifaAdministracion'];
    //$periodicidadTarifaAdm = $_POST['periodicidadTarifaAdm'];
    //$cantParticipacion = $_POST['cantParticipacion'];
    //$participacionId = $_POST['participacionId'];
    $rendimientoTotal = isset($_POST['rendimientoTotal']) ? $_POST['rendimientoTotal'] : null ;
    $status = isset($_POST['status']) ? $_POST['status'] : null ;
    $pagoId = isset($_POST['pagoId']) ? $_POST['pagoId'] : null ;
    $fechaPagoInicialInversion = isset($_POST['fechaPagoInicialInversion']) ? $_POST['fechaPagoInicialInversion'] : null ;
    $fechaFinalInversion = isset($_POST['fechaFinalInversion']) ? $_POST['fechaFinalInversion'] : null ;
    $fechaDeAprobacion = isset($_POST['fechaDeAprobacion']) ? $_POST['fechaDeAprobacion'] : null ;

    

    // Prepare an insert statement
    $sql = "INSERT INTO inversiones (Motivo, TipoDeInversion, MontoDividendoEsperado, PeriodicidadDividendo, FechaPagoDividendo, MontoBono, TasaInteresBono, PlazoBono, PeriodicidadInteres, FechaPagoInteres, RendimientoTotal, Status, PagoId, FechaPagoInicialInversion, FechaFinalInversion, FechaDeAprobacion)
            VALUES (:motivo, :tipoDeInversion, :montoDividendoEsperado, :periodicidadDividendo, :fechaPagoDividendo, :montoBono, :tasaInteresBono, :plazoBono, :periodicidadInteres, :fechaPagoInteres, :rendimientoTotal, :status, :pagoId, :fechaPagoInicialInversion, :fechaFinalInversion, :fechaDeAprobacion)";
    
    if ($stmt = $db->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":motivo", $motivo);
        $stmt->bindParam(":tipoDeInversion", $tipoDeInversion);
        $stmt->bindParam(":montoDividendoEsperado", $montoDividendoEsperado);
        $stmt->bindParam(":periodicidadDividendo", $periodicidadDividendo);
        $stmt->bindParam(":fechaPagoDividendo", $fechaPagoDividendo);
        $stmt->bindParam(":montoBono", $montoBono);
        $stmt->bindParam(":tasaInteresBono", $tasaInteresBono);
        $stmt->bindParam(":plazoBono", $plazoBono);
        $stmt->bindParam(":periodicidadInteres", $periodicidadInteres);
        $stmt->bindParam(":fechaPagoInteres", $fechaPagoInteres);
        $stmt->bindParam(":rendimientoTotal", $rendimientoTotal);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":pagoId", $pagoId);
        $stmt->bindParam(":fechaPagoInicialInversion", $fechaPagoInicialInversion);
        $stmt->bindParam(":fechaFinalInversion", $fechaFinalInversion);
        $stmt->bindParam(":fechaDeAprobacion", $fechaDeAprobacion);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect back to inversiones.php with success message
            header("location: inversiones.php?success=1");
            exit();
        } else {
            // Redirect back to inversiones.php with error message
            header("location: inversiones.php?error=1");
            exit();
        }
    }
}
?>
