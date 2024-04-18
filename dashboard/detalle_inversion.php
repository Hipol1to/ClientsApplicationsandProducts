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
// Check if ID parameter is set on URL
if(isset($_GET['id'])) {
    $inversion_id = $_GET['id'];
    
    // Fetch inversion details from the database
    $sql = "SELECT * FROM inversiones WHERE Id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $inversion_id);
    $stmt->execute();
    $inversion = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Check if inversion exists
    if(!$inversion) {
        echo "Inversion no encontrada!";
        exit();
    }
} else {
    echo "El Id de la inversion no fue provisto!";
    exit();
}

// Handle form submission for updating inversion status
if(isset($_POST['actualizarStatus'])) {
    $status = $_POST['status'];
    
    // Update inversion status in the database
    $sql = "UPDATE inversiones SET Status = :status WHERE Id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $inversion_id);
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
  <title>Detalle Inversión</title>


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
                <a href="inversiones.php" class="nav-link active">
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
                  <div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Agregar Participación</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal Body -->
      <div class="modal-body">
        <!-- Form -->
        <form action="add_participacion.php" method="post">
          <!-- Form fields -->
          <div class="form-group">
            <div class="card">
    <div class="card-header">
        <h3 class="card-title"></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <form action="add_participacion.php" method="post">
        <div class="row">
            <div class="col-sm-4">
                <!-- Group 1 -->

                <div class="form-group">
                  <!-- Current Inversion Id -->
                  <input type="hidden" class="form-control" id="addIdInversionn" name="addIdInversion" readonly required>

                    <label for="addDescripcion">Descripcion:</label>
                    <input type="text" class="form-control" id="addDescripcion" name="addDescripcion" required>
                </div>
                <div class="form-group">
    <label for="addMontoInvertido">Monto invertido:</label>
    <input type="text" class="form-control" id="addMontoInvertido" name="addMontoInvertido" required>
    <small class="text-danger" id="montoError1" style="display: none;">Solo se aceptan numeros decimales de 2 digitos (por ejemplo, 5.35)</small>
</div>

<script>
    document.getElementById("addMontoInvertido").addEventListener("input", function() {
        var input = this.value.trim();
        var isValidDecimal = /^\d+\.\d{1,2}$/.test(input);
        if (!isValidDecimal) {
            document.getElementById("montoError1").style.display = "block";
            this.setCustomValidity("Solo se aceptan numeros decimales de 2 digitos (por ejemplo, 5.35)");
        } else {
            document.getElementById("montoError1").style.display = "none";
            this.setCustomValidity("");
        }
    });
</script>

            </div>
            <div class="col-sm-4">
                <!-- Group 2 -->
                <div class="form-group">
                    <label for="addRendimientoEsperado">Rendimiento esperado:</label>
                    <input type="text" class="form-control" id="addRendimientoEsperado" name="addRendimientoEsperado" required>
    <small class="text-danger" id="montoError2" style="display: none;">Solo se aceptan numeros decimales de 2 digitos (por ejemplo, 5.35)</small>
    <script>
    document.getElementById("addRendimientoEsperado").addEventListener("input", function() {
        var input = this.value.trim();
        var isValidDecimal = /^\d+\.\d{1,2}$/.test(input);
        if (!isValidDecimal) {
            document.getElementById("montoError2").style.display = "block";
            this.setCustomValidity("Solo se aceptan numeros decimales de 2 digitos (por ejemplo, 5.35)");
        } else {
            document.getElementById("montoError2").style.display = "none";
            this.setCustomValidity("");
        }
    });
</script>
                </div>
                <div class="form-group">
                    <label for="addFechaInicioParticipacion">Fecha inicio:</label>
                    <input type="text" class="form-control datepicker" id="addFechaInicioParticipacion" name="addFechaInicioParticipacion" required>
                </div>
                
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="addFechaFinalParticipacion">Fecha final:</label>
                    <input type="text" class="form-control datepicker" id="addFechaFinalParticipacion" name="addFechaFinalParticipacion" required>
                </div>
            </div>
        </div>
        <!-- Add more fields as needed -->
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button id="agregarParticipacionSubmitButton" type="submit" class="btn btn-primary">Agregar Participación</button>
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
                  <a href="javascript:history.go(-1);" class="btn btn-secondary btn-sm">Volver</a>

                   <!-- Custom Tabs -->
                   <!-- Modal -->
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
                <form id="editForm" action="add_pago.php" method="post">
    <div class="row">
        <!-- Group 1 -->
        <div class="col-sm-8">
            <div class="form-group">
                <label for="clientUser">Usuario cliente:</label>
                <input type="text" class="form-control" id="clientUser" name="clientUser">
                <div id="clientUserDropdown" class="dropdown-content"></div>
            </div>
            <div class="form-group">
                <label for="addCuentaRemitente">Cuenta Remitente:</label>
                <input type="text" class="form-control" id="addCuentaRemitente" name="addCuentaRemitente">
            </div>
            <div class="form-group">
                <label for="editTipoCuentaRemitente">Tipo Cuenta Remitente:</label>
                <select class="form-control" id="editTipoCuentaRemitente" name="editTipoCuentaRemitente" required>
                  <option value="" selected>--Tipo de Cuenta--</option>
                    <option value="Cuenta de ahorros">Cuenta de ahorros</option>
                    <option value="Cuenta corriente">Cuenta corriente</option>
                </select>
            </div>
            <div class="form-group">
                <label for="addEntidadBancariaRemitente">Entidad Bancaria Remitente:</label>
                <select class="form-control" id="addEntidadBancariaRemitente" name="addEntidadBancariaRemitente">
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
                <label for="addCuentaDestinatario">Cuenta Destinatario:</label>
                <input type="text" class="form-control" id="addCuentaDestinatario" name="addCuentaDestinatario">
            </div>
            <div class="form-group">
                <label for="addTipoCuentaDestinatario">Tipo Cuenta Destinatario:</label>
                <select class="form-control" id="addTipoCuentaDestinatario" name="addTipoCuentaDestinatario" required>
                  <option value="" selected>--Tipo de Cuenta--</option>
                    <option value="Cuenta de ahorros">Cuenta de ahorros</option>
                    <option value="Cuenta corriente">Cuenta corriente</option>
                </select>
            </div>
            <div class="form-group">
                <label for="addEntidadBancariaDestinatario">Entidad Bancaria Destinatario:</label>
                <select class="form-control" id="addEntidadBancariaDestinatario" name="addEntidadBancariaDestinatario">
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
        </div>
        <!-- Group 2 -->
        <div class="col-sm-4">
            <div class="form-group">
              <div class="form-group">
                <label for="addMotivo">Motivo:</label>
                <input type="text" class="form-control" id="addMotivo" name="addMotivo">
            </div>
                <label for="addMonto">Monto:</label>
                <input type="text" class="form-control" id="addMonto" name="addMonto">
            </div>
            <div class="form-group">
                <label for="addTipo">Tipo:</label>
                <select class="form-control" id="addTipo" name="addTipo">
                  <option value="">-Tipo de pago-</option>  
                  <option value="Transferencia bancaria">Transferencia bancaria</option>
                  <option value="Efectivo">Efectivo</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="addInversionId" name="addInversionId" readonly hidden>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="addParticipacionId" name="addParticipacionId" readonly hidden>
            </div>
            <div class="form-group">
                <label for="addFechaDePago">Fecha de Pago:</label>
                <input type="text" class="form-control datepicker" id="addFechaDePago" name="addFechaDePago">
            </div>
        </div>
    </div>
    <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="addPagoBtn">Agregar pago</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
</form>

            </div>
            
        </div>
    </div>
</div>


<!-- Button to trigger the modal -->
<div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->

<script>
    // jQuery code to show the modal when the button is clicked
    $(document).ready(function(){
        $('#openModalBtn').click(function(){
            $('#myModal').modal('show');
        });
    });
</script>

                    <div class="card">
                        <div class="card-header p-0">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="detalle-tab" data-toggle="pill" href="#detalle" role="tab" aria-controls="detalle" aria-selected="true">Detalle Inversión</a>
                                </li>
<?php
//print participaciones tab if inversion has according type
if ($inversion['TipoDeInversion'] == "Fondos de inversión") {
  echo '<li class="nav-item">
    <a class="nav-link" id="nuevo-tab" data-toggle="pill" href="#nuevo" role="tab" aria-controls="nuevo" aria-selected="false">Participaciones</a>
</li>';
} else {
    echo '<li class="nav-item">
    <a class="nav-link" id="pagos-tab" data-toggle="pill" href="#pagosTabForInversiones" role="tab" aria-controls="pagosTabForInversiones" aria-selected="false">Pagos</a>
</li>';
}
?>
                                



                                
                            </ul>
                        </div>
                        <div class="card-body">
    <div class="tab-content" id="custom-tabs-one-tabContent">
        <div class="tab-pane fade show active" id="detalle" role="tabpanel" aria-labelledby="detalle-tab">
            <!-- Detalle Perfil Content Here -->
            <div class="form-group">
                <label for="estadoInversion">Status de la Inversión:</label>
                <select class="form-control" id="estadoInversion">
                    <option value="En curso" <?php if($inversion['Status'] == 'En curso') echo 'selected'; ?>>En curso</option>
                    <option value="Cerrada" <?php if($inversion['Status'] == 'Cerrada') echo 'selected'; ?>>Cerrada</option>
                    <option value="En riesgo" <?php if($inversion['Status'] == 'En riesgo') echo 'selected'; ?>>En riesgo</option>
                    <option value="En revision" <?php if($inversion['Status'] == 'En revision') echo 'selected'; ?>>En revisión</option>
                </select>
            </div>
            <button type="button" class="btn btn-primary" id="actualizarStatus">Actualizar status</button>
            <br><br>
            <div class="tab-pane fade show active" id="detalle" role="tabpanel" aria-labelledby="detalle-tab">
<?php
            // Check if the ID parameter is set in the URL
            if(isset($_GET['id'])) {
                // Sanitize the input to prevent SQL injection
                $client_id = htmlspecialchars($_GET['id']);

                // Fetch client details from the database using the ID
                $sql = "SELECT * FROM prestamos WHERE Id = :id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id', $client_id);
                $stmt->execute();

                // Check if a client with the specified ID exists
if($stmt->rowCount() > 0) {
    // Fetch the client's details
    $client = $stmt->fetch(PDO::FETCH_ASSOC);
    $isEnabled = false;

    // Display client details
    echo '<div class="modal-body">';
    echo '<form id="editForm">';
    echo '<div class="row">';

    // Group 1
    echo '<div class="col-sm-4">';
    echo '<div class="form-group">';
    echo '<label for="estadoCliente">Id inversion:</label>';
    echo '<input type="text" class="form-control" id="idInversion" name="idInversion" value="'.htmlspecialchars($inversion['Id']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="estadoCliente">Cliente:</label>';
          echo '<input type="text" class="form-control" id="clienteInversion" name="clienteInversion" value="'.htmlspecialchars($inversion['IdCliente']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="estadoCliente">Motivo:</label>';
          echo '<input type="text" class="form-control" id="motivoInversion" name="motivoInversion" value="'.htmlspecialchars($inversion['Motivo']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="estadoCliente">Tipo de inversion:</label>';
          echo '<input type="text" class="form-control" id="tipoInversion" name="tipoInversion" value="'.htmlspecialchars($inversion['TipoDeInversion']).'" readonly>';
    echo '</div>';

    echo '</div>';

    

    // Group 2
    echo '<div class="col-sm-4">';
    echo '<div class="form-group">';
    echo '<label for="rendimientoTotal">Rendimiento Total:</label>';
        echo '<input type="text" class="form-control" id="rendimientoTotalInversion" name="rendimientoTotalInversion" value="'.htmlspecialchars($inversion['RendimientoTotal']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="fechaPagoInicial">Fecha Pago Inicial Inversion:</label>';
        echo '<input type="text" class="form-control" id="fechaPagoInicialInversion" name="fechaPagoInicialInversion" value="'.htmlspecialchars($inversion['FechaPagoInicialInversion']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="fechaFinal">Fecha Final Inversion:</label>';
        echo '<input type="text" class="form-control" id="fechaFinalInversion" name="fechaFinalInversion" value="'.htmlspecialchars($inversion['FechaFinalInversion']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="fechaAprobacion">Fecha de Aprobacion:</label>';
        echo '<input type="text" class="form-control" id="fechaAprobacionInversion" name="fechaAprobacionInversion" value="'.htmlspecialchars($inversion['FechaDeAprobacion']).'" readonly>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="fechaCreacion">Fecha Creacion:</label>';
        echo '<input type="text" class="form-control" id="fechaCreacionInversion" name="fechaCreacionInversion" value="'.htmlspecialchars($inversion['FechaCreacion']).'" readonly>';
    echo '</div>';
    echo '</div>';


    // Group 4
    echo '<div class="col-sm-4">';
    
    switch ($inversion['TipoDeInversion']) {
          
          
          case 'Por acciones':
            echo '<div class="form-group">';
            echo '<label for="tipoInversion">Monto dividendo de esperado:</label>';
            echo '<input type="text" class="form-control" id="montoDividendoEsperadoInversion" name="montoDividendoEsperadoInversion" value="'.htmlspecialchars($inversion['MontoDividendoEsperado']).'" readonly>';
            echo '</div>';

            echo '<div class="form-group">';
            echo '<label for="tipoInversion">Periodicidad de dividendo:</label>';
            echo '<input type="text" class="form-control" id="periodicidadDividendoInversion" name="periodicidadDividendoInversion" value="'.htmlspecialchars($inversion['PeriodicidadDividendo']).'" readonly>';
            echo '</div>';

            echo '<div class="form-group">';
            echo '<label for="tipoInversion">Fecha de pago de dividendo:</label>';
            echo '<input type="text" class="form-control" id="fechaPagoDividendoInversion" name="fechaPagoDividendoInversion" value="'.htmlspecialchars($inversion['FechaPagoDividendo']).'" readonly>';
            echo '</div>';
            break;

            case 'Por bonos':
            echo '<div class="form-group">';
            echo '<label for="tipoInversion">Monto de bono:</label>';
            echo '<input type="text" class="form-control" id="montoBonoInversion" name="montoBonoInversion" value="'.htmlspecialchars($inversion['MontoBono']).'" readonly>';
            echo '</div>';

            echo '<div class="form-group">';
            echo '<label for="tipoInversion">Tasa de interes:</label>';
            echo '<input type="text" class="form-control" id="tasaInteresBonoInversion" name="tasaInteresBonoInversion" value="'.htmlspecialchars($inversion['TasaInteresBono']).'%" readonly>';
            echo '</div>';

            echo '<div class="form-group">';
            echo '<label for="tipoInversion">Plazo de inversión:</label>';
            echo '<input type="text" class="form-control" id="plazoBonoInversion" name="plazoBonoInversion" value="'.htmlspecialchars($inversion['PlazoBono']).'" readonly>';
            echo '</div>';

            echo '<div class="form-group">';
            echo '<label for="tipoInversion">Periodicidad de interés:</label>';
            echo '<input type="text" class="form-control" id="periodicidadInteresInversion" name="periodicidadInteresInversion" value="'.htmlspecialchars($inversion['PeriodicidadInteres']).'" readonly>';
            echo '</div>';

            echo '<div class="form-group">';
            echo '<label for="tipoInversion">Fecha de pago de interés:</label>';
            echo '<input type="text" class="form-control" id="fechaPagoInteresInversion" name="fechaPagoInteresInversion" value="'.htmlspecialchars($inversion['FechaPagoInteres']).'" readonly>';
            echo '</div>';
            break;

            case 'Fondos de inversión':
            echo '<div class="form-group">';
            echo '<label for="tipoInversion">Monto fondo de Inversion:</label>';
            echo '<input type="text" class="form-control" id="montoFondoInversion" name="montoFondoInversion" value="'.htmlspecialchars($inversion['MontoFondoInversion']).'" readonly>';
            echo '</div>';

            echo '<div class="form-group">';
            echo '<label for="tipoInversion">Tarifa de administración:</label>';
            echo '<input type="text" class="form-control" id="tarifaAdministracionInversion" name="tarifaAdministracionInversion" value="'.htmlspecialchars($inversion['TarifaAdministracion']).'" readonly>';
            echo '</div>';

            echo '<div class="form-group">';
            echo '<label for="tipoInversion">Periodicidad de Tarifa de Administración:</label>';
            echo '<input type="text" class="form-control" id="periodicidadTarifaAdmInversion" name="periodicidadTarifaAdmInversion" value="'.htmlspecialchars($inversion['PeriodicidadTarifaAdm']).'" readonly>';
            echo '</div>';
            break;

          default:
            # code...
            break;
        }
    
    echo '</div>';

    echo '</div>'; // Close row
    echo '</form>';
    echo '</div>'; 
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
                                           


                                    echo'</div>';
                                echo'</div>';

//pagos for inversion
echo'<div class="tab-pane fade" id="pagosTabForInversiones" role="tabpanel" aria-labelledby="nuevo-tab">';
// Fetch data from the clientes table
$sql = "SELECT * FROM pagos WHERE InversionId = ".$inversion['Id']."";
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
                  <button type="button" class="btn btn-primary bustonAddPago" data-toggle="modal" data-target="#modalAgregarPagoForParticipacion">
  Agregar Pago
</button>
<p></p>
                  <th></th>
                  <th>Acciones</th>
                    <th>Solicitante</th>
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
            <button class="btn btn-primary btn-sm editarButtonPagoSinParticipacion" data-id="' . $row['Id'] . '">Editar</button>
        </div>
        <div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->
            <button class="btn btn-danger btn-sm delete-btnPagoParticipacion" data-id="' . $row['Id'] . '">Eliminar</button>
        </div>
        </td>
                <td>' . $row['IdCliente'] . '</td>
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
            <th>Solicitante</th>
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
}
echo'</div>';

//PAGOS PER PARTICIPACION
// Add a hidden form to hold the details for editing within the modal
echo '<div id="editModalPagoSinParticipacion" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Pago</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
    <form id="editForm">
        <div class="row">
            <!-- Group 1 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editId">ID:</label>
                    <input type="text" class="form-control" id="editId" name="editId" readonly>
                </div>
                <div class="form-group">
                    <label for="editIdCliente">ID Cliente:</label>
                    <input type="text" class="form-control" id="editIdCliente" name="editIdCliente">
                </div>
                <div class="form-group">
                    <label for="editCuentaRemitente">Cuenta Remitente:</label>
                    <input type="text" class="form-control" id="editCuentaRemitente" name="editCuentaRemitente">
                </div>
                <div class="form-group">
                    <label for="editMotivo">Motivo:</label>
                    <input type="text" class="form-control" id="editMotivo" name="editMotivo">
                </div>
                <div class="form-group">
                    <label for="editTipo">Tipo:</label>
                    <input type="text" class="form-control" id="editTipo" name="editTipo">
                </div>
            </div>
            <!-- Group 2 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editTipoCuentaRemitente">Tipo de Cuenta Remitente:</label>
                    <input type="text" class="form-control" id="editTipoCuentaRemitente" name="editTipoCuentaRemitente">
                </div>
                <div class="form-group">
                    <label for="editEntidadBancariaRemitente">Entidad Bancaria Remitente:</label>
                    <input type="text" class="form-control" id="editEntidadBancariaRemitente" name="editEntidadBancariaRemitente">
                </div>
                <div class="form-group">
                    <label for="editCuentaDestinatario">Cuenta Destinatario:</label>
                    <input type="text" class="form-control" id="editCuentaDestinatario" name="editCuentaDestinatario">
                </div>
                <div class="form-group">
                    <label for="editInversionId">ID de Inversion:</label>
                    <input type="text" class="form-control" id="editInversionId" name="editInversionId">
                </div>
                <div class="form-group">
                    <label for="editPrestamoId">ID de Préstamo:</label>
                    <input type="text" class="form-control" id="editPrestamoId" name="editPrestamoId">
                </div>
            </div>
            <!-- Group 3 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editTipoCuentaDestinatario">Tipo de Cuenta Destinatario:</label>
                    <input type="text" class="form-control" id="editTipoCuentaDestinatario" name="editTipoCuentaDestinatario">
                </div>
                <div class="form-group">
                    <label for="editEntidadBancariaDestinatario">Entidad Bancaria Destinatario:</label>
                    <input type="text" class="form-control" id="editEntidadBancariaDestinatario" name="editEntidadBancariaDestinatario">
                </div>
                <div class="form-group">
                    <label for="editMonto">Monto:</label>
                    <input type="text" class="form-control" id="editMonto" name="editMonto">
                </div>
                <div class="form-group">
                    <label for="editFechaDePago">Fecha de Pago:</label>
                    <input type="text" class="form-control" id="editFechaDePago" name="editFechaDePago">
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
  $(".editarButtonPagoSinParticipacion").click(function() {
      var id = $(this).data("id");
      $.ajax({
          url: "fetch_pago.php",
          type: "GET",
          data: { id: id },
          dataType: "json",
          success: function(response) {
              // Clear previous values
              $("#editForm")[0].reset();
              // Populate modal fields
              $("#editId").val(response.Id);
              $("#editIdCliente").val(response.IdCliente);
              $("#editCuentaRemitente").val(response.CuentaRemitente);
              $("#editTipoCuentaRemitente").val(response.TipoCuentaRemitente);
              $("#editEntidadBancariaRemitente").val(response.EntidadBancariaRemitente);
              $("#editCuentaDestinatario").val(response.CuentaDestinatario);
              $("#editTipoCuentaDestinatario").val(response.TipoCuentaDestinatario);
              $("#editEntidadBancariaDestinatario").val(response.EntidadBancariaDestinatario);
              $("#editMonto").val(response.Monto);
              $("#editMotivo").val(response.Motivo);
              $("#editTipo").val(response.Tipo);
              $("#editInversionId").val(response.InversionId);
              $("#editPrestamoId").val(response.PrestamoId);
              $("#editFechaDePago").val(response.FechaDePago);
              $("#editModalPagoSinParticipacion").modal("show");
          },
          error: function(xhr, status, error) {
              console.error(xhr.responseText);
          }
      });
  });

  $("#saveChangesBtn").click(function() {
      var formData = $("#editForm").serialize();
      $.ajax({
          url: "update_pago.php",
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
















//participaciones tab content
echo'<div class="tab-pane fade" id="nuevo" role="tabpanel" aria-labelledby="nuevo-tab">';
// Fetch data from the participaciones table
$sql = "SELECT p.Id, p.IdInversion, p.DescripcionParticipacion, p.MontoInvertido, p.RendimientoEsperado, p.FechaInicioParticipacion, p.FechaFinParticipacion, p.FechaCreacion, p.FechaModificacion, i.IdCliente as IdCliente, u.Usuario as Usuario FROM participaciones as p
JOIN inversiones i ON p.IdInversion = i.Id
JOIN clientes c ON i.IdCliente = c.Id
JOIN Usuarios u ON c.IdUsuario = u.Id
WHERE p.IdInversion = ".$inversion['Id']."";
$result = $db->query($sql);

if ($result) {
    // Output the table structure
    echo '<div class="card">
              <div class="card-header">
              <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Participaciones</h1>
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
                  <button id="addParticipacionButton" type="button" class="btn btn-primary" data-id="'. $inversion['Id'].'">
  Agregar Participacion
</button>
<p></p>
                  <th></th>
                  <th>Acciones</th>
                    <th>ID</th>
                    <th>Pagos</th>
                    <th>Cliente</th>
                    <th>Descripcion</th>
                    <th>Rendimiento esperado</th>
                    <th>Monto invertido</th>
                    <th>Fecha inicio participacion</th>
                    <th>Fecha fin participacion</th>
                    <th>Fecha Creacion</th>
                  </tr>
                  </thead>
                  <tbody>';

    // Loop through the fetched results and generate table rows
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>
        <td></td>
        <td>
        <a style="white-space: nowrap !important;" data-id="'. $row['Id'].'" class="btn btn-info btn-sm">Agregar pago</a>
        <div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->
            <button class="btn btn-primary btn-sm edit-btn" data-id="'. $row['Id'].'">Editar</button>
        </div>
        <div style="margin-top: 0px;"> <!-- Add a margin-top for spacing -->
            <button class="btn btn-danger btn-sm delete-btn" data-id="'. $row['Id'].'">Eliminar</button>
        </div>
        </td>
                <td>' . $row['Id'] . '</td>
                <td>
                <button style="white-space: nowrap !important;" type="button" class="btn btn-secondary btn-sm erbustondepago">Ver pagos</button>
                </td>
                <td>' . $row['Usuario'] . '</td>
                <td>' . $row['DescripcionParticipacion'] . '</td>
                <td>' . $row['RendimientoEsperado'] . '</td>
                <td>' . $row['MontoInvertido'] . '</td>
                <td>' . $row['FechaInicioParticipacion'] . '</td>
                <td>' . $row['FechaFinParticipacion'] . '</td>
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
                    <th>Pagos</th>
                    <th>Cliente</th>
                    <th>Descripcion</th>
                    <th>Rendimiento esperado</th>
                    <th>Monto invertido</th>
                    <th>Fecha inicio participacion</th>
                    <th>Fecha fin participacion</th>
                    <th>Fecha Creacion</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>';


  echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $(".erbustondepago").click(function() {
      var id = $(this).data("id");
      $.ajax({
          url: "fetch_pago.php",
          type: "GET",
          data: { id: id }, 
          dataType: "json",
          success: function(response) {
              // Clear previous values

              $("#editModalPago").modal("show");
          },
          error: function(xhr, status, error) {
              console.error(xhr.responseText);
          }
      });
  });

  $("#saveChangesBtn").click(function() {
      var formData = $("#editForm").serialize();
      $.ajax({
          url: "update_pago.php",
          type: "POST",
          data: formData,
          success: function(response) {
              $("#editModalPago").modal("hide");
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


  echo '<div id="editModalPago" class="modal fade" role="dialog">';
echo '<div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pagos de participacion</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="max-height: 500px; overflow-y: auto;">'; // Adjust max-height and overflow

// get pagos linked to the participacion
$sqlPago = "SELECT * FROM pagos WHERE ParticipacionId = :idParticipacion";
$stmt = $db->prepare($sqlPago);

// Bind the parameter
$stmt->bindParam(':idParticipacion', $inversion['ParticipacionId'], PDO::PARAM_INT); // Assuming $parameter is your parameter value

// Execute the statement
$stmt->execute();

// Fetch the results
$resultPago = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if there are any results
if ($resultPago) {
    // Output the table structure
    echo '<table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>Solicitante</th>
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
    foreach ($resultPago as $rowPago) {
        echo '<tr>
                <td>
                    <a style="white-space: nowrap !important;" href="detalle_pago.php?id='. $rowPago['Id'].'" class="btn btn-info btn-sm">Ver detalle</a>
                    <button class="btn btn-primary btn-sm editarButtonPagoParticipacion" data-id="'. $rowPago['Id'].'">Editar</button>
                    <button class="btn btn-danger btn-sm delete-btnPagoParticipacion" data-id="'. $rowPago['Id'].'">Eliminar</button>
                </td>
                <td>' . $rowPago['IdCliente'] . '</td>
                <td>' . $rowPago['CuentaRemitente'] . '</td>
                <td>' . $rowPago['TipoCuentaRemitente'] . '</td>
                <td>' . $rowPago['EntidadBancariaRemitente'] . '</td>
                <td>' . $rowPago['CuentaDestinatario'] . '</td>
                <td>' . $rowPago['TipoCuentaDestinatario'] . '</td>
                <td>' . $rowPago['EntidadBancariaDestinatario'] . '</td>
                <td>' . $rowPago['Motivo'] . '</td>
                <td>' . $rowPago['Monto'] . '</td>
              </tr>';
    }

    // Close the table body
    echo '</tbody></table>';
} else {
    echo "No hay pagos para mostrar.";
}


echo '</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>';

echo '</div>';





    // Edit modal for participacion
echo '<div id="editModal" class="modal fade" role="dialog">
<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Editar Participación</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
    <form id="editFormParticipacion">
        <!-- Input fields for editing inversion information -->
        <div class="form-group">
            <label for="editId">ID:</label>
            <input type="text" class="form-control" id="editId" name="editId" readonly>
        </div>
        <div class="form-group">
            <label for="editIdInversion">ID de Inversion:</label>
            <input type="text" class="form-control" id="editIdInversion" name="editIdInversion" readonly>
        </div>
        <div class="form-group">
            <label for="editDescripcionParticipacion">Descripción de Participación:</label>
            <input type="text" class="form-control" id="editDescripcionParticipacion" name="editDescripcionParticipacion">
        </div>
        <div class="form-group">
            <label for="editMontoInvertido">Monto Invertido:</label>
            <input type="text" class="form-control" id="editMontoInvertido" name="editMontoInvertido">
            <small class="text-danger" id="montoError3" style="display: none;">Solo se aceptan numeros decimales de 2 digitos (por ejemplo, 5.35)</small>
        </div>
    <script>
    document.getElementById("editMontoInvertido").addEventListener("input", function() {
        var input = this.value.trim();
        var isValidDecimal = /^\d+\.\d{1,2}$/.test(input);
        if (!isValidDecimal) {
            document.getElementById("montoError3").style.display = "block";
            this.setCustomValidity("Solo se aceptan numeros decimales de 2 digitos (por ejemplo, 5.35)");
        } else {
            document.getElementById("montoError3").style.display = "none";
            this.setCustomValidity("");
        }
    });
</script>
        <div class="form-group">
            <label for="editRendimientoEsperado">Rendimiento Esperado:</label>
            <input type="text" class="form-control" id="editRendimientoEsperado" name="editRendimientoEsperado">
            <small class="text-danger" id="montoError4" style="display: none;">Solo se aceptan numeros decimales de 2 digitos (por ejemplo, 5.35)</small>
             <script>
    document.getElementById("editRendimientoEsperado").addEventListener("input", function() {
        var input = this.value.trim();
        var isValidDecimal = /^\d+\.\d{1,2}$/.test(input);
        if (!isValidDecimal) {
            document.getElementById("montoError4").style.display = "block";
            this.setCustomValidity("Solo se aceptan numeros decimales de 2 digitos (por ejemplo, 5.35)");
        } else {
            document.getElementById("montoError4").style.display = "none";
            this.setCustomValidity("");
        }
    });
</script>
        </div>
        <div class="form-group">
            <label for="editFechaInicioParticipacion">Fecha Inicio Participación:</label>
            <input type="text" class="form-control datepicker" id="editFechaInicioParticipacion" name="editFechaInicioParticipacion">
        </div>
        <div class="form-group">
            <label for="editFechaFinParticipacion">Fecha Fin Participación:</label>
            <input type="text" class="form-control datepicker" id="editFechaFinParticipacion" name="editFechaFinParticipacion">
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
    $(".bustonAddPago").click(function() {
        var id = $(this).data("id");
        $.ajax({
            url: "fetch_inversion.php", // Changed to fetch inversion details
            type: "GET",
            data: { id: id },
            dataType: "json",
            success: function(response) {
                $("#addInversionId").val('.$inversion_id.');
                console.log();
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
    });

</script>';

// Include jQuery library and custom script for handling click event and populating form fields within the modal
echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(".btn-info").click(function() {
        var id = $(this).data("id");
        $.ajax({
            url: "fetch_participacion.php", // Changed to fetch inversion details
            type: "GET",
            data: { id: id },
            dataType: "json",
            success: function(response) {
                // Clear previous values
                $("#editFormParticipacion")[0].reset();
                $("#addParticipacionId").val(response.Id);
                $("#addInversionId").val(response.IdInversion);
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
    });

</script>

<script>
$(document).ready(function() {
    $(".edit-btn").click(function() {
        var id = $(this).data("id");
        $.ajax({
            url: "fetch_participacion.php", // Changed to fetch inversion details
            type: "GET",
            data: { id: id },
            dataType: "json",
            success: function(response) {
                // Clear previous values
                $("#editFormParticipacion")[0].reset();
                // Populate modal fields
                $("#editId").val(response.Id);
                $("#editIdInversion").val(response.IdInversion);
                $("#idInversion").val(response.IdInversion);
                $("#editDescripcionParticipacion").val(response.DescripcionParticipacion);
                $("#editMontoInvertido").val(response.MontoInvertido);
                $("#editRendimientoEsperado").val(response.RendimientoEsperado);
                $("#editFechaInicioParticipacion").val(response.FechaInicioParticipacion);
                $("#editFechaFinParticipacion").val(response.FechaFinParticipacion);
                // Show the modal
                $("#editModal").modal("show");
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });

    $("#addParticipacionButton").click(function() {
        var id = $(this).data("id");
        console.log(id);
        $.ajax({
            url: "fetch_participacion.php", // Changed to fetch inversion details
            type: "GET",
            data: { id: id },
            dataType: "json",
            success: function(response) {
                // Clear previous values
                $("#addIdInversionn").val(id);
                $("#myModal").modal("show");
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });
$("#saveChangesBtn").click(function() {
          var formData = $("#editFormParticipacion").serialize();
          $.ajax({
              url: "update_participacion.php",
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
  console.log("va borra?");
    var id = $(this).data("id");
    if (confirm("¿Estás seguro que quieres borrar esta participacion?")) {
        $.ajax({
            url: "delete_participacion.php",
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
    

//PAGOS PER PARTICIPACION
// Add a hidden form to hold the details for editing within the modal
echo '<div id="editModalPerParticipacion" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Pago</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
    <form id="editForm" action="update_pago.php">
        <div class="row">
            <!-- Group 1 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editId">ID:</label>
                    <input type="text" class="form-control" id="editIdPago" name="editId" readonly>
                </div>
                <div class="form-group">
                    <label for="editIdCliente">ID Cliente:</label>
                    <input type="text" class="form-control" id="editIdClientePago" name="editIdCliente">
                </div>
                <div class="form-group">
                    <label for="editCuentaRemitente">Cuenta Remitente:</label>
                    <input type="text" class="form-control" id="editCuentaRemitentePago" name="editCuentaRemitente">
                </div>
                <div class="form-group">
                    <label for="editMotivo">Motivo:</label>
                    <input type="text" class="form-control" id="editMotivoPago" name="editMotivo">
                </div>
                <div class="form-group">
                    <label for="editTipo">Tipo:</label>
                    <input type="text" class="form-control" id="editTipoPago" name="editTipo">
                </div>
            </div>
            <!-- Group 2 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editTipoCuentaRemitente">Tipo de Cuenta Remitente:</label>
                    <input type="text" class="form-control" id="editTipoCuentaRemitentePago" name="editTipoCuentaRemitente">
                </div>
                <div class="form-group">
                    <label for="editEntidadBancariaRemitente">Entidad Bancaria Remitente:</label>
                    <input type="text" class="form-control" id="editEntidadBancariaRemitentePago" name="editEntidadBancariaRemitente">
                </div>
                <div class="form-group">
                    <label for="editCuentaDestinatario">Cuenta Destinatario:</label>
                    <input type="text" class="form-control" id="editCuentaDestinatarioPago" name="editCuentaDestinatario">
                </div>
                <div class="form-group">
                    <label for="editInversionId">ID de Inversion:</label>
                    <input type="text" class="form-control" id="editInversionIdPago" name="editInversionId">
                </div>
                <div class="form-group">
                    <label for="editPrestamoId">ID de Préstamo:</label>
                    <input type="text" class="form-control" id="editPrestamoIdPago" name="editPrestamoId">
                </div>
            </div>
            <!-- Group 3 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editTipoCuentaDestinatario">Tipo de Cuenta Destinatario:</label>
                    <input type="text" class="form-control" id="editTipoCuentaDestinatarioPago" name="editTipoCuentaDestinatario">
                </div>
                <div class="form-group">
                    <label for="editEntidadBancariaDestinatario">Entidad Bancaria Destinatario:</label>
                    <input type="text" class="form-control" id="editEntidadBancariaDestinatarioPago" name="editEntidadBancariaDestinatario">
                </div>
                <div class="form-group">
                    <label for="editMonto">Monto:</label>
                    <input type="text" class="form-control" id="editMontoPago" name="editMonto">
                </div>
                <div class="form-group">
                    <label for="editFechaDePago">Fecha de Pago:</label>
                    <input type="text" class="form-control" id="editFechaDePagoPago" name="editFechaDePago">
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
              <button type="button" class="btn btn-primary" id="saveChangesBtn">Guardar Cambios</button>
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
$(document).ready(function() {
  $(".editarButtonPagoParticipacion").click(function() {
      var id = $(this).data("id");
      $.ajax({
          url: "fetch_pago.php",
          type: "GET",
          data: { id: id },
          dataType: "json",
          success: function(response) {
              // Clear previous values
              $("#editForm")[0].reset();
              // Populate modal fields
              $("#editIdPago").val(response.Id);
              $("#editIdClientePago").val(response.IdCliente);
              $("#editCuentaRemitentePago").val(response.CuentaRemitente);
              $("#editTipoCuentaRemitentePago").val(response.TipoCuentaRemitente);
              $("#editEntidadBancariaRemitentePago").val(response.EntidadBancariaRemitente);
              $("#editCuentaDestinatarioPago").val(response.CuentaDestinatario);
              $("#editTipoCuentaDestinatarioPago").val(response.TipoCuentaDestinatario);
              $("#editEntidadBancariaDestinatarioPago").val(response.EntidadBancariaDestinatario);
              $("#editMontoPago").val(response.Monto);
              $("#editMotivoPago").val(response.Motivo);
              $("#editTipoPago").val(response.Tipo);
              $("#editInversionIdPago").val(response.InversionId);
              $("#editPrestamoIdPago").val(response.PrestamoId);
              $("#editFechaDePagoPago").val(response.FechaDePago);
              $("#editModalPerParticipacion").modal("show");
          },
          error: function(xhr, status, error) {
              console.error(xhr.responseText);
          }
      });
  });

  $("#saveChangesBtn").click(function() {
      var formData = $("#editForm").serialize();
      $.ajax({
          url: "update_pago.php",
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
$(".delete-btnPagoParticipacion").click(function() {
  var id = $(this).data("id");
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
    echo "Error: " . $sql . "<br>" . $db->error;
}



echo '</div>';
?>



                                </div>
                                
                               
                               
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->k

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

<script>
    // jQuery code to show the modal when the button is clicked
    $(document).ready(function(){
        $('.btn-info').click(function(){
            $('#modalAgregarPagoForParticipacion').modal('show');
        });
    });
</script>

</body>
</html>
