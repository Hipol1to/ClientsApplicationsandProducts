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
        $stmt = $this->_db->prepare('SELECT Contraseña as password, Usuario as username, Rol, Id FROM usuarios WHERE LOWER(Usuario) = LOWER(:username) AND Active = "Yes"');
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
        $_SESSION['fullname'] = $row['Id'];

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
