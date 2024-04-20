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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detalle cliente</title>


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
      <li class="nav-item">
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

     
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Administradores</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Usuario Administrador</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
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
                Panel Administrador
              </p>
            </a>
             <li class="nav-item">
                <a href="clients.php" class="nav-link active">
                  <i class="far fa-user-circle nav-icon"></i>
                  <p>Clientes</p>
                </a>
                </li>

                 <li class="nav-item">
                <a href="prestamos.php" class="nav-link">
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

                    <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header p-0">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="detalle-tab" data-toggle="pill" href="#detalle" role="tab" aria-controls="detalle" aria-selected="true">Detalle Perfil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="prestamos-tab" data-toggle="pill" href="#prestamos" role="tab" aria-controls="prestamos" aria-selected="false">Préstamos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pagos-tab" data-toggle="pill" href="#pagos" role="tab" aria-controls="pagos" aria-selected="false">Pagos</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="detalle" role="tabpanel" aria-labelledby="detalle-tab">
                <!-- Detalle Perfil Content Here -->
                <div class="form-group">
                <label for="estatusPerfil">Status perfil:</label>
                <form action="update_cliente.php" method="post">
                  <input type="text" name="idCliente" value="<?php if (isset($_GET['id'])) {
                    echo $_GET['id'];
                    // Sanitize the input to prevent SQL injection
                    $cliente_id = htmlspecialchars($_GET['id']);

                    // Fetch prestamo details from the database using the ID
                    $sql = "SELECT c.Id, c.IdUsuario, c.Nombre, c.Apellido, c.Direccion, c.Cedula, c.CedulaPath, c.RNC, c.MontoTotalSolicitado, c.MontoTotalPrestado, c.MontoTotalPagado, c.Interes, c.MontoDeuda, c.Reenganchado, c.PerfilValidado, c.Puntos, c.FechaIngreso, c.FechaSalida, c.MesesEnEmpresa, usuarios.Usuario, c.FechaCreacion, c.FechaModificacion
                    FROM clientes as c
                    INNER JOIN usuarios ON c.Id = :id";

                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':id', $cliente_id);
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                      // Fetch the prestamo's details
                      $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
                    }
                  } ?>" hidden readonly>
                <select class="form-control" id="isPerfilValidado" name="isPerfilValidado">
                    <option value="1" <?php if($cliente['PerfilValidado'] == 1) echo 'selected'; ?>>Aprobado</option>
                    <option value="0" <?php if($cliente['PerfilValidado'] == 0) echo 'selected'; ?>>Rechazado</option>
                    <option value="2" <?php if($cliente['PerfilValidado'] == 2) echo 'selected'; ?>>En revisión</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" id="actualizarStatus">Actualizar status</button>
            </form>
            <br><br>
                <?php
                // Check if the ID parameter is set in the URL
                if(isset($_GET['id'])) {
                    

                    // Check if a prestamo with the specified ID exists
                    if($stmt->rowCount() > 0) {
                        
                        $cedulaPathValues = explode("_.d1vis10n._", $cliente['CedulaPath']);
                        $capturaFrontalPath = isset($cedulaPathValues[0]) && isset(explode("\clients\\", $cedulaPathValues[0])[1]) ? "../clients/".explode("\clients\\", $cedulaPathValues[0])[1] : null;
                        error_log("Frontal Cedula path: ".$capturaFrontalPath);
                        $capturaReversoPath = isset($cedulaPathValues[1]) && isset(explode("\clients\\", $cedulaPathValues[1])[1]) ? "../clients/".explode("\clients\\", $cedulaPathValues[1])[1] : null; 
                        error_log("Reverse Cedula path: ".$capturaReversoPath);

                        // Display prestamo details
                        echo '<div class="modal-body">';
                        echo '<form id="editForm">';
                        echo '<div class="row">';

                        // Group 1
                        echo '<div class="col-sm-4">';
                        echo '<div class="form-group">';
                        echo '<label for="nombre">Nombre:</label>';
                        echo '<input type="text" class="form-control" id="nombre" name="nombre" value="'.htmlspecialchars($cliente['Nombre']).'" readonly>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="nombre">Apellido:</label>';
                        echo '<input type="text" class="form-control" id="apellido" name="apellido" value="'.htmlspecialchars($cliente['Apellido']).'" readonly>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="direcion">Dirección:</label>';
                        echo '<input type="text" class="form-control" id="direcion" name="direcion" value="'.htmlspecialchars($cliente['Direccion']).'" readonly>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="cedula">Cedula:</label>';
                        echo '<input type="text" class="form-control" id="cedula" name="cedula" value="'.htmlspecialchars($cliente['Cedula']).'" readonly>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="rnc">RNC:</label>';
                        echo '<input type="text" class="form-control" id="rnc" name="rnc" value="'.htmlspecialchars($cliente['RNC']).'" readonly>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="usuarioCliente">Usuario:</label>';
                        echo '<input type="text" class="form-control" id="usuarioCliente" name="usuarioCliente" value="'.htmlspecialchars($cliente['Usuario']).'" readonly>';
                        echo '</div>';
                        echo '</div>';

                        //other group
                        echo '<div class="col-sm-4">';
                        echo '<div class="form-group">';
                        echo '<label for="montoTotalSolicitado">Monto total solicitado:</label>';
                        echo '<input type="text" class="form-control" id="montoTotalSolicitado" name="montoTotalSolicitado" value="'.htmlspecialchars($cliente['MontoTotalSolicitado']).'" readonly>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="montoTotalPrestado">Monto total prestado:</label>';
                        echo '<input type="text" class="form-control" id="montoTotalPrestado" name="montoTotalPrestado" value="'.htmlspecialchars($cliente['MontoTotalPrestado']).'" readonly>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="montoTotalPagado">Monto total pagado:</label>';
                        echo '<input type="text" class="form-control" id="montoTotalPagado" name="montoTotalPagado" value="'.htmlspecialchars($cliente['MontoTotalPagado']).'" readonly>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="interes">Tasa de interes:</label>';
                        echo '<input type="text" class="form-control" id="interes" name="interes" value="'.htmlspecialchars($cliente['Interes']).'" readonly>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="montoDeuda">Monto deuda:</label>';
                        echo '<input type="text" class="form-control" id="montoDeuda" name="montoDeuda" value="'.htmlspecialchars($cliente['MontoDeuda']).'" readonly>';
                        echo '</div>';


                        


                        echo '</div>';


                        echo '<div class="col-sm-4">';
                        echo '<div class="form-group">';
                        echo '<label for="reenganchado">Reenganchado:</label>';
                        echo '<input type="text" class="form-control" id="reenganchado" name="reenganchado" value="'.htmlspecialchars($cliente['Reenganchado']).'" readonly>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="perfilValidado">Perfil validado:</label>';
                        echo '<input type="text" class="form-control" id="perfilValidado" name="perfilValidado" value="'.htmlspecialchars($cliente['PerfilValidado']).'" readonly>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="puntos">Puntos:</label>';
                        echo '<input type="text" class="form-control" id="puntos" name="puntos" value="'.htmlspecialchars($cliente['Puntos']).'" readonly>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="fechaIngreso">Fecha de ingreso:</label>';
                        echo '<input type="text" class="form-control" id="fechaIngreso" name="fechaIngreso" value="'.htmlspecialchars($cliente['FechaIngreso']).'" readonly>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="fechaSalida">Fecha de salida:</label>';
                        echo '<input type="text" class="form-control" id="fechaSalida" name="fechaSalida" value="'.htmlspecialchars($cliente['FechaSalida']).'" readonly>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="mesesEnEmpresa">Meses en la empresa:</label>';
                        echo '<input type="text" class="form-control" id="mesesEnEmpresa" name="mesesEnEmpresa" value="'.htmlspecialchars($cliente['MesesEnEmpresa']).'" readonly>';
                        echo '</div>';
                        echo '</div>';


                        
                        

                        echo '<div class="form-group">';
                        echo '<label for="capturaFrontalCedula">Captura frontal de Cedula:</label>';
                        echo '<br>';
                        echo '<img src="../clients/'.htmlspecialchars($capturaFrontalPath).'" alt="Captura de cedula no disponible" height="300px">';
                        echo '</div>';

                        echo '<div class="form-group">';
                        echo '<label for="capturaReversoCedula">Captura reverso de Cedula:</label>';
                        echo '<br>';
                        echo '<img src="../clients/'.htmlspecialchars($capturaReversoPath).'" alt="Captura de cedula no disponible" height="300px">';
                        echo '</div>';

                        // Group 2 (continue similar structure for other groups)
                        // Group 3
                        // Group 4
                        echo '</div>'; // Close row
                        echo '</form>';
                        echo '</div>'; 
                    } else {
                        // If no prestamo with the specified ID is found, display an error message
                        echo '<div class="container">';
                        echo '<h1>Error</h1>';
                        echo '<p>No se pudo encontrar el préstamo</p>';
                        echo '</div>';
                    }
                } else {
                    // If the ID parameter is not set in the URL, display an error message
                    echo '<div class="container">';
                    echo '<h1>Error</h1>';
                    echo '<p>No se pudo encontrar el préstamo</p>';
                    echo '</div>';
                }
                ?>
            </div>

            <div class="tab-pane fade" id="prestamos" role="tabpanel" aria-labelledby="pagos-tab">
                <!-- Prestamos Content Here -->
                <?php
