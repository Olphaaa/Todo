<html>
<!--Etat de maquette pour le moment-->

    <head>
        <title>Se Connecter</title>
        <link rel="stylesheet" href="vue/css/style.css" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="UTF-8"/>
    </head>
    <body class="body" style="overflow: hidden">
        <div class="bg-dark rounded center text-center p-3" style="margin-top: 200px">
            <h1>Log In</h1>
            <form class="form p-3" method="post">
                <div class="form-group">
                    <label for="usernameId">Username</label>
                    <input class="form-control" type="text" id="usernameId" name="loginTxt"/>
                </div>
                <div class="form-group">
                    <label for="passwordId">Mot de passe</label>
                    <input class="form-control" type="password" id="passwordId" name="passwdTxt"/>
                </div>
                <div class="mt-3 row" >
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
                    <button type="submit" class="btn btn-outline-success col-12 mt-3" name="action" value="seConnecter">Se connecter</button>
                    <button class="btn btn-outline-info col-12 mt-2" name="action" value="afficherInscription">S'inscrire</button>
                    <button type="submit" class="btn btn-outline-warning col-12 mt-2" name="action" value="" >Retour</button>
                </div>
            </form>
        </div>
    </body>
</html>