<!DOCTYPE html>
<html>
<!--Etat de maquette pour le moment-->
    <head>
        <title>todo</title>
        <link rel="stylesheet" href="css/style.css" type="text/css"> <!--todo  le lien de foncitonne pas-->
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