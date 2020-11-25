<?php


class TacheGateway
{
    private $con;
    private $idtache=6;
    public function __construct(Connection $con){
        $this->con=$con;
    }


    public function insertion(Tache $t){
        $this->idtache++;
        $query = "insert into tache values ('".$this->idtache."','".$t->getTitre()."','".$t->getDescription()."','".$t->getDatePrevu()."','".$t->getDateInscrite()."')";
        $this->con->executeQuery($query);
        $resultat=$this->con->getResults();
        if ($resultat == NULL)
        {
            throw new Exception("Erreur lors de l'exception");
        }
    }

    public function getResult(){
        $resultat = $this->con->getResults();
        foreach ($resultat as $r){
            echo $r['idTache']." | ".$r['Titre']." | ".$r['Description'] ."<br/>";
        }
    }
}