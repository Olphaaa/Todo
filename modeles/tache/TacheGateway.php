<?php
require_once ("Tache.php");

class TacheGateway extends Tache
{
    private $con;

    public function __construct(Connection $con){
        $this->con=$con;
    }
    //todo voir si connection direct dans le constructeur

    public function insertion(Tache $t){
        $fait = 0;
        $query = "insert into tache values ('".NULL."','".$t->getTitre()."','".$t->getDescription()."','".$t->getDatePrevu()."','".$t->getDateInscrite()."','".$fait."','"."Paulor"."')"; //todo attention a NULL du username
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
        }
        return $tTaches;
    }
}