<html>
<!--Etat de maquette pour le moment-->
<head>
    <title>ERREUR - Todo</title>
    <link rel="stylesheet"href="vue/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8"/>
</head>
<body  class="text-dark body">

        <div class="container bloc col-3">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="titre">Erreur !</h1>
                </div>


            </div>
            <div class="row">
                <?php
                if (isset($dVueEreur)){
                    foreach ($dVueEreur as $val)
                    {
                        echo $val;
                        echo "Coucou, je suis dans la vue erreur";
                    }
                }
                /*if (isset($dVueErreur) && count($dVueErreur)>0){

                }
                else{
                    echo "Pas d'erreur";
                }*/
                ?>
                <!--?= $dVue['data']?NON FONCTIONNEL mais sert a afficher dvue si il n'est pas vide-->
            </div>
        </div>
    <div style=" position: absolute; bottom: 25px;" class="row">
        <a href="index.php" class="btn btn-light" role="button">Retour</a>
    </div>
</body>
</html>