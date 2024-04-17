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
  <title>Panel de Administradores</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

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
            <a href="#" class="nav-link active">
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Panel de Administradores</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
           <!-- Add a modal -->
<div class="modal fade" id="prestamosModal">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Detalles de Préstamos</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal Body -->
      <!-- Modal Body -->
<div class="modal-body">
    <!-- Search Form -->
    <form id="prestamosSearchForm">
        <div class="form-group">
            <label for="searchText">Search Text:</label>
            <input type="text" class="form-control" id="searchText" name="searchText">
        </div>
        <div class="form-group">
    <label>Search Field:</label><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="searchField" id="searchId" value="id">
        <label class="form-check-label" for="searchId">ID</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="searchField" id="searchBeneficiario" value="beneficiario">
        <label class="form-check-label" for="searchBeneficiario">Beneficiario</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="searchField" id="searchIdCliente" value="IdCliente">
        <label class="form-check-label" for="searchIdCliente">ID Cliente</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="searchField" id="searchMotivo" value="Motivo">
        <label class="form-check-label" for="searchMotivo">Motivo</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="searchField" id="searchStatus" value="Status">
        <label class="form-check-label" for="searchStatus">Status</label>
    </div>
    <!-- Add more radio buttons for other fields as needed -->
</div>

        <button type="button" class="btn btn-primary" onclick="searchPrestamos()">Buscar</button>
    </form>

    <!-- Display Prestamos details here -->
    <div id="prestamosDetails">
        <!-- Content to display Préstamos details... This will be populated dynamically based on the search result. -->
    </div>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function searchPrestamos() {
        // Fetch data from the server using AJAX
        $.ajax({
            type: "POST",
            url: "search_prestamos.php", // Replace with the actual server-side script handling the search
            data: $("#prestamosSearchForm").serialize(), // Serialize form data
            success: function (data) {
                // Update the #prestamosDetails section with the search results
                $("#prestamosDetails").html(data);
            }
        });
    }
</script>

      
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      
    </div>
  </div>
</div>

<!-- Prestamos Box -->
<div class="small-box bg-info">
  <?php
    // Assuming you have a PDO connection named $db

    // Fetch the count of records from the prestamos table
    $stmt = $db->prepare("SELECT COUNT(*) AS prestamosCount FROM prestamos");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Get the count from the result
    $prestamosCount = $result['prestamosCount'];
  ?>

  <!-- Display the count in your HTML -->
  <div class="inner">
    <h3><?php echo $prestamosCount; ?></h3>
    <p>Prestamos</p>
  </div>

  <div class="icon">
    <i class="fas fa-money-bill"></i>
  </div>

  <!-- Add a data-toggle attribute to trigger the modal -->
  <a href="#" class="small-box-footer" data-toggle="modal" data-target="#prestamosModal">Más información <i class="fas fa-arrow-circle-right"></i></a>
</div>

          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <?php
// Assuming you have a PDO connection named $db

// Fetch the count of records from the inversiones table
$stmt = $db->prepare("SELECT COUNT(*) AS inversionesCount FROM inversiones");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Get the count from the result
$inversionesCount = $result['inversionesCount'];
?>


<!-- Display the count in your HTML -->
<div class="inner">
    <h3><?php echo $inversionesCount; ?><sup style="font-size: 20px"> </sup></h3>
    <p>Inversiones</p>
</div>

<!-- Bootstrap modal for Inversiones -->
<div class="modal fade" id="inversionesModal">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="color: black;">Detalles de Inversiones</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Search Form -->
                <form id="inversionesSearchForm">
                    <div class="form-group">
                        <label for="searchText" style="color: black;">Search Text:</label>
                        <input type="text" class="form-control" id="searchText" name="searchText">
                    </div>
                    <div class="form-group">
                        <label style="color: black;">Search Field:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="searchField" id="searchId" value="Id">
                            <label class="form-check-label" for="searchId" style="color: black;">ID</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="searchField" id="searchBeneficiario" value="Beneficiario">
                            <label class="form-check-label" for="searchBeneficiario" style="color: black;">Beneficiario</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="searchField" id="searchIdCliente" value="IdCliente">
                            <label class="form-check-label" for="searchIdCliente" style="color: black;">ID Cliente</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="searchField" id="searchMotivo" value="Motivo">
                            <label class="form-check-label" for="searchMotivo" style="color: black;">Motivo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="searchField" id="searchStatus" value="Status">
                            <label class="form-check-label" for="searchStatus" style="color: black;">Status</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="searchField" id="searchRemitente" value="Remitente">
                            <label class="form-check-label" for="searchRemitente" style="color: black;">Remitente</label>
                        </div>
                        <!-- Add more radio buttons for other fields as needed -->
                    </div>

                    <button type="button" class="btn btn-primary" onclick="searchInversiones()">Buscar</button>
                </form>

                <!-- Display Inversiones details here -->
                <div id="inversionesDetails" style="color: black;">
                    <!-- Content to display Inversiones details... This will be populated dynamically based on the search result. -->
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            
        </div>
    </div>
