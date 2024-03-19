<?php
require('../includes/config.php');

if (!$user->is_logged_in()) { 
	header('Location: ../login.php'); 
	// exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loans</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .wrapper {
            display: flex;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #343a40;
            padding-top: 50px;
            padding-left: 15px;
        }

        .sidebar a {
            color: #f8f9fa;
            display: block;
            padding: 10px;
            margin-bottom: 10px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar-brand {
            color: #f8f9fa !important;
        }
    </style>
</head>
<body>
<div class="sidebar">
            <a href="index.php"><i class="fas fa-home"></i> Dashboard</a>
            <a href="prestamos.php"><i class="fas fa-hand-holding-usd"></i> Prestamos</a>
            <a href="inversiones.php"><i class="fas fa-chart-pie"></i> Inversiones</a>
            <a href="perfil.php"><i class="fas fa-user"></i> Ver Perfil</a>
            <a href="#"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
        </div>
    <div class="container mt-5">
        <h1>Préstamos solicitados</h1>
        <!-- Table to display loans requested -->
        <?php
// Include the database connection file
// Assuming your database connection code is included here

// Fetch data from the clientes table
$sql = "SELECT * FROM prestamos";
$result = $db->query($sql);

if ($result) {
    // Output the table structure
    echo '<div class="card">
              <div class="card-header">
              <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
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
                    <th>Solicitante</th>
                    <th>Motivo</th>
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
    <a href="detalle_prestamo.php?id='. $row['Id'].'" class="btn btn-info btn-sm">Ver detalle</a>
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
                <td>' . $row['MontoSolicitado'] . '</td>
                <td>' . $row['Status'] . '</td>
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
                    <th>Solicitante</th>
                    <th>Motivo</th>
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
                    <label for="editMotivo">Motivo:</label>
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
    </div>
</body>
</html>
