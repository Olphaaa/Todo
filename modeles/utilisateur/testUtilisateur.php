<?php

require "Utilisateur.php";
require "UtilisateurGateway.php";
require "../connection/Connection.php";
$base="dbolblanc1";
$login="olblanc1";
$mdp="mdp";
$dsn='mysql:host=localhost;dbname='.$base.';';

$con = new Connection($dsn, $login,$mdp);
$u = new Utilisateur("Paulor","Patrick","mdp"); //todo faire attention pour le new Utilisateur
$UGateway = new UtilisateurGateway(new Connection($dsn,$login, $mdp));

$UGateway->insertion($u);
$result = $UGateway->getResult();
foreach ($result as $val){
    echo $val->getPrenom()." <br/>";
}
if ($UGateway->isExiste("Patrick","mdp")){
    echo "il existe";
}
echo $u;