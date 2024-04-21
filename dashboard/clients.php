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
  <title>Clientes</title>


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

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Buscar">
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
                <!-- <i class="right fas fa-angle-left"></i> -->
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
        <h4 class="modal-title">Agregar Cliente</h4>
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
            <div class="col-sm-4">
                <!-- Group 1 -->
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
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
            </div>
            <div class="col-sm-4">
                <!-- Group 2 -->
                <div class="form-group">
                    <label for="cedula">Cédula:</label>
                    <input type="text" class="form-control" id="cedula" name="cedula" required>
                </div>
                <div class="form-group">
                    <label for="rnc">RNC:</label>
                    <input type="text" class="form-control" id="rnc" name="rnc" required>
                </div>
                <div class="form-group">
                    <label for="monto_solicitado">Monto Solicitado:</label>
                    <input type="text" class="form-control" id="monto_solicitado" name="monto_solicitado" required>
                </div>
            </div>
            <div class="col-sm-4">
                <!-- Group 3 -->
                <div class="form-group">
                    <label for="interes">Interés:</label>
                    <input type="text" class="form-control" id="interes" name="interes" required>
                </div>
                <div class="form-group">
                    <label for="monto_deuda">Monto de Deuda:</label>
                    <input type="text" class="form-control" id="monto_deuda" name="monto_deuda" required>
                </div>
                <div class="form-group">
                  <label for="usuario">Usuario:</label>
                  <input type="text" class="form-control" id="usuarioInput" name="usuario" required>
                  <div id="usuarioDropdown" class="dropdown-content"></div>
                </div>
            </div>
            <div class="col-sm-4">
                <!-- Group 4 -->
                <div class="form-group">
                <label for="estadoPrestamo">Reenganchado:</label>
                <select class="form-control" id="reenganchado" name="reenganchado" required>
                    <option value="0" selected>No</option>
                    <option value="1">Si</option>
                </select>
            </div>
                <div class="form-group">
                    <label for="puntos">Puntos:</label>
                    <input type="text" class="form-control" id="puntos" name="puntos" required>
                </div>
                <div class="form-group">
                    <label for="fecha_ingreso">Fecha de Ingreso:</label>
                    <input type="text" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required>
                </div>
            </div>
            <div class="col-sm-4">
                <!-- Group 5 -->
                <div class="form-group">
                    <label for="fecha_salida">Fecha de Salida:</label>
                    <input type="text" class="form-control" id="fecha_salida" name="fecha_salida" required>
                </div>
                <div class="form-group">
                    <label for="meses_en_empresa">Meses en la Empresa:</label>
                    <input type="text" class="form-control" id="meses_en_empresa" name="meses_en_empresa" required>
                </div>
                <div class="form-group">
                    <label for="total_prestado">Total Prestado:</label>
                    <input type="text" class="form-control" id="total_prestado" name="total_prestado" required>
                </div>
            </div>
        </div>
        <!-- Add more fields as needed -->
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button id="agregarClienteSubmitButton" type="submit" class="btn btn-primary">Agregar Cliente</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
    </form>
</div>
<!-- /.card-body -->

</div>
          </div>
          <!-- Add more form fields as needed -->
          
          
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
$sql = "SELECT c.Id, c.IdUsuario, c.Nombre, c.Apellido, c.Direccion, c.Cedula, c.CedulaPath, c.RNC, c.MontoTotalSolicitado, c.MontoTotalPrestado, c.MontoTotalPagado, c.Interes, c.MontoDeuda, c.Reenganchado, c.PerfilValidado, c.Puntos, c.FechaIngreso, c.FechaSalida, c.MesesEnEmpresa, usuarios.Usuario, c.FechaCreacion, c.FechaModificacion
FROM clientes as c
INNER JOIN usuarios ON c.Id = usuarios.IdCliente";
$result = $db->query($sql);

