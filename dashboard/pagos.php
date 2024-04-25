<?php
require('../includes/config.php');

if ($user->is_logged_in() && !$_SESSION['isAdmin'] && $_SESSION['isProffileValidated'] && $_SESSION['isUserActive']) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProductsSANDBOX/clients/index.php');
  exit();  
} elseif (!$user->is_logged_in()) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProductsSANDBOX/index.php');
  exit();  
} elseif (!isset($_SESSION['ClienteId'])) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProductsSANDBOX/clients/completa_perfil.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pagos</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Include jQuery -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="icon" href="../assets/img/inversiones_everest.png" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/img/inversiones_everest.png" type="image/x-icon">

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
  <!-- Navbar and mobile burguer menu -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">Usuario Administrador</a>
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
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
             <li class="nav-item">
                <a href="clients.php" class="nav-link">
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
                <a href="pagos.php" class="nav-link active">
                  <i class="fas fa-money-bill-wave nav-icon"></i>
                  <p>Pagos</p>
                </a>
                 </li>
                 <li class="nav-item">
                <a href="usuarios.php" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Usuarios</p>
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <!-- /.card -->

<!-- Add Client Form -->
<!-- Add Client Form -->

<!-- Include Bootstrap CSS -->


<!-- Button to trigger the modal -->


<!-- Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Agregar Pago</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal Body -->
      <div class="modal-body">
        <!-- Form -->
        <form action="add_client.php" method="post">
          <!-- Form fields -->
          <div class="form-group">
            <div class="card">
    <div class="card-header">
        <h3 class="card-title"></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <form action="add_client.php" method="post">
        <div class="row">
            <!-- Group 1 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion">
                </div>
            </div>
            <!-- Group 2 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="cedula">Cédula:</label>
                    <input type="text" class="form-control" id="cedula" name="cedula">
                </div>
                <div class="form-group">
                    <label for="rnc">RNC:</label>
                    <input type="text" class="form-control" id="rnc" name="rnc">
                </div>
                <div class="form-group">
                    <label for="monto_solicitado">Monto Solicitado:</label>
                    <input type="text" class="form-control" id="monto_solicitado" name="monto_solicitado">
                </div>
            </div>
            <!-- Group 3 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="interes">Interés:</label>
                    <input type="text" class="form-control" id="interes" name="interes">
                </div>
                <div class="form-group">
                    <label for="id_pago">ID de Pago:</label>
                    <input type="text" class="form-control" id="id_pago" name="id_pago">
                </div>
                <div class="form-group">
                    <label for="monto_deuda">Monto de Deuda:</label>
                    <input type="text" class="form-control" id="monto_deuda" name="monto_deuda">
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Group 4 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="reenganchado">Reenganchado:</label>
                    <input type="text" class="form-control" id="reenganchado" name="reenganchado">
                </div>
                <div class="form-group">
                    <label for="puntos">Puntos:</label>
                    <input type="text" class="form-control" id="puntos" name="puntos">
                </div>
            </div>
            <!-- Group 5 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="fecha_ingreso">Fecha de Ingreso:</label>
                    <input type="text" class="form-control" id="fecha_ingreso" name="fecha_ingreso">
                </div>
                <div class="form-group">
                    <label for="fecha_salida">Fecha de Salida:</label>
                    <input type="text" class="form-control" id="fecha_salida" name="fecha_salida">
                </div>
            </div>
            <!-- Group 6 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="meses_en_empresa">Meses en la Empresa:</label>
                    <input type="text" class="form-control" id="meses_en_empresa" name="meses_en_empresa">
                </div>
                <div class="form-group">
                    <label for="total_prestado">Total Prestado:</label>
                    <input type="text" class="form-control" id="total_prestado" name="total_prestado">
                </div>
            </div>
        </div>
        <!-- Add more fields as needed -->
    </form>
</div>

    <!-- /.card-body -->
</div>
          </div>
          <!-- Add more form fields as needed -->
          
          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Agregar Pago</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>



<!-- /.card -->

<!-- /.card -->

<?php
// Include the database connection file
// Assuming your database connection code is included here

// Fetch data from the clientes table
$sql = "SELECT u.Id AS userId, u.IdCliente AS userIdCliente, u.Usuario, u.Contraseña, u.Rol, u.Email, u.Active, u.FechaCreacion AS userFechaDeCreacion, u.FechaModificacion AS userFechaDeModificacion, p.Id, p.IdCliente, p.CuentaRemitente, p.TipoCuentaRemitente, p.EntidadBancariaRemitente, p.CuentaDestinatario, p.TipoCuentaDestinatario, p.EntidadBancariaDestinatario, p.Monto, p.Motivo, p.Tipo, p.InversionId, p.PrestamoId, p.ParticipacionId, p.VoucherPath, p.FechaDePago, p.FechaCreacion, p.FechaModificacion FROM pagos as p
join usuarios as u
where p.IdCliente = u.IdCliente";
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
          <a style="white-space: nowrap !important;" href="detalle_pago.php?id='. $row['Id'].'" class="btn btn-info btn-sm">Ver detalle</a>
        <div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->
            <button class="btn btn-primary btn-sm edit-btn editarButtonPagoPrestamo" data-id="'. $row['Id'].'">Editar</button>
        </div>
        <div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->
            <button class="btn btn-danger btn-sm delete-btn" data-id="'. $row['Id'].'">Eliminar</button>
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

    // Add a hidden form to hold the details for editing within the modal
echo '<div id="editModalForPago" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Pago</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
    <form id="editFormForPagoMain" action="update_pago.php" method="post" enctype="multipart/form-data">
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
                        <label for="editComprobanteDePago">Foto comprobante de pago:</label>
                        <input type="file" class="form-control-file" id="editComprobanteDePago" name="editComprobanteDePago" accept="image/*">
                        <input type="text" class="form-control" id="editVoucherPath" name="editVoucherPath" readonly hidden>
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
              <button type="submit" class="btn btn-primary" id="saveChangesBtnPago">Guardar Cambios</button>
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
              $("#editFormForPagoMain")[0].reset();
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

              $("#editVoucherPath").val(response.VoucherPath);
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

} else {
    // Display an error message if the query fails
    echo "Error: " . $db->errorInfo();
}
?>






            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2024 <a href="https://www.linkedin.com/in/hipolito-perez/">Desarrollado por Hipolito Perez</a>.</strong> All rights reserved.
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
  var editMontoForPagoInput = document.getElementById("editMontoForPago");
  
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
