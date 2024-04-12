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

// Check if ID parameter is set


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
                <a href="prestamos.php" class="nav-link">
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
                <a href="#" class="nav-link active">
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
                                    <a class="nav-link" id="pagos-tab" data-toggle="pill" href="#pagosTabForPrestamos" role="tab" aria-controls="pagosTabForPrestamos" aria-selected="false">Estado de cuenta</a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="card-body">
    <div class="tab-content" id="custom-tabs-one-tabContent">
        <div class="tab-pane fade show active" id="detalle" role="tabpanel" aria-labelledby="detalle-tab">
            <!-- Detalle Perfil Content Here -->
            <?php
             $stmt = $db->prepare("SELECT c.Nombre AS Nombre, c.Apellido As Apellido, c.Direccion AS Direccion, c.Cedula AS Cedula, c.RNC AS RNC, c.MontoSolicitado AS MontoSolicitado, c.MontoDeuda AS MontoDeuda, c.Reenganchado AS Reenganchado, c.Puntos AS Puntos, c.FechaIngreso AS FechaIngreso, c.TotalPrestado AS TotalPrestado, u.Usuario, u.Email FROM clientes as c
             JOIN usuarios as u
             WHERE u.Id = :userId AND c.Id = :clientID");
             $stmt->bindParam(':userId', $_SESSION['userId']);
             $stmt->bindParam(':clientID', $_SESSION['ClienteId']);
             $stmt->execute();
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
             ?>
            <div class="modal-body">
              <form id="editForm">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="perfilUsuario">Usuario:</label>
                      <input type="text" class="form-control" id="perfilUsuario" name="perfilUsuario" value="<?php echo $result['Usuario'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="perfilEmail">Correo Electrónico:</label>
                      <input type="text" class="form-control" id="perfilEmail" name="perfilEmail" value="<?php echo $result['Email'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="perfilNombre">Nombre:</label>
                      <input type="text" class="form-control" id="perfilNombre" name="perfilNombre" value="<?php echo $result['Nombre'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="perfilApellido">Apellido:</label>
                      <input type="text" class="form-control" id="perfilApellido" name="perfilApellido" value="<?php echo $result['Apellido'];?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="perfilDireccion">Direccion:</label>
                    <input type="text" class="form-control" id="perfilDireccion" name="perfilDireccion" value="<?php echo $result['Direccion'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="perfilCedula">Cedula:</label>
                    <input type="text" class="form-control" id="perfilCedula" name="perfilCedula" value="<?php echo $result['Cedula'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="perfilRnc">RNC:</label>
                    <input type="text" class="form-control" id="perfilRnc" name="perfilRnc" value="<?php if (!isset($result['RNC'])) echo 'No aplica'; else echo $result['RNC'];?>" readonly>
                  </div>
                <div class="form-group">
                <label for="perfilMontoTotalSolicitado">Monto total solicitado:</label>
                <input type="text" class="form-control" id="perfilMontoTotalSolicitado" name="perfilMontoTotalSolicitado" value="<?php if (!isset($result['MontoSolicitado'])) echo 'RD$0'; else echo 'RD$'.$result['MontoSolicitado'];?>" readonly>
              </div>
              <div class="form-group">
                <label for="montoDeuda">Monto deuda:</label>
                <input type="text" class="form-control" id="montoDeuda" name="montoDeuda" value="<?php if (!isset($result['MontoDeuda'])) echo 'RD$0'; else echo 'RD$'.$result['MontoDeuda'];?>" readonly>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="perfilReenganchado">Reenganchado:</label>
                <input type="text" class="form-control" id="perfilReenganchado" name="perfilReenganchado" value="<?php if($result['Reenganchado'] == 1)echo 'Si'; else echo 'No'; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="perfilPuntos">Puntos:</label>
                <input type="text" class="form-control" id="perfilPuntos" name="perfilPuntos" value="<?php if (!isset($result['Puntos'])) echo '0 puntos'; else echo $result['Puntos'].' puntos';?>" readonly>
              </div>
              <div class="form-group">
                <label for="perfilFechaDeIngreso">Fecha de ingreso:</label>
                <input type="text" class="form-control" id="perfilFechaDeIngreso" name="perfilFechaDeIngreso" value="<?php echo $result['FechaIngreso'];?>" readonly>
              </div>
              <div class="form-group">
              <label for="perfilTotalPrestado">Total prestado:</label>
              <input type="text" class="form-control datepicker" id="perfilTotalPrestado" name="perfilTotalPrestado" value="<?php if (!isset($result['TotalPrestado'])) echo 'RD$0'; else echo 'RD$'.$result['TotalPrestado'];?>" readonly>
            </div>
          </div>
          <div class="col-sm-4">
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="tab-pane fade" id="pagosTabForPrestamos" role="tabpanel" aria-labelledby="nuevo-tab">
    <div class="card">
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
                
      </div>
      <!-- /.card-body -->
    

            
          </div>
        </div>
      </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                $("#addPrestamoId").val(31);
                console.log(31);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
    });

</script> </p>
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
<script>
    $(document).ready(function() {
        // JavaScript code for handling tab navigation and fetching data from the database
    });
</script>
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
<script>
// Get the input element
var inputElement = document.getElementById('addMonto');

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
