<?php


class Utilisateur{

    private $username; //todo ajout de username comme clé privé a la place de idUtilisateur
    private $passwd;
    //private $photoProfil; pas oblié de le faire ( peut etre trop compliqué)

    public function __construct($username,$passwd)
    {
        global $con;
        $this->usergateway = new UtilisateurGateway($con);
        /*
        $this->username = $username;
        $this->passwd = $passwd;
        */
    }

    function connexion($login,$password){
        $loginDataBase = $this->usergateway->getLogin($login);
        $passwdDataBase = $this->usergateway->getPassword($login);
        $passwd = $passwdDataBase[0][0];

        if(password_verify($password, $passwd) || $passwd==$password) { //todo faire le hachage dans la table utilisateur
            $_SESSION['role'] = "Utilisateur";
            $_SESSION['pseudo'] = $login;
        } else {
            $dVueErreur[] = "Login ou mot de passe incorrect";
            throw new Exception("Login ou mot de passe incorrect", 1);
        }
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

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPasswd()
    {
        return $this->passwd;
    }


    public function __toString(){

        return "$this->username </br>";
    }

}