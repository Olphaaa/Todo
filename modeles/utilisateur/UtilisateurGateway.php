<?php
require_once ("Utilisateur.php");

class UtilisateurGateway{
    private $con;
    private $query;
    private $results;

    public function __construct(Connection $con){
        $this->con=$con;
    }

    public function getLogin($login){ //permet d'avoir le login s'il est existant
        $query="SELECT Username from utilisateur WHERE Username = '$login'";
        $this->con->executeQuery($query, array(':login' => array($login, PDO::PARAM_STR)));
        $results=$this->con->getResults();
        return $results;
    }

    public function getPassword($login) { //permet d'acoir le mot de passe s'il est existant
        $query="SELECT passwd FROM utilisateur WHERE Username = '$login'";
        $this->con->executeQuery($query,array(
            ':login' => array($login, PDO::PARAM_STR)
        ));

        $results=$this->con->getResults();
        return $results;
    }
    public function insertUser($login,$passwd){ //permet d'ajouter un nouvel utilisateur dans la base de données
        $mdpHash=password_hash($passwd,PASSWORD_DEFAULT);
        $query = "insert into utilisateur values ('$login','$mdpHash')";
        if (!$this->isExiste($login)){
            $this->con->executeQuery($query);
        }
        else{
            throw new Exception("Utilisateur déjà existant");
        }
    }
    public function isExiste(string $username):bool{//permet de savoir si un utilisateur existe
        $query = "select * from utilisateur where Username='$username'";
        $this->con->executeQuery($query);
        if ($this->con->getResults() == null)
            return false;
        return true;
    }
}