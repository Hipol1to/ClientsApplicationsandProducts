<?php
require('../includes/config.php');

if (!$user->is_logged_in()) { 
	header('Location: ../index.php'); 
	// exit(); 
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
  <!-- Navbar -->
  
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
                    <input type="text" class="form-control" id="direccion" name="direccion">
                </div>
            </div>
            <div class="col-sm-4">
                <!-- Group 2 -->
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
            <div class="col-sm-4">
                <!-- Group 3 -->
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
            <div class="col-sm-4">
                <!-- Group 4 -->
                <div class="form-group">
                    <label for="reenganchado">Reenganchado:</label>
                    <input type="text" class="form-control" id="reenganchado" name="reenganchado">
                </div>
                <div class="form-group">
                    <label for="puntos">Puntos:</label>
                    <input type="text" class="form-control" id="puntos" name="puntos">
                </div>
                <div class="form-group">
                    <label for="fecha_ingreso">Fecha de Ingreso:</label>
                    <input type="text" class="form-control" id="fecha_ingreso" name="fecha_ingreso">
                </div>
            </div>
            <div class="col-sm-4">
                <!-- Group 5 -->
                <div class="form-group">
                    <label for="fecha_salida">Fecha de Salida:</label>
                    <input type="text" class="form-control" id="fecha_salida" name="fecha_salida">
                </div>
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
            <button type="submit" class="btn btn-primary">Agregar Cliente</button>
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
$sql = "SELECT * FROM clientes";
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
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dirección</th>
                    <th>Cédula</th>
                    <th>RNC</th>
                    <th>Monto Solicitado</th>
                    <th>Interés</th>
                    <th>ID de Pago</th>
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
                <td>' . $row['Id'] . '</td>
                <td>' . $row['Nombre'] . '</td>
                <td>' . $row['Apellido'] . '</td>
                <td>' . $row['Direccion'] . '</td>
                <td>' . $row['Cedula'] . '</td>
                <td>' . $row['RNC'] . '</td>
                <td>' . $row['MontoSolicitado'] . '</td>
                <td>' . $row['Interes'] . '</td>
                <td>' . $row['IdPago'] . '</td>
                <td>' . $row['MontoDeuda'] . '</td>
                <td>' . $row['Reenganchado'] . '</td>
                <td>' . $row['Puntos'] . '</td>
                <td>' . $row['FechaIngreso'] . '</td>
                <td>' . $row['FechaSalida'] . '</td>
                <td>' . $row['MesesEnEmpresa'] . '</td>
                <td>' . $row['TotalPrestado'] . '</td>
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
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Cédula</th>
            <th>RNC</th>
            <th>Monto Solicitado</th>
            <th>Interés</th>
            <th>ID de Pago</th>
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
                                <label for="editIdPago">ID de Pago:</label>
                                <input type="text" class="form-control" id="editIdPago" name="editIdPago">
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
                        </div>
                        <!-- Group 6 -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="editTotalPrestado">Total Prestado:</label>
                                <input type="text" class="form-control" id="editTotalPrestado" name="editTotalPrestado">
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
<script src="./dist/js/demo.js"></script>
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
