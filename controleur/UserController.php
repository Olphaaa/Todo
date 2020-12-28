<?php
class UserController{
    function __construct() {
        global $rep, $vues, $action;
        $dVueErreur = array();

        try {
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
                    $this->validationFormulaire($dVueErreur);
                    break;
                case 'supprimer':
                    echo "bien le bonjour!";
                    $this->supprimer();
                    break;
                default:
                    $dVueEreur[]="Erreur d'appel php ($action)";
                    require ($rep.$vues['vuePrinc']);
                    break;
            }
        }

        catch(PDOException $e) {
            echo $e->getMessage();
            $dVueErreur[] =	"Erreur base de données !";
            //require ($rep.$vues['erreur']);
        }
        catch(Exception $e) {
            echo $e->getMessage();
            $dVueErreur[] =	"Erreur générale !";
            //require ($rep.$vues['erreur']);
        }
    }

    public function supprimer(){
        global $con,$rep,$vues;
        $idTahce = $_POST['idTache'];
        echo "je vais supprimer la tache: $idTahce";
        $Tgateway = new TacheGateway($con);
        $Tgateway->deleteDoneTasks();
        $this->Reinit();
    }

    public function seConnecter($dVueErreur){
        global $rep,$vues,$con;
        $login = $_POST['loginTxt'];
        $passwd = $_POST['passwdTxt'];
        Validation::val_login($login,$dVueErreur);
        //var_dump($login, $passwd);
        if (empty($dVueErreur)){
            $u = new Utilisateur($login,$passwd);
            $u->connexion($login,$passwd);
            $this->Reinit();
        }else{
            require ($rep.$vues['vueLogin']);
        }
    }

    public function seDeconnecter(){
        global $rep,$vues,$con;
        Utilisateur::deconnexion();
        $this->Reinit();
    }

    public function Reinit(){
        global $rep,$vues,$con; // nécessaire pour utiliser variables globales

        $gateway = new TacheGateway($con);
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

        require ($rep.$vues['vuePrinc']);
    }

    private function validationFormulaire(array $dVueErreur)    {
        global $rep, $vues, $con;

        $titre=$_POST['txtNom']; // txtNom = nom du champ texte dans le formulaire
        $desc=$_POST['txtDesc']; // txtDesc = Description de la tache
        $dateP=$_POST['txtDateP']; // txtDate = Date de la tache
        $ddJour =date('Y-m-d H:i:s'); //format pour pouvoir l'inserer correctement dans la bdd
        Validation::val_form($titre,$desc,$dateP,$dVueErreur); //Envoi des valeurs a la methode val_form de Validation.php qui va controler les champs
        //todo voir co dans gateway

        $Tgate = new TacheGateway($con);

        //todo voir s'il faut bien afficher la liste, ce n'est pas utile vu que l'on doit inserer les valeurs dans la BDD
        if (empty($dVueErreur)){// s'il n'y a pas d'erreur, alors on ajoute a la bdd
            $Tgate->insertionUtilisateur(new Tache($titre,$desc,$dateP,$ddJour));
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

