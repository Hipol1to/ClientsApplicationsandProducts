<?php require('includes/config.php');

//if logged in redirect to members page
if ($user->is_logged_in()){ 
	header('Location: index.php'); 
	exit(); 
}

//if form has been submitted process it
if (isset($_POST['submit'])){

	//Make sure all POSTS are declared
	if (! isset($_POST['email'])) {
		$error[] = "Please fill out all fields";
	}


	//email validation
	if (! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Por favor inserta un correo electrónico valido';
	} else {
		$stmt = $db->prepare('SELECT email FROM usuarios WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if (empty($row['email'])){
			$error[] = 'Correo electrónico no encontrado.';
		}

	}

	//if no errors have been created carry on
	if (! isset($error)){

		//create the activation code
		$token = md5(uniqid(rand(),true));

		try {

			$stmt = $db->prepare("UPDATE usuarios SET resetToken = :token, resetComplete='No' WHERE email = :email");
			$stmt->execute(array(
				':email' => $row['email'],
				':token' => $token
			));

			//send email
			$to = $row['email'];
			$subject = "Reinicio de contraseña";
			$body = "<p>Hemos recibido una solicitud de cambio de contraseña.</p>
			<p>Si no reconoces esta solicitud, por favor ignora este correo.</p>
			<p>Pare reiniciar tu contraseña accede al siguiente enlace: <a href='".DIR."resetPassword.php?key=$token'>".DIR."resetPassword.php?key=$token</a></p>";

			$mail = new Mail();
      $mail->isSMTP();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			//redirect to index page
			header('Location: login.php?action=reset');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}
	}
}

//define page title
$title = 'Reset Account';

//include header template
//require('layout/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inversiones Everest</title>
    <!-- Bootstrap CSS -->
    <link rel="icon" href="assets/img/inversiones_everest.png" type="image/x-icon">
  <link rel="shortcut icon" href="assets/img/inversiones_everest.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<style>
  .containerrr {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background: linear-gradient(to left, #305454, #40546c, #305454) !important
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <div class="row justify-content-center">
      <div class="col-md-6 text-center">
        <img src="assets/img/inversiones_everest.png" alt="" width="100%">
      </div>
    </div>
                            <h2 class="panel-title">Resetear contraseña</h2>
                        </div>
                        <div class="panel-body">
                            <p><a href='login.php'>Volver a inciar sesión</a></p>
                            <hr>

                            <?php
                            // Check for any errors
                            if (isset($error)){
                                foreach($error as $error){
                                    echo '<div class="alert alert-danger">'.$error.'</div>';
                                }
                            }

                            if (isset($_GET['action'])){
                                // Check the action
                                switch ($_GET['action']) {
                                    case 'active':
                                        echo "<div class='alert alert-success'>Your account is now active. You may now log in.</div>";
                                        break;
                                    case 'reset':
                                        echo "<div class='alert alert-success'>Please check your inbox for a reset link.</div>";
                                        break;
                                }
                            }
                            ?>

                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Correo electrónico" value="" tabindex="1">
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <input type="submit" name="submit" value="Enviar enlace" class="btn btn-primary btn-block btn-lg" tabindex="2">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
  </div>
</div>


    
    <!-- Bootstrap JS (optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>




<?php
//include header template
//require('layout/footer.php');
?>