if ($result) {
    // Output the table structure
    echo '<div class="card">
              <div class="card-header">
              <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes</h1>
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
                  <a>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Agregar Cliente
</button>

<p></p>
                  </a>
                  
                  <th></th>
                  <th>Acciones</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dirección</th>
                    <th>Cédula</th>
                    <th>RNC</th>
                    <th>Monto Solicitado</th>
                    <th>Interés</th>
                    <th>Monto de Deuda</th>
                    <th>Reenganchado</th>
                    <th>Puntos</th>
                    <th>Fecha de Ingreso</th>
                    <th>Fecha de Salida</th>
                    <th>Meses en la Empresa</th>
                    <th>Total Prestado</th>
                    <th>Fecha de Creación</th>
                    <th>Fecha de Modificación</th>
                  </tr>
                  </thead>
                  <tbody>';

    // Loop through the fetched results and generate table rows
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>
        <td></td>
        <td>
          <a href="detalle_perfil.php?id=' . $row['Id'] . '" class="btn btn-info btn-sm">Ver perfil</a>
          <button class="btn btn-primary btn-sm edit-btn" data-id="' . $row['Id'] . '">Editar</button>
          <button class="btn btn-danger btn-sm delete-btn" data-id="' . $row['Id'] . '">Eliminar</button>
        </td>
                <td>' . $row['Usuario'] . '</td>
                <td>' . $row['Nombre'] . '</td>
                <td>' . $row['Apellido'] . '</td>
                <td>' . $row['Direccion'] . '</td>
                <td>' . $row['Cedula'] . '</td>
                <td>' . $row['RNC'] . '</td>
                <td>' . $row['MontoTotalSolicitado'] . '</td>
                <td>' . $row['Interes'] . '</td>
                <td>' . $row['MontoDeuda'] . '</td>
                <td>' . $row['Reenganchado'] . '</td>
                <td>' . $row['Puntos'] . '</td>
                <td>' . $row['FechaIngreso'] . '</td>
                <td>' . $row['FechaSalida'] . '</td>
                <td>' . $row['MesesEnEmpresa'] . '</td>
                <td>' . $row['MontoTotalPrestado'] . '</td>
                <td>' . $row['FechaCreacion'] . '</td>
                <td>' . $row['FechaModificacion'] . '</td>
              </tr>';
    }

    // Close the table body and card
    echo '</tbody>
          <tfoot>
            <tr>
            <th></th>
            <th>Acciones</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Cédula</th>
            <th>RNC</th>
            <th>Monto Solicitado</th>
            <th>Interés</th>
            <th>Monto de Deuda</th>
            <th>Reenganchado</th>
            <th>Puntos</th>
            <th>Fecha de Ingreso</th>
            <th>Fecha de Salida</th>
            <th>Meses en la Empresa</th>
            <th>Total Prestado</th>
            <th>Fecha de Creación</th>
            <th>Fecha de Modificación</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>';

    // Add a hidden form to hold the details for editing within the modal
    echo '<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <!-- Input fields for editing cliente information -->
                    <div class="row">
                        <!-- Group 1 -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="editId">ID:</label>
                                <input type="text" class="form-control" id="editId" name="editId" readonly>
                            </div>
                            <div class="form-group">
                                <label for="editNombre">Nombre:</label>
                                <input type="text" class="form-control" id="editNombre" name="editNombre">
                            </div>
                            <div class="form-group">
                                <label for="editApellido">Apellido:</label>
                                <input type="text" class="form-control" id="editApellido" name="editApellido">
                            </div>
                        </div>
                        <!-- Group 2 -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="editDireccion">Dirección:</label>
                                <input type="text" class="form-control" id="editDireccion" name="editDireccion">
                            </div>
                            <div class="form-group">
                                <label for="editCedula">Cédula:</label>
                                <input type="text" class="form-control" id="editCedula" name="editCedula">
                            </div>
                            <div class="form-group">
                                <label for="editRNC">RNC:</label>
                                <input type="text" class="form-control" id="editRNC" name="editRNC">
                            </div>
                        </div>
                        <!-- Group 3 -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="editMontoSolicitado">Monto Solicitado:</label>
                                <input type="text" class="form-control" id="editMontoSolicitado" name="editMontoSolicitado">
                            </div>
                            <div class="form-group">
                                <label for="editInteres">Interés:</label>
                                <input type="text" class="form-control" id="editInteres" name="editInteres">
                            </div>
                             <div class="form-group">
                                <label for="editNumeroCuentaBancaria">Numero de cuenta bancaria:</label>
                                <input type="text" class="form-control" id="editNumeroCuentaBancaria" name="editNumeroCuentaBancaria">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Group 4 -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="editMontoDeuda">Monto de Deuda:</label>
                                <input type="text" class="form-control" id="editMontoDeuda" name="editMontoDeuda">
                            </div>
                            <div class="form-group">
                                <label for="editReenganchado">Reenganchado:</label>
                                <input type="text" class="form-control" id="editReenganchado" name="editReenganchado">
                            </div>
                            <div class="form-group">
                                <label for="editPuntos">Puntos:</label>
                                <input type="text" class="form-control" id="editPuntos" name="editPuntos">
                            </div>
                        </div>
                        <!-- Group 5 -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="editFechaIngreso">Fecha de Ingreso:</label>
                                <input type="text" class="form-control" id="editFechaIngreso" name="editFechaIngreso">
                            </div>
                            <div class="form-group">
                                <label for="editFechaSalida">Fecha de Salida:</label>
                                <input type="text" class="form-control" id="editFechaSalida" name="editFechaSalida">
                            </div>
                            <div class="form-group">
                                <label for="editMesesEnEmpresa">Meses en la Empresa:</label>
                                <input type="text" class="form-control" id="editMesesEnEmpresa" name="editMesesEnEmpresa">
                            </div>
                            <div class="form-group">
                <label for="clienteEntidadBancaria">Entidad Bancaria:</label>
                <select class="form-control" id="clienteEntidadBancaria" name="clienteEntidadBancaria" required>
                    <option value="Banreservas" selected>--Entidad Bancaria--</option>
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
                        <!-- Group 6 -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="editTotalPrestado">Total Prestado:</label>
                                <input type="text" class="form-control" id="editTotalPrestado" name="editTotalPrestado">
                            </div>
                            <div class="form-group">
                                <label for="editTotalPrestado">Perfil validado:</label>
                                <select class="form-control" id="perfilValidado" name="perfilValidado" required>
                                <option value="0" selected>No</option>
                                <option value="1">Si</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="editClienteTipoCuentaBancaria">Tipo cuenta bancaria:</label>
                              <select class="form-control" id="editClienteTipoCuentaBancaria" name="editClienteTipoCuentaBancaria" required>
                                  <option value="" selected>--Tipo de Cuenta--</option>
                                  <option value="Cuenta de ahorros">Cuenta de ahorros</option>
                                  <option value="Cuenta corriente">Cuenta corriente</option>
                              </select>
                            </div>
                            <!-- Add more form groups for group 6 here -->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveChangesBtn">Guardar Cambios</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

