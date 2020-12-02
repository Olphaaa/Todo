<?php


class Validation
{
    static function val_action($action) {

        if (!isset($action)) {
            throw new Exception('pas d\'action');
            //on pourrait aussi utiliser
//$action = $_GET['action'] ?? 'no';
            // This is equivalent to:
            //$action =  if (isset($_GET['action'])) $action=$_GET['action']  else $action='no';
        }
    }
    //Methode qui verifie le nom
    static function val_form(string &$nom, string &$desc, string &$date, array &$dVueEreur)
    {

        if ($nom != filter_var($nom, FILTER_SANITIZE_STRING)) {
            $dVueEreur[] = "Le nom de la tache est pas une chaine de caracteres";
            $nom = "";
        }

        if ($desc != filter_var($desc, FILTER_SANITIZE_STRING)) {
            $dVueEreur[] = "La description est pas une chaine de caracteres";
            $desc = "";
        }

        if (!isset($nom) || $nom == "") {
            $dVueEreur[] = "Nom de la tache non renseigné";
            $nom = "";
        }

        if (!isset($date) || $date == "") {
            $dVueEreur[] = "Date pas renseignée";
            $date = "";
        }
        if ($nom == filter_var($nom, FILTER_SANITIZE_NUMBER_INT)) {
            $dvueEreur[] = "Renseignez une chaine de caracteres et pas un nombre";
            $nom = "";
        }
        if ($date < date("Y-m-d"))
        {
            $dVueEreur[] = "Erreur date inférieur";
            $nom = "";
        }
    }
}
