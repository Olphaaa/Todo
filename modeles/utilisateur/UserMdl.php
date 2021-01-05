<?php


class UserMdl
{


    /**
     * UserMdl constructor.
     */
    public function __construct()
    {
        global $con;
        $this->usergateway = new UtilisateurGateway($con);
    }

    function connexion($login, $password, &$dVueErreur): bool{
        $loginDataBase = $this->usergateway->getLogin($login);
        $passwdDataBase = $this->usergateway->getPassword($login);
        if( !empty($passwdDataBase[0]) && !empty($loginDataBase[0]) && password_verify($password, $passwdDataBase[0][0])) {
            $_SESSION['role'] = "Utilisateur";
            $_SESSION['pseudo'] = $login;
        } else {
            $dVueErreur[] = "Login ou mot de passe incorrect";
            return false;
        }
        return true;
    }

    static function deconnexion() {
        $_SESSION = array();
        session_unset();
        session_destroy();
    }

    public function isUser() {
        if(isset($_SESSION['login']) && isset($_SESSION['role'])) {
            $role = filter_var($_SESSION['role'], FILTER_SANITIZE_STRING);
            $login = filter_var($_SESSION['login'], FILTER_SANITIZE_STRING);
        } else {
            return NULL;
        }
    }
}