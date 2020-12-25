<?php


class FrontControleur
{
    function FrontControler(){
        global $rep,$vues;
        session_start();

        $dVueEreur = array ();

        try{
            $action=$_REQUEST['action'];

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
        exit(0);
    }
}