';

    // Include jQuery library and custom script for handling click event and populating form fields within the modal
    echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
      $(".edit-btn").click(function() {
          var id = $(this).data("id");
          $.ajax({
              url: "fetch_cliente.php",
              type: "GET",
              data: { id: id },
              dataType: "json",
              success: function(response) {
                  // Clear previous values
                  $("#editForm")[0].reset();
                  console.log("reset");
                  // Populate modal fields
                  $("#editId").val(response.Id);
                  $("#editNombre").val(response.Nombre);
                  $("#editApellido").val(response.Apellido);
                  $("#editDireccion").val(response.Direccion);
                  console.log(response.Nombre);
                  console.log(response);
                  $("#editCedula").val(response.Cedula);
                  $("#editRNC").val(response.RNC);
                  $("#editNumeroCuentaBancaria").val(response.NumeroCuentaBancaria);
                  $("#editClienteTipoCuentaBancaria").val(response.TipoDeCuentaBancaria);
                  $("#clienteEntidadBancaria").val(response.EntidadBancaria);
                  $("#editMontoSolicitado").val(response.MontoTotalSolicitado);
                  $("#editInteres").val(response.Interes);
                  $("#editMontoDeuda").val(response.MontoDeuda);
                  $("#editReenganchado").val(response.Reenganchado);
                  $("#editPuntos").val(response.Puntos);
                  $("#editFechaIngreso").val(response.FechaIngreso);
                  $("#editFechaSalida").val(response.FechaSalida);
                  $("#editMesesEnEmpresa").val(response.MesesEnEmpresa);
                  $("#editTotalPrestado").val(response.TotalPrestado);
                  $("#editModal").modal("show");
              },
              error: function(xhr, status, error) {
                  console.error(xhr.responseText);
              }
          });
      });
  
      $("#saveChangesBtn").click(function() {
          var formData = $("#editForm").serialize();
          $.ajax({
              url: "update_cliente.php",
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
$(".delete-btn").click(function() {
    var id = $(this).data("id");
    if (confirm("¿Estás seguro que quieres borrar este cliente?")) {
        $.ajax({
            url: "delete_cliente.php",
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

<script>

// Flag to track whether an option has been selected
var optionSelected = false;

// Function to fetch autosuggestion data from the database
function fetchUsuarios(str) {
  window.globalVariable = true;
    if (str.length == 0) {
        document.getElementById("usuarioDropdown").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("usuarioDropdown").innerHTML = this.responseText;

                // Add event listeners to the options
                var options = document.querySelectorAll(".dropdown-content .option");
                options.forEach(function(option) {
                    option.addEventListener("click", function() {
                        // Set the input field value to the selected option
                        document.getElementById("usuarioInput").value = this.textContent;
                        // Clear the dropdown after selecting an option
                        document.getElementById("usuarioDropdown").innerHTML = "";
                        // Set the flag to true since an option has been selected
                        console.log("optionSelected = true")
                        optionSelected = true;
                        if (optionSelected) {
                          console.log("la selesionate");
                          const beneficiarioTextField = document.getElementById('usuarioInput');
                          const agregarPrestamoButton = document.getElementById('agregarClienteSubmitButton');
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
      const beneficiarioTextField = document.getElementById('usuarioInput');
    const agregarPrestamoButton = document.getElementById('agregarClienteSubmitButton');
    // Add a class to the element/
    beneficiarioTextField.classList.add('is-invalid');
    agregarPrestamoButton.classList.add('disabled');
    }
    }
}

// Event listener to call fetchUsuarios function when the input field value changes
document.getElementById("usuarioInput").addEventListener("input", function() {
    // Reset the flag when the input changes
    optionSelected = false;
    fetchUsuarios(this.value);
    
});


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

</body>
</html>