// Include the database connection file
// Assuming your database connection code is included here

// Fetch data from the clientes table
$sql = "SELECT p.Id AS IdPrestamo, p.IdCliente AS IdClientePrestamo, Motivo, MontoSolicitado, MontoAprobado, MontoPagado, TasaDeInteres, MontoRecargo, Remitente, Beneficiario, p.Status AS StatusPrestamo, PagoId, FechaPagoMensual, FechaFinalPrestamo, CuotasTotales, DiasDePagoDelMes, CantPagosPorMes, FechaDeAprobacion, p.FechaCreacion, p.FechaModificacion FROM prestamos as p
WHERE p.IdCliente = ".$cliente_id;
$result = $db->query($sql);

                if ($result) {
                  // Output the table structure
                  echo '<div class="card">
              <div class="card-header">
              <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Préstamos</h1>
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
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Agregar Prestamo
</button>
<p></p>
                  <th></th>
                  <th>Acciones</th>
                    <th>ID</th>
                    <th>Concepto</th>
                    <th>Monto aolicitado</th>
                    <th>Monto aprobado</th>
                    <th>Status</th>
                    <th>Fecha final de prestamo</th>
                  </tr>
                  </thead>
                  <tbody>';

                  // Loop through the fetched results and generate table rows
                  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>
        <td></td>
        <td>
    <a href="detalle_prestamo.php?id=' . $row['IdPrestamo'] . '" class="btn btn-info btn-sm">Ver detalle</a>
    <div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->
        <button class="btn btn-primary btn-sm edit-btn btn-edit-prestamo" data-id="' . $row['IdPrestamo'] . '">Editar</button>
    </div>
    <div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->
        <button class="btn btn-danger btn-sm delete-btn" data-id="' . $row['IdPrestamo'] . '">Eliminar</button>
    </div>
</td>
                <td>' . $row['IdPrestamo'] . '</td>
                <td>' . $row['Motivo'] . '</td>
                <td>RD$' . $row['MontoSolicitado'] . '</td>
                <td>RD$' . $row['MontoAprobado'] . '</td>
                <td>' . $row['StatusPrestamo'] . '</td>
                <td>' . $row['FechaFinalPrestamo'] . '</td>
              </tr>';
                  }

                  // Close the table body and card
                  echo '</tbody>
          <tfoot>
            <tr>
            <th></th>
                    <th>Acciones</th>
                    <th>ID</th>
                    <th>Concepto</th>
                    <th>Monto solicitado</th>
                    <th>Monto aprobado</th>
                    <th>Status</th>
                    <th>Fecha final de prestamo</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>';
                }?>
            </div>
            <div class="tab-pane fade" id="pagos" role="tabpanel" aria-labelledby="pagos-tab">
                <!-- Pagos Content Here -->
                <?php
