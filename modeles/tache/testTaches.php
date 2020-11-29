<html>

<body>
<p>test pour les taches</p>

<?php

require("../Connection/Connection.php");
require("TacheGateway.php");
//$t = new Tache("Dire bonour a la dame", "ne pas oublier de se moucher le nez",);
$user="olblanc1";
$pass="mdp";
$dsn='mysql:host=localhost;dbname=dbolblanc1;';
$con=new Connection($dsn,$user,$pass);
$gate=new TacheGateway($con);
$a=$gate->getResult();
foreach ($a as $val){
    echo $val->getTitre()." <br/>";
}
?>

</body>
</html>
