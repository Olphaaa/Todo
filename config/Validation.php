<?php


class Validation
{

    //Methode qui verifie le nom
    static function val_form(string &$nom, string &$desc, string &$date, array &$dVueEreur){

        if ($nom != filter_var($nom, FILTER_SANITIZE_STRING))
        {
            $dVueEreur[] = "Le nom de la tache est pas une chaine de caracteres";
            $nom = "";
        }

        if ($desc != filter_var($desc,FILTER_SANITIZE_STRING)) {
            $dVueEreur[] = "La description est pas une chaine de caracteres";
            $desc = "";
        }

        //Filtervar date je sais pas comment faire

        if (!isset($nom)||$nom=="") {
            $dVueEreur[] = "Nom de la tache non renseigné";
            $nom="";
        }

        if (!isset($desc)||$desc=="") {
            $dVueEreur[] = "Description de la tache non renseigné";
            $desc="";
        }

        if (!isset($date)||$date=="") {
            $dVueEreur[] =	"Date pas renseignée";
            $date="";
        }
        if($nom == filter_var($nom,FILTER_SANITIZE_NUMBER_INT)){
            $dvueEreur[] = "Renseignez une chaine de caracteres et pas un nombre";
            $nom = "";
        }
        var_dump($dVueEreur);
    }


    //static function val_action($action){
    //    throw new Exception("pas d'action");
    //}
    // a completer
    //faire val_from (saisie des renseignements d'une tache
    //controller tout les champs avec les filtervar
}