<?php

class User 
{
	private $_db;
	private $_ignoreCase;

	function __construct($db)
	{
		$this->_db = $db;
		$this->_ignoreCase = false;
	}
	
	public function setIgnoreCase($sensitive) {
		$this->_ignoreCase = $sensitive;
	}

	public function getIgnoreCase() {
		return $this->_ignoreCase;
	}

	private function get_user_hash($username)
{
    try {
        $stmt = $this->_db->prepare('SELECT Contraseña AS password, Usuario AS username, Rol, CONCAT(c.Nombre, \' \', c.Apellido) AS fullname, C.IdUsuario AS idusuario, u.Active AS isUserActive, c.PerfilValidado AS isProffileValidated, u.Id FROM usuarios AS u 
		LEFT OUTER JOIN Clientes c on c.IdUsuario = u.Id
		WHERE LOWER(Usuario) = LOWER(:username) AND Active = 1 AND c.IdUsuario = u.Id');
        $stmt->execute(array('username' => $username));

        return $stmt->fetch();

    } catch(PDOException $e) {
        echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    }
}

	public function isValidUsername($username)
	{
		if (strlen($username) < 3) {
			return false;
		}

		if (strlen($username) > 17) {
			return false;
		}

		if (! ctype_alnum($username)) {
			return false;
		}

		return true;
	}

	public function login($username, $password)
{
    if (!$this->isValidUsername($username)) {
        return false;
    }

    if (strlen($password) < 3) {
        return false;
    }

    $row = $this->get_user_hash($username);

    if (password_verify($password, $row['password'])) {

        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $row['username'];
        $_SESSION['userId'] = $row['Id'];
        $_SESSION['fullname'] = $row['fullname'];
		$_SESSION['isProffileValidated'] = $row['isProffileValidated'] == 1 ? true : false;
		error_log("validado? " . $_SESSION['isProffileValidated']);
		$_SESSION['isUserActive'] = $row['isUserActive'] == 1 ? true : false;
		error_log($_SESSION['loggedin']);
		error_log($_SESSION['username']);
		error_log($_SESSION['userId']);
		error_log($_SESSION['fullname']);
		error_log($_SESSION['isProffileValidated']);
		error_log($_SESSION['isUserActive']);

        // Check the role of the logged-in user
        $role = $row['Rol'];
        $_SESSION['isAdmin'] = ($role === 'Administrador' || $role === 'Owner') ? true : false;

        return true;
    }
    return false;
}


	public function logout()
	{
		session_destroy();
	}

	public function is_logged_in()
	{
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

}
