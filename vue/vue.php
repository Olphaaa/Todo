<!DOCTYPE html>
<html>
<!--Etat de maquette pour le moment-->
    <head>
        <title>todo</title>
        <link rel="stylesheet" href="css/style.css">
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
                    <h1 class="titre">Titre</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="soustitre">Aujourd'hui:</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="soustitre">Demain:</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="soustitre">Bientôt:</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="soustitre">Un jour:</h2>
                </div>
            </div>
            <div style=" position: absolute; bottom: 25px;" class="container">
                <div class="row">
                    <div class="col-md-auto col-lg-8">
                        <input  class="form-control" type="text" name="titreTache">
                    </div>
                    <div class="col col-lg-3">
                        <input type="submit" class="btn btn-light" value="Ajouter">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>