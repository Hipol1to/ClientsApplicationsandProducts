<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../../../../includes/config.php');

// Fetch data from the 'finanzas' table
$sql = "SELECT dineroencaja, dineroenprestamos, dineroinvertido FROM finanzas";
$result = $db->query($sql);

if ($result->rowCount() > 0) {
  // Fetch the first row (assuming there's only one row in 'finanzas' table)
  $row = $result->fetch(PDO::FETCH_ASSOC);

  // Store the fetched data in an array
  $finanzas_data = array(
    'dineroencaja' => $row['dineroencaja'],
    'dineroenprestamos' => $row['dineroenprestamos'],
    'dineroinvertido' => $row['dineroinvertido']
  );

  // Encode the data as JSON and output it
  echo json_encode($finanzas_data);
} else {
  // No data found in the 'finanzas' table
  echo json_encode(array('error' => 'No data found'));
}
?>
