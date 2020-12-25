<?php

require "Utilisateur.php";
require "UtilisateurGateway.php";
require "../connection/Connection.php";
$base="dbolblanc1";
$login="olblanc1";
$mdp="mdp";
$dsn='mysql:host=localhost;dbname='.$base.';';

$con = new Connection($dsn, $login,$mdp);
//$u = new Utilisateur("dfkjhhgvoisudhfghsdlfk","mdp"); //todo faire attention pour le new Utilisateur
$UGateway = new UtilisateurGateway(new Connection($dsn,$login, $mdp));

//$UGateway->insertion($u);
$result = $UGateway->getResult();
foreach ($result as $val){
    echo $val->getUsername()." <br/>";
}
if ($UGateway->isExiste("Pauhlor","mdp")){
    echo "il existe";
}else{
    echo "il n'exsite pas";
}
?>