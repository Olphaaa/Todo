<?php
require_once ("Tache.php");

class TacheGateway extends Tache
{
    private $con;

    public function __construct(Connection $con){
        $this->con=$con;
    }


    public function insertion(Tache $t){
        $query = "insert into tache values ('".NULL."','".$t->getTitre()."','".$t->getDescription()."','".$t->getDatePrevu()."','".$t->getDateInscrite()."')";
        $this->con->executeQuery($query);
    }

    public function getResult():array{
        $query = "select * from tache order by DatePrevu";
        $this->con->executeQuery($query);

        $result = $this->con->getResults();

        $tTaches= array();
        foreach ($result as $r){
            $t = new Tache($r['Titre'],$r['Description'],$r['DatePrevu'],$r['DateInscrite']);
            array_push($tTaches, $t);
            // Autre solution : $artistes[] = $a; Dans ce cas, la déclaration préalable de $artistes n'est plus nécessaire
        }
        return $tTaches;
    }

}