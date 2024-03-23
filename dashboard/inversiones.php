<?php
require('../includes/config.php');

if ($user->is_logged_in() && !$_SESSION['isAdmin']) {
  header('Location: http://localhost/ClientsApplicationsandProducts/clients/index.php');
  exit();  
} elseif (!$user->is_logged_in()) {
  header('Location: http://localhost/ClientsApplicationsandProducts/index.php');
  exit();  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inversiones</title>


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
                <a href="#" class="nav-link active">
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
        <h4 class="modal-title">Agregar Inversión</h4>
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
    <form action="add_inversion.php" method="post">
    <div class="row">
        <!-- Group 3 -->
        <div class="col-sm-8">
            <div class="form-group">
                <label for="idCliente">Usuario:</label>
                <input type="text" class="form-control" id="idCliente" name="idCliente" required>
            </div>
            <div class="form-group">
                <label for="motivo">Motivo:</label>
                <input type="text" class="form-control" id="motivo" name="motivo" required>
            </div>
            <div class="form-group">
                <label for="tipoDeInversion">Tipo de Inversion:</label>
                <select class="form-control" id="tipoDeInversion" name="tipoDeInversion" required>
                  <option value="" selected>--Tipo de inversión--</option>
                    <option value="Por acciones">Inversion por acciones</option>
                    <option value="Por bonos">Inversion por bonos</option>
                    <option value="Fondos de inversión">Fondos de inversión</option>
                </select>
            </div>
        


        <div id="dividendoFields" style="display: none;">
            <div class="form-group">
                <label for="montoDividendoEsperado">Monto Dividendo Esperado:</label>
                <input type="text" class="form-control" id="montoDividendoEsperado" name="montoDividendoEsperado">
            </div>
            <div class="form-group">
                <label for="periodicidadDividendo">Periodicidad Dividendo:</label>
                <input type="text" class="form-control" id="periodicidadDividendo" name="periodicidadDividendo">
            </div>
            <div class="form-group">
                <label for="fechaPagoDividendo">Fecha Pago Dividendo:</label>
                <input type="text" class="form-control datepicker" id="fechaPagoDividendo" name="fechaPagoDividendo">
            </div>
            </div>
            


          <div id="bonoFields" style="display: none;">
            <div class="form-group">
                <label for="montoBono">Monto Bono:</label>
                <input type="text" class="form-control" id="montoBono" name="montoBono">
            </div>
            <div class="form-group">
                <label for="tasaInteresBono">Tasa Interes Bono:</label>
                <input type="text" class="form-control" id="tasaInteresBono" name="tasaInteresBono">
            </div>
            <div class="form-group">
                <label for="plazoBono">Plazo Bono:</label>
                <input type="text" class="form-control" id="plazoBono" name="plazoBono">
            </div>
            <div class="form-group">
                <label for="periodicidadInteres">Periodicidad Interes:</label>
                <input type="text" class="form-control" id="periodicidadInteres" name="periodicidadInteres">
            </div>
            <div class="form-group">
                <label for="fechaPagoBono">Fecha Pago Bono:</label>
                <input type="text" class="form-control datepicker" id="fechaPagoBono" name="fechaPagoBono">
            </div>
            </div>
            <div id="fondosDeInversionFields" style="display: none;">
            <div class="form-group">
                <label for="montoFondoInversion">Monto Fondo Inversion:</label>
                <input type="text" class="form-control" id="montoFondoInversion" name="montoFondoInversion">
            </div>
            <div class="form-group">
                <label for="tarifaAdministracion">Tarifa Administracion:</label>
                <input type="text" class="form-control" id="tarifaAdministracion" name="tarifaAdministracion">
            </div>
            <div class="form-group">
                <label for="periodicidadTarifaAdm">Periodicidad Tarifa Adm:</label>
                <input type="text" class="form-control" id="periodicidadTarifaAdm" name="periodicidadTarifaAdm">
            </div>
            <div class="form-group">
                <label for="cantParticipacion">Cantidad de Participacion:</label>
                <input type="text" class="form-control" id="cantParticipacion" name="cantParticipacion">
            </div>
            </div>
            </div>


        
        <!-- Group 4 -->
        <div class="col-sm-4">
            <div class="form-group">
                <label for="rendimientoTotal">Rendimiento Total:</label>
                <input type="text" class="form-control" id="rendimientoTotal" name="rendimientoTotal">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status">
            </div>
            <div class="form-group">
                <label for="pagoId">Pago ID:</label>
                <input type="text" class="form-control" id="pagoId" name="pagoId">
            </div>
        
         <div class="form-group">
                <label for="fechaPagoInicialInversion">Fecha Pago Inicial Inversion:</label>
                <input type="text" class="form-control datepicker" id="fechaPagoInicialInversion" name="fechaPagoInicialInversion">
            </div>
            <div class="form-group">
                <label for="fechaFinalInversion">Fecha Final Inversion:</label>
                <input type="text" class="form-control datepicker" id="fechaFinalInversion" name="fechaFinalInversion">
            </div>
            <div class="form-group">
                <label for="fechaDeAprobacion">Fecha de Aprobacion:</label>
                <input type="text" class="form-control datepicker" id="fechaDeAprobacion" name="fechaDeAprobacion">
            </div>
            </div>
    </div>
    <!-- Add more fields as needed -->
</form>

</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Get references to the dropdown and fields
    var tipoDeInversion = document.getElementById("tipoDeInversion");
    var dividendoFields = document.getElementById("dividendoFields");
    var bonoFields = document.getElementById("bonoFields");
    var fondoDeInversionFields = document.getElementById("fondosDeInversionFields");

    // Show or hide fields based on the selected option
    tipoDeInversion.addEventListener("change", function() {
       if (tipoDeInversion.value === "") {
            dividendoFields.style.display = "none";
            bonoFields.style.display = "none";
            fondoDeInversionFields.style.display = "none";
            // Show/hide other fields related to Inversion por acciones
        } else if (tipoDeInversion.value === "Por acciones") {
            dividendoFields.style.display = "block";
            bonoFields.style.display = "none";
            fondoDeInversionFields.style.display = "none";
            // Show/hide other fields related to Inversion por acciones
        } else if (tipoDeInversion.value === "Por bonos") {
            dividendoFields.style.display = "none";
            bonoFields.style.display = "block";
            fondoDeInversionFields.style.display = "none";
            // Show/hide other fields related to Inversion por bonos
        } else if (tipoDeInversion.value === "Fondos de inversión"){
            // Handle other types of inversion if needed
            dividendoFields.style.display = "none";
            bonoFields.style.display = "none";
            fondoDeInversionFields.style.display = "block";
        }
    });
});
</script>

    <!-- /.card-body -->