// Include the database connection file
// Assuming your database connection code is included here

// Fetch data from the clientes table
$sql = "SELECT p.Id, p.IdCliente, p.CuentaRemitente, p.TipoCuentaRemitente, p.EntidadBancariaRemitente, p.CuentaDestinatario, p.TipoCuentaDestinatario, p.EntidadBancariaDestinatario, p.Monto, p.Motivo, p.Tipo, p.InversionId, p.PrestamoId, p.ParticipacionId, p.VoucherPath, p.FechaDePago, p.FechaCreacion, p.FechaModificacion FROM pagos as p
where p.IdCliente = ".$cliente_id;
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
              
                <table id="tablePagosForClient" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                 <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Agregar Pago
</button> -->
<p></p>
                  <th></th>
                  <th>Acciones</th>
                  <th>ID</th>
                    <th>Usuario</th>
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
        <div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->
            <button class="btn btn-primary btn-sm edit-btn editarButtonPagoPrestamo" data-id="' . $row['Id'] . '">Editar</button>
        </div>
        <div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->
            <button class="btn btn-danger btn-sm delete-btn" data-id="' . $row['Id'] . '">Eliminar</button>
        </div>
        </td>
                <td>' . $cliente['Id'] . '</td>
                <td>' . $cliente['Usuario'] . '</td>
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
            <th>ID</th>
            <th>Usuario</th>
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
        <script>
    $(function () {
    $("#tablePagosForClient").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo(\'#tablePagosForClient_wrapper .col-md-6:eq(0)\');
    $(\'#example2\').DataTable({
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
      </div>
      <!-- /.card-body -->
    </div>';
                }?>
            </div>
        </div>
    </div>
    <?php
    
    // Add a hidden form to hold the details for editing within the modal
echo '<div id="editModalForPrestamo" class="modal fade" role="dialog">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Editar Prestamo</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
    <form onsubmit="return isEditFormValid()" id="editForm" action="update_prestamo.php" method="post">
        <!-- Input fields for editing inversion information -->
        <div class="row">
            <!-- Group 1 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editId">ID:</label>
                    <input type="text" class="form-control" id="editId" name="editId" readonly>
                </div>
                <div class="form-group">
                    <label for="editMotivo">Concepto:</label>
                    <input type="text" class="form-control" id="editMotivo" name="editMotivo">
                </div>
                <div class="form-group">
                    <label for="editMontoSolicitado">Monto Solicitado:</label>
                    <input type="text" class="form-control" id="editMontoSolicitado" name="editMontoSolicitado" step=".01" required>
                </div>
            </div>
            <!-- Group 2 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editMontoAprobado">Monto Aprobado:</label>
                    <input type="text" class="form-control" id="editMontoAprobado" name="editMontoAprobado">
                </div>
                <div class="form-group">
                    <label for="editMontoPagado">Monto Pagado:</label>
                    <input type="text" class="form-control" id="editMontoPagado" name="editMontoPagado">
                </div>
                <div class="form-group">
                    <label for="editTasaDeInteres">Tasa de Interes:</label>
                    <input type="text" class="form-control" id="editTasaDeInteres" name="editTasaDeInteres">
                </div>
            </div>
            <!-- Group 3 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editMontoRecargo">Monto Recargo:</label>
                    <input type="text" class="form-control" id="editMontoRecargo" name="editMontoRecargo">
                </div>
                <div class="form-group">
                    <label for="editRemitente">Remitente:</label>
                    <input type="text" class="form-control" id="editRemitente" name="editRemitente">
                </div>
                <div class="form-group">
                    <label for="editBeneficiario">Beneficiario:</label>
                    <input type="text" class="form-control" id="editBeneficiario" name="editBeneficiario">
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Group 4 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editStatus">Status:</label>
                    <select class="form-control" id="editStatus" name="editStatus">
                    <option value="Aprobado">Aprobado</option>
                    <option value="Rechazado">Rechazado</option>
                    <option value="En revision">En revisión</option>
                    <option value="Saldado">Saldado</option>
                    <option value="Moroso">Moroso</option>
                </select>
                <div class="form-group">
                    <label for="editCantPagosPorMes">Cantidad cuotas mensuales:</label>
                    <input type="number" class="form-control" id="editCantPagosPorMes" name="editCantPagosPorMes" min="1" max="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="1" required>
                </div>
                <div class="form-group">
  <label id="labelMontoCuotas" for="editCantPagosPorMes">Monto Cuotas:</label>
<div id="editCuotasDiasDePagoContainer"></div>
</div>

                </div>
            </div>
            <!-- Group 5 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editFechaFinalPrestamo">Fecha Final de prestamo:</label>
                    <input type="text" class="form-control datepicker" id="editFechaFinalPrestamo" name="editFechaFinalPrestamo">
                </div>
                <div class="form-group">
                    <label for="editCuotasTotales">Cuotas Totales:</label>
                    <input type="text" class="form-control" id="editCuotasTotales" name="editCuotasTotales">
                </div>
                <div class="form-group">
                  <label id="labelDiasDePagoDelMes" for="diasDePagoDelMes">Días de Pago del Mes:</label>
                  <div id="editDiasDePagoContainer"></div>
                </div>
            </div>
            <!-- Group 6 -->
            <div class="col-sm-4">
                
                
 
                <div class="form-group">
                    <label for="editFechaDeAprobacion">Fecha de Aprobacion:</label>
                    <input type="text" class="form-control datepicker" id="editFechaDeAprobacion" name="editFechaDeAprobacion">
                </div>
                <div class="form-group">
                    <label for="editMontoPagoMensual">Monto de pago mensual sugerido:</label>
                    <input type="text" class="form-control" id="editMontoPagoMensual" name="editMontoPagoMensual">
                </div>
            </div>
        </div>
        <div class="modal-footer">
      <button type="submit" class="btn btn-primary" id="saveChangesEditBtn">Guardar Cambios</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
    </form>
</div>

    
  </div>
</div>
</div>';







    // Include jQuery library and custom script for handling click event and populating form fields within the modal
echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
var montoCuota1 = null;
var montoCuota2 = null;
var montoCuota3 = null;
var montoCuota4 = null;

var dia1 = null;
var dia2 = null;
var dia3 = null;
var dia4 = null;
function generateOptionsEdit() {
    var container = document.getElementById("editDiasDePagoContainer");
    var containerCuotas = document.getElementById("editCuotasDiasDePagoContainer");
    var numSelects = document.getElementById("editCantPagosPorMes").value;

    // Clear existing selects
    container.innerHTML = "";
    containerCuotas.innerHTML = "";

    // Generate select elements
    for (var i = 0; i < numSelects; i++) {
        var labelCuota = document.createElement("label");
        labelCuota.setAttribute("for", "editCuotasNo_" + (i+1));
        labelCuota.textContent="Monto cuota #" +(i+1);
        labelCuota.style.fontWeight = 400;

        let inputCuota = document.createElement("input");
        inputCuota.className = "form-control";
        inputCuota.name = "editCuotasNo_" + (i+1);
        inputCuota.id = "editCuotasNo_" + (i+1);
        inputCuota.required = true;
        switch (i) {
          case 0:
            inputCuota.value = montoCuota1;
            break;
            case 1:
            inputCuota.value = montoCuota2;
            break;
            case 2:
            inputCuota.value = montoCuota3;
            break;
            case 3:
            inputCuota.value = montoCuota4;
            break;
        
          default:
            break;
        }
        //console.log(i);

         inputCuota.addEventListener(\'input\', function(event) {
          if (/[^0-9.]/.test(inputElement.value)) {
            // If it contains non-numeric characters, handle the validation here
            inputCuota.value = "";
            // For example, you can show an error message or take appropriate action
          } else {
              // Save the cursor position
              var cursorPosition = inputCuota.selectionStart;

              // Get the input value
              let oldInputValue = inputCuota.value;

              // Check if the input value is a valid number
              if (!isNaN(parseFloat(oldInputValue))) {
              // Currency formatting
              let currency = parseFloat(oldInputValue);
              let formattedValue = new Intl.NumberFormat(\'en-US\', {
              style: \'currency\',
              currency: \'USD\'
              }).format(currency);

              // Remove the dollar sign and commas from the formatted currency string
              formattedValue = formattedValue.replace(/\$/g, "").replaceAll(",", "");
              console.log(formattedValue);

              // Update the value of the input element with the formatted value
              inputCuota.value = formattedValue;

              // Restore the cursor position
              inputCuota.setSelectionRange(cursorPosition, cursorPosition);
              }
            }
});
        
        var select = document.createElement("select");
        select.className = "form-control";
        select.name = "editDiasDePagoDelMes_" + (i+1); // Append index to name
        select.id = "editDiasDePagoDelMes_" + (i+1); // Append index to id

         //Generate options for each select
        for (var j = 1; j <= 28; j++) {
            var option = document.createElement("option");
            option.value = j;
            option.text = "Día# " + j;
            select.appendChild(option);
        }

        // Append select to container
         switch (i) {
          case 0:
            var expectedIndex = dia1.replace(/\D/g, \'\');
            expectedIndex--;
            select.selectedIndex = expectedIndex;
            console.log(expectedIndex);
            break;
            case 1:
            var expectedIndex = dia2.replace(/\D/g, \'\');
            expectedIndex--;
            select.selectedIndex = expectedIndex;
            console.log(expectedIndex);
            break;
            case 2:
            var expectedIndex = dia3.replace(/\D/g, \'\');
            expectedIndex--;
            select.selectedIndex = expectedIndex;
            console.log(expectedIndex);
            break;
            case 3:
            var expectedIndex = dia4.replace(/\D/g, \'\');
            expectedIndex--;
            select.selectedIndex = expectedIndex;
            console.log(expectedIndex);
            break;
        
          default:
            break;
        }
        //select.selectedIndex = (i);
        container.appendChild(select);
        containerCuotas.appendChild(labelCuota);
        containerCuotas.appendChild(inputCuota);
        
        
        
    }
}







$(document).ready(function() {
$(".btn-edit-prestamo").click(function() {
var id = $(this).data("id");
console.log(id);
$.ajax({
    url: "fetch_prestamo.php",
    type: "GET",
    data: { id: id },
    dataType: "json",
    success: function(response) {
        // Clear previous values
        $("#editForm")[0].reset();
        // Populate modal fields
        $("#editId").val(response.Id);
        $("#editMotivo").val(response.Motivo);
        $("#editMontoSolicitado").val(response.MontoSolicitado);
        $("#editMontoAprobado").val(response.MontoAprobado);
        $("#editMontoPagado").val(response.MontoPagado);
        $("#editTasaDeInteres").val(response.TasaDeInteres);
        $("#editMontoRecargo").val(response.MontoRecargo);
        montoCuota1 = response.MontoCuota1;
        montoCuota2 = response.MontoCuota2;
        montoCuota3 = response.MontoCuota3;
        montoCuota4 = response.MontoCuota4;
        $("#editRemitente").val(response.Remitente);
        $("#editBeneficiario").val(response.Beneficiario);
        var statusSelectElement = document.getElementById("editStatus");
        let erEstatus = response.Status;
        switch(erEstatus) {
          case "Aprobado":
            statusSelectElement.selectedIndex = 0;
          break;
          case "Rechazado":
          statusSelectElement.selectedIndex = 1;
          break;
          case "En revision":
          statusSelectElement.selectedIndex = 2;
          break;
          case "Saldado":
          statusSelectElement.selectedIndex = 3;
          break;
          case "Moroso":
          statusSelectElement.selectedIndex = 4;
          break;
          default:
          // code block
}
        $("#editFechaFinalPrestamo").val(response.FechaFinalPrestamo);
        $("#editCuotasTotales").val(response.CuotasTotales);

        var diasDePago = response.DiasDePagoDelMes;
        console.log(diasDePago);
        var numbers = diasDePago.split(\'_\');
        console.log(numbers);

        // Map each number to a string with the desired format (#1, #2, etc.)
        var formattedNumbers = numbers.map(function(number) {
        return \' \' + number;
        });

        // Join the formatted numbers into a single string
        var formattedString = formattedNumbers.join(\', \');
        const diasesDePargos = formattedString.split(\', \');
         dia1 = diasesDePargos[0];
         console.log(dia1);
         dia2 = diasesDePargos[1];
         console.log(dia2);
         dia3 = diasesDePargos[2];
         console.log(dia3);
         dia4 = diasesDePargos[3];
         console.log(dia4);

        //console.log(formattedString);
        $("#editDiasDePagoDelMes").val(formattedString);
        $("#editCantPagosPorMes").val(response.CantPagosPorMes);
        document.getElementById("editCantPagosPorMes").addEventListener("change", generateOptionsEdit);
        generateOptionsEdit();
        $("#editFechaDeAprobacion").val(response.FechaDeAprobacion);
        $("#editMontoPagoMensual").val(response.MontoPagoMensual);
        
        $("#editModalForPrestamo").modal("show");
    },
    error: function(xhr, status, error) {
        console.error(xhr.responseText);
    }
});
});

$("#saveChangesBtn").click(function() {
var formData = $("#editForm").serialize();
$.ajax({
    url: "update_prestamo.php",
    type: "POST",
    data: formData,
    success: function(response) {
        $("#editModalForPrestamo").modal("hide");
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
</script>';










echo '<div id="editModalForPago" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Pago</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
    <form id="editFormForPago" action="update_pago.php">
        <div class="row">
            <!-- Group 1 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editIdForPago">ID:</label>
                    <input type="text" class="form-control" id="editIdForPago" name="editIdForPago" readonly>
                </div>
                <div class="form-group">
                    <label for="editIdClienteForPago">ID Cliente:</label>
                    <input type="text" class="form-control" id="editIdClienteForPago" name="editIdClienteForPago" readonly>
                </div>
                <div class="form-group">
                    <label for="editCuentaRemitenteForPago">Cuenta Remitente:</label>
                    <input type="text" class="form-control" id="editCuentaRemitenteForPago" name="editCuentaRemitenteForPago">
                </div>
                <div class="form-group">
                    <label for="editMotivoForPago">Concepto:</label>
                    <input type="text" class="form-control" id="editMotivoForPago" name="editMotivoForPago">
                </div>
                <div class="form-group">
                    <label for="editTipoForPago">Tipo:</label>
                    <input type="text" class="form-control" id="editTipoForPago" name="editTipoForPago" readonly>
                </div>
            </div>
            <!-- Group 2 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editTipoCuentaRemitenteForPago">Tipo de Cuenta Remitente:</label>
                    <select type="text" class="form-control" id="editTipoCuentaRemitenteForPago" name="editTipoCuentaRemitenteForPago">
                    <option value="Cuenta de ahorros">Cuenta de ahorros</option>
                    <option value="Cuenta corriente">Cuenta corriente</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="editEntidadBancariaRemitenteForPago">Entidad Bancaria Remitente:</label>
                    <select type="text" class="form-control" id="editEntidadBancariaRemitenteForPago" name="editEntidadBancariaRemitenteForPago">
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
                    <label for="editCuentaDestinatarioForPago">Cuenta Destinatario:</label>
                    <input type="text" class="form-control" id="editCuentaDestinatarioForPago" name="editCuentaDestinatarioForPago">
                </div>
                <div class="form-group">
                <div class="form-group">
                        <label for="editCuentaDestinatarioForPago">Foto comprobante de pago:</label>
                        <input type="file" class="form-control-file" id="editCuentaDestinatarioForPago" name="editCuentaDestinatarioForPago" required>
                      </div>
                    <label for="editInversionIdForPago"></label>
                    <input type="text" class="form-control" id="editInversionIdForPago" name="editInversionIdForPago" readonly hidden>
                </div>
                <div class="form-group">
                    <label for="editPrestamoIdForPago"></label>
                    <input type="text" class="form-control" id="editPrestamoIdForPago" name="editPrestamoIdForPago" readonly hidden>
                </div>
            </div>
            <!-- Group 3 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editTipoCuentaDestinatarioForPago">Tipo de Cuenta Destinatario:</label>
                    <select type="text" class="form-control" id="editTipoCuentaDestinatarioForPago" name="editTipoCuentaDestinatarioForPago">
                  <option value="" selected>--Tipo de Cuenta--</option>
                    <option value="Cuenta de ahorros">Cuenta de ahorros</option>
                    <option value="Cuenta corriente">Cuenta corriente</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="editEntidadBancariaDestinatarioForPago">Entidad Bancaria Destinatario:</label>
                    <select type="text" class="form-control" id="editEntidadBancariaDestinatarioForPago" name="editEntidadBancariaDestinatarioForPago">
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
                <div class="form-group">
                    <label for="editMontoForPago">Monto:</label>
                    <input type="text" class="form-control" id="editMontoForPago" name="editMontoForPago">
                </div>
                <div class="form-group">
                    <label for="editFechaDePagoForPago">Fecha de Pago:</label>
                    <input type="text" class="form-control datepicker" id="editFechaDePagoForPago" name="editFechaDePagoForPago">
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
              <button type="button" class="btn btn-primary" id="saveChangesBtnPago">Guardar Cambios</button>
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
              $("#editFormForPago")[0].reset();
              // Populate modal fields
              $("#editIdForPago").val(response.Id);
              $("#editIdClienteForPago").val(response.IdCliente);
              $("#editCuentaRemitenteForPago").val(response.CuentaRemitente);
              $("#editTipoCuentaRemitenteForPago").val(response.TipoCuentaRemitente);
              $("#editEntidadBancariaRemitenteForPago").val(response.EntidadBancariaRemitente);
              $("#editCuentaDestinatarioForPago").val(response.CuentaDestinatario);
              $("#editTipoCuentaDestinatarioForPago").val(response.TipoCuentaDestinatario);
              $("#editEntidadBancariaDestinatarioForPago").val(response.EntidadBancariaDestinatario);
              $("#editMontoForPago").val(response.Monto);
              $("#editMotivoForPago").val(response.Motivo);
              $("#editTipoForPago").val(response.Tipo);
              $("#editInversionIdForPago").val(response.InversionId);
              $("#editPrestamoIdForPago").val(response.PrestamoId);
              $("#editFechaDePagoForPago").val(response.FechaDePago);
              $("#editModalForPago").modal("show");
          },
          error: function(xhr, status, error) {
              console.error(xhr.responseText);
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
     ?>
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
    <strong>Copyright &copy; 2014-2021 <a href="https://www.linkedin.com/in/hipolito-perez/">Desarrollado por Hipolito Perez</a>.</strong> All rights reserved.
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



<script>

// Flag to track whether an option has been selected
var optionSelected = false;

// Function to fetch autosuggestion data from the database
function fetchUsuarios(str) {
  window.globalVariable = true;
    if (str.length == 0) {
        document.getElementById("beneficiarioDropdown").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("beneficiarioDropdown").innerHTML = this.responseText;

                // Add event listeners to the options
                var options = document.querySelectorAll(".dropdown-content .option");
                options.forEach(function(option) {
                    option.addEventListener("click", function() {
                        // Set the input field value to the selected option
                        document.getElementById("beneficiarioInput").value = this.textContent;
                        // Clear the dropdown after selecting an option
                        document.getElementById("beneficiarioDropdown").innerHTML = "";
                        // Set the flag to true since an option has been selected
                        console.log("optionSelected = true")
                        optionSelected = true;
                        if (optionSelected) {
                          console.log("la selesionate");
                          const beneficiarioTextField = document.getElementById('beneficiarioInput');
                          const agregarPrestamoButton = document.getElementById('agregarPrestamoSubmitButton');
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
      const beneficiarioTextField = document.getElementById('beneficiarioInput');
    const agregarPrestamoButton = document.getElementById('agregarPrestamoSubmitButton');
    // Add a class to the element/
    beneficiarioTextField.classList.add('is-invalid');
    agregarPrestamoButton.classList.add('disabled');
    }
    }
}




function isFormValid() {
    // Check for elements with 'is-invalid' class or disabled buttons
    const xpathExpression = "//*[contains(@class,'is-invalid')] | //button[contains(@class,'disabled')]";
    const result = document.evaluate(xpathExpression, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null);
    const element = result.singleNodeValue;

    // If any element with 'is-invalid' class or disabled button is found, return false
    if (element !== null) {
        console.log("Invalid element found:", element);
        return false;
    }

    // Check for duplicate values in 'diasDePagoDelMes' select elements
    const xpathExpression2 = "//select[contains(@id,'diasDePagoDelMes_')]";
    const result2 = document.evaluate(xpathExpression2, document, null, XPathResult.ORDERED_NODE_SNAPSHOT_TYPE, null);
    const totalElements2 = result2.snapshotLength;
    const elementValues2 = [];

    for (let i = 0; i < totalElements2; i++) {
        const value = result2.snapshotItem(i).value;
        if (elementValues2.includes(value)) {
            // If a duplicate value is found, display an error message and return false
            const message = 'Los días de pago no pueden ser iguales';
            const existingMessage = document.querySelector('.error-message');
            if (!existingMessage) {
                showMessageBelowElement(result2.snapshotItem(i), message);
                console.log(message);
            }
            return false;
        }
        elementValues2.push(value);
    }

    // If all validations pass, return true
    return true;
}

function validateSumOfQuotes() {
  
  // Evaluate the XPath expression
var xpathResult = document.evaluate(
    "//input[contains(@id,'cuotasNo_')]",
    document,
    null,
    XPathResult.ORDERED_NODE_SNAPSHOT_TYPE,
    null
);

// Initialize variables to store sum and count
var sum = 0;
var count = 0;

// Iterate over matching elements
for (var i = 0; i < xpathResult.snapshotLength && count < 4; i++) {
    var inputElement = xpathResult.snapshotItem(i);
    // Extract value and convert to a number
    var value = parseFloat(inputElement.value);
    // Add to sum
    sum += value;
    count++;
}

// Compare the sum with the value of another input element
var otherInputElementValue = parseFloat(document.getElementById('montoSolicitado').value);
if (sum === otherInputElementValue) {
    console.log("The sum of values from input elements matches the value of the other input element.");
    return true;
} else {
    console.log("eeeThe sum of values from input elements does not match the value of the other input element.");
    const menssage = "El monto de las cuotas no es igual al monto solicitado";
    const existingMenssage = document.querySelector('.error-message');
    if (!existingMenssage) showMessageBelowElement(inputElement, menssage);
    return false;
}

}


function validateEditSumOfQuotes() {
  
  // Evaluate the XPath expression
var xpathResult = document.evaluate(
    "//input[contains(@id,'editCuotasNo_')]",
    document,
    null,
    XPathResult.ORDERED_NODE_SNAPSHOT_TYPE,
    null
);

// Initialize variables to store sum and count
var sum = 0;
var count = 0;

// Iterate over matching elements
for (var i = 0; i < xpathResult.snapshotLength && count < 4; i++) {
    var inputElement = xpathResult.snapshotItem(i);
    // Extract value and convert to a number
    var value = parseFloat(inputElement.value);
    // Add to sum
    sum += value;
    count++;
}

// Compare the sum with the value of another input element
var montoSolicitadoInputValue = parseFloat(document.getElementById('editMontoAprobado').value);
console.log(montoSolicitadoInputValue);
var plazoInputElementValue = parseFloat(document.getElementById('editCantPagosPorMes').value);
console.log(plazoInputElementValue);
var monthlyAmmount = montoSolicitadoInputValue / plazoInputElementValue;
monthlyAmmount = Math.floor(monthlyAmmount * 100) / 100;
sum = Math.floor(sum * 100) / 100;
sum = sum.toFixed(2);
monthlyAmmount = monthlyAmmount.toFixed(2);
console.log(monthlyAmmount);
console.log(sum);
if (sum === monthlyAmmount) {
    console.log("The sum of values from input elements matches the value of the other input element.");
    return true;
} else {
    console.log("eeeThe sum of values from input elements does not match the value of the other input element.");
    const menssage = "El monto de las cuotas no es igual al monto solicitado";
    const existingMenssage = document.querySelector('.error-message');
    if (!existingMenssage) showMessageBelowElement(inputElement, menssage);
    return false;
}

}

function isEditFormValid() {
    // Check for elements with 'is-invalid' class or disabled buttons
    const xpathExpression = "//*[contains(@class,'is-invalid')] | //button[contains(@class,'disabled')]";
    const result = document.evaluate(xpathExpression, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null);
    const element = result.singleNodeValue;
    let cantidadCuotasMensualeses =document.getElementById("editCantPagosPorMes");
    let numCuotasMensuales = parseInt(cantidadCuotasMensualeses.value);

    // If any element with 'is-invalid' class or disabled button is found, return false
    if (element !== null) {
        console.log("Invalid element found:", element);
        return false;
    }

    if (numCuotasMensuales <= 0) {
        console.log("Invalid number of cuotas mensuales");
        return false;
    } else {
            if (!validateEditSumOfQuotes()) {
                return false;
            }
            
    }

    // Check for duplicate values in 'diasDePagoDelMes' select elements
    const xpathExpression2 = "//select[contains(@id,'editDiasDePagoDelMes_')]";
    const result2 = document.evaluate(xpathExpression2, document, null, XPathResult.ORDERED_NODE_SNAPSHOT_TYPE, null);
    const totalElements2 = result2.snapshotLength;
    const elementValues2 = [];

    for (let i = 0; i < totalElements2; i++) {
        const value = result2.snapshotItem(i).value;
        if (elementValues2.includes(value)) {
            // If a duplicate value is found, display an error message and return false
            const message = 'Los días de pago no pueden ser iguales';
            const existingMessage = document.querySelector('.error-message');
            if (!existingMessage) {
                showMessageBelowElement(result2.snapshotItem(i), message);
                console.log(message);
            }
            return false;
        }
        elementValues2.push(value);
    }

    // If all validations pass, return true
    return true;
}

function showMessageBelowElement(element, message) {
    // Create a new div element for the error message
    const errorMessageDiv = document.createElement('div');
    errorMessageDiv.textContent = message;
    errorMessageDiv.style.color = 'red';
    errorMessageDiv.className = 'error-message'; // Adding a class for identification

    // Insert the error message div below the given element
    element.parentNode.insertBefore(errorMessageDiv, element.nextSibling);
}







  



</script>
<script>
    var editMontoPagoMensualInput = document.getElementById("editMontoPagoMensual");
    var editMontoForPagoInput = document.getElementById("editMontoForPago");


          editMontoPagoMensualInput.addEventListener('input', function(event) {
          if (/[^0-9.]/.test(editMontoPagoMensualInput.value)) {
            // If it contains non-numeric characters, handle the validation here
            editMontoPagoMensualInput.value = "";
            // For example, you can show an error message or take appropriate action
          } else {
              // Save the cursor position
              var cursorPosition = editMontoPagoMensualInput.selectionStart;

              // Get the input value
              let oldInputValue = editMontoPagoMensualInput.value;

              // Check if the input value is a valid number
              if (!isNaN(parseFloat(oldInputValue))) {
              // Currency formatting
              let currency = parseFloat(oldInputValue);
              let formattedValue = new Intl.NumberFormat('en-US', {
              style: 'currency',
              currency: 'USD'
              }).format(currency);

              // Remove the dollar sign and commas from the formatted currency string
              formattedValue = formattedValue.replace(/\$/g, "").replaceAll(",", "");
              console.log(formattedValue);

              // Update the value of the input element with the formatted value
              editMontoPagoMensualInput.value = formattedValue;

              // Restore the cursor position
              editMontoPagoMensualInput.setSelectionRange(cursorPosition, cursorPosition);
              }
            }
          });

          editMontoForPagoInput.addEventListener('input', function(event) {
          if (/[^0-9.]/.test(editMontoForPagoInput.value)) {
            // If it contains non-numeric characters, handle the validation here
            editMontoForPagoInput.value = "";
            // For example, you can show an error message or take appropriate action
          } else {
              // Save the cursor position
              var cursorPosition = editMontoForPagoInput.selectionStart;

              // Get the input value
              let oldInputValue = editMontoForPagoInput.value;

              // Check if the input value is a valid number
              if (!isNaN(parseFloat(oldInputValue))) {
              // Currency formatting
              let currency = parseFloat(oldInputValue);
              let formattedValue = new Intl.NumberFormat('en-US', {
              style: 'currency',
              currency: 'USD'
              }).format(currency);

              // Remove the dollar sign and commas from the formatted currency string
              formattedValue = formattedValue.replace(/\$/g, "").replaceAll(",", "");
              console.log(formattedValue);

              // Update the value of the input element with the formatted value
              editMontoForPagoInput.value = formattedValue;

              // Restore the cursor position
              editMontoForPagoInput.setSelectionRange(cursorPosition, cursorPosition);
              }
            }
          });
</script>
</body>
</html>
