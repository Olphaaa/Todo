<?php
class FrontControleur{
    function __construct(){
        global $rep,$vues,$action;
        session_start();
        $dVueErreur = array();

        try {
            if (isset($_REQUEST['action']) && !empty($_REQUEST['action'])) { // recup l'action
                $action = $_REQUEST['action'];
            }
            if( isset($_SESSION['pseudo'])) {
                $cont = new UserController();
            }else{
                if ($action == "connecter") {
                    require($rep . $vues['vueLogin']);
                }
                elseif ($action == "seConnecter" || $action == "deconnexion"){
                    $cont = new UserController();
                }else
                    $cont = new VisiteurControleur();
            }
        }
        catch (PDOException $e) //affiche les erreurs liées a la base de données
        {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur PDO!!! " .$e->getMessage();
            require($rep.$vues['erreur']);
        }
        catch (Exception $e) { //affiche les autres erreurs
            $dVueEreur[] = "Erreur inattendue!!! ".$e->getMessage();
            require($rep.$vues['erreur']);
        }
    }
}
?>