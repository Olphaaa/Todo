<?php

//gen
$rep=__DIR__.'/../'; //permet de partir de la racine du projet __DIR__='G:\wamp64\www\iut\projet\...'

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



//BD

$base="dbolblanc1";
$login="olblanc1";
$mdp="mdp";
$dsn='mysql:host=localhost;dbname='.$base.';';
$con = new Connection($dsn, $login,$mdp);


//Vues

$vues['erreur']='vue/erreur.php';
$vues['vuePrinc']='vue/vuePrinc.php';
$vues['vueInscription']='vue/vueInscription.php';
$vues['vueLogin']='vue/vueLogIn.php';


//$vues['erreur']=array('url'=>'erreur.php');
//$vues['vuephp1']=array('url'=>'vuephp1.php');

?>