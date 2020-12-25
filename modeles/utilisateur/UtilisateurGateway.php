<?php
require_once ("Utilisateur.php");

class UtilisateurGateway extends Utilisateur
{
    private $con;

    public function __construct(Connection $con){
        $this->con=$con;
    }

    public function insertion(Utilisateur $u){
        if (!$this->isExiste($u->getUsername(), $u->getPasswd()))
        {
            $query = "insert into utilisateur values ('".$u->getUsername()."','".$u->getPasswd()."')";
            $this->con->executeQuery($query);
        }
    }

    public function isExiste(string $username, string $mdp){
        $query = "select * from utilisateur where Username='$username' and passwd='$mdp'";
        $this->con->executeQuery($query);
        if ($this->con->getResults() == null)
            return false;

        return true;
    }

    public function getResult():array{
        $query = "select * from utilisateur";
        $this->con->executeQuery($query);

        $result = $this->con->getResults();

        $tUser= array();
        foreach ($result as $r){
            $t = new Utilisateur($r['Username'],$r['passwd']);
            array_push($tUser, $t);
        }
        return $tUser;
    }

}