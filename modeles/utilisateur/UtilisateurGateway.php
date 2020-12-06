<?php
require_once ("Utilisateur.php");

class UtilisateurGateway extends Utilisateur
{
    private $con;

    public function __construct(Connection $con){
        $this->con=$con;
    }

    public function insertion(Utilisateur $u){
        $query = "insert into utilisateur values ('".NULL."','".$u->getPrenom()."','".$u->getNom()."','".$u->getPasswd()."')";
        $this->con->executeQuery($query);
    }

    public function isExiste(string $prenom, string $mdp){
        $query = "select * from utilisateur where Prenom='$prenom' and Passwd='$mdp'";
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
            $t = new Utilisateur($r['Nom'],$r['Prenom'],$r['Passwd']);
            array_push($tUser, $t);
        }
        return $tUser;
    }

}