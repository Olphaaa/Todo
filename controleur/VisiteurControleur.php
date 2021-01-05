<?php


class VisiteurControleur{
    function __construct(){
        global $rep,$vues,$action;
        $dVueErreur = array();
        try{
            switch($action){
                case NULL:
                    $this->Reinit($dVueErreur);
                    break;
                case "validationFormulaire":
                    $this->validationFormulaireV($dVueErreur);
                    break;
                case "supprimer":
                    $this->supprimer();
                    break;
                case "inscription":
                    $this->inscription($dVueErreur);
                    break;
                case "afficherInscription":
                    $this->afficherInscription();
                    break;
                default:
                    $dVueErreur[]="Erreur d'appel php visiteur($action)";
                    require ($rep.$vues['vuePrinc']);
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

    public function Reinit($dVueErreur){ //réinisialise la page en chargeant toutes les données (avec la possibilité de communiquer les errues)
        global $rep,$vues,$con; // nécessaire pour utiliser variables globales

        $gateway = new TacheGateway($con);
        $res=$gateway->getResultVisiteur();
        foreach ($res as $r)
        {
            $dTmp=array(
                'idTache'=>$r->getIdTache(),
                'Titre'=>$r->getTitre(),
                'Description'=>$r->getDescription(),
                'DatePrevu'=>$r->getDatePrevu(),
                'DateInscrite'=>$r->getDateInscrite(),
            );
            $dVue[]=$dTmp;
        }

        require ($rep.$vues['vuePrinc']);
    }

    public function supprimer(){//supprime une tache spécifiée, en envoyant un tableau contenant les taches
        TacheMdl::supprimerTaches($_POST);
        $this->Reinit(null);
    }

    private function validationFormulaireV(array $dVueErreur){//permet saisie, vérification et l'ajout d'une tache du formulaire
        global $rep, $vues, $con;

        $titre=$_POST['txtNom']; // txtNom = nom du champ texte dans le formulaire
        $desc=$_POST['txtDesc']; // txtDesc = Description de la tache
        $dateP=$_POST['txtDateP']; // txtDate = Date de la tache
        $ddJour =date('Y-m-d H:i:s'); //format pour pouvoir l'inserer correctement dans la bdd
        Validation::val_form($titre,$desc,$dateP,$dVueErreur); //Envoi des valeurs a la methode val_form de Validation.php qui va controler les champs

        $Tgate = new TacheGateway($con);

        if (empty($dVueErreur)){// s'il n'y a pas d'erreur, alors on ajoute a la bdd
            $Tgate->insertionVisiteur(new Tache(null,$titre,$desc,$dateP,$ddJour));
        }
        $this->Reinit($dVueErreur);
    }

    function inscription(array $dVueErreur){ //permet d'inscrire un nouvel utilisateur
        global $rep,$vues,$con;
        $login = $_POST['usernameTxt'];
        $passw1 = $_POST['pass1Txt'];
        $confirmationPass = $_POST['pass2Txt'];

        //Vérification de tout le champs↓
        Validation::val_login($login,$dVueErreur);
        Validation::val_passwd($passw1,$dVueErreur);
        Validation::val_passwd($confirmationPass,$dVueErreur);
        if (empty($dVueErreur)){
            if ($passw1 == $confirmationPass){
                $UGateway = new UtilisateurGateway($con);
                try {
                    $UGateway->insertUser($login,$passw1);
                    require ($rep.$vues['vueLogin']);
                }catch (Exception $e){
                    $dVueErreur[] = $e->getMessage();
                    require ($rep.$vues['vueInscription']);
                }
            }
            else{
                $dVueErreur[] = "Mots de passe différents";
                require($rep.$vues['vueInscription']);
            }
        }else{
            //Si il y a une erreur, on rappelle la VueLogin
            require ($rep.$vues['vueInscription']);
        }

    }

     public function afficherInscription(){//permet d'afficher la page de d'inscription une fois l'action reçue
        global $rep,$vues;
        require ($rep.$vues['vueInscription']);
     }
}
?>