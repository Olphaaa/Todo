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
                    $dVueEreur[] =	"Erreur d'appel php";
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
                'Description'=>$r->getDescription()
            );
            $dVue[]=$dTmp;
        }

        require ($rep.$vues['vuePrinc']);
    }

    function ValidationFormulaire(array $dVueEreur) {
        global $rep, $vues;


        //si exception, ca remonte !!!
        $nom = $_POST['txtNom']; // txtNom = nom du champ texte dans le formulaire
        $age = $_POST['txtAge'];
        Validation::val_form($nom, $age, $dVueEreur);

        $model = new Simplemodel();
        $data = $model->get_data();

        $dVue = array( //TODO: adapter pour une tache
            'Titre' => $nom,
            'age' => $age,
            'data' => $data,
        );
        require($rep . $vues['vuePrinc']);
    }

}//fin class

?>