<?php


class Validation
{
    static function val_action($action) { //agit si seulement il n'y a pas d'action
        if (!isset($action)) {
            throw new Exception('pas d\'action');
        }
    }

    static function val_form(string &$nom, string &$desc, string &$date, array &$dVueEreur){ //méthodeu qui permet de vérifier si les champs saisies sont bien formé. Vérification + néttoyage
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
        }
    }

    static function val_login(string &$login,array &$dVueErreur){//vérification du login et nettoyage
        if(!isset($login) || $login == "" || empty($login)){

            $dVueErreur[] = "Login non renseigné";
        }

        if($login != filter_var($login,FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "Login n" . "'est pas une chaine de caractères";
        }
    }

    static function val_passwd(string &$passwd,array &$dVueErreur){//vérification du mot de passe et nettoyage
        if(!isset($passwd) || $passwd == "" || empty(trim($passwd))){
            $dVueErreur[] = "Password non renseigné";
        }

        if($passwd != filter_var($passwd,FILTER_SANITIZE_STRING)) {
            $dVueErreur[] = "Password n" . "'est pas une chaine de caractères";
        }
    }
}