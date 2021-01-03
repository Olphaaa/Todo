<html>
<!--Etat de maquette pour le moment-->

<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="vue/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8" />
</head>
<body class="body">
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-sm-3 bg-dark rounded" style="color: white; text-align:center; top: 150px;">

            <h1>Créer un compte</h1>

            <form class="form" method="POST" >
                <div class="form-group">
                    <label for="usernameId">Username</label>
                    <input type="text" id="usernameId" name="usernameTxt" required="true" />
                </div>
                <div class="form-group">
                    <label for="passwordId">Mot de passe</label>
                    <input type="password" id="passwordId" name="pass1Txt" required="true"/>
                </div>
                <div class="form-group">
                    <label for="passwordId">Confirmer le mot de passe</label>
                    <input type="password" id="passwordId2" name="pass2Txt" required="true"/>
                </div>

                <input hidden="hidden" name="action" value="inscription"/>
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
                <div style="margin-top: 20px;" class="form-group">
                    <button type="submit" class="btn btn-outline-success" >S'inscrire</button>
                </div>
            </form>

        </div>
        <div class="col"></div>
    </div>
</div>
</body>
</html>