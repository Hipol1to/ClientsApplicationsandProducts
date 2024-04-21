 <?php
require('../includes/config.php');

if ($user->is_logged_in() && $_SESSION['isAdmin'] && $_SESSION['isProffileValidated'] && $_SESSION['isUserActive'] && isset($_SESSION['ClienteId'])) {
  header('Location: http://localhost/ClientsApplicationsandProducts/dashboard/index.php');
  exit();  
} elseif (!isset($_SESSION['ClienteId']) && $user->is_logged_in()) {
  header('Location: http://localhost/ClientsApplicationsandProducts/clients/completa_perfil.php');
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
  <title>Prestamos</title>


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

                 <!--
                 <li class="nav-item">
                <a href="inversiones.php" class="nav-link">
                  <i class="fas fa-chart-line nav-icon"></i>
                  <p>Inversiones</p>
                </a>
                 </li>
                 -->
                 
                 <li class="nav-item">
                <a href="pagos.php" class="nav-link">
                  <i class="fas fa-money-bill-wave nav-icon"></i>
                  <p>Pagos</p>
                </a>
                 </li>
                 <li class="nav-item">
                <a href="perfil.php" class="nav-link">
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
        <h4 class="modal-title">Solicitar Préstamo</h4>
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
            <div class="col-sm-6">
                <!-- Group 1
                <div class="form-group">
                    <label for="motivo">Descripcion:</label>
                    <input type="text" class="form-control" id="motivo" name="motivo" required>
                </div> -->
                <div class="form-group">
                    <label for="montoSolicitado">Monto Solicitado:</label>
                    <input type="text" class="form-control" id="montoSolicitado" name="montoSolicitado" step=".01" required>
                </div>
                <div class="form-group">
    <label for="cantPagosPorMes">Cantidad cuotas mensuales:</label>
    <input type="number" class="form-control" id="cantPagosPorMes" name="cantPagosPorMes" min="1" max="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="1" required>

</div>
<div class="form-group">
  <label id="labelMontoCuotas" for="cantPagosPorMes">Monto Cuotas:</label>
<div id="cuotasDiasDePagoContainer"></div>
</div>
            </div>
            <div class="col-sm-4">
               <!-- Group 2 -->
                <div class="form-group">
                 <label for="cantMeses">Plazo:</label>
                  <select class="form-control" id="cantMeses" name="cantMeses" required>
                 <option value="">Seleccione el plazo</option>
        <!-- JavaScript will populate options here -->
                </select>
</div>
                <div class="form-group">
    <label for="fechaFinalPrestamo">Fecha Final de préstamo:</label>
    <input type="text" class="form-control" id="fechaFinalPrestamo" name="fechaFinalPrestamo" required readonly>
</div>
<div class="form-group">
    <label for="montoPagoMensual">Monto pago mensual:</label>
    <input type="text" class="form-control" id="montoPagoMensual" name="montoPagoMensual" required readonly>
</div>
                <div class="form-group">
    <label id="labelDiasDePagoDelMes" for="diasDePagoDelMes">Días de Pago del Mes:</label>
    <div id="diasDePagoContainer"></div>
    
    
</div>
            </div>
        </div>
        <!-- Add more fields as needed -->
        <div class="modal-footer">
            <button id="agregarPrestamoSubmitButton" type="submit" class="btn btn-primary">Solicitar Préstamo</button>
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
$sql = "SELECT * FROM prestamos WHERE IdCliente = ".$_SESSION['ClienteId'];
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
  Solicitar Prestamo
</button>
<p></p>
                  <th></th>
                  <th>Acciones</th>
                    <th>Concepto</th>
                    <th>Balance</th>
                    <th>Monto Solicitado</th>
                    <th>Status</th>
                    <th>Fecha próximo pago</th>
                    <th>Fecha final de prestamo</th>
                  </tr>
                  </thead>
                  <tbody>';

    // Loop through the fetched results and generate table rows
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $montoPagado = isset($row['MontoPagado']) ? $row['MontoPagado'] : 0.00;
      $row['MontoPagado'] = $montoPagado;
      error_log($row['MontoPagado']);
      error_log($row['MontoSolicitado']);
        echo '<tr>
        <td></td>
        <td>
    <a href="detalle_prestamo.php?id='. $row['Id'].'" class="btn btn-info btn-sm">Ver detalle</a>
</td>
                <td>' . $row['Motivo'] . '</td>
                <td>' . number_format((floatval($row['MontoSolicitado']) - floatval($row['MontoPagado'])), 2, '.', '') . '</td>
                <td>' . $row['MontoSolicitado'] . '</td>
                <td>' . $row['Status'] . '</td>
                <td>' . $row['FechaPagoMensual'] . '</td>
                <td>' . $row['FechaFinalPrestamo'] . '</td>
              </tr>';
    }

    // Close the table body and card
    echo '</tbody>
          <tfoot>
            <tr>
            <th></th>
                    <th>Acciones</th>
                    <th>Concepto</th>
                    <th>Balance</th>
                    <th>Monto Solicitado</th>
                    <th>Status</th>
                    <th>Fecha próximo pago</th>
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
    <form id="editForm">
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
                    <input type="text" class="form-control" id="editMontoSolicitado" name="editMontoSolicitado">
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
                    <input type="text" class="form-control" id="editStatus" name="editStatus">
                </div>
                <div class="form-group">
                    <label for="editPagoId">Pago ID:</label>
                    <input type="text" class="form-control" id="editPagoId" name="editPagoId">
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
            </div>
            <!-- Group 6 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editDiasDePagoDelMes">Dias de Pago del Mes:</label>
                    <input type="text" class="form-control" id="editDiasDePagoDelMes" name="editDiasDePagoDelMes">
                </div>
                <div class="form-group">
                    <label for="editCantPagosPorMes">Frecuencia Pago Mensual:</label>
                    <input type="text" class="form-control" id="editCantPagosPorMes" name="editCantPagosPorMes">
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
</div>';

// Include jQuery library and custom script for handling click event and populating form fields within the modal
echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
$(".edit-btn").click(function() {
var id = $(this).data("id");
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
        $("#editRemitente").val(response.Remitente);
        $("#editBeneficiario").val(response.Beneficiario);
        $("#editStatus").val(response.Status);
        $("#editFechaFinalPrestamo").val(response.FechaFinalPrestamo);
        $("#editCuotasTotales").val(response.CuotasTotales);
        $("#editDiasDePagoDelMes").val(response.DiasDePagoDelMes);
        $("#editCantPagosPorMes").val(response.CantPagosPorMes);
        $("#editFechaDeAprobacion").val(response.FechaDeAprobacion);
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
  $(document).ready(function(){
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      startDate: new Date() // Set the start date as today
    });
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
    containerCuotas.innerHTML = "";

    

    // Generate select elements
    for (var i = 0; i < numSelects; i++) {
      var montoSolicitadoInputValue = parseFloat(document.getElementById('montoSolicitado').value);
    console.log(montoSolicitadoInputValue);
    var plazoInputElementValue = parseFloat(document.getElementById('cantMeses').value);
    console.log(plazoInputElementValue);
    var monthlyAmmount = montoSolicitadoInputValue / plazoInputElementValue;
    console.log(monthlyAmmount);
    var eachCuotaValue = monthlyAmmount / numSelects;
    console.log(eachCuotaValue +" wais " + numSelects);

        var labelCuota = document.createElement("label");
        labelCuota.setAttribute("for", "cuotasNo_" + (i+1));
        labelCuota.textContent="Monto cuota #" +(i+1);
        labelCuota.style.fontWeight = 400;

        let inputCuota = document.createElement("input");
        inputCuota.className = "form-control";
        inputCuota.name = "cuotasNo_" + (i+1);
        inputCuota.id = "cuotasNo_" + (i+1);
        inputCuota.required = true;
        //console.log(i);
        inputCuota.value = eachCuotaValue.toFixed(2);
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
          });
          
        
        var select = document.createElement("select");
        select.className = "form-control";
        select.name = "diasDePagoDelMes_" + (i+1); // Append index to name
        select.id = "diasDePagoDelMes_" + (i+1); // Append index to id

         //Generate options for each select
        for (var j = 1; j <= 28; j++) {
            var option = document.createElement("option");
            option.value = "Dia# "+j;
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
/*document.getElementById("beneficiarioInput").addEventListener("input", function() {
    // Reset the flag when the input changes
    optionSelected = false;
    fetchUsuarios(this.value);
    
});*/

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
var montoSolicitadoInputValue = parseFloat(document.getElementById('montoSolicitado').value);
console.log(montoSolicitadoInputValue);
var plazoInputElementValue = parseFloat(document.getElementById('cantMeses').value);
console.log(plazoInputElementValue);
var monthlyAmmount = montoSolicitadoInputValue / plazoInputElementValue;
monthlyAmmount = Math.floor(monthlyAmmount * 100) / 100;
monthlyAmmount = monthlyAmmount.toFixed(2);
console.log(monthlyAmmount);
console.log(sum);

if (sum == monthlyAmmount) {
    console.log("The sum of values from input elements matches the value of the other input element.");
    return true;
} else {
    console.log("eeeThe sum of values from input elements does not match the value of the other input element.");
    const menssage = "La suma de cuotas no coincide con el monto de pago mensual";
    const existingMenssage = document.querySelector('.error-message');
    if (!existingMenssage) showMessageBelowElement(inputElement, menssage);
    return false;
}

}

function isFormValid() {
    // Check for elements with 'is-invalid' class or disabled buttons
    const xpathExpression = "//*[contains(@class,'is-invalid')] | //button[contains(@class,'disabled')]";
    const result = document.evaluate(xpathExpression, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null);
    const element = result.singleNodeValue;
    let cantidadCuotasMensualeses =document.getElementById("cantPagosPorMes");
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
            if (!validateSumOfQuotes()) {
                return false;
            }
            
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
  const isObjectEmpty = (objectName) => {
  return Object.keys(objectName).length === 0
}

    // Function to calculate the date based on selected option
    function calculateDate() {
        var montoSolirsistado = document.getElementById("montoSolicitado").value;
        var select = document.getElementById("cantMeses");
        var selectedOption = select.options[select.selectedIndex].value;
        if (selectedOption == null || selectedOption == undefined || isObjectEmpty(selectedOption)) {
          selectedOption = 0;
          //console.log(selectedOption);
        }
        if (selectedOption != 0) {
        // Get the current date
        var currentDate = new Date();

        // Add the selected number of months to the current date
        currentDate.setMonth(currentDate.getMonth() + parseInt(selectedOption));
        
        // Set the value of the date input field
        document.getElementById("fechaFinalPrestamo").value = currentDate.getFullYear() + "-" + (currentDate.getMonth() + 1).toString().padStart(2, '0') + "-" + currentDate.getDate().toString().padStart(2, '0');
        } else {
          document.getElementById("fechaFinalPrestamo").value = null;
        }
        var eiPlazo = document.getElementById("cantMeses").value;
        montoSolirsistado = parseFloat(montoSolirsistado).toFixed(2);
        console.log(eiPlazo);
        console.log(montoSolirsistado);
        document.getElementById("montoPagoMensual").value = montoSolirsistado / eiPlazo;
        var roundedResult = (Math.floor(document.getElementById("montoPagoMensual").value * 100) / 100).toFixed(2);
        document.getElementById("montoPagoMensual").value =roundedResult;
        var valueMontoPagoMensual = document.getElementById("montoPagoMensual").value;
        valueMontoPagoMensual = parseFloat(valueMontoPagoMensual).toFixed(2);
        document.getElementById("montoPagoMensual").value = valueMontoPagoMensual;
        console.log("ete esel balor " + document.getElementById("montoPagoMensual").value);
    }

    // Add event listener to the select element
    document.getElementById("cantMeses").addEventListener("change", calculateDate);

    // Populate options for the select element
    var select = document.getElementById("cantMeses");
    for (var i = 1; i <= 60; i++) {
        var option = document.createElement("option");
        option.value = i;
        if (i == 1) {
          option.text = i + " Mes";
        } else {
          option.text = i + " Meses";
        }
        select.appendChild(option);
    }

    // Initial calculation based on the default selected option
    calculateDate();
</script>
<script>
// Get the input element
var inputElement = document.getElementById('montoSolicitado');

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
</body>
</html>
