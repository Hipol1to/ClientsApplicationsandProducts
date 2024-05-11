 <?php
require('../includes/config.php');

if ($user->is_logged_in() && !$_SESSION['isAdmin'] && $_SESSION['isProffileValidated'] && $_SESSION['isUserActive']) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProducts/clients/index.php');
  exit();  
} elseif (!$user->is_logged_in()) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProducts/index.php');
  exit();  
} elseif (!isset($_SESSION['ClienteId'])) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProducts/clients/completa_perfil.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Prestamos</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Include jQuery -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="icon" href="../assets/img/inversiones_everest.png" type="image/x-icon">
  <link rel="shortcut icon" href="../assets/img/inversiones_everest.png" type="image/x-icon">

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

  <!-- Bootstrap Datepicker CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
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
        <h4 class="modal-title">Agregar Prestamo</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal Body -->
      <div class="modal-body">
        <!-- Form -->
          <!-- Form fields -->
          <div class="form-group">
            <div class="card">
    <div class="card-header">
        <h3 class="card-title"></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <form onsubmit="return isFormValid()" id="formAddPrestamo" action="add_prestamo.php" method="post">
        <div class="row">
            <div class="col-sm-4">
                <!-- Group 1 -->
                <div class="form-group">
                    <label for="motivo">Motivo:</label>
                    <input type="text" class="form-control" id="motivo" name="motivo" required>
                </div>
                <div class="form-group">
                    <label for="montoSolicitado">Monto Solicitado:</label>
                    <input type="text" class="form-control" id="montoSolicitado" name="montoSolicitado" required>
                </div>
                <div class="form-group">
                    <label for="montoAprobado">Monto Aprobado:</label>
                    <input type="text" class="form-control" id="montoAprobado" name="montoAprobado" required>
                </div>
            </div>
            <div class="col-sm-4">
                <!-- Group 2 -->
                <div class="form-group">
                    <label for="montoPagado">Monto Pagado:</label>
                    <input type="text" class="form-control" id="montoPagado" name="montoPagado" required>
                </div>
                <div class="form-group">
                    <label for="tasaDeInteres">Tasa de Interes:</label>
                    <input type="text" class="form-control" id="tasaDeInteres" name="tasaDeInteres" required>
                </div>
                <div class="form-group">
                    <label for="montoRecargo">Monto Recargo:</label>
                    <input type="text" class="form-control" id="montoRecargo" name="montoRecargo" required>
                </div>
            </div>
            <div class="col-sm-4">
                <!-- Group 3 -->
                <div class="form-group">
                    <label for="remitente">Remitente:</label>
                    <input type="text" class="form-control" id="remitente" name="remitente" required>
                </div>
                <div class="form-group">
                  <label for="beneficiario">Usuario Beneficiario:</label>
                  <input type="text" class="form-control" id="beneficiarioInput" name="beneficiario" required>
                  <div id="beneficiarioDropdown" class="dropdown-content"></div>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                    <option value="Aprobado">Aprobado</option>
                    <option value="Rechazado">Rechazado</option>
                    <option value="En revision">En revisión</option>
                    <option value="Saldado">Saldado</option>
                    <option value="Moroso">Moroso</option>
                </select>
                </div>
            </div>
            <div class="col-sm-4">
                <!-- Group 4 -->
                <div class="form-group">
    <label for="fechaFinalPrestamo">Fecha Final de prestamo:</label>
    <input type="text" class="form-control datepicker" id="fechaFinalPrestamo" name="fechaFinalPrestamo" required>
  </div>
                <div class="form-group">
                    <label for="cuotasTotales">Cuotas Totales:</label>
                    <input type="text" class="form-control" id="cuotasTotales" name="cuotasTotales" required>
                </div>
                
            </div>
            <div class="col-sm-4">
                <!-- Group 5 -->
                <div class="form-group">
    <label for="cantPagosPorMes">Cantidad de Pagos por Mes:</label>
    <input type="number" class="form-control" id="cantPagosPorMes" name="cantPagosPorMes" required>
