<?php
class FrontControleur{
    function __construct(){
        global $rep,$vues,$action;
        $listeAction_User = array('Ajouter','Supprimer','connecter','deconnecter','modifier');
        session_start();
        $dVueErreur = array();

        try {
            // void dans le fichier bin.php pour ce qu'il y avait avant
            if (isset($_REQUEST['action']) && !empty($_REQUEST['action'])) { // recup l'action de la vue principale
                $action = $_REQUEST['action'];
            }
            if( isset($_SESSION['pseudo'])) {
                //var_dump($_SESSION['pseudo'],$action);
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
        catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur PDO!!! ";
            require($rep.$vues['erreur']);
        }
        catch (Exception $e2) {
            $dVueEreur[] = "Erreur inattendue!!! ";
            require($rep.$vues['erreur']);
        }
    }
}
?>