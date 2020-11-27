<html>

<body>
test

<?php

require_once("Connection.php");
require_once("TacheGateway.php");
require 'Tache.php';
//A CHANGER 
$user= 'olblanc1';
$pass='mdp';
$dsn='mysql:host=localhost;dbname=dbolblanc1;';
/*try{
    $con=new Connection($dsn,$user,$pass);

    $query = "SELECT * FROM tartiste WHERE id=:id";


    echo $con->executeQuery($query, array(':id' => array(1, PDO::PARAM_INT) ) );

    $results=$con->getResults();
    Foreach ($results as $row)
        print $row['titre'];
}
catch( PDOException $Exception ) {
    echo 'erreur';
    echo $Exception->getMessage();
}*/
try {
    $t=new Tache("Faire pas grand chose", "Envisager Fortnite et RocketLeague", strtotime('25/11/2020'),strtotime('24/11/2020'));
    $con=new Connection($dsn,$user,$pass);
    $ga= new TacheGateway($con);
   // $ga->insertion($t);
    $ga->getResult();
}catch(Exception $e){
    echo $e->getMessage();
}
?>

</body>
</html>