</div>
                <div class="form-group">
                    <label for="fechaDeAprobacion">Fecha de Aprobacion:</label>
                    <input type="text" class="form-control datepicker" id="fechaDeAprobacion" name="fechaDeAprobacion" required>
                </div>
                <!-- Add more form groups for group 5 here -->
            </div>
            <div class="col-sm-4">
                <!-- Group 6 -->
                <div class="form-group">
    <label id="labelDiasDePagoDelMes" for="diasDePagoDelMes">Días de Pago del Mes:</label>
    <div id="diasDePagoContainer"></div>
    
    </select>
</div>
                <!-- Add more form groups for group 5 here -->
            </div>
        </div>
        <!-- Add more fields as needed -->
        <div class="modal-footer">
            <button id="agregarPrestamoSubmitButton" type="submit" class="btn btn-primary">Agregar Préstamo</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
      </form>
</div>
<!-- /.card-body -->

</div>
          </div>
          <!-- Add more form fields as needed -->
          
          <!-- Modal Footer -->
          
        
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
$sql = "SELECT p.Id AS IdPrestamo, p.IdCliente AS IdClientePrestamo, Motivo, MontoSolicitado, MontoAprobado, MontoPagado, TasaDeInteres, MontoRecargo, Remitente, Beneficiario, p.Status AS StatusPrestamo, PagoId, FechaPagoMensual, FechaFinalPrestamo, CuotasTotales, DiasDePagoDelMes, CantPagosPorMes, FechaDeAprobacion, p.FechaCreacion, p.FechaModificacion, u.Id AS IdUsuario, u.IdCliente AS IdClienteUsiario, Usuario, Email, Active AS isActive FROM prestamos as p
JOIN usuarios as u WHERE p.IdCliente = u.IdCliente";
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
    <a href="detalle_prestamo.php?id='. $row['IdPrestamo'].'" class="btn btn-info btn-sm">Ver detalle</a>
    <div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->
        <button class="btn btn-primary btn-sm edit-btn" data-id="'. $row['IdPrestamo'].'">Editar</button>
    </div>
    <div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->
        <button class="btn btn-danger btn-sm delete-btn" data-id="'. $row['IdPrestamo'].'">Eliminar</button>
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

    // Add a hidden form to hold the details for editing within the modal
