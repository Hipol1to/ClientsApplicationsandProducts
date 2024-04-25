<?php
//include config
require_once('includes/config.php');

$isUserAdmin = isset($_SESSION['isAdmin']) ? $_SESSION['isAdmin'] : false;
$isProffileValidated = isset($_SESSION['isProffileValidated']) ? $_SESSION['isProffileValidated'] : false;
$isUserActive = isset($_SESSION['isUserActive']) ? $_SESSION['isUserActive'] : false;

//check if already logged in move to home page
if( $user->is_logged_in() && $isUserAdmin && $isProffileValidated && $isUserActive){ header('Location: index.php'); exit(); }
elseif ($user->is_logged_in() && !$_SESSION['isAdmin'] && $isProffileValidated && $isUserActive) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProductsSANDBOX/clients/index.php');  
  exit();
}

//process login form if submitted
if(isset($_POST['submit'])){

	if (! isset($_POST['username'])) {
		$error[] = "Por favor completa todos los campos";
	}

	if (! isset($_POST['password'])) {
		$error[] = "Por favor completa todos los campos";
	}

	$username = $_POST['username'];
	if ($user->isValidUsername($username)){
		if (! isset($_POST['password'])){
			$error[] = 'Debes introducir una contraseña';
		}

		$password = $_POST['password'];

		if ($user->login($username, $password)){
      $_SESSION['username'] = $username;
      $isUserAdmin = isset($_SESSION['isAdmin']) ? $_SESSION['isAdmin'] : false;
      $isProffileInReview = isset($_SESSION['isProffileInReview']) ? $_SESSION['isProffileInReview'] : false;
      $isProffileValidated = isset($_SESSION['isProffileValidated']) ? $_SESSION['isProffileValidated'] : false;
      $isUserActive = isset($_SESSION['isUserActive']) ? $_SESSION['isUserActive'] : false;
      $hasUserProffile = isset($_SESSION['ClienteId']) ? $_SESSION['ClienteId'] : null;

      //validacion ideal
      //if ($isUserAdmin && $isProffileValidated && $isUserActive) {
      if ($isUserAdmin && $isUserActive) {
        error_log("Usuario admin validado y activo");
        header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProductsSANDBOX/dashboard/index.php');  
        exit();
      } elseif (!$isUserAdmin && $isProffileValidated && $isUserActive) {
        error_log("Usuario cliente validado y activo");
        header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProductsSANDBOX/clients/index.php');
        exit();
      } elseif (!$isUserActive) {
        error_log("Usuario no activo");
        $error[] = 'Tu usuario no está activo, asegurate de haber activado tu cuenta o consulta con el administrador';
      } elseif (!$hasUserProffile) {
        error_log("Usuario no tiene perfil");
        header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProductsSANDBOX/clients/completa_perfil.php');
        exit();
      } elseif ($isProffileInReview) {
        error_log("Perfil de usuario esta en revision");
        error_log($_SESSION['isProffileInReview']);
        header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProductsSANDBOX/clients/gracias_por_completar.php');
        exit();
      }elseif (!$isProffileValidated) {
        error_log("Perfil de usuario no validado");
        error_log($_SESSION['isProffileValidated']);
        $error[] = 'Tu usuario aún no ha sido habilitado, por favor intentalo más tarde';
      } else {
        error_log("Error desconocido, usuario no esta activo ni el perfil fue validado");
        $error[] = 'Desafortunadamente, tu solicitud no pudo ser ejecutada';
      }
		} else {
			$error[] = 'Usuario o contraseña incorrecta, asegurate de haber activado tu cuenta';
		}
	}else{
		$error[] = 'El usuario solo puede tener caracteres alfanumericos, entre 3-16 caracteres';
	}

}//end if submit

//define page title
$title = 'Iniciar Sesion';

//include header template
//require('layout/header.php'); 
?>
<head>
  <title>Inversiones Everest</title>
  <link rel="icon" href="assets/img/inversiones_everest.png" type="image/x-icon">
  <link rel="shortcut icon" href="assets/img/inversiones_everest.png" type="image/x-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
	

<style>
  .containerrr {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background: linear-gradient(to left, #305454, #40546c, #305454) !important;
  }

  .form-containerrr {
    max-width: 400px;
    width: 100%;
    padding: 20px;
    background-color: rgba(248, 249, 250, 0.8);
    border-radius: 10px;
  }

  .form-containerrr h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #2e5653 !important;
  }
</style>

<div class="containerrr">
  <div class="form-containerrr">
    <form role="form" method="post" action="" autocomplete="off">
      <div class="row justify-content-center">
      <div class="col-md-6 text-center">
        <img src="assets/img/inversiones_everest.png" alt="" width="100%">
      </div>
    </div>
      <h2 style="color: #2e5653 !important;">Iniciar Sesión</h2>
      <p style="color: #2e5653 !important;">¿Todavía no eres miembro? <a href="index.php"><b style="color: #2e5653 !important;">Regístrate</b> </a></p>
      <hr>

      <?php
      // Check for any errors
      if (isset($error)) {
        foreach ($error as $error) {
          echo '<p style="color: white;" class="bg-danger">' . $error . '</p>';
        }
      }

      if (isset($_GET['action'])) {
        // Check the action
        switch ($_GET['action']) {
          case 'active':
            echo "<h2 class='bg-success'>Tu cuenta ha sido activada. Puedes iniciar sesión.</h2>";
            break;
          case 'reset':
            echo "<h2 class='bg-success'>Se ha enviado a tu correo un link de reinicio de contraseña.</h2>";
            break;
          case 'resetAccount':
            echo "<h2 class='bg-success'>Contraseña cambiada correctamente. Puedes iniciar sesion.</h2>";
            break;
        }
      }
      ?>

      <div class="form-group">
        <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Usuario" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>" tabindex="1">
      </div>

      <div class="form-group">
        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Contraseña" tabindex="3">
      </div>

      <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9">
          <a href="reset.php">¿Olvidaste tu contraseña?</a>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col-xs-6 col-md-6">
          <input type="submit" name="submit" value="Iniciar sesión" class="btn btn-primary btn-block btn-lg" tabindex="5">
        </div>
      </div>
    </form>
  </div>
</div>



<?php 
//include header template
//require('layout/footer.php'); 
?>
