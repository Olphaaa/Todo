<?php

require "Utilisateur.php";
require "UtilisateurGateway.php";
require "../connection/Connection.php";
$base="dbolblanc1";
$login="olblanc1";
$mdp="mdp";
$dsn='mysql:host=localhost;dbname='.$base.';';

$con = new Connection($dsn, $login,$mdp);
$UGateway = new UtilisateurGateway(new Connection($dsn,$login, $mdp));
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