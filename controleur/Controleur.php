<?php

class Controleur {

    function __construct() {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        // on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
        session_start();


        //debut

        //on initialise un tableau d'erreur
        $dVueEreur = array ();

        try{
            $action=$_REQUEST['action'];//il faut valider
            //Validation::val_action($action);
            switch($action) {
                //pas d'action, on r�initialise 1er appel
                case NULL:
                    $this->Reinit();//permet de réinitialiser le formulaire
                    break;
                case "validationFormulaire": // permet de mettre les erreur si il y en a lors des inserstion dans le formulaire
                    $this->ValidationFormulaire($dVueEreur);
                    break;
                //mauvaise action
                default://si action non prévu
                    $dVueEreur[]="Erreur d'appel php";
                    require ($rep.$vues['vuePrinc']); //premet d'appeler la vue d'erreur si il y a une action non prévu
                    break;
            }
        } catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur PDO!!! ";
            require ($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }


        //fin
        exit(0);
    }//fin constructeur


    function Reinit() { //sert a mettre des champs par défaut quand on ajouter une nouvelle tache dans le formulaire
        global $rep,$vues; // nécessaire pour utiliser variables globales

        $gateway = new TacheGateway(new connection("mysql:host=localhost;dbname=dbolblanc1;","olblanc1", "mdp"));
        $res=$gateway->getResult();
        foreach ($res as $r)
        {
            $dTmp=array(
                'Titre'=>$r->getTitre(),
                'Description'=>$r->getDescription(),
                'DatePrevu'=>$r->getDatePrevu(),
                'DateInscrite'=>$r->getDateInscrite(),
            );
            $dVue[]=$dTmp;
        }

        require ($rep.$vues['vuePrinc']);
    }

    function ValidationFormulaire(array $dVueEreur) {
        global $rep, $vues;

        //Mettre la valeur ecrite par vueSimple dans une variable pour l'envoyer et
        //et c'est la methode Valform de Validation.php qui verifie les champs avec filtervar et isset


        //si exception, ca remonte !!!
        $titre=$_POST['txtNom']; // txtNom = nom du champ texte dans le formulaire
        $desc=$_POST['txtDesc']; // txtDesc = Description de la tache
        $dateP=$_POST['txtDateP']; // txtDate = Date de la tache
        $ddJour =date('Y-m-d H:i:s'); //format pour pouvoir l'inserer correctement dans la bdd
        Validation::val_form($titre,$desc,$dateP,$dVueEreur); //Envoi des valeurs a la methode val_form de Validation.php qui va controler les champs

        $user="olblanc1";
        $pass="mdp";
        $dsn='mysql:host=localhost;dbname=dbolblanc1;';
        $con = new Connection($dsn, $user,$pass);
        $Tgate = new TacheGateway($con);
        //$Tgate->ajouterTache($nom,$desc,$date);
        //$this->Reinit();
        //$model = new Simplemodel();
        //$data=$model->get_data();
        //todo voir s'il faut bien afficher la liste, ce n'est pas utile vu que l'on doit inserer les valeurs dans la BDD
        /*$dVue = array (
            'Titre' => $nom,
            'Description' => $desc,
            'DatePrevu' => $date
            //'data' => $data,
        );*/
;
        $gateway = new TacheGateway(new connection("mysql:host=localhost;dbname=dbolblanc1;","olblanc1", "mdp"));
        if (empty($dVueEreur)){// s'il n'y a pas d'erreur, alors on ajoute a la bdd
            $gateway->insertion(new Tache($titre,$desc,$dateP,$ddJour));
        }
        $res=$gateway->getResult();
        foreach ($res as $r)
        {
            $dTmp=array(
                'Titre'=>$r->getTitre(),
                'Description'=>$r->getDescription(),
                'DatePrevu'=>$r->getDatePrevu(),
                'DateInscrite'=>$r->getDateInscrite(),
            );
            $dVue[]=$dTmp;
        }
        require ($rep.$vues['vuePrinc']);
    }

}//fin class

?>