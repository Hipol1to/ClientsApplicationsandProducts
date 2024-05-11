<?php
// Include the database connection file
require('../includes/config.php');

if ($user->is_logged_in() && !$_SESSION['isAdmin'] && $_SESSION['isProffileValidated'] && $_SESSION['isUserActive']) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProducts/clients/index.php');
  exit();  
} elseif (!$user->is_logged_in()) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProducts/index.php');
  exit();  
} elseif (!isset($_SESSION['ClienteId'])) {
  header('Location: http://blackestencio.zapto.org/ClientsApplicationsandProducts/clients/completa_perfil.php');
  exit();
}


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['id'])) {
    error_log("resetiar contra");
    $stmt = $db->prepare('UPDATE usuarios SET Contraseña = :contra WHERE id = :id');
  $stmt->execute(array(
          ':contra' => "\$2y\$10\$dqLjEA6bsVjTaew7zmSlx.eGEqSpcwQbxyGkXbjL/r5cLqLbellBG",
          ':id' => $_POST['id'] // You may adjust this based on your activation mechanism
        ));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  } else {
    error_log("agregar user");
  


  $username = $_POST['username'];
  error_log($username);
  error_log($_POST['password']);
  error_log($_POST['passwordConfirm']);

  // Check if the username already exists
  $stmt = $db->prepare('SELECT Usuario FROM usuarios WHERE Usuario = :username');
  $stmt->execute(array(':username' => $username));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!empty($row['Usuario'])) {
    $error[] = 'Este nombre de usuario ya está en uso';
    
    
  }

  // Check password length
  if (strlen($_POST['password']) < 3) {
    $error[] = 'La contraseña es muy corta';

    
  }

  // Check password confirmation
  if (strlen($_POST['passwordConfirm']) < 3) {
    $error[] = 'Confirma tu contraseña';

   
  }

  // Check if passwords match
  if ($_POST['password'] != $_POST['passwordConfirm']) {
    $error[] = 'Las contraseñas no coinciden';

   
  }

  // If no errors, proceed with registration
  if (!isset($error)) {
    error_log("setiao");
    // Hash the password
    $hashedpassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

    try {
      $idCliente = 1;
      // Insert into the database
      $stmt = $db->prepare('INSERT INTO usuarios (IdCliente, Usuario, Contraseña, Rol, Active) VALUES (:idCliente, :username, :password, :rol, :active)');
      $stmt->execute(
        array(
          ':idCliente' => $idCliente,
          ':username' => $username,
          ':password' => $hashedpassword,
          ':rol' => 'Administrador',
          ':active' => 1 // You may adjust this based on your activation mechanism
        )
      );
      $id = $db->lastInsertId('Id');
      header("Location: usuarios.php");
            error_log("se agrego el administrador");
            exit();
    } catch (PDOException $e) {
      error_log($e->getMessage());
    }
  }
  }
}
  ?>