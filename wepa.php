<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Function to generate the PDF
function generatePDF() {
    // Create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Loan Statement');
    $pdf->SetSubject('Loan Statement');
    $pdf->SetKeywords('Loan, Statement, PDF');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 12);

    // Add content to the PDF
    $html = '
    <!DOCTYPE html>
    <html lang="es-ES">
      <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8" />
        <title>
        </title>
        <style>
          body { line-height:108%; font-family:Calibri; font-size:11pt }
          p { margin:0pt 0pt 8pt }
        </style>
      </head>
      <body>
          <p style="text-align:center; line-height:108%; font-size:14pt">
            Logo inversiones Everest
          </p>
          <p style="text-align:center; line-height:108%; font-size:14pt">
            '.date("Y/m/d").'
          </p>
          <p style="line-height:108%; font-size:14pt">
            &#xa0;
          </p>
          <p style="line-height:108%; font-size:14pt">
            &#xa0;
          </p>
          <p style="line-height:108%; font-size:14pt">
            Nombre de la persona
          </p>
          <p style="text-align:center; line-height:108%; font-size:14pt">
            <strong>Préstamo #1:</strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">ID: </span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Balance:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Monto Solicitado:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Monto Aprobado:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Monto Pagado:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Concepto:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Monto Recargo:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Fecha de solicitud:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Cant. min. pagos por mes:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Fecha proximo pago:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Cant. total de cuotas:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Pagos realizados:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Dias en el mes asignados para pagar:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Fecha de aprobacion:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529">&#xa0;</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529">&#xa0;</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529">&#xa0;</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529">&#xa0;</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529">&#xa0;</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529">&#xa0;</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529">&#xa0;</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529">&#xa0;</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529">&#xa0;</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529">&#xa0;</span></strong>
          </p>
          <p style="text-align:center; line-height:108%; font-size:14pt">
            <strong>Pago #1:</strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Motivo:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Cuenta Remitente:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Tipo Cuenta Remitente:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Entidad Bancaria Remitente:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Cuenta Destinatario:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Tipo Cuenta Destinatario:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Entidad Bancaria Destinatario:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Monto:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Tipo:</span></strong>
          </p>
          <p>
            <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Comprobante de pago:</span></strong>
          </p>
    </body>
    </html>
    ';

    // Output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // Close and output PDF document
    $pdf->Output('loan_statement.pdf', 'D');
}

// Check if the button is clicked
if(isset($_POST['generate_pdf'])) {
    // Generate the PDF
    generatePDF();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF</title>
</head>
<body>
    <form method="post">
        <button type="submit" name="generate_pdf">Generate PDF</button>
    </form>
    <div id="editModal" class="modal fade" role="dialog">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Editar Prestamo</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
    <script>function isEditFormValido() { return false;}</script>
    <form onsubmit="return isEditFormValido()" id="editForm" action="update_prestamo.php" method="post">
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
                    <select class="form-control" id="editStatus" name="statusPrestamo">
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
                    <input type="text" class="form-control datepicker" id="editFechaFinalPrestamo" name="editFechaFinalPrestamo">
                </div>
                <div class="form-group">
                    <label for="editCuotasTotales">Cuotas Totales:</label>
                    <input type="text" class="form-control" id="editCuotasTotales" name="editCuotasTotales">
                </div>
                <div class="form-group">
                  <label id="labelDiasDePagoDelMes" for="diasDePagoDelMes">Días de Pago del Mes:</label>
                  <div id="editDiasDePagoContainer"></div>
                </div>
            </div>
            <!-- Group 6 -->
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="editDiasDePagoDelMes">Dias de Pago del Mes:</label>
                    <input type="text" class="form-control" id="editDiasDePagoDelMes" name="editDiasDePagoDelMes">
                </div>
                
                
 
                <div class="form-group">
                    <label for="editFechaDeAprobacion">Fecha de Aprobacion:</label>
                    <input type="text" class="form-control datepicker" id="editFechaDeAprobacion" name="editFechaDeAprobacion">
                </div>
            </div>
        </div>
</div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary" id="saveChangesBtn">Guardar Cambios</button>
      
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
    </form>
  </div>
</div>
</div>
</body>
</html>