</div>
          </div>
          <!-- Add more form fields as needed -->
          
          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Agregar Inversión</button>
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

// Fetch data from the inversiones table
$sql = "SELECT * FROM inversiones";
$result = $db->query($sql);

if ($result) {
    // Output the table structure
    echo '<div class="card">
              <div class="card-header">
              <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inversiones</h1>
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
  Agregar Inversion
</button>
<p></p>
                  <th></th>
                  <th>Acciones</th>
                    <th>ID</th>
                    <th>ID Cliente</th>
                    <th>Motivo</th>
                    <th>Tipo de Inversion</th>
                    <th>Rendimiento Total</th>
                    <th>Status</th>
                    <th>Pago ID</th>
                    <th>Fecha Pago Inicial Inversion</th>
                    <th>Fecha Final Inversion</th>
                    <th>Fecha de Aprobacion</th>
                    <th>Fecha Creacion</th>
                  </tr>
                  </thead>
                  <tbody>';

    // Loop through the fetched results and generate table rows
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>
        <td></td>
        <td>
        <a style="white-space: nowrap !important;" href="detalle_inversion.php?id='. $row['Id'].'" class="btn btn-info btn-sm">Ver detalle</a>
        <div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->
            <button class="btn btn-primary btn-sm edit-btn" data-id="'. $row['Id'].'">Editar</button>
        </div>
        <div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->
            <button class="btn btn-danger btn-sm delete-btn" data-id="'. $row['Id'].'">Eliminar</button>
        </div>
        </td>
                <td>' . $row['Id'] . '</td>
                <td>' . $row['IdCliente'] . '</td>
                <td>' . $row['Motivo'] . '</td>
                <td>' . $row['TipoDeInversion'] . '</td>
                <td>' . $row['RendimientoTotal'] . '</td>
                <td>' . $row['Status'] . '</td>
                <td>' . $row['PagoId'] . '</td>
                <td>' . $row['FechaPagoInicialInversion'] . '</td>
                <td>' . $row['FechaFinalInversion'] . '</td>
                <td>' . $row['FechaDeAprobacion'] . '</td>
                <td>' . $row['FechaCreacion'] . '</td>
              </tr>';
    }

    // Close the table body and card
    echo '</tbody>
          <tfoot>
            <tr>
            <th></th>
                    <th>Acciones</th>
                    <th>ID</th>
                    <th>ID Cliente</th>
                    <th>Motivo</th>
                    <th>Tipo de Inversion</th>
                    <th>Rendimiento Total</th>
                    <th>Status</th>
                    <th>Pago ID</th>
                    <th>Fecha Pago Inicial Inversion</th>
                    <th>Fecha Final Inversion</th>
                    <th>Fecha de Aprobacion</th>
                    <th>Fecha Creacion</th>
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
                <h4 class="modal-title">Editar Inversion</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <!-- Input fields for editing inversion information -->
                    <div class="row">
                        <!-- Group 1 -->
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="editId">ID:</label>
                                <input type="text" class="form-control" id="editId" name="editId" readonly>
                            </div>
                            <div class="form-group">
                                <label for="editMotivo">Motivo:</label>
                                <input type="text" class="form-control" id="editMotivo" name="editMotivo">
                            </div>
                            <div class="form-group">
                                <label for="editTipoDeInversion">Tipo de Inversion:</label>
                                <input type="text" class="form-control" id="editTipoDeInversion" name="editTipoDeInversion">
                            </div>

                            <div id="editDividendoFields" style="display: none;">
                                <div class="form-group">
                                    <label for="editMontoDividendoEsperado">Monto Dividendo Esperado:</label>
                                    <input type="text" class="form-control" id="editMontoDividendoEsperado" name="editMontoDividendoEsperado">
                                </div>
                                <div class="form-group">
                                    <label for="editPeriodicidadDividendo">Periodicidad Dividendo:</label>
                                    <input type="text" class="form-control" id="editPeriodicidadDividendo" name="editPeriodicidadDividendo">
                                </div>
                                <div class="form-group">
                                    <label for="editFechaPagoDividendo">Fecha Pago Dividendo:</label>
                                    <input type="text" class="form-control datepicker" id="editFechaPagoDividendo" name="editFechaPagoDividendo">
                                </div>
                            </div>


                            <div id="editBonosFields" style="display: none;">
                                <div class="form-group">
                                    <label for="editMontoBono">Monto Bono:</label>
                                    <input type="text" class="form-control" id="editMontoBono" name="editMontoBono">
                                </div>
                                <div class="form-group">
                                    <label for="editTasaInteresBono">Tasa Interes Bono:</label>
                                    <input type="text" class="form-control" id="editTasaInteresBono" name="editTasaInteresBono">
                                </div>
                                <div class="form-group">
                                    <label for="editPlazoBono">Plazo Bono:</label>
                                    <input type="text" class="form-control" id="editPlazoBono" name="editPlazoBono">
                                </div>
                                <div class="form-group">
                                    <label for="editPeriodicidadInteres">Periodicidad Interes:</label>
                                    <input type="text" class="form-control" id="editPeriodicidadInteres" name="editPeriodicidadInteres">
                                </div>
                                <div class="form-group">
                                    <label for="editFechaPagoBono">Fecha Pago Bono:</label>
                                    <input type="text" class="form-control datepicker" id="editFechaPagoBono" name="editFechaPagoBono">
                                </div>
                            </div>

                            <div id="editFondoDeInversionFields" style="display: none;">
                                <div class="form-group">
                                    <label for="editMontoFondoInversion">Monto Fondo Inversion:</label>
                                    <input type="text" class="form-control" id="editMontoFondoInversion" name="editMontoFondoInversion">
                                </div>
                                <div class="form-group">
                                    <label for="editTarifaAdministracion">Tarifa Administracion:</label>
                                    <input type="text" class="form-control" id="editTarifaAdministracion" name="editTarifaAdministracion">
                                </div>
                                <div class="form-group">
                                    <label for="editPeriodicidadTarifaAdm">Periodicidad Tarifa Adm:</label>
                                    <input type="text" class="form-control" id="editPeriodicidadTarifaAdm" name="editPeriodicidadTarifaAdm">
                                </div>
                                <div class="form-group">
                                    <label for="editCantParticipacion">Cantidad de Participacion:</label>
                                    <input type="text" class="form-control" id="editCantParticipacion" name="editCantParticipacion">
                                </div>
                            </div>
                        </div>
                        <!-- Group 2 -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="editRendimientoTotal">Rendimiento Total:</label>
                                <input type="text" class="form-control" id="editRendimientoTotal" name="editRendimientoTotal">
                            </div>
                            <div class="form-group">
                                <label for="editStatus">Status:</label>
                                <input type="text" class="form-control" id="editStatus" name="editStatus">
                            </div>
                            <div class="form-group">
                                <label for="editPagoId">Pago ID:</label>
                                <input type="text" class="form-control" id="editPagoId" name="editPagoId">
                            </div>
                            <div class="form-group">
                                <label for="editFechaPagoInicialInversion">Fecha Pago Inicial Inversion:</label>
                                <input type="text" class="form-control datepicker" id="editFechaPagoInicialInversion" name="editFechaPagoInicialInversion">
                            </div>
                            <div class="form-group">
                                <label for="editFechaFinalInversion">Fecha Final Inversion:</label>
                                <input type="text" class="form-control datepicker" id="editFechaFinalInversion" name="editFechaFinalInversion">
                            </div>
                            <div class="form-group">
                                <label for="editFechaDeAprobacion">Fecha de Aprobacion:</label>
                                <input type="text" class="form-control datepicker" id="editFechaDeAprobacion" name="editFechaDeAprobacion">
                            </div>
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
    url: "fetch_inversion.php", // Changed to fetch inversion details
    type: "GET",
    data: { id: id },
    dataType: "json",
    success: function(response) {
        // Clear previous values
        $("#editForm")[0].reset();
        // Populate modal fields
        $("#editId").val(response.Id);
        $("#editMotivo").val(response.Motivo);
        $("#editTipoDeInversion").val(response.TipoDeInversion);
        $("#editMontoDividendoEsperado").val(response.MontoDividendoEsperado);
        $("#editPeriodicidadDividendo").val(response.PeriodicidadDividendo);
        $("#editFechaPagoDividendo").val(response.FechaPagoDividendo);
        $("#editMontoBono").val(response.MontoBono);
        $("#editTasaInteresBono").val(response.TasaInteresBono);
        $("#editPlazoBono").val(response.PlazoBono);
        $("#editPeriodicidadInteres").val(response.PeriodicidadInteres);
        $("#editFechaPagoBono").val(response.FechaPagoBono);
        $("#editMontoFondoInversion").val(response.MontoFondoInversion);
        $("#editTarifaAdministracion").val(response.TarifaAdministracion);
        $("#editPeriodicidadTarifaAdm").val(response.PeriodicidadTarifaAdm);
        $("#editCantParticipacion").val(response.CantParticipacion);
        $("#editParticipacionId").val(response.ParticipacionId);
        $("#editRendimientoTotal").val(response.RendimientoTotal);
        $("#editStatus").val(response.Status);
        $("#editPagoId").val(response.PagoId);
        $("#editFechaPagoInicialInversion").val(response.FechaPagoInicialInversion);
        $("#editFechaFinalInversion").val(response.FechaFinalInversion);
        $("#editFechaDeAprobacion").val(response.FechaDeAprobacion);
        // Show the modal
        $("#editModal").modal("show");

        var tipoDeInversion = response.TipoDeInversion;
        var dividendoFieldss = document.getElementById("editDividendoFields");
        var bonoFields = document.getElementById("editBonosFields");
        var fondoDeInversionFields = document.getElementById("editFondoDeInversionFields");

        if (tipoDeInversion === "") {
            dividendoFieldss.style.display = "none";
            bonoFields.style.display = "none";
            fondoDeInversionFields.style.display = "none";
            // Show/hide other fields related to Inversion por acciones
        } else if (tipoDeInversion === "Por acciones") {
            dividendoFieldss.style.display = "block";
            bonoFields.style.display = "none";
            fondoDeInversionFields.style.display = "none";
            // Show/hide other fields related to Inversion por acciones
        } else if (tipoDeInversion === "Por bonos") {
            dividendoFieldss.style.display = "none";
            bonoFields.style.display = "block";
            fondoDeInversionFields.style.display = "none";
            // Show/hide other fields related to Inversion por bonos
        } else if (tipoDeInversion === "Fondos de inversión"){
            // Handle other types of inversion if needed
            dividendoFieldss.style.display = "none";
            bonoFields.style.display = "none";
            fondoDeInversionFields.style.display = "block";
        }
    },
    error: function(xhr, status, error) {
        console.error(xhr);
    }
});
});

 $("#saveChangesBtn").click(function() {
          var formData = $("#editForm").serialize();
          $.ajax({
              url: "update_inversion.php",
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
  });</script>
  <script>
      // JavaScript for handling delete button click
$(".delete-btn").click(function() {
    var id = $(this).data("id");
    if (confirm("¿Estás seguro que quieres borrar esta inversion?")) {
        $.ajax({
            url: "delete_inversion.php",
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
});</script>';
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
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


</body>
</html>
