<?php
require_once ("Utilisateur.php");

class UtilisateurGateway /*extends Utilisateur*/{
    private $con;
    private $query;
    private $results;

    public function __construct(Connection $con){
        $this->con=$con;
    }

    public function getLogin($login){
        $query="SELECT Username from utilisateur WHERE Username = '$login'";
        $this->con->executeQuery($query, array(':login' => array($login, PDO::PARAM_STR)));
        $results=$this->con->getResults();
        return $results;
    }

    public function getPassword($login) {
        $query="SELECT passwd FROM utilisateur WHERE Username = '$login'";
        $this->con->executeQuery($query,array(
            ':login' => array($login, PDO::PARAM_STR)
        ));

        $results=$this->con->getResults();
        return $results;
    }
    public function insertUser($login,$passwd){
        $mdpHash=password_hash($passwd,PASSWORD_DEFAULT);
        $query = "insert into utilisateur values ('$login','$mdpHash')";
        if (!$this->isExiste($login)){
            $this->con->executeQuery($query);
        }
        else{
            throw new Exception("Utilisateur déjà existant");
        }
    }
    public function isExiste(string $username):bool{
        $query = "select * from utilisateur where Username='$username'";
        $this->con->executeQuery($query);
        if ($this->con->getResults() == null)
            return false;
        return true;
    }
}