</div>





              <div class="icon">
                <i class="fas fa-chart-line"></i>
              </div>
              <a href="#" class="small-box-footer" data-toggle="modal" data-target="#inversionesModal">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <?php
// Assuming you have a PDO connection named $db

// Fetch the count of records from the inversiones table where status is "En cola"
$stmt = $db->prepare("SELECT COUNT(*) AS inversionesEnColaCount FROM inversiones WHERE Status = 'En cola'");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Get the count from the result
$inversionesEnColaCount = $result['inversionesEnColaCount'];
?>

<!-- Display the count in your HTML -->
<div class="inner">
    <h3><?php echo $inversionesEnColaCount; ?></h3>
    <p>Inversiones en cola</p>
</div>

              <div class="icon">
                <i class="fas fa-clock"></i>
              </div>

<script>
    function searchInversiones() {
        // Fetch data from the server using AJAX
        $.ajax({
            type: "POST",
            url: "search_inversiones.php", // Replace with the actual server-side script handling the search
            data: $("#inversionesSearchForm").serialize(), // Serialize form data
            success: function (data) {
                // Update the #inversionesDetails section with the search results
                $("#inversionesDetails").html(data);
            }
        });
    }
</script>

              <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Dinero en miles de pesos
                </h3>
                <div class="card-tools">
                  <!-- <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Diagrama de ondas</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Diagrama circular</a>
                    </li>
                  </ul> -->
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane active" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            <!--/.direct-chat -->

            <!-- TO DO List -->
            <?php
// Include the database connection file

// Fetch data from the database based on your criteria
$sql = "SELECT 
CONCAT(i.Motivo, ' para ', c.Nombre, ' ', c.Apellido) AS DisplayText, 
i.FechaFinalPrestamo AS FechaFinalEstimada, 
DATE_FORMAT(NOW(), '%Y-%m-%d %H:%i:%s') AS FechaActual, 
CONCAT(i.Motivo) AS Motivo, 
CONCAT(i.Remitente) AS Remitente, 
CONCAT(i.Beneficiario) AS Beneficiario, 
CONCAT(i.Status) AS estatus, 
i.FechaPagoMensual AS fechadepago, 
i.FechaCreacion AS fechadecreacion,
CONCAT(i.Id) AS requestId
FROM 
Prestamos AS i
JOIN 
Clientes c ON i.IdCliente = c.Id
JOIN 
Usuarios u ON c.IdUsuario = u.Id
WHERE 
i.FechaPagoMensual >= DATE_ADD(CURDATE(), INTERVAL 1 MINUTE)";

$result = $db->query($sql);

