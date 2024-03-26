<?php
require('../includes/config.php');

if ($user->is_logged_in() && $_SESSION['isAdmin'] && $_SESSION['isProffileValidated'] && $_SESSION['isUserActive']) {
  header('Location: http://localhost/ClientsApplicationsandProducts/dashboard/index.php');
  exit();  
}

// Check if ID parameter is set
if(isset($_GET['id'])) {
    $prestamo_id = $_GET['id'];
    
    // Fetch prestamo details from the database
    $sql = "SELECT * FROM prestamos WHERE Id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $prestamo_id);
    $stmt->execute();
    $prestamo = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Check if prestamo exists
    if(!$prestamo) {
        echo "Prestamo not found!";
        exit();
    }
} else {
    echo "Prestamo ID not provided!";
    exit();
}

// Handle form submission for updating prestamo status
if(isset($_POST['actualizarStatus'])) {
    $status = $_POST['status'];
    
    // Update prestamo status in the database
    $sql = "UPDATE prestamos SET Status = :status WHERE Id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $prestamo_id);
    if($stmt->execute()) {
        echo "Status updated successfully!";
    } else {
        echo "Error updating status!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detalle Préstamo</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Bootstrap Datepicker CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     
      <!-- Messages Dropdown Menu -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Usuarios</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a class="d-block"><?php echo $_SESSION['fullname']; ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Panel Usuario
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>

                 <li class="nav-item">
                <a href="prestamos.php" class="nav-link active">
                  <i class="fas fa-handshake nav-icon"></i>
                  <p>Prestamos</p>
                </a>
                 </li>

                 <li class="nav-item">
                <a href="inversiones.php" class="nav-link">
                  <i class="fas fa-chart-line nav-icon"></i>
                  <p>Inversiones</p>
                </a>
                 </li>
                 
                 <li class="nav-item">
                <a href="pagos.php" class="nav-link">
                  <i class="fas fa-money-bill-wave nav-icon"></i>
                  <p>Pagos</p>
                </a>
                 </li>
                 <li class="nav-item">
                <a href="pagos.php" class="nav-link">
                  <i class="fas fa-user-circle nav-icon"></i>
                  <p>Perfil</p>
                </a>
                 </li>
                 </ul>
                 <ul style="position: absolute; bottom: 0;" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="../logout.php" class="nav-link" >
              <p class="text"><i class="nav-icon fas fa-sign-out-alt"></i> Cerrar Sesion</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <a href="javascript:history.go(-1);" class="btn btn-secondary btn-sm">Volver</a>

                  <div id="modalAgregarPagoForParticipacion" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar pago</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- Your form goes here -->
                <form id="editForm" action="add_pago.php" method="post">
    <div class="row">
        <!-- Group 1 -->
        <div class="col-sm-8">
            <div class="form-group">
                <label for="clientUser">Usuario cliente:</label>
                <input type="text" class="form-control" id="clientUser" name="clientUser">
                <div id="clientUserDropdown" class="dropdown-content"></div>
            </div>
            <div class="form-group">
                <label for="addCuentaRemitente">Cuenta Remitente:</label>
                <input type="text" class="form-control" id="addCuentaRemitente" name="addCuentaRemitente">
            </div>
            <div class="form-group">
                <label for="editTipoCuentaRemitente">Tipo Cuenta Remitente:</label>
                <select class="form-control" id="editTipoCuentaRemitente" name="editTipoCuentaRemitente" required>
                  <option value="" selected>--Tipo de Cuenta--</option>
                    <option value="Cuenta de ahorros">Cuenta de ahorros</option>
                    <option value="Cuenta corriente">Cuenta corriente</option>
                </select>
            </div>
            <div class="form-group">
                <label for="addEntidadBancariaRemitente">Entidad Bancaria Remitente:</label>
                <select class="form-control" id="addEntidadBancariaRemitente" name="addEntidadBancariaRemitente">
                <option value="Banreservas" selected>--Entidad Bancaria Remitente--</option>
                <option value="Banreservas">Banreservas</option>
    <option value="Banco Popular Dominicano">Banco Popular Dominicano</option>
    <option value="Banco BHD">Banco BHD</option>
    <option value="Asociación Popular de Ahorros y Préstamos">Asociación Popular de Ahorros y Préstamos</option>
    <option value="Scotiabank">Scotiabank</option>
    <option value="Banco Santa Cruz">Banco Santa Cruz</option>
    <option value="Asociación Cibao de Ahorros y Préstamos">Asociación Cibao de Ahorros y Préstamos</option>
    <option value="Banco Promerica">Banco Promerica</option>
    <option value="Banesco">Banesco</option>
    <option value="Banco Caribe">Banco Caribe</option>
    <option value="Banco Agrícola">Banco Agrícola</option>
    <option value="Asociación La Nacional de Ahorros y Préstamos">Asociación La Nacional de Ahorros y Préstamos</option>
    <option value="Citibank">Citibank</option>
    <option value="Banco BDI">Banco BDI</option>
    <option value="Banco Vimenca">Banco Vimenca</option>
    <option value="Banco López de Haro">Banco López de Haro</option>
    <option value="Bandex">Bandex</option>
    <option value="Banco Ademi">Banco Ademi</option>
    <option value="Banco Lafise">Banco Lafise</option>
    <option value="Motor Crédit Banco de Ahorro y Crédito">Motor Crédit Banco de Ahorro y Crédito</option>
    <option value="Alaver Asociación de Ahorros y Préstamos">Alaver Asociación de Ahorros y Préstamos</option>
    <option value="Banfondesa">Banfondesa</option>
    <option value="Banco Adopem">Banco Adopem</option>
    <option value="Asociación Duarte">Asociación Duarte</option>
    <option value="JMMB Bank">JMMB Bank</option>
    <option value="Asociación Mocana">Asociación Mocana</option>
    <option value="ABONAP">ABONAP</option>
    <option value="Banco Unión">Banco Unión</option>
    <option value="Banco BACC">Banco BACC</option>
    <option value="Asociación Romana">Asociación Romana</option>
    <option value="Asociación Peravia">Asociación Peravia</option>
    <option value="Banco Confisa">Banco Confisa</option>
    <option value="Leasing Confisa">Leasing Confisa</option>
    <option value="Qik Banco Digital">Qik Banco Digital</option>
    <option value="Banco Fihogar">Banco Fihogar</option>
    <option value="Asociación Maguana de Ahorros y Préstamos">Asociación Maguana de Ahorros y Préstamos</option>
    <option value="Banco Atlántico">Banco Atlántico</option>
    <option value="Bancotui">Bancotui</option>
    <option value="Banco Activo">Banco Activo</option>
    <option value="Banco Gruficorp">Banco Gruficorp</option>
    <option value="Corporación de Crédito Nordestana">Corporación de Crédito Nordestana</option>
    <option value="Banco Óptima de Ahorro y Crédito">Banco Óptima de Ahorro y Crédito</option>
    <option value="Banco Cofaci">Banco Cofaci</option>
    <option value="Bonanza Banco">Bonanza Banco</option>
    <option value="Corporación de Crédito Monumental">Corporación de Crédito Monumental</option>
    <option value="Banco Empire">Banco Empire</option>
    <option value="Corporación de Crédito Oficorp">Corporación de Crédito Oficorp</option>
</select>

            </div>
            <div class="form-group">
                <label for="addCuentaDestinatario">Cuenta Destinatario:</label>
                <input type="text" class="form-control" id="addCuentaDestinatario" name="addCuentaDestinatario">
            </div>
            <div class="form-group">
                <label for="addTipoCuentaDestinatario">Tipo Cuenta Destinatario:</label>
                <select class="form-control" id="addTipoCuentaDestinatario" name="addTipoCuentaDestinatario" required>
                  <option value="" selected>--Tipo de Cuenta--</option>
                    <option value="Cuenta de ahorros">Cuenta de ahorros</option>
                    <option value="Cuenta corriente">Cuenta corriente</option>
                </select>
            </div>
            <div class="form-group">
                <label for="addEntidadBancariaDestinatario">Entidad Bancaria Destinatario:</label>
                <select class="form-control" id="addEntidadBancariaDestinatario" name="addEntidadBancariaDestinatario">
                <option value="Banreservas" selected>--Entidad Bancaria Destinatario--</option>
                <option value="Banreservas">Banreservas</option>
    <option value="Banco Popular Dominicano">Banco Popular Dominicano</option>
    <option value="Banco BHD">Banco BHD</option>
    <option value="Asociación Popular de Ahorros y Préstamos">Asociación Popular de Ahorros y Préstamos</option>
    <option value="Scotiabank">Scotiabank</option>
    <option value="Banco Santa Cruz">Banco Santa Cruz</option>
    <option value="Asociación Cibao de Ahorros y Préstamos">Asociación Cibao de Ahorros y Préstamos</option>
    <option value="Banco Promerica">Banco Promerica</option>
    <option value="Banesco">Banesco</option>
    <option value="Banco Caribe">Banco Caribe</option>
    <option value="Banco Agrícola">Banco Agrícola</option>
    <option value="Asociación La Nacional de Ahorros y Préstamos">Asociación La Nacional de Ahorros y Préstamos</option>
    <option value="Citibank">Citibank</option>
    <option value="Banco BDI">Banco BDI</option>
    <option value="Banco Vimenca">Banco Vimenca</option>
    <option value="Banco López de Haro">Banco López de Haro</option>
    <option value="Bandex">Bandex</option>
    <option value="Banco Ademi">Banco Ademi</option>
    <option value="Banco Lafise">Banco Lafise</option>
    <option value="Motor Crédit Banco de Ahorro y Crédito">Motor Crédit Banco de Ahorro y Crédito</option>
    <option value="Alaver Asociación de Ahorros y Préstamos">Alaver Asociación de Ahorros y Préstamos</option>
    <option value="Banfondesa">Banfondesa</option>
    <option value="Banco Adopem">Banco Adopem</option>
    <option value="Asociación Duarte">Asociación Duarte</option>
    <option value="JMMB Bank">JMMB Bank</option>
    <option value="Asociación Mocana">Asociación Mocana</option>
    <option value="ABONAP">ABONAP</option>
    <option value="Banco Unión">Banco Unión</option>
    <option value="Banco BACC">Banco BACC</option>
    <option value="Asociación Romana">Asociación Romana</option>
    <option value="Asociación Peravia">Asociación Peravia</option>
    <option value="Banco Confisa">Banco Confisa</option>
    <option value="Leasing Confisa">Leasing Confisa</option>
    <option value="Qik Banco Digital">Qik Banco Digital</option>
    <option value="Banco Fihogar">Banco Fihogar</option>
    <option value="Asociación Maguana de Ahorros y Préstamos">Asociación Maguana de Ahorros y Préstamos</option>
    <option value="Banco Atlántico">Banco Atlántico</option>
    <option value="Bancotui">Bancotui</option>
    <option value="Banco Activo">Banco Activo</option>
    <option value="Banco Gruficorp">Banco Gruficorp</option>
    <option value="Corporación de Crédito Nordestana">Corporación de Crédito Nordestana</option>
    <option value="Banco Óptima de Ahorro y Crédito">Banco Óptima de Ahorro y Crédito</option>
    <option value="Banco Cofaci">Banco Cofaci</option>
    <option value="Bonanza Banco">Bonanza Banco</option>
    <option value="Corporación de Crédito Monumental">Corporación de Crédito Monumental</option>
    <option value="Banco Empire">Banco Empire</option>
    <option value="Corporación de Crédito Oficorp">Corporación de Crédito Oficorp</option>
</select>
            </div>
        </div>
        <!-- Group 2 -->
        <div class="col-sm-4">
            <div class="form-group">
              <div class="form-group">
                <label for="addMotivo">Motivo:</label>
                <input type="text" class="form-control" id="addMotivo" name="addMotivo">
            </div>
                <label for="addMonto">Monto:</label>
                <input type="text" class="form-control" id="addMonto" name="addMonto">
            </div>
            <div class="form-group">
                <label for="addTipo">Tipo:</label>
                <select class="form-control" id="addTipo" name="addTipo">
                  <option value="">-Tipo de pago-</option>  
                  <option value="Transferencia bancaria">Transferencia bancaria</option>
                  <option value="Efectivo">Efectivo</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="addPrestamoId" name="addPrestamoId" readonly hidden>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="addParticipacionId" name="addParticipacionId" readonly hidden>
            </div>
            <div class="form-group">
                <label for="addFechaDePago">Fecha de Pago:</label>
                <input type="text" class="form-control datepicker" id="addFechaDePago" name="addFechaDePago">
            </div>
        </div>
    </div>
    <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="addPagoBtn">Agregar pago</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
</form>

            </div>
            
        </div>
    </div>
</div>
                    <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header p-0">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="detalle-tab" data-toggle="pill" href="#detalle" role="tab" aria-controls="detalle" aria-selected="true">Detalle Préstamo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pagos-tab" data-toggle="pill" href="#pagosTabForPrestamos" role="tab" aria-controls="pagosTabForPrestamos" aria-selected="false">Pagos</a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="card-body">
    <div class="tab-content" id="custom-tabs-one-tabContent">
        <div class="tab-pane fade show active" id="detalle" role="tabpanel" aria-labelledby="detalle-tab">
            <!-- Detalle Perfil Content Here -->
            <div class="form-group">
                <label for="estadoPrestamo">Status del Préstamo:</label>
                <select class="form-control" id="estadoPrestamo">
                    <option value="Aprobado" <?php if($prestamo['Status'] == 'Aprobado') echo 'selected'; ?>>Aprobado</option>
                    <option value="En proceso" <?php if($prestamo['Status'] == 'En proceso') echo 'selected'; ?>>En proceso</option>
                    <option value="Rechazado" <?php if($prestamo['Status'] == 'Rechazado') echo 'selected'; ?>>Rechazado</option>
                </select>
            </div>
            <button type="button" class="btn btn-primary" id="actualizarStatus">Actualizar status</button>
            <br><br>
            <?php
            // Check if the ID parameter is set in the URL
            if(isset($_GET['id'])) {
                // Sanitize the input to prevent SQL injection
                $client_id = htmlspecialchars($_GET['id']);

                // Fetch client details from the database using the ID
                $sql = "SELECT * FROM prestamos WHERE Id = :id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id', $client_id);
                $stmt->execute();

                // Check if a client with the specified ID exists
if($stmt->rowCount() > 0) {
    // Fetch the client's details
    $client = $stmt->fetch(PDO::FETCH_ASSOC);
    $client['Solicitante'] = null;
    $client['PagosRealizados'] = $client['PagoId'] == null ? "Ningún pago realizado" : $client['PagoId'] . " pagos";
    $client['CuotasTotales'] = $client['CuotasTotales'] == null ? "No hay cuotas asignadas" : $client['CuotasTotales'] . " cuotas";
    $client['CantPagosPorMes'] = $client['CantPagosPorMes'] == null ? "N/A" : $client['CantPagosPorMes'];
    $client['DiasDePagoDelMes'] = $client['DiasDePagoDelMes'] == null ? "Ninguno" : $client['DiasDePagoDelMes'];
    $client['FechaDeAprobacion'] = $client['FechaDeAprobacion'] == null ? "No aprobado" : $client['FechaDeAprobacion'];
    $isEnabled = false;

    // Display client details
    echo '<div class="modal-body">';
    echo '<form id="editForm">';
    echo '<div class="row">';

    // Group 1
    echo '<div class="col-sm-4">';
    echo '<div class="form-group">';
    echo '<label for="motivo">Motivo:</label>';
    echo '<input type="text" class="form-control" id="motivo" name="motivo" value="'.htmlspecialchars($client['Motivo']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="montoSolicitado">Monto Solicitado:</label>';
    echo '<input type="text" class="form-control" id="montoSolicitado" name="montoSolicitado" value="'.htmlspecialchars($client['MontoSolicitado']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="montoAprobado">Monto Aprobado:</label>';
    echo '<input type="text" class="form-control" id="montoAprobado" name="montoAprobado" value="'.htmlspecialchars($client['MontoAprobado']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="montoPagado">Monto Pagado:</label>';
    echo '<input type="text" class="form-control" id="montoPagado" name="montoPagado" value="'.htmlspecialchars($client['MontoPagado']).'" readonly>';
    echo '</div>';

    echo '</div>';

    // Group 2
    echo '<div class="col-sm-4">';
    echo '<div class="form-group">';
    echo '<label for="tasaDeInteres">Tasa de interés:</label>';
    echo '<input type="text" class="form-control" id="tasaDeInteres" name="tasaDeInteres" value="'.htmlspecialchars($client['TasaDeInteres']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="montoRecargo">Monto Recargo:</label>';
    echo '<input type="text" class="form-control" id="montoRecargo" name="montoRecargo" value="'.htmlspecialchars($client['MontoRecargo']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="solicitante">Solicitante:</label>';
    echo '<input type="text" class="form-control" id="solicitante" name="solicitante" value="'.htmlspecialchars($client['Solicitante']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="fechaSolicitud">Fecha de solicitud:</label>';
    echo '<input type="text" class="form-control" id="fechaSolicitud" name="fechaSolicitud" value="'.htmlspecialchars($client['FechaCreacion']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="frecuenciaPago">Cant. min. pagos por mes:</label>';
    echo '<input type="text" class="form-control" id="frecuenciaPago" name="frecuenciaPago" value="'.htmlspecialchars($client['CantPagosPorMes']).'" readonly>';
    echo '</div>';
    echo '';
    echo '</div>';

    // Group 3
    echo '<div class="col-sm-4">';
    echo '<div class="form-group">';
    echo '<label for="cuotasTotales">Cant. total de cuotas:</label>';
    echo '<input type="text" class="form-control" id="cuotasTotales" name="cuotasTotales" value="'.htmlspecialchars($client['CuotasTotales']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="pagosRealizados">Pagos realizados:</label>';
    echo '<input type="text" class="form-control" id="pagosRealizados" name="pagosRealizados" value="'.htmlspecialchars($client['PagosRealizados']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="diasPagoMes">Dias en el mes asignados para pagar:</label>';
    echo '<input type="text" class="form-control" id="diasPagoMes" name="diasPagoMes" value="'.htmlspecialchars($client['DiasDePagoDelMes']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="fechaAprobacion">Fecha de aprobacion:</label>';
    echo '<input type="text" class="form-control datepicker" id="fechaAprobacion" name="fechaAprobacion" value="'.htmlspecialchars($client['FechaDeAprobacion']).'" readonly>';
    echo '</div>';
    echo '</div>';

    // Group 4
    echo '<div class="col-sm-4">';
    
    
    
    echo '</div>';

    echo '</div>'; // Close row
    echo '</form>';
    echo '</div>'; 
                } else {
                    // If no client with the specified ID is found, display an error message
                    echo '<div class="container">';
                    echo '<h1>Error</h1>';
                    echo '<p>No se pudo encontrar el cliente</p>';
                    echo '</div>';
                }
            } else {
                // If the ID parameter is not set in the URL, display an error message
                echo '<div class="container">';
                echo '<h1>Error</h1>';
                echo '<p>No se pudo encontrar el cliente</p>';
                echo '</div>';
            }

            echo'</div>';
                                
//pagos for prestamo
echo'<div class="tab-pane fade" id="pagosTabForPrestamos" role="tabpanel" aria-labelledby="nuevo-tab">';
// Fetch data from the clientes table
$sql = "SELECT * FROM pagos WHERE PrestamoId = ".$prestamo_id."";
$result = $db->query($sql);

if ($result) {
  // Output the table structure
  echo '<div class="card">
              <div class="card-header">
              <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pagos</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <button type="button" class="btn btn-primary bustonAddPago" data-toggle="modal" data-target="#modalAgregarPagoForParticipacion">
  Agregar Pago
</button>
<p></p>
                  <th></th>
                  <th>Acciones</th>
                    <th>Solicitante</th>
                    <th>Cuenta Remitente</th>
                    <th>Tipo de Cuenta Remitente</th>
                    <th>Entidad Bancaria Remitente</th>
                    <th>Cuenta Destinatario</th>
                    <th>Tipo de Cuenta Destinatario</th>
                    <th>Entidad Bancaria Destinatario</th>
                    <th>Motivo</th>
                    <th>Monto</th>
                  </tr>
                  </thead>
                  <tbody>';

  // Loop through the fetched results and generate table rows
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>
        <td></td>
        <td>
          <a style="white-space: nowrap !important;" href="detalle_pago.php?id=' . $row['Id'] . '" class="btn btn-info btn-sm">Ver detalle</a>
        </td>
                <td>' . $row['IdCliente'] . '</td>
                <td>' . $row['CuentaRemitente'] . '</td>
                <td>' . $row['TipoCuentaRemitente'] . '</td>
                <td>' . $row['EntidadBancariaRemitente'] . '</td>
                <td>' . $row['CuentaDestinatario'] . '</td>
                <td>' . $row['TipoCuentaDestinatario'] . '</td>
                <td>' . $row['EntidadBancariaDestinatario'] . '</td>
                <td>' . $row['Motivo'] . '</td>
                <td>' . $row['Monto'] . '</td>
              </tr>';
  }

  // Close the table body and card
  echo '</tbody>
          <tfoot>
            <tr>
            <th></th>
            <th>Acciones</th>
            <th>Solicitante</th>
            <th>Cuenta Remitente</th>
            <th>Tipo de Cuenta Remitente</th>
            <th>Entidad Bancaria Remitente</th>
            <th>Cuenta Destinatario</th>
            <th>Tipo de Cuenta Destinatario</th>
            <th>Entidad Bancaria Destinatario</th>
            <th>Motivo</th>
            <th>Monto</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>';
}
echo'</div>';







echo '<div id="editModalPagoPrestamo" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Pago</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
    <form id="editForm" action="update_pago.php">
        <div class="row">
            <!-- Group 1 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editId">ID:</label>
                    <input type="text" class="form-control" id="editIdPago" name="editId" readonly>
                </div>
                <div class="form-group">
                    <label for="editIdCliente">ID Cliente:</label>
                    <input type="text" class="form-control" id="editIdClientePago" name="editIdCliente">
                </div>
                <div class="form-group">
                    <label for="editCuentaRemitente">Cuenta Remitente:</label>
                    <input type="text" class="form-control" id="editCuentaRemitentePago" name="editCuentaRemitente">
                </div>
                <div class="form-group">
                    <label for="editMotivo">Motivo:</label>
                    <input type="text" class="form-control" id="editMotivoPago" name="editMotivo">
                </div>
                <div class="form-group">
                    <label for="editTipo">Tipo:</label>
                    <input type="text" class="form-control" id="editTipoPago" name="editTipo">
                </div>
            </div>
            <!-- Group 2 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editTipoCuentaRemitente">Tipo de Cuenta Remitente:</label>
                    <input type="text" class="form-control" id="editTipoCuentaRemitentePago" name="editTipoCuentaRemitente">
                </div>
                <div class="form-group">
                    <label for="editEntidadBancariaRemitente">Entidad Bancaria Remitente:</label>
                    <input type="text" class="form-control" id="editEntidadBancariaRemitentePago" name="editEntidadBancariaRemitente">
                </div>
                <div class="form-group">
                    <label for="editCuentaDestinatario">Cuenta Destinatario:</label>
                    <input type="text" class="form-control" id="editCuentaDestinatarioPago" name="editCuentaDestinatario">
                </div>
                <div class="form-group">
                    <label for="editInversionId">ID de Inversion:</label>
                    <input type="text" class="form-control" id="editInversionIdPago" name="editInversionId">
                </div>
                <div class="form-group">
                    <label for="editPrestamoId">ID de Préstamo:</label>
                    <input type="text" class="form-control" id="editPrestamoIdPago" name="editPrestamoId">
                </div>
            </div>
            <!-- Group 3 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editTipoCuentaDestinatario">Tipo de Cuenta Destinatario:</label>
                    <input type="text" class="form-control" id="editTipoCuentaDestinatarioPago" name="editTipoCuentaDestinatario">
                </div>
                <div class="form-group">
                    <label for="editEntidadBancariaDestinatario">Entidad Bancaria Destinatario:</label>
                    <input type="text" class="form-control" id="editEntidadBancariaDestinatarioPago" name="editEntidadBancariaDestinatario">
                </div>
                <div class="form-group">
                    <label for="editMonto">Monto:</label>
                    <input type="text" class="form-control" id="editMontoPago" name="editMonto">
                </div>
                <div class="form-group">
                    <label for="editFechaDePago">Fecha de Pago:</label>
                    <input type="text" class="form-control" id="editFechaDePagoPago" name="editFechaDePago">
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Group 4 -->
            <div class="col-sm-4">
                
            </div>
            <!-- Group 5 -->
            <div class="col-sm-4">
                
            </div>
            <!-- Group 6 -->
            <div class="col-sm-4">
                
            </div>
        </div>
        <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="saveChangesBtn">Guardar Cambios</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
    </form>
</div>


            
          </div>
        </div>
      </div>
';
// Include jQuery library and custom script for handling click event and populating form fields within the modal
echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $(".editarButtonPagoPrestamo").click(function() {
      var id = $(this).data("id");
      $.ajax({
          url: "fetch_pago.php",
          type: "GET",
          data: { id: id },
          dataType: "json",
          success: function(response) {
              // Clear previous values
              $("#editForm")[0].reset();
              // Populate modal fields
              $("#editIdPago").val(response.Id);
              $("#editIdClientePago").val(response.IdCliente);
              $("#editCuentaRemitentePago").val(response.CuentaRemitente);
              $("#editTipoCuentaRemitentePago").val(response.TipoCuentaRemitente);
              $("#editEntidadBancariaRemitentePago").val(response.EntidadBancariaRemitente);
              $("#editCuentaDestinatarioPago").val(response.CuentaDestinatario);
              $("#editTipoCuentaDestinatarioPago").val(response.TipoCuentaDestinatario);
              $("#editEntidadBancariaDestinatarioPago").val(response.EntidadBancariaDestinatario);
              $("#editMontoPago").val(response.Monto);
              $("#editMotivoPago").val(response.Motivo);
              $("#editTipoPago").val(response.Tipo);
              $("#editInversionIdPago").val(response.InversionId);
              $("#editPrestamoIdPago").val(response.PrestamoId);
              $("#editFechaDePagoPago").val(response.FechaDePago);
              $("#editModalPagoPrestamo").modal("show");
          },
          error: function(xhr, status, error) {
              console.error(xhr.responseText);
          }
      });
  });

  $("#saveChangesBtn").click(function() {
      var formData = $("#editForm").serialize();
      $.ajax({
          url: "update_pago.php",
          type: "POST",
          data: formData,
          success: function(response) {
              $("#editModal").modal("hide");
              // Optionally, reload the table or update the row with the edited data
              location.reload();
          },
          error: function(xhr, status, error) {
              console.error(xhr.responseText);
              // Handle error
          }
      });
  });
});

</script>
<script>
  // JavaScript for handling delete button click
$(".delete-btnPagoParticipacion").click(function() {
  var id = $(this).data("id");
  console.log(id);
  if (confirm("¿Estás seguro que quieres borrar este pago?")) {
      $.ajax({
          url: "delete_pago.php",
          type: "POST",
          data: { id: id },
          success: function(response) {
              // Optionally, reload the table or update the UI
              location.reload();
          },
          error: function(xhr, status, error) {
              console.error(xhr.responseText);
              // Handle error
          }
      });
  }
});

</script>
';

// Include jQuery library and custom script for handling click event and populating form fields within the modal
  echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(".bustonAddPago").click(function() {
        var id = $(this).data("id");
        $.ajax({
            url: "fetch_prestamo.php", // Changed to fetch prestamo details
            type: "GET",
            data: { id: id },
            dataType: "json",
            success: function(response) {
                $("#addPrestamoId").val('.$prestamo_id.');
                console.log();
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
    });

</script>';
                                           ?> </p>
                                    </div>
                                </div>
                                </div>
                                
                               
                               
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Add your JavaScript code for handling tab navigation and fetching data from the database -->

<script>
    $(document).ready(function() {
        // JavaScript code for handling tab navigation and fetching data from the database
    });
</script>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./plugins/jszip/jszip.min.js"></script>
<script src="./plugins/pdfmake/pdfmake.min.js"></script>
<script src="./plugins/pdfmake/vfs_fonts.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="./dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>

  // Flag to track whether an option has been selected
  var optionSelected = false;

  // Function to fetch autosuggestion data from the database
  function fetchUsuarios(str) {
  window.globalVariable = true;
    if (str.length == 0) {
        document.getElementById("clientUserDropdown").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("clientUserDropdown").innerHTML = this.responseText;

                // Add event listeners to the options
                var options = document.querySelectorAll(".dropdown-content .option");
                options.forEach(function(option) {
                    option.addEventListener("click", function() {
                        // Set the input field value to the selected option
                        document.getElementById("clientUser").value = this.textContent;
                        // Clear the dropdown after selecting an option
                        document.getElementById("clientUserDropdown").innerHTML = "";
                        // Set the flag to true since an option has been selected
                        console.log("optionSelected = true")
                        optionSelected = true;
                        if (optionSelected) {
                          console.log("la selesionate");
                          const beneficiarioTextField = document.getElementById('clientUser');
                          const agregarPrestamoButton = document.getElementById('addPagoBtn');
                          // Add a class to the element/
                          beneficiarioTextField.classList.remove('is-invalid');
                          agregarPrestamoButton.classList.remove('disabled');
                        }
    
                    });
                });
            }
        };
        xmlhttp.open("GET", "get_usuarios.php?q=" + str, true);
        xmlhttp.send();

        //terminamo
        if (!optionSelected) {
      console.log("no la selesionate");
      const beneficiarioTextField = document.getElementById('clientUser');
    const agregarPrestamoButton = document.getElementById('addPagoBtn');
    // Add a class to the element/
    beneficiarioTextField.classList.add('is-invalid');
    agregarPrestamoButton.classList.add('disabled');
    }
    }
}

document.getElementById("clientUser").addEventListener("input", function() {
    // Reset the flag when the input changes
    optionSelected = false;
    fetchUsuarios(this.value);
    
});
</script>

<!-- Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


<script>
  $(document).ready(function(){
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      startDate: new Date() // Set the start date as today
    });
  });
</script>


</body>
</html>
