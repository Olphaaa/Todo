<?php
require_once ("Tache.php");

class TacheGateway //permet de faire les intérations avec la base de donnée
{
    private $con;

    public function __construct(Connection $con){
        $this->con=$con;
    }

    public function insertionUtilisateur(Tache $t){ //insert une tache avec le nom de l'utilisateur qu'il l'a saisie
        $fait = 0;
        $login = $_SESSION['pseudo'];
        $query = "insert into tache values ('".NULL."','".$t->getTitre()."','".$t->getDescription()."','".$t->getDatePrevu()."','".$t->getDateInscrite()."','".$fait."','".$login."')";
        $this->con->executeQuery($query);
    }

    public function insertionVisiteur(Tache $t){//insert une tache sans le nom de l'utilisateur , cela veux dire que la tache est publique
        $fait = 0;
        $query = "insert into tache values ('".NULL."','".$t->getTitre()."','".$t->getDescription()."','".$t->getDatePrevu()."','".$t->getDateInscrite()."','".$fait."','".NULL."')";
        $this->con->executeQuery($query);
    }

    public function isUserTache(int $idTache){ //permet de savoir si une tache correspond a un utilisateur (utile pour contourner les injections)
        $query = "select username from tache where idTache = $idTache";
        $this->con->executeQuery($query);
        $result = $this->con->getResults();
        if(empty($result) || $result[0]['username'] == '')
            return null;
        return $result[0]['username'];
    }

    public function getResultUtilisateur():array{ //récupère toutes les taches d'un utilisateur précis
        $login=$_SESSION['pseudo'];
        $query="select * from tache where Username = '$login' or Username is null or Username='' order by DatePrevu ";
        $this->con->executeQuery($query);

        $result = $this->con->getResults();

        $tTaches= array();
        foreach ($result as $r){
            $t = new Tache($r['idTache'],$r['Titre'],$r['Description'],$r['DatePrevu'],$r['DateInscrite']);
            array_push($tTaches, $t);
        }
        return $tTaches;
    }
    public function getResultVisiteur():array{ //récupère toutes les tacheq sans utilisateurs, donc publiques
        $query = "select * from tache where Username IS NULL or Username = '' order by DatePrevu";
        $this->con->executeQuery($query);

        $result = $this->con->getResults();

        $tTaches= array();
        foreach ($result as $r){
            $t = new Tache($r['idTache'],$r['Titre'],$r['Description'],$r['DatePrevu'],$r['DateInscrite']);
            array_push($tTaches, $t);
        }
        return $tTaches;
    }
    public function getDoneTasks():array{ //retourne les taches coché //non utilisé
        $query = "select * from tache where isFait = 1";
        $this->con->executeQuery($query);

        $result = $this->con->getResults();

        $tTaches= array();
        foreach ($result as $r){
            $t = new Tache($r['idTache'],$r['Titre'],$r['Description'],$r['DatePrevu'],$r['DateInscrite']);
            array_push($tTaches, $t);
        }
        return $tTaches;
    }

    public function deleteDoneTasks($tabFait){ //supprime toutes les taches faites // non utilisé
        foreach ($tabFait as $item) {
            $query = "delete from tache where idTache = $item";
        }
        $this->con->executeQuery($query);
    }

    public function deleteOneTask($idTache){ //supprime une tache dont son idTache est passé en paramètre
        $query = "delete from tache where idTache = $idTache";
        $this->con->executeQuery($query);
    }
}