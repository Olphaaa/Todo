<html>
<!--Etat de maquette pour le moment-->
<head>
    <title>ERREUR - Todo</title>
    <link rel="stylesheet" href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8"/>
</head>
<body style="font-family: Calibri" class="text-light">
<div class="sidenav">
    <h1 style="text-align: center;">Olpha<span style="font-size: 100px; position:absolute;top: -25px;" class="etatConnection">.</span></h1><br /><br />

    <a href="#about">Toutes les taches</a>
    <a href="#services">Aujourd'hui</a>
    <a href="#clients">Cette semaine</a>
</div>

<div class="container bloc col-3">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="titre">Erreur !</h1>
        </div>
    </div>
    <div class="row">
        <?php
        if (isset($dVueErreur) && count($dVueErreur)>0){
            foreach ($dVueErreur as $val)
            {
                echo $val;
            }
        }
        else{
            echo "Pas d'erreur";
        }
        ?>
        <!--?= $dVue['data']?NON FONCTIONNEL mais sert a afficher dvue si il n'est pas vide-->
    </div>
    <div style=" position: absolute; bottom: 25px;" class="row">
        <a href="../index.php" class="btn btn-light" role="button">Retour</a>
    </div>
</div>
</body>
</html>