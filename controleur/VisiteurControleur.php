<?php


class VisiteurControleur
{
    function __construct(){
        global $rep,$vues,$action;
        $dVueErreur = array();

        try{
            switch($action){
                case NULL:
                    echo "Pas d'action visiteur";
                    break;
                default:
                    echo "Action visiteur recue : $action";
                    break;
            }
        } catch(PDOException $e) {
            $dVueErreur[] =	"Erreur base de données !";
            require ($rep.$vues['erreur']);
        } catch(Exception $e) {
            $dVueErreur[] =	"Erreur générale !";
            require ($rep.$vues['erreur']);
        }
    }
}
?>