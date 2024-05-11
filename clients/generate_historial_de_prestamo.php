<?php
// Include the TCPDF library
require('../includes/config.php');

require_once('../tcpdf/tcpdf.php');

if ($user->is_logged_in() && $_SESSION['isAdmin'] && $_SESSION['isProffileValidated'] && $_SESSION['isUserActive'] && isset($_SESSION['ClienteId'])) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProducts/dashboard/index.php');
  exit();  
} elseif (!isset($_SESSION['ClienteId']) && $user->is_logged_in()) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProducts/clients/completa_perfil.php');
  exit();
} elseif (!$user->is_logged_in()) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProducts/index.php');
  exit();
}

// Function to generate the PDF
if(isset($_POST['generate_pdf']) && isset($_POST['prestamoId'])) {
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
$sql = "SELECT 	Id, IdCliente, Motivo, MontoSolicitado, MontoAprobado, MontoPagado, TasaDeInteres, MontoRecargo, Remitente, Beneficiario, Status, PagoId, FechaPagoMensual, FechaFinalPrestamo, CuotasTotales, DiasDePagoDelMes, CantPagosPorMes, FechaDeAprobacion, FechaCreacion, FechaModificacion, (SELECT COUNT(*) FROM prestamos WHERE IdCliente = ".$_SESSION['ClienteId'].") AS prestamosCount FROM prestamos WHERE IdCliente = ".$_SESSION['ClienteId']."";
$result = $db->query($sql);


if ($result) {
  $o = 1;
    
      $sql2 ="SELECT Id, IdCliente, CuentaRemitente, TipoCuentaRemitente, EntidadBancariaRemitente, CuentaDestinatario, TipoCuentaDestinatario, EntidadBancariaDestinatario, Monto, Motivo, Tipo, InversionId, PrestamoId, ParticipacionId, VoucherPath, FechaDePago, FechaCreacion, FechaModificacion,  (SELECT COUNT(*) FROM pagos WHERE PrestamoId =".$_POST['prestamoId'].") AS pagosCount FROM pagos WHERE PrestamoId =".$_POST['prestamoId'];
      $result2 = $db->query($sql2);
      error_log($sql2);
       
      $loanBody.='<br><br>';
      
      while ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
        error_log($row2['Motivo']);
        $loanBody .= '<p style="text-align:center; line-height:108%; font-size:14pt">
        <strong>Pago #'.$o.':</strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Id: '.$row2['Id'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Motivo: '.$row2['Motivo'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Cuenta Remitente: '.$row2['CuentaRemitente'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Tipo Cuenta Remitente: '.$row2['TipoCuentaRemitente'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Entidad Bancaria Remitente: '.$row2['EntidadBancariaRemitente'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Cuenta Destinatario: '.$row2['CuentaDestinatario'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Tipo Cuenta Destinatario: '.$row2['TipoCuentaDestinatario'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Entidad Bancaria Destinatario: '.$row2['EntidadBancariaDestinatario'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Monto: '.$row2['Monto'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Tipo: '.$row2['Tipo'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Comprobante de pago:<br><img src="./'.$row2['VoucherPath'].'" alt="Comprobante de pago" height="300px"></span></strong>
      </p>
      <div style="page-break-before: always;"></div>
      ';
      error_log("this is the loan body: ".$loanBody);
      $o++;
      }
      $o=1;
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
          '.$loanBody.'
    </body>
    </html>
    ';

    error_log("PDF Finished");
    // Output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // Close and output PDF document
    $pdf->Output('Historial_de_pago.pdf', 'D');
}
else {
    error_log("tried to request a loan's payment summary, but some parameters didnt arrive");
    error_log("Submit button: " . $_POST['generate_pdf']);
    error_log("prestamo id: " . $_POST['prestamoId']);
}
?>