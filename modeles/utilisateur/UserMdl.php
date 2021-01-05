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

    function connexion($login, $password, &$dVueErreur): bool{  //permet de créer une nouvelle session avec le role de l'utilisateur et son login
        $loginDataBase = $this->usergateway->getLogin($login);
        $passwdDataBase = $this->usergateway->getPassword($login);
        if( !empty($passwdDataBase[0]) && !empty($loginDataBase[0]) && password_verify($password, $passwdDataBase[0][0])) { //verification si le mot de passe correspond à celui qui est en base de donnée
            $_SESSION['role'] = "Utilisateur";
            $_SESSION['pseudo'] = $login;
        } else {
            $dVueErreur[] = "Login ou mot de passe incorrect";
            return false;
        }
        return true;
    }

    static function deconnexion() {//permet de détruire la session en cours
        $_SESSION = array();
        session_unset();
        session_destroy();
    }

    public function isUser() { //permet de savoir si la session est setté // non utilisé
        if(isset($_SESSION['login']) && isset($_SESSION['role'])) {
            $role = filter_var($_SESSION['role'], FILTER_SANITIZE_STRING);
            $login = filter_var($_SESSION['login'], FILTER_SANITIZE_STRING);
        } else {
            return NULL;
        }
    }
}