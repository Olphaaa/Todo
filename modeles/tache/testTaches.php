<html>

<body>
<p>test pour les taches</p>

<?php

require("../connection/Connection.php");
require("TacheGateway.php");
//$t = new Tache("Dire bonour a la dame", "ne pas oublier de se moucher le nez",);
$user="olblanc1";
$pass="mdp";
$dsn='mysql:host=localhost;dbname=dbolblanc1;';
$con=new Connection($dsn,$user,$pass);
$gate=new TacheGateway($con);
$titre = "coucou";
$desc ="coucou";
$dateP = strtotime("02/12/2020");
$ddJour=date("d/m/Y");
//$this->con->executeQuery("INSERT INTO tache values('".$titre."'.,.'".$desc."'.,.'".$dateP ."', '".$ddJour."')");
$gate->insertion(new Tache($titre,$desc,$dateP,$ddJour));
$a=$gate->getResult();
foreach ($a as $val){
    echo $val->getTitre()." <br/>";
}
?>

</body>
</html>
