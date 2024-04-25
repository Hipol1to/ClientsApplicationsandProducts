<?php
// Include the TCPDF library
require('../includes/config.php');

require_once('../tcpdf/tcpdf.php');

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

// Function to generate the PDF
if(isset($_POST['generate_pdf'])) {
  $clientBody = "";
  $loanBody = "";
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
$sql = "SELECT 	Id, IdCliente, Motivo, MontoSolicitado, MontoAprobado, MontoPagado, TasaDeInteres, MontoRecargo, Remitente, Beneficiario, Status, PagoId, FechaPagoMensual, FechaFinalPrestamo, CuotasTotales, DiasDePagoDelMes, CantPagosPorMes, FechaDeAprobacion, FechaCreacion, FechaModificacion, (SELECT COUNT(*) FROM prestamos WHERE IdCliente = ".$_POST['idClient'].") AS prestamosCount FROM prestamos WHERE IdCliente = ".$_POST['idClient']."";
  error_log($sql);
$result = $db->query($sql);

  $sqlClient = "SELECT * FROM Clientes WHERE Id = ". $_POST['idClient'];
  $resultClient = $db->query($sqlClient);
  $clienteRecord = $resultClient->fetch(PDO::FETCH_ASSOC);

  $cedulaPathValues = explode("_.d1vis10n._", $clienteRecord['CedulaPath']);
  $capturaFrontalPath = isset($cedulaPathValues[0]) && isset(explode("\clients\\", $cedulaPathValues[0])[1]) ? "../clients/".explode("\clients\\", $cedulaPathValues[0])[1] : null;
  $capturaReversoPath = isset($cedulaPathValues[1]) && isset(explode("\clients\\", $cedulaPathValues[1])[1]) ? "../clients/".explode("\clients\\", $cedulaPathValues[1])[1] : null; 


if ($result) {
  $i = 1;
  $o = 1;
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $sql2 ="SELECT Id, IdCliente, CuentaRemitente, TipoCuentaRemitente, EntidadBancariaRemitente, CuentaDestinatario, TipoCuentaDestinatario, EntidadBancariaDestinatario, Monto, Motivo, Tipo, InversionId, PrestamoId, ParticipacionId, VoucherPath, FechaDePago, FechaCreacion, FechaModificacion,  (SELECT COUNT(*) FROM pagos WHERE PrestamoId =".$row['Id'].") AS pagosCount FROM pagos WHERE PrestamoId =".$row['Id'];
      $result2 = $db->query($sql2);
      error_log($sql2);

      if($row['MontoAprobado'] > $row['MontoPagado']) {
        $row['Balance'] = ($row['MontoAprobado']) - ($row['MontoPagado']);
      }
      else {
        $row['Balance'] = ($row['MontoPagado']) - ($row['MontoAprobado']);
      }
      $clientBody = '
      <p style=" line-height:108%; font-size:14pt">
        <strong>Perfil de cliente:</strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">ID: '.$clienteRecord['Id'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">ID de usuario: '.$clienteRecord['IdUsuario'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Nombre: '.$clienteRecord['Nombre'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Apellido: '.$clienteRecord['Apellido'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Direccion: '.$clienteRecord['Direccion'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Cedula: '.$clienteRecord['Cedula'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Captura frontal de cedula frontal: <br><br><img src="../clients/'.htmlspecialchars($capturaFrontalPath).'" alt="Captura de cedula no disponible" height="250px"></span></strong>
      </p>
      <br><br><br><br><br><br><br><br>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Captura trasera de cedula frontal: <br><br><img src="../clients/'.htmlspecialchars($capturaReversoPath).'" alt="Captura de cedula no disponible" height="250px"></span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">RNC: '.$clienteRecord['RNC'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Numero de cuenta bancaria: '.$clienteRecord['NumeroCuentaBancaria'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Entidad bancaria: '.$clienteRecord['EntidadBancaria'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Tipo de cuenta bancaria: '.$clienteRecord['TipoDeCuentaBancaria'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Monto total prestado: '.$clienteRecord['MontoTotalPrestado'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Monto total pagado: '.$clienteRecord['MontoTotalPagado'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Monto total deuda: '.$clienteRecord['MontoDeuda'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Puntos: '.$clienteRecord['Puntos'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Fecha de ingreso: '.$clienteRecord['FechaIngreso'].'</span></strong>
      </p>';

        $loanBody.='<p style="text-align:center; line-height:108%; font-size:14pt">
        <strong>Préstamo #'.$i.':</strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">ID: '.$row['Id'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Balance: '. $row['Balance'] .'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Monto Solicitado: '.$row['MontoSolicitado'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Monto Aprobado: '.$row['MontoAprobado'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Monto Pagado: '.$row['MontoPagado'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Concepto: '.$row['Motivo'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Monto Recargo: '.$row['MontoRecargo'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Fecha de solicitud: '.$row['FechaCreacion'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Cant. min. pagos por mes: '.$row['CantPagosPorMes'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Fecha proximo pago: '.$row['FechaPagoMensual'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Cant. total de cuotas: '.$row['CuotasTotales'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Dias en el mes asignados para pagar: '.$row['DiasDePagoDelMes'].'</span></strong>
      </p>
      <p>
        <strong><span style="font-family:'.'Segoe UI'.'; color:#212529; background-color:#ffffff">Fecha de aprobacion: '.$row['FechaDeAprobacion'].'</span></strong>
      </p>';
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
      $o++;
      }
      $i++;
      $o=1;
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
            <img src="../assets/img/inversiones_everest.png" alt="Logo inversiones everest" height="150px">
          </p>
          <p style="text-align:center; line-height:108%; font-size:14pt">
        <strong>Inversiones Everest</strong>
      </p>
          <p style="text-align:center; line-height:108%; font-size:14pt">
            '.date("Y/m/d").'
          </p>
          <p style="line-height:108%; font-size:4pt">
            &#xa0;
          </p>
          <p style="line-height:108%; font-size:4pt">
            &#xa0;
          </p>
          '.$clientBody.' <br>
          '.$loanBody.'
    </body>
    </html>
    ';

    // Output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // Close and output PDF document
    $pdf->Output('Estado_de_cuenta '.$_SESSION['username'].'.pdf', 'D');
}
?>