echo '<div id="editModal" class="modal fade" role="dialog">
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
                    <input type="text" class="form-control datepicker" id="editFechaFinalPrestamo" name="editFechaFinalPrestamo" required>
                </div>
                <div class="form-group">
                    <label for="editCuotasTotales">Cuotas Totales:</label>
                    <input type="text" class="form-control" id="editCuotasTotales" name="editCuotasTotales">
                </div>
                <div class="form-group">
                    <label for="editCantMeses">Cant. total meses:</label>
                    <input type="text" class="form-control" id="editCantMeses" name="editCantMeses">
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
                    <input type="text" class="form-control datepicker" id="editFechaDeAprobacion" name="editFechaDeAprobacion" required>
                    <input type="text" class="form-control" id="editDiasDePagoDelMes" name="editDiasDePagoDelMes" hidden>
                </div>
                <div class="form-group">
                    <label for="editMontoPagoMensual">Monto de pago mensual calculado:</label>
                    <input type="text" class="form-control" id="editMontoPagoMensual" name="editMontoPagoMensual" readonly>
                </div>
                <div class="form-group">
                    <label for="editMontoPagoMensual">Monto de pago mensual esperado:</label>
                    <input type="text" class="form-control" id="editMontoPagoEsperado" name="editMontoPagoEsperado" readonly>
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
              let sumOfTheQuotes = getEditSumOfQuotes();
              var montoMensualInput = document.getElementById("editMontoPagoMensual");
              montoMensualInput.value = sumOfTheQuotes;
              var currentMontoMensual = parseFloat(montoMensualInput.value).toFixed(2);

              var montoMensualAprobadoInput = document.getElementById("editMontoAprobado");
              var montoAprobadoValue =parseFloat(montoMensualAprobadoInput.value).toFixed(2);

              var cuotasTotalesInput = document.getElementById("editCuotasTotales");
              var cantidadDeCuotasTotales =parseFloat(cuotasTotalesInput.value).toFixed(2);

              var montoEsperado = parseFloat(montoAprobadoValue/cantidadDeCuotasTotales).toFixed(2);
              //console.log("monto mensual esperado is: "+montoEsperado);
              var montoMensualEsperado = document.getElementById("editMontoPagoMensual");
              //montoMensualEsperado.value = montoEsperado;
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
            if(!isNullOrUndefinedOrEmpty(dia1)){
              var expectedIndex = dia1.replace(/\D/g, \'\');
              expectedIndex--;
            }else {
              var expectedIndex = 0;
            }
            select.selectedIndex = expectedIndex;
            console.log(expectedIndex);
            break;
            case 1:
            if(!isNullOrUndefinedOrEmpty(dia2)){
              var expectedIndex = dia2.replace(/\D/g, \'\');
              expectedIndex--;
            }else {
              if(dia1.replace(/\D/g, \'\') == 1){
                var expectedIndex = 2;
              }else{
                var expectedIndex = 1;
              }
              
            }
            select.selectedIndex = expectedIndex;
            console.log(expectedIndex);
            break;
            case 2:
            if(!isNullOrUndefinedOrEmpty(dia3)){
              var expectedIndex = dia3.replace(/\D/g, \'\');
              expectedIndex--;
            }else {
              if(dia1.replace(/\D/g, \'\') == 2){
                var expectedIndex = 3;
                dia2 = "Dia #3";
              }else{
                var expectedIndex = 2;
                dia2 = "Dia #2";
              }
            }
            select.selectedIndex = expectedIndex;
            console.log(expectedIndex);
            break;
            case 3:
            if(!isNullOrUndefinedOrEmpty(dia4)){
              var expectedIndex = dia4.replace(/\D/g, \'\');
              expectedIndex--;
            }else {
              if(dia2.replace(/\D/g, \'\') == 3){
                var expectedIndex = 4;
                dia2 = "Dia #4";
              }else{
                var expectedIndex = 3;
                dia2 = "Dia #3";
              }
            }
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
$(".edit-btn").click(function() {
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
        $("#editCantMeses").val(response.CantMesesDuracionPrestamo);

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
         console.log("dia 1: "+dia1);
         dia2 = diasesDePargos[1];
         console.log("dia 2: "+dia2);
         dia3 = diasesDePargos[2];
         console.log("dia 3: "+dia3);
         dia4 = diasesDePargos[3];
         console.log("dia 4: "+dia4);

        //console.log(formattedString);
        $("#editDiasDePagoDelMes").val(formattedString);
        $("#editCantPagosPorMes").val(response.CantPagosPorMes);
        document.getElementById("editCantPagosPorMes").addEventListener("change", generateOptionsEdit);
        generateOptionsEdit();
        $("#editFechaDeAprobacion").val(response.FechaDeAprobacion);
        $("#editMontoPagoMensual").val(response.MontoPagoMensual);
        
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
    url: "update_prestamo.php",
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
</script>';

// JavaScript for handling delete button click
echo '<script>
$(".delete-btn").click(function() {
var id = $(this).data("id");
if (confirm("¿Estás seguro que quieres borrar este préstamo?")) {
$.ajax({
    url: "delete_prestamo.php",
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
</script>';
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
  function isNullOrUndefinedOrEmpty(value) {
    return value === null || value === undefined || value === "";
}
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

// Event listener to call fetchUsuarios function when the input field value changes
document.getElementById("beneficiarioInput").addEventListener("input", function() {
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
var plazoInputElementValue = parseFloat(document.getElementById('editCantMeses').value);
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
    const menssage = "La suma de las cuotas no corresponde al monto mensual esperado";
    const existingMenssage = document.querySelector('.error-message');
    if (!existingMenssage) showMessageBelowElement(inputElement, menssage);
    return false;
}

}

function getEditSumOfQuotes() {
  
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
return sum;
/*if (sum === monthlyAmmount) {
    console.log("The sum of values from input elements matches the value of the other input element.");
    return true;
} else {
    console.log("eeeThe sum of values from input elements does not match the value of the other input element.");
    const menssage = "El monto de las cuotas no corresponde con el monto aprobado";
    const existingMenssage = document.querySelector('.error-message');
    if (!existingMenssage) showMessageBelowElement(inputElement, menssage);
    return false;
}*/

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
// Get the input element
var inputElement = document.getElementById('editMontoSolicitado');

// Attach an event listener to the input element
inputElement.addEventListener('input', function(event) {
    if (/[^0-9.]/.test(inputElement.value)) {
        // If it contains non-numeric characters, handle the validation here
        inputElement.value = "";
        // For example, you can show an error message or take appropriate action
    } else {
    
    // Save the cursor position
    var cursorPosition = inputElement.selectionStart;

    // Get the input value
    let oldInputValue = inputElement.value;

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
        inputElement.value = formattedValue;

        // Restore the cursor position
        inputElement.setSelectionRange(cursorPosition, cursorPosition);
    }
    }
});
</script>
<script>
// Get the input element
var inputElement = document.getElementById('editMontoAprobado');

// Attach an event listener to the input element
inputElement.addEventListener('input', function(event) {
    if (/[^0-9.]/.test(inputElement.value)) {
        // If it contains non-numeric characters, handle the validation here
        inputElement.value = "";
        // For example, you can show an error message or take appropriate action
    } else {
    
    // Save the cursor position
    var cursorPosition = inputElement.selectionStart;

    // Get the input value
    let oldInputValue = inputElement.value;

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
        inputElement.value = formattedValue;

        // Restore the cursor position
        inputElement.setSelectionRange(cursorPosition, cursorPosition);
    }
    }
    let sumOfTheQuotes = getEditSumOfQuotes();
              var montoMensualInput = document.getElementById("editMontoPagoMensual");
              montoMensualInput.value = sumOfTheQuotes;
              var currentMontoMensual = parseFloat(montoMensualInput.value).toFixed(2);

              var montoMensualAprobadoInput = document.getElementById("editMontoAprobado");
              var montoAprobadoValue =parseFloat(montoMensualAprobadoInput.value).toFixed(2);

              var mesesTotalesInput = document.getElementById("editCantMeses");
              var cantidadDeMesesTotales =parseFloat(mesesTotalesInput.value).toFixed(2);

              var montoEsperado = parseFloat(montoAprobadoValue/cantidadDeMesesTotales).toFixed(2);
              console.log("monto mensual esperado is: "+montoEsperado);
              var montoMensualEsperado = document.getElementById("editMontoPagoEsperado");
              montoMensualEsperado.value = montoEsperado;
});
</script>
<script>
// Get the input element
var inputElement = document.getElementById('editMontoPagado');

// Attach an event listener to the input element
inputElement.addEventListener('input', function(event) {
    if (/[^0-9.]/.test(inputElement.value)) {
        // If it contains non-numeric characters, handle the validation here
        inputElement.value = "";
        // For example, you can show an error message or take appropriate action
    } else {
    
    // Save the cursor position
    var cursorPosition = inputElement.selectionStart;

    // Get the input value
    let oldInputValue = inputElement.value;

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
        inputElement.value = formattedValue;

        // Restore the cursor position
        inputElement.setSelectionRange(cursorPosition, cursorPosition);
    }
    }
});
</script>
<script>
  // Function to dynamically generate options for select dropdown
  function generateOptions() {
    var container = document.getElementById("diasDePagoContainer");
    var containerCuotas = document.getElementById("cuotasDiasDePagoContainer");
    var numSelects = document.getElementById("cantPagosPorMes").value;

    // Clear existing selects
    container.innerHTML = "";
    //containerCuotas.innerHTML = "";

    // Generate select elements
    for (var i = 0; i < numSelects; i++) {
        var labelCuota = document.createElement("label");
        labelCuota.setAttribute("for", "cuotasNo_" + (i+1));
        labelCuota.textContent="Monto cuota #" +(i+1);
        labelCuota.style.fontWeight = 400;

        let inputCuota = document.createElement("input");
        inputCuota.className = "form-control";
        inputCuota.name = "cuotasNo_" + (i+1);
        inputCuota.id = "cuotasNo_" + (i+1);
        inputCuota.required = true;
        console.log(i);

         inputCuota.addEventListener('input', function(event) {
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
              let formattedValue = new Intl.NumberFormat('en-US', {
              style: 'currency',
              currency: 'USD'
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
            let sumOfTheQuotes = getEditSumOfQuotes();
              var montoMensualInput = document.getElementById("editMontoPagoMensual");
              montoMensualInput.value = sumOfTheQuotes;
              var currentMontoMensual = parseFloat(montoMensualInput.value).toFixed(2);

              var montoMensualAprobadoInput = document.getElementById("editMontoAprobado");
              var montoAprobadoValue =parseFloat(montoMensualAprobadoInput.value).toFixed(2);

              var mesesTotalesInput = document.getElementById("editCantMeses");
              var cantidadDeMesesTotales =parseFloat(mesesTotalesInput.value).toFixed(2);

              var montoEsperado = parseFloat(montoAprobadoValue/cantidadDeMesesTotales).toFixed(2);
              console.log("monto mensual esperado is: "+montoEsperado);
              var montoMensualEsperado = document.getElementById("editMontoPagoEsperado");
              montoMensualEsperado.value = montoEsperado;
});
        
        var select = document.createElement("select");
        select.className = "form-control";
        select.name = "diasDePagoDelMes_" + (i+1); // Append index to name
        select.id = "diasDePagoDelMes_" + (i+1); // Append index to id

         //Generate options for each select
        for (var j = 1; j <= 28; j++) {
            var option = document.createElement("option");
            option.value = j;
            option.text = "Día# " + j;
            select.appendChild(option);
        }

        // Append select to container
        select.selectedIndex = (i);
        container.appendChild(select);
        containerCuotas.appendChild(labelCuota);
        containerCuotas.appendChild(inputCuota);
        
        
        
    }
}

// Event listener to call generateOptions function when the number of days changes
document.getElementById("cantPagosPorMes").addEventListener("change", generateOptions);

// Initial call to generateOptions function to populate the select dropdown based on initial value
generateOptions();


</script>
<script>
  var editMontoSolicitadoInput = document.getElementById("editMontoSolicitado");
  var editMontoAprobadoInput = document.getElementById("editMontoAprobado");
  var editMontoPagadoInput = document.getElementById("editMontoPagado");
  var editTasaDeInteresInput = document.getElementById("editTasaDeInteres");
  var editMontoRecargoInput = document.getElementById("editMontoRecargo");
  var editMontoPagoMensualSugeridoInput = document.getElementById("editMontoPagoMensual");

  editMontoSolicitadoInput.addEventListener('input', function(event) {
          if (/[^0-9.]/.test(editMontoSolicitadoInput.value)) {
            // If it contains non-numeric characters, handle the validation here
            editMontoSolicitadoInput.value = "";
            // For example, you can show an error message or take appropriate action
          } else {
              // Save the cursor position
              var cursorPosition = editMontoSolicitadoInput.selectionStart;

              // Get the input value
              let oldInputValue = editMontoSolicitadoInput.value;

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
              editMontoSolicitadoInput.value = formattedValue;

              // Restore the cursor position
              editMontoSolicitadoInput.setSelectionRange(cursorPosition, cursorPosition);
              }
            }
          });
editMontoAprobadoInput.addEventListener('input', function(event) {
          if (/[^0-9.]/.test(editMontoAprobadoInput.value)) {
            // If it contains non-numeric characters, handle the validation here
            editMontoAprobadoInput.value = "";
            // For example, you can show an error message or take appropriate action
          } else {
              // Save the cursor position
              var cursorPosition = editMontoAprobadoInput.selectionStart;

              // Get the input value
              let oldInputValue = editMontoAprobadoInput.value;

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
              editMontoAprobadoInput.value = formattedValue;

              // Restore the cursor position
              editMontoAprobadoInput.setSelectionRange(cursorPosition, cursorPosition);
              }
            }
            let sumOfTheQuotes = getEditSumOfQuotes();
              var montoMensualInput = document.getElementById("editMontoPagoMensual");
              montoMensualInput.value = sumOfTheQuotes;
              var currentMontoMensual = parseFloat(montoMensualInput.value).toFixed(2);

              var montoMensualAprobadoInput = document.getElementById("editMontoAprobado");
              var montoAprobadoValue =parseFloat(montoMensualAprobadoInput.value).toFixed(2);

              var mesesTotalesInput = document.getElementById("editCantMeses");
              var cantidadDeMesesTotales =parseFloat(mesesTotalesInput.value).toFixed(2);

              var montoEsperado = parseFloat(montoAprobadoValue/cantidadDeMesesTotales).toFixed(2);
              console.log("monto mensual esperado is: "+montoEsperado);
              var montoMensualEsperado = document.getElementById("editMontoPagoEsperado");
              montoMensualEsperado.value = montoEsperado;
          });
editMontoPagadoInput.addEventListener('input', function(event) {
          if (/[^0-9.]/.test(editMontoPagadoInput.value)) {
            // If it contains non-numeric characters, handle the validation here
            editMontoPagadoInput.value = "";
            // For example, you can show an error message or take appropriate action
          } else {
              // Save the cursor position
              var cursorPosition = editMontoPagadoInput.selectionStart;

              // Get the input value
              let oldInputValue = editMontoPagadoInput.value;

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
              editMontoPagadoInput.value = formattedValue;

              // Restore the cursor position
              editMontoPagadoInput.setSelectionRange(cursorPosition, cursorPosition);
              }
            }
          });
editTasaDeInteresInput.addEventListener('input', function(event) {
          if (/[^0-9.]/.test(editTasaDeInteresInput.value)) {
            // If it contains non-numeric characters, handle the validation here
            editTasaDeInteresInput.value = "";
            // For example, you can show an error message or take appropriate action
          } else {
              // Save the cursor position
              var cursorPosition = editTasaDeInteresInput.selectionStart;

              // Get the input value
              let oldInputValue = editTasaDeInteresInput.value;

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
              editTasaDeInteresInput.value = formattedValue;

              // Restore the cursor position
              editTasaDeInteresInput.setSelectionRange(cursorPosition, cursorPosition);
              }
            }
          });
editMontoRecargoInput.addEventListener('input', function(event) {
          if (/[^0-9.]/.test(editMontoRecargoInput.value)) {
            // If it contains non-numeric characters, handle the validation here
            editMontoRecargoInput.value = "";
            // For example, you can show an error message or take appropriate action
          } else {
              // Save the cursor position
              var cursorPosition = editMontoRecargoInput.selectionStart;

              // Get the input value
              let oldInputValue = editMontoRecargoInput.value;

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
              editMontoRecargoInput.value = formattedValue;

              // Restore the cursor position
              editMontoRecargoInput.setSelectionRange(cursorPosition, cursorPosition);
              }
            }
          });
editMontoPagoMensualSugeridoInput.addEventListener('input', function(event) {
          if (/[^0-9.]/.test(editMontoPagoMensualSugeridoInput.value)) {
            // If it contains non-numeric characters, handle the validation here
            editMontoPagoMensualSugeridoInput.value = "";
            // For example, you can show an error message or take appropriate action
          } else {
              // Save the cursor position
              var cursorPosition = editMontoPagoMensualSugeridoInput.selectionStart;

              // Get the input value
              let oldInputValue = editMontoPagoMensualSugeridoInput.value;

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
              editMontoPagoMensualSugeridoInput.value = formattedValue;

              // Restore the cursor position
              editMontoPagoMensualSugeridoInput.setSelectionRange(cursorPosition, cursorPosition);
              }
            }
          });

</script>

</body>
</html>
