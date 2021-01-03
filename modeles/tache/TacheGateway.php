<?php
require_once ("Tache.php");

class TacheGateway extends Tache
{
    private $con;

    public function __construct(Connection $con){
        $this->con=$con;
    }

    public function insertionUtilisateur(Tache $t){
        $fait = 0;
        $login = $_SESSION['pseudo'];
        $query = "insert into tache values ('".NULL."','".$t->getTitre()."','".$t->getDescription()."','".$t->getDatePrevu()."','".$t->getDateInscrite()."','".$fait."','".$login."')";
        $this->con->executeQuery($query);
    }

    public function isUserTache(int $idTache){
        $query = "select username from tache where idTache = $idTache";
        $this->con->executeQuery($query);
        $result = $this->con->getResults();
        if(empty($result) || $result[0]['username'] == '')
            return null;
        return $result[0]['username'];
    }

    public function insertionVisiteur(Tache $t){
        $fait = 0;
        $query = "insert into tache values ('".NULL."','".$t->getTitre()."','".$t->getDescription()."','".$t->getDatePrevu()."','".$t->getDateInscrite()."','".$fait."','".NULL."')";
        $this->con->executeQuery($query);
    }

    public function getResultUtilisateur():array{
        $login= $_SESSION['pseudo'];
        $query = "select * from tache where Username = '$login' or Username is null or Username='' order by DatePrevu ";
        $this->con->executeQuery($query);

        $result = $this->con->getResults();

        $tTaches= array();
        foreach ($result as $r){
            $t = new Tache($r['idTache'],$r['Titre'],$r['Description'],$r['DatePrevu'],$r['DateInscrite']);
            array_push($tTaches, $t);
        }
        return $tTaches;
    }
    public function getResultVisiteur():array{
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
    public function getDoneTasks():array{ //retourne les taches coché
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
    public function deleteDoneTasks($tabFait){ //retourne les taches coché
        foreach ($tabFait as $item) {
            $query = "delete from tache where idTache = $item";
        }
        $this->con->executeQuery($query);
    }
    public function deleteOneTask($idTache){
        $query = "delete from tache where idTache = $idTache";
        $this->con->executeQuery($query);
    }
}