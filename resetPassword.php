<?php require('includes/config.php'); 

//if logged in redirect to members page
if ($user->is_logged_in() ){ 
	header('Location: index.php'); 
	exit(); 
}

$resetToken = $_GET['key'];

$stmt = $db->prepare('SELECT resetToken, resetComplete FROM usuarios WHERE resetToken = :token');
$stmt->execute(array(':token' => $resetToken));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

//if no token from db then kill the page
if (empty($row['resetToken'])){
	$stop = 'Token invalido, por favor usa el link enviado por correo.';
} elseif($row['resetComplete'] == 'Yes') {
	$stop = 'Tu contraseña ha sido cambiada correctamente';
}

//if form has been submitted process it
if (isset($_POST['submit'])){

	if (! isset($_POST['password']) || ! isset($_POST['passwordConfirm'])) {
		$error[] = 'Debes llenar ambos campos de contraseña';
	}

	//basic validation
	if (strlen($_POST['password']) < 3){
		$error[] = 'La contraseña es muy corta';
	}

	if (strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'La confirmación de contraseña es muy corta';
	}

	if ($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Las contraseñas no coinciden';
	}

	//if no errors have been created carry on
	if (! isset($error)){

		//hash the password
		$hashedpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

		try {

			$stmt = $db->prepare("UPDATE usuarios SET Contraseña = :hashedpassword, resetComplete = 'Yes'  WHERE resetToken = :token");
			$stmt->execute(array(
				':hashedpassword' => $hashedpassword,
				':token' => $row['resetToken']
			));

			//redirect to index page
			header('Location: login.php?action=resetAccount');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}
	}
}

//define page title
$title = 'Reincio de contraseña';

//include header template
//require('layout/header.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Account</title>
    <!-- Bootstrap CSS -->
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
    <?php if (isset($stop)){

	    		echo "<p class='bg-danger'>$stop</p>";

	    	} else { ?>

				<form role="form" method="post" action="" autocomplete="off">
					<h2>Cambiar contraseña</h2>
					<hr>

					<?php
					//check for any errors
					if (isset($error)){
						foreach($error as $error){
							echo '<p class="bg-danger">'.$error.'</p>';
						}
					}

					if (isset($_GET['action'])) {

						//check the action
						switch ($_GET['action']) {
							case 'active':
								echo "<h2 class='bg-success'>Tu cuenta esta lista para iniciar sesión.</h2>";
								break;
							case 'reset':
								echo "<h2 class='bg-success'>Por favor revisa tu correo electrónico.</h2>";
								break;
						}
					}
					?>

					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Contraseña" tabindex="1">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirmación contraseña" tabindex="1">
							</div>
						</div>
					</div>
					
					<hr>
					<div class="row">
						<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Cambiar contraseña" class="btn btn-primary btn-block btn-lg" tabindex="3"></div>
					</div>
				</form>

			<?php } ?>
  </div>
</div>




<?php 
//include header template
//require('layout/footer.php'); 
?>
