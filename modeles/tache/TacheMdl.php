<?php


 class  TacheMdl
{
    public static function supprimerTaches(array $tab){
        // var_dump($idTache);
        global $con;

        $Tgateway = new TacheGateway($con);
        foreach ($tab as $key => $value) {
            $isUser = $Tgateway->isUserTache(intval($key));
            if(!$isUser == null && !isset($_SESSION["pseudo"])){
             echo "vous n'avez pas la permission du supprimer cette tache !";
             continue;
            }
            if ($value =="fait"){
                //echo "suppression de la tache $key <br/>";
                $Tgateway->deleteOneTask($key);
            }
        }
    }
}