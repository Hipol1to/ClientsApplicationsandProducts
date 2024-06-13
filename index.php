<?php 
require('includes/config.php');

// If logged in, redirect to the members page
$isProffileValidated = isset($_SESSION['isProffileValidated']) ? $_SESSION['isProffileValidated'] : false;
if ($user->is_logged_in() && $_SESSION['isAdmin'] && $isProffileValidated) { 
	header('Location: ./dashboard/index.php'); 
  exit();
	// exit(); 
} elseif ($user->is_logged_in() && !$_SESSION['isAdmin'] && $isProffileValidated) {
  header('Location: ./clients/index.php');  
  exit();
}

// If the form has been submitted, process it
if(isset($_POST['submit'])){
    // Validation checks
    if (!isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['password'])) {
        $error[] = "Please fill out all fields";
    }

    $username = $_POST['username'];

    // Very basic validation
    if (!$user->isValidUsername($username)){
        $error[] = 'El usuario solo puede tener caracteres alfanuméricos, entre 3-16 caracteres';
    } else {
        // Check if the username already exists
        $stmt = $db->prepare('SELECT Usuario FROM usuarios WHERE Usuario = :username');
        $stmt->execute(array(':username' => $username));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($row['Usuario'])){
            $error[] = 'Este nombre de usuario ya está en uso';
        }
    }

    // Check password length
    if (strlen($_POST['password']) < 3){
        $error[] = 'La contraseña es muy corta';
    }

    // Check password confirmation
    if (strlen($_POST['passwordConfirm']) < 3){
        $error[] = 'Confirma tu contraseña';
    }

    // Check if passwords match
    if ($_POST['password'] != $_POST['passwordConfirm']){
        $error[] = 'Las contraseñas no coinciden';
    }

    // Email validation
    $email = htmlspecialchars_decode($_POST['email'], ENT_QUOTES);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error[] = 'Por favor, ingresa una dirección de correo electrónico válida';
    } else {
        // Check if the email already exists
        $stmt = $db->prepare('SELECT Email FROM usuarios WHERE Email = :email');
        $stmt->execute(array(':email' => $email));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($row['Email'])){
            $error[] = 'Este correo electrónico ya está en uso';
        }
    }

    // If no errors, proceed with registration
    if (!isset($error)){
        // Hash the password
        $hashedpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $activasion = md5(uniqid(rand(),true));

        try {
            // Insert into the database
            $stmt = $db->prepare('INSERT INTO usuarios (Usuario, Contraseña, Rol, Email, Active) VALUES (:username, :password, :rol, :email, :active)');
            $stmt->execute(array(
            ':username' => $username,
            ':password' => $hashedpassword,
            ':rol' => 'Cliente', // Assuming default role is 'Cliente'
            ':email' => $email,
            ':active' => 0 // You may adjust this based on your activation mechanism
            ));
            $id = $db->lastInsertId('Id');

            //send email
			$to = $_POST['email'];
			$subject = "Activa tu cuenta";
			$body = "<p>Gracias por registrarte en Inversiones Everest.</p>
			<p>Para activar tu cuenta, por favor haz click en este enlace: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>
			<p>Atentamente, el equipo de Inversiones Everest</p>";

			$mail = new Mail();
      $mail->isSMTP();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();


            // Redirect to index page
            header('Location: index.php?action=joined');
            exit;
        } catch(PDOException $e) {
            $error[] = $e->getMessage();
        }
    }
}

// Define page title
$title = 'Usuarios Inversiones Everest';

// Include header template
// require('layout/header.php');
?>
<head>
  <title>Inversiones Everest</title>
  <link rel="icon" href="assets/img/inversiones_everest.png" type="image/x-icon">
  <link rel="shortcut icon" href="assets/img/inversiones_everest.png" type="image/x-icon">
</head>
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
      <div class="row justify-content-center">
      <div class="col-md-6 text-center">
        <img src="assets/img/inversiones_everest.png" alt="" width="100%">
      </div>
    </div>
      <h2 style="color: #2e5653 !important;">Registrate</h2>
      <p style="color: #2e5653 !important;">¿Ya eres miembro? <a href="login.php"><b style="color: #2e5653 !important;">Inicia Sesión</b> </a></p>
      <hr>

      <?php
      // Check for any errors
      if (isset($error)) {
        foreach ($error as $error) {
          echo '<p style="color: white;" class="bg-danger">'.$error.'</p>';
        }
      }

      // If action is joined, show success message
      if (isset($_GET['action']) && $_GET['action'] == 'joined') {
        echo "<h2 class='bg-success'>Registro satisfactorio, revisa tu correo electronico para activar tu cuenta.</h2>";
      }
      ?>

      <div class="form-group">
        <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Usuario" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>" tabindex="1" required>
      </div>
      <div class="form-group">
        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Correo Electrónico" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['email'], ENT_QUOTES); } ?>" tabindex="2" required>
      </div>
      <div class="form-group">
        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Contraseña" tabindex="3" required>
      </div>
      <div class="form-group">
        <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control form-control-lg" placeholder="Confirmar contraseña" tabindex="4" required>
      </div>

      <div class="form-group">
        <input style="color: white !important;" type="submit" name="submit" value="Registrate" class="btn btn-primary btn-block btn-lg" tabindex="5" required>
      </div>
    </form>
    <script>
      document.getElementById('registrationForm').addEventListener('submit', function(e) {
      var submitButton = e.target.querySelector('input[type="submit"]');
      submitButton.disabled = true;
      });
    </script>
  </div>
</div>

<?php
//include header template
//require('layout/footer.php');
?>