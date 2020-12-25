<html>
<!--Etat de maquette pour le moment-->

    <head>
        <title>LogIn</title>
        <link rel="stylesheet" href="vue/css/style.css" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="UTF-8"/>
    </head>
    <body class="body">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-sm-3 bg-dark rounded" style="color: white; text-align:center; top: 150px;">
                    <h1>Log In</h1>
                    <form class="form">
                        <div class="form-group">
                            <label for="usernameId">Username</label>
                            <input type="text" id="usernameId" />
                        </div>
                        <div class="form-group">
                            <label for="passwordId">Mot de passe</label>
                            <input type="password" id="passwordId"/>
                        </div>
                        <div style="margin-top: 20px;" class="form-group">
                            <input type="submit" class="btn btn-light" action="vue/vuePrinc.php" content="Se connecter"/>
                        </div>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </body>
</html>