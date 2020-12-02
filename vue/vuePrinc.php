<!DOCTYPE html>
<html>
<!--Etat de maquette pour le moment-->
    <head>
        <title>todo</title>
        <link rel="stylesheet" href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="UTF-8"/>
        <style>

            .test{
                background-color: #212121;
                border-radius: 10px;
                box-shadow: 17px 19px 8px rgba(0, 0, 0, 0.25);
            }

            body {
                /*background-color: #111111;*/
                background-image: url("images/background1.jpeg");
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
        <div style="position: relative; top: 150px;" class="container">
           <div class="row">
                <div class="col-1"></div>
                <div class="col-md-4">
                    <div class="container test">
                        <div style="height: 600px; white-space: nowrap;" class="row">
                            <div class="row  mx-auto">
                                <h1>Taches:</h1>
                            </div>
                            <!-- Mettre ici la liste des taches du l'utilisateur donné-->
                            <ol style="width: auto;">
                                <?php
                                if (isset($dVue))
                                    foreach ($dVue as $r){
                                        echo "<li><p>".$r['Titre'].": ".$r['Description']." pour le ".$r['DatePrevu']."( fait le :". $r['DateInscrite']. ")</p></li>";
                                        //echo $r['Titre'];
                                    }
                                //echo "<span>" .$dVue['Titre'] .$dVue['Description']. $dVue['DatePrevu']."<span/>"; //pour voir les valeurs renseignées
                                ?>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-md-6">
                    <div class="container test">
                        <div style="height: 500px; white-space: nowrap;" class="row">
                            <div class="row  mx-auto">
                                <h1>Ajouter:</h1>
                            </div>
                            <div class="row  mx-auto">
                                <form method="post" name="myform" id="myform" style="width: auto">
                                    <div class="form-group">
                                        <label for="inputNom">Nom de tache</label>
                                        <input type="text" class="form-control" id="inputNom" placeholder="Nom de la tache" name="txtNom">
                                    </div>
                                    <div class="form-group">
                                        <label for="zoneText">Description</label>
                                        <textarea class="form-control" id="zoneText" name="txtDesc"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDate">Date prévu</label>
                                        <input type="date" class="form-control" id="inputDate" name="txtDateP"/>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="action"
                                            value="validationFormulaire">Ajouter
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
           </div>
        </div>
    </body>
</html>