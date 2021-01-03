<?php
class UserController{
    function __construct() {
        global $rep, $vues, $action;
        $dVueErreur = array();
        try {
            $this->doActionU($action,$dVueErreur);
        }

        catch(PDOException $e) {
            echo $e->getMessage();
            $dVueErreur[] =	"Erreur base de données !";
            require ($rep.$vues['erreur']);
        }
        catch(Exception $e) {
            echo $e->getMessage();
            $dVueErreur[] =	"Erreur générale !";
            require ($rep.$vues['erreur']);
        }
    }

    public function doActionU($action, $dVueErreur){
        global $rep, $vues;
        switch($action) {
            case NULL:
                $this->Reinit();
                break;
            case 'seConnecter':
                $this->seConnecter($dVueErreur);
                //$this->validationFormulaire($dVueErreur);
                break;
            case 'deconnexion':
                $this->seDeconnecter();
                break;
            case 'validationFormulaire':
                $this->validationFormulaireU($dVueErreur);
                break;
            case 'supprimer':
                $this->supprimer();
                break;
            default:
                $dVueEreur[] = "Erreur d'appel php user ($action)";
                require($rep . $vues['vuePrinc']);
                break;
        }
    }

    public function supprimer(){
        TacheMdl::supprimerTaches($_POST);
        $this->Reinit();
    }

    //Methode qui permet a un user de se connecter, on recupere ce qu'il a saisi en login et motdepasse, on le passe a Validation qui
    //si tout va bien, ne fais rien et sinon affiche la vue d'erreur
    public function seConnecter($dVueErreur){
        global $rep,$vues,$con;
        $login = $_POST['loginTxt'];
        $passwd = $_POST['passwdTxt'];
        Validation::val_login($login,$dVueErreur);
        Validation::val_passwd($passwd,$dVueErreur);
        //var_dump($login, $passwd);

        //Si la vueErreur est vide, donc pas d'erreur alors on construit un utilisateur avec le login et le motdepasse saisis
        //On le connecte et on reinitialise la vue
        if (empty($dVueErreur)) {
            $u = new Utilisateur($login, $passwd);
            $isSucced = $u->connexion($login, $passwd,$dVueErreur);
            if ($isSucced) {
                $this->Reinit();
                return;
            }
        }
        //Si il y a une erreur, on rappelle la VueLogin
        require ($rep.$vues['vueLogin']);

    }

    public function seDeconnecter(){
        //echo "Coucou";
        Utilisateur::deconnexion();
        //echo "je suis la deco de UserController";
        $this->Reinit();
        //$visi = new VisiteurControleur();
    }

    public function Reinit(){
        global $rep,$vues,$con; // nécessaire pour utiliser variables globales

        $gateway = new TacheGateway($con);
        //pb ici c'est parce que c'est le controlleur utilisateur qui est appellé et non pas visiteur controlleur
        $res=$gateway->getResultUtilisateur($_SESSION['pseudo']);
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
        //echo "Je suis dans le reinit de UserController !";
        require ($rep.$vues['vuePrinc']);
    }

    private function validationFormulaireU(array $dVueErreur)    {
        global $rep, $vues, $con;

        $titre=$_POST['txtNom']; // txtNom = nom du champ texte dans le formulaire
        $desc=$_POST['txtDesc']; // txtDesc = Description de la tache
        $dateP=$_POST['txtDateP']; // txtDate = Date de la tache
        $ddJour =date('Y-m-d H:i:s'); //format pour pouvoir l'inserer correctement dans la bdd
        Validation::val_form($titre,$desc,$dateP,$dVueErreur); //Envoi des valeurs a la methode val_form de Validation.php qui va controler les champs

        $Tgate = new TacheGateway($con);

        if (empty($dVueErreur)){// s'il n'y a pas d'erreur, alors on ajoute a la bdd
            $Tgate->insertionUtilisateur(new Tache(null,$titre,$desc,$dateP,$ddJour));
        }
        $res=$Tgate->getResultUtilisateur();
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
}
?>

