<!DOCTYPE html>
<html>
<!--Etat de maquette pour le moment-->
    <head>
        <title>Todo List - Olivier & Fabien</title>
        <link rel="stylesheet" href="vue/css/style.css" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="UTF-8"/>
    </head>

    <body class="body">
        <div class="sidenav">
            <?php
            if (isset($_SESSION['pseudo'])){
                $username = $_SESSION['pseudo'];
                $etat="green";
            }
            else {
                $username = "Visiteur";
                $etat="red";
            }
            echo "<h1 style=\"text-align: center;\">". $username. "<span style=\"font-size: 100px; position:absolute;top: -25px;\" class=\"$etat\">.</span></h1><br /><br />";
            //echo $u->getUsername();
            ?>
            <?php
            if (!isset($_SESSION['pseudo'])){
                echo "
                <form method=\"post\" style=\"text-align: center;\">
                    <button type=\"submit\" class=\"btn btn-outline-info\" name=\"action\" value=\"connecter\">Se connecter</button>
                </form>
                ";
            }
            ?>
            <?php
            if (isset($_SESSION['pseudo'])){
                echo "
                <form method=\"post\" style=\"text-align: center;\">
                    <button type=\"submit\" class=\"btn btn-outline-info\" name=\"action\" value=\"deconnexion\">Se deconnecter</button>
                </form>
                ";
            }
            ?>
            <!--<a href="#about">Toutes les taches</a>
            <a href="#services">Aujourd'hui</a>
            <a href="#clients">Cette semaine</a>-->
        </div>
        <div style="position: relative; top: 50px;" class="container">
           <div class="row">
                <div class="col-1"></div>
                <div class="col-md-5" >
                    <div class="container test " >
                        <h1 class="titre">Taches:</h1>
                        <form name="listeTache" method="post" style="text-align: center; margin: 10px;">
                        <div>
                            <div class="liste scrollbar-primary" >
                                <?php
                                if (isset($dVue)) {
                                    echo "<br/>";
                                    foreach ($dVue as $r) {
                                        $idTache = $r['idTache'];
                                        echo
                                            "<div class='glow-on-hover p-1  mb-3'>
                                                <div class='row p-2'>
                                                   <div style='margin-left: 15px;'>
                                                      <input type='checkbox' class='checkbox' value='fait' id='id$idTache' name='$idTache'>
                                                       <label for='id$idTache' class='clickable'>
                                                                ".$r['Titre'] . "  pour le " . $r['DatePrevu']. "<br/>".$r['Description'] . "
                                                       </label>
                                                   </div>
                                                </div>
                                            </div>";
                                    }
                                }
                                else
                                    echo "<p style='text-align: center'> Rien de prévu </p>"
                                //echo "<span>" .$dVue['Titre'] .$dVue['Description']. $dVue['DatePrevu']."<span/>"; //pour voir les valeurs renseignées

                                ?>

                            </div>
                        </div>
                        <!-- Mettre ici la liste des taches du l'utilisateur donné-->
                            <button type="submit" class="btn btn-outline-danger mb-5" name="action" value="supprimer" >Supprimer les taches faites</button>
                        </form>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-md-5">
                    <div class="container test " style="padding-bottom: 50px;">
                        <div style="white-space: nowrap; padding: 10px; " class="row">
                            <h1 class="titre" style="text-align: center;width: 100%">Ajouter:</h1>
                            <div class="row mx-auto">
                                <form method="post" name="myform" id="myform" class="text-center">
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
                                    <button type="submit" class="btn btn-outline-success" name="action"
                                            value="validationFormulaire">Ajouter
                                    </button>
                                </form>
                            </div>
                        </div>
                        <?php
                        if (!empty($dVueErreur))
                        {
                            echo "<ul  style='margin: 0 auto;'>";
                            foreach ($dVueErreur as $erreur) {
                                echo "<li>$erreur</li>";
                            }
                            echo "</ul>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col"></div>
           </div>
        </div>
    </body>
</html>