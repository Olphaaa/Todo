<?php


class FrontControleur
{
    function __construct(){
        global $rep,$vues,$action;
        $listeAction_User = array('Ajouter','Supprimer','connecter','deconnecter','modifier');
        session_start();

        $dVueEreur = array();

        try {
            $isUser = new Utilisateur();

            if (isset($_REQUEST['action']) && !empty($_REQUEST['action'])) {
                $action = $_REQUEST['action'];
            }

            if (in_array($action, $listeAction_User)) {
                if ($isUser->isUser() == NULL) {
                    require('vues/vueLogIn.php');
                } else {
                    $user = new UserController();
                }
            } else {
                $visiteur = new VisiteurControleur();
            }
        }
        /*    $action=$_REQUEST['action'];

            switch($action) {

                case NULL:
                    $this->Reinit();
                    break;
                case "validationFormulaire":
                    $this->ValidationFormulaire($dVueEreur);
                    break;
                //mauvaise action
                default://si action non prévu
                    $dVueEreur[]="Erreur d'appel php";
                    require ($rep.$vues['vuePrinc']);
                    break;
            }
        }*/
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