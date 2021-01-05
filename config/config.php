<?php

//gen
$rep=__DIR__.'/../'; //permet de partir de la racine du projet __DIR__='G:\wamp64\www\iut\projet\...'

//BD
//utilie pour toutes les gateways

$base="dbolblanc1";
$login="olblanc1";
$mdp="mdp";
$dsn='mysql:host=localhost;dbname='.$base.';';
$con = new Connection($dsn, $login,$mdp);


//Vues
//inisialise toute les vue pour pouvoir faire appel si besoin
$vues['erreur']='vue/erreur.php'; //vue pour afficher les erreurs
$vues['vuePrinc']='vue/vuePrinc.php';//vue principal
$vues['vueInscription']='vue/vueInscription.php';//vue pour l'inscription
$vues['vueLogin']='vue/vueLogIn.php'; //vue pour la connection
