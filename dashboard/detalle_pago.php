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

// Check if ID parameter is set
if(isset($_GET['id'])) {
    $pago_id = $_GET['id'];
    
    // Fetch pago details from the database
    $sql = "SELECT * FROM pagos WHERE Id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $pago_id);
    $stmt->execute();
    $pago = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Check if pago exists
    if(!$pago) {
        echo "Pago no encontrado";
        exit();
    }
} else {
    echo "Id de Pago no enviado";
    exit();
}

// Handle form submission for updating pago status
if(isset($_POST['actualizarStatus'])) {
    $status = $_POST['status'];
    
    // Update pago status in the database
    $sql = "UPDATE pagos SET Status = :status WHERE Id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $pago_id);
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
  <title>Detalle Pago</title>


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
                                    <a class="nav-link active" id="detalle-tab" data-toggle="pill" href="#detalle" role="tab" aria-controls="detalle" aria-selected="true">Detalle Pago</a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="card-body">
    <div class="tab-content" id="custom-tabs-one-tabContent">
        <div class="tab-pane fade show active" id="detalle" role="tabpanel" aria-labelledby="detalle-tab">
            <!-- Detalle Perfil Content Here -->
            <!-- <div class="form-group">
                <label for="estadoPago">Status del Pago:</label>
                <select class="form-control" id="estadoPago">
                    <option value="Aprobado" <?php //if($pago['Status'] == 'Aprobado') echo 'selected'; ?>>Aprobado</option>
                    <option value="En proceso" <?php //if($pago['Status'] == 'En proceso') echo 'selected'; ?>>En proceso</option>
                    <option value="Rechazado" <?php// if($pago['Status'] == 'Rechazado') echo 'selected'; ?>>Rechazado</option>
                </select>
            </div>
            <button type="button" class="btn btn-primary" id="actualizarStatus">Actualizar status</button> -->
            <?php
            // Check if the ID parameter is set in the URL
            if(isset($_GET['id'])) {
                // Sanitize the input to prevent SQL injection
                $pago_id = htmlspecialchars($_GET['id']);

                // Fetch client details from the database using the ID
                $sql = "SELECT * FROM pagos WHERE Id = :id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id', $pago_id);
                $stmt->execute();

                // Check if a client with the specified ID exists
                if($stmt->rowCount() > 0) {
                    // Fetch the client's details
                    $pago = $stmt->fetch(PDO::FETCH_ASSOC);
                    $voucerPath = isset($pago['VoucherPath']) ? $pago['VoucherPath'] : null;
                    $isEnabled = false;
                    // Display pago details
echo '<div class="form-group">';
echo '<label for="motivo">Motivo:</label>';
echo '<input type="text" class="form-control" id="motivo" name="motivo" value="'.htmlspecialchars($pago['Motivo']).'" readonly>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="cuentaRemitente">Cuenta Remitente:</label>';
echo '<input type="text" class="form-control" id="cuentaRemitente" name="cuentaRemitente" value="'.htmlspecialchars($pago['CuentaRemitente']).'" readonly>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="tipoCuentaRemitente">Tipo Cuenta Remitente:</label>';
echo '<input type="text" class="form-control" id="tipoCuentaRemitente" name="tipoCuentaRemitente" value="'.htmlspecialchars($pago['TipoCuentaRemitente']).'" readonly>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="entidadBancariaRemitente">Entidad Bancaria Remitente:</label>';
echo '<input type="text" class="form-control" id="entidadBancariaRemitente" name="entidadBancariaRemitente" value="'.htmlspecialchars($pago['EntidadBancariaRemitente']).'" readonly>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="cuentaDestinatario">Cuenta Destinatario:</label>';
echo '<input type="text" class="form-control" id="cuentaDestinatario" name="cuentaDestinatario" value="'.htmlspecialchars($pago['CuentaDestinatario']).'" readonly>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="tipoCuentaDestinatario">Tipo Cuenta Destinatario:</label>';
echo '<input type="text" class="form-control" id="tipoCuentaDestinatario" name="tipoCuentaDestinatario" value="'.htmlspecialchars($pago['TipoCuentaDestinatario']).'" readonly>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="entidadBancariaDestinatario">Entidad Bancaria Destinatario:</label>';
echo '<input type="text" class="form-control" id="entidadBancariaDestinatario" name="entidadBancariaDestinatario" value="'.htmlspecialchars($pago['EntidadBancariaDestinatario']).'" readonly>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="monto">Monto:</label>';
echo '<input type="text" class="form-control" id="monto" name="monto" value="'.htmlspecialchars($pago['Monto']).'" readonly>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="tipo">Tipo:</label>';
echo '<input type="text" class="form-control" id="tipo" name="tipo" value="'.htmlspecialchars($pago['Tipo']).'" readonly>';
echo '</div>';

echo '<div class="form-group">';
echo '<label for="tipo">Comprobante de pago:</label>';
echo '<br>';
echo '<img src="../clients/'.$voucerPath.'" alt="Comprobante de pago no disponible" height="500px">';
echo '</div>';
                    // Continue displaying other client details as needed
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

            echo '
        </div>
    </div>
</div>';


echo '<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Pago</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <!-- Input fields for editing pago information -->
                    <div class="form-group">
                        <label for="editId">ID:</label>
                        <input type="text" class="form-control" id="editId" name="editId" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editIdCliente">ID Cliente:</label>
                        <input type="text" class="form-control" id="editIdCliente" name="editIdCliente" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editCuentaRemitente">Cuenta Remitente:</label>
                        <input type="text" class="form-control" id="editCuentaRemitente" name="editCuentaRemitente" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editTipoCuentaRemitente">Tipo de Cuenta Remitente:</label>
                        <input type="text" class="form-control" id="editTipoCuentaRemitente" name="editTipoCuentaRemitente" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editEntidadBancariaRemitente">Entidad Bancaria Remitente:</label>
                        <input type="text" class="form-control" id="editEntidadBancariaRemitente" name="editEntidadBancariaRemitente" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editCuentaDestinatario">Cuenta Destinatario:</label>
                        <input type="text" class="form-control" id="editCuentaDestinatario" name="editCuentaDestinatario" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editTipoCuentaDestinatario">Tipo de Cuenta Destinatario:</label>
                        <input type="text" class="form-control" id="editTipoCuentaDestinatario" name="editTipoCuentaDestinatario" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editEntidadBancariaDestinatario">Entidad Bancaria Destinatario:</label>
                        <input type="text" class="form-control" id="editEntidadBancariaDestinatario" name="editEntidadBancariaDestinatario" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editMonto">Monto:</label>
                        <input type="text" class="form-control" id="editMonto" name="editMonto" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editMotivo">Motivo:</label>
                        <input type="text" class="form-control" id="editMotivo" name="editMotivo" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editTipo">Tipo:</label>
                        <input type="text" class="form-control" id="editTipo" name="editTipo" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editInversionId">ID de Inversión:</label>
                        <input type="text" class="form-control" id="editInversionId" name="editInversionId" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editPagoId">ID de Préstamo:</label>
                        <input type="text" class="form-control" id="editPago" name="editPago" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editFechaDePago">Fecha de Pago:</label>
                        <input type="text" class="form-control" id="editFechaDePago" name="editFechaDePago" readonly>
                    </div>
                </form>
            </div>

            <!-- No save button as requested -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
';
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
                  $("#editMontoSolicitado").val(response.MontoSolicitado);
                  $("#editInteres").val(response.Interes);
                  $("#editIdPago").val(response.IdPago);
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
