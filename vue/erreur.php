<html>
<!--Etat de maquette pour le moment-->
<head>
    <title>ERREUR - Todo</title>
    <link rel="stylesheet" href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8"/>
    <style>
        .center{
            margin: auto;
            max-width: 300px;
        }
        .test{
            background-color: #212121;
            border-radius: 10px;
            box-shadow: 17px 19px 8px rgba(0, 0, 0, 0.25);
        }
        .titre{
            text-align: center;
            padding: 40px;
            text-transform: uppercase;
        }
        .soustitre{
            position: relative;
            left: 25px;
        }
        body {
            background-image: url("../images/background1.jpeg");
            background-repeat: no-repeat;
            background-position: center;
            position: relative;
            background-size: cover;
            background-attachment: fixed;
            height: 100%;

        }

        .etatConnection{
            color: greenyellow;
            /*color:red;*/
        }



        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
        }

        .saisie{
            position: relative;
            background-color: #1B1B1B;
            color: white;
        }
        .bouton{
            position: relative;
        }
        .sidenav a:hover {
            color: #f1f1f1;
        }

        .main {
            margin-left: 0px; /* Same as the width of the sidenav */
            font-size: 28px; /* Increased text to enable scrolling */
            padding: 0px 10px;
            background-color: red;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }

    </style>
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
        if (isset($dVueEreur) && count($dVueEreur)>0){
            foreach ($dVueEreur as $val)
            {
                echo $val;
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
    <div style=" position: absolute; bottom: 25px;" class="row">
        <a href="index.php" class="btn btn-light" role="button">Retour</a>
    </div>
</div>
</body>
</html>