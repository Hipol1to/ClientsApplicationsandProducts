<?php
// Include the TCPDF library
require_once('../tcpdf/tcpdf.php');

// Function to generate the PDF
function generatePDF() {
    // Create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('CAP');
    $pdf->SetTitle('Estado de cuenta');
    $pdf->SetSubject('Detalle estado de cuenta');
    $pdf->SetKeywords('Estado, de, Cuenta, PDF');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 12);
    $loanBody = '';

    // Fetch data from the clientes table
$sql = "SELECT COUNT(*) AS prestamosCount FROM prestamos WHERE IdCliente = ".$_SESSION['ClienteId']."";
$result = $db->query($sql);

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $loanBody.='<p style="text-align:center; line-height:108%; font-size:14pt">
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
      </p>';
      $loanBody.='<br><br>';
    }
}
    

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
    $pdf->Output('Estado_de_cuenta.pdf', 'D');
}

// Check if the button is clicked
if(isset($_POST['generate_pdf'])) {
    // Generate the PDF
    generatePDF();
}
?>