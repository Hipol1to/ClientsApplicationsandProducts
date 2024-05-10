<?php
ob_start();
// Start the session if it hasn't been started already
//comment
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



//set timezone
date_default_timezone_set('Europe/London');

//database credentials
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','cap_storage');

//application address
define('DIR','http://blackestencio.zapto.org/ClientsApplicationsandProductsSANDBOX/');
define('SITEEMAIL','noreply@domain.com');

try {

	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";charset=utf8mb4;dbname=".DBNAME, DBUSER, DBPASS);
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);//Suggested to uncomment on production websites
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Suggested to comment on production websites
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}
//echo $_SERVER['PHP_SELF'];
if(strpos($_SERVER['PHP_SELF'], 'dashboard') !== false)
{
  if(strpos($_SERVER['PHP_SELF'], 'dist') !== false)
  {
    include('../../../../classes/user.php');
    include('../../../../classes/phpmailer/mail.php');
  }
  else {
  include('../classes/user.php');
  include('../classes/phpmailer/mail.php');
  }
}
else {
  if (strpos($_SERVER['PHP_SELF'], 'clients') !== false) {
    include('../classes/user.php');
    include('../classes/phpmailer/mail.php');
  } else {
  include('classes/user.php');
  include('classes/phpmailer/mail.php');
}
}
//include the user class, pass in the database connection

$user = new User($db);
?>