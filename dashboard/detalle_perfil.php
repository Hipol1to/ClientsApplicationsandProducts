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
                <!-- Pagos Content Here -->
                <?php
// Include the database connection file
// Assuming your database connection code is included here

// Fetch data from the clientes table
$sql = "SELECT p.Id AS IdPrestamo, p.IdCliente AS IdClientePrestamo, Motivo, MontoSolicitado, MontoAprobado, MontoPagado, TasaDeInteres, MontoRecargo, Remitente, Beneficiario, p.Status AS StatusPrestamo, PagoId, FechaPagoMensual, FechaFinalPrestamo, CuotasTotales, DiasDePagoDelMes, CantPagosPorMes, FechaDeAprobacion, p.FechaCreacion, p.FechaModificacion, u.Id AS IdUsuario, u.IdCliente AS IdClienteUsiario, Usuario, Email, Active AS isActive FROM prestamos as p
JOIN usuarios as u WHERE p.IdCliente = ".$cliente_id;
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
                    <th>Usuario Solicitante</th>
                    <th>Concepto</th>
                    <th>Monto Solicitado</th>
                    <th>Status</th>
                    <th>Pagos</th>
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
        <button class="btn btn-primary btn-sm edit-btn" data-id="' . $row['IdPrestamo'] . '">Editar</button>
    </div>
    <div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->
        <button class="btn btn-danger btn-sm delete-btn" data-id="' . $row['IdPrestamo'] . '">Eliminar</button>
    </div>
</td>
                <td>' . $row['IdPrestamo'] . '</td>
                <td>' . $row['Usuario'] . '</td>
                <td>' . $row['Motivo'] . '</td>
                <td>' . $row['MontoSolicitado'] . '</td>
                <td>' . $row['StatusPrestamo'] . '</td>
                <td>' . $row['PagoId'] . '</td>
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
                    <th>Usuario Solicitante</th>
                    <th>Concepto</th>
                    <th>Monto Solicitado</th>
                    <th>Status</th>
                    <th>Pagos</th>
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
$sql = "SELECT u.Id AS userId, u.IdCliente AS userIdCliente, u.Usuario, u.Contraseña, u.Rol, u.Email, u.Active, u.FechaCreacion AS userFechaDeCreacion, u.FechaModificacion AS userFechaDeModificacion, p.Id, p.IdCliente, p.CuentaRemitente, p.TipoCuentaRemitente, p.EntidadBancariaRemitente, p.CuentaDestinatario, p.TipoCuentaDestinatario, p.EntidadBancariaDestinatario, p.Monto, p.Motivo, p.Tipo, p.InversionId, p.PrestamoId, p.ParticipacionId, p.VoucherPath, p.FechaDePago, p.FechaCreacion, p.FechaModificacion FROM pagos as p
join usuarios as u
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                 <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Agregar Pago
</button> -->
<p></p>
                  <th></th>
                  <th>Acciones</th>
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
            <button class="btn btn-primary btn-sm edit-btn" data-id="' . $row['Id'] . '">Editar</button>
        </div>
        <div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->
            <button class="btn btn-danger btn-sm delete-btn" data-id="' . $row['Id'] . '">Eliminar</button>
        </div>
        </td>
                <td>' . $row['Usuario'] . '</td>
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
      </div>
      <!-- /.card-body -->
    </div>';
                }?>
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
</body>
</html>