// Check if query execution was successful
if ($result) {
  // Output the card structure
  echo '<div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                Pagos próximos a vencer
              </h3>
              <div class="card-tools">
                <ul class="pagination pagination-sm">
                <!--
                  <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                  <li class="page-item"><a href="#" class="page-link">1</a></li>
                  <li class="page-item"><a href="#" class="page-link">2</a></li>
                  <li class="page-item"><a href="#" class="page-link">3</a></li>
                  <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                  -->
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <ul class="todo-list" data-widget="todo-list">';

  // Loop through the fetched results
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $estimatedTimestamp = strtotime($row['fechadepago']);
      $currentTimestamp = strtotime($row['FechaActual']);
      $timeLeft = "";
      $classForTime = "";
      $timeDiff = $estimatedTimestamp - $currentTimestamp;

      // Convert time difference to days and hours
      $daysDiff = floor($timeDiff / (60 * 60 * 24));
      $hoursDiff = floor($timeDiff / (60 * 60));

      // Set boolean variables based on the time differences
      $greaterThanOneMonth = $daysDiff >= 30;
      $greaterThanTwoWeeks = $daysDiff >= 14;
      $greaterThanOneWeek = $daysDiff >= 7;
      $greaterThanThreeDays = $daysDiff >= 3;
      $greaterThanTwoDays = $daysDiff >= 2;
      $greaterThanOneDay = $hoursDiff <= 47 && $daysDiff == 1;
      $greaterThan24H = $hoursDiff <= 24 && $daysDiff <= 1;

      if ($greaterThanOneMonth) {
          $timeLeft = "+1 Mes";  
          $classForTime = "badge badge-primary";
      } elseif ($daysDiff == 30) {
          $timeLeft = "1 Mes";  
          $classForTime = "badge badge-primary";
      } elseif ($greaterThanTwoWeeks) {
          $timeLeft = "2 Semanas y varios días";  
          $classForTime = "badge badge-success";
      } elseif ($daysDiff == 14) {
          $timeLeft = "2 Semanas";  
          $classForTime = "badge badge-success";
      } elseif ($greaterThanOneWeek) {
          $timeLeft = "1 Semana y varios días";  
          $classForTime = "badge badge-info";
      } elseif ($daysDiff == 7) {
          $timeLeft = "1 Semana";  
          $classForTime = "badge badge-info";
      } elseif ($greaterThanThreeDays) {
          $timeLeft = "3 Días o más";  
          $classForTime = "badge badge-warning";
      } elseif ($daysDiff >= 3) {
          $timeLeft = "3 Días";  
          $classForTime = "badge badge-warning";
      } elseif ($greaterThanTwoDays) {
        $timeLeft = "2 Días o más";  
        $classForTime = "badge badge-warning";
      } elseif ($daysDiff >= 2) {
        $timeLeft = "2 Días";  
        $classForTime = "badge badge-warning";
      } elseif ($greaterThanOneDay) {
          $timeLeft = "$daysDiff Día y varias horas";  
          $classForTime = "badge badge-danger";
      } elseif ($greaterThan24H) {
        $timeLeft = "$hoursDiff horas";  
        $classForTime = "badge badge-danger";
    } 

      $modalId = 'modal_' . $row['requestId'];

      echo '<li data-toggle="modal" data-target="#' . $modalId . '">
              <span class="handle">
                <i class="fas fa-ellipsis-v"></i>
                <i class="fas fa-ellipsis-v"></i>
              </span>
              <span class="text">' . $row['DisplayText'] . '</span>
              <small class="'.$classForTime.'"><i class="far fa-clock"></i> '.$timeLeft.'</small>
              <div class="tools"></div>
            </li>';

      // Modal for each item
      echo '<div class="modal fade" id="' . $modalId . '" tabindex="-1" role="dialog" aria-labelledby="' . $modalId . 'Label" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="' . $modalId . 'Label">Detalles de la solicitud</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p><strong>Motivo:</strong> ' . $row['Motivo'] . '</p>
                    <p><strong>Remitente:</strong> ' . $row['Remitente'] . '</p>
                    <p><strong>Beneficiario:</strong> ' . $row['Beneficiario'] . '</p>
                    <p><strong>Estatus:</strong> ' . $row['estatus'] . '</p>
                    <p><strong>Fecha de Pago:</strong> ' . $row['fechadepago'] . '</p>
                    <p><strong>Fecha de Creación:</strong> ' . $row['fechadecreacion'] . '</p>
                  </div>
                </div>
              </div>
            </div>';
  }

  // Close the card body and footer
  echo '</ul>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
         <!-- <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Agregar evento</button>-->
        </div>
      </div>';
} else {
  // Display an error message if the query fails
  echo "Error: " . $db->errorInfo();
}

?>


            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card bg-gradient-primary" style="display: none !important;">
              
              
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
            <div class="card bg-gradient-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Ganancias
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Dinero Invertido</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Dinero en caja</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Dinero en prestamos</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendario
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong> &copy;  <a href="https://www.linkedin.com/in/hipolito-perez/">Desarrollado por Hipolito Perez</a>.</strong>
    
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
