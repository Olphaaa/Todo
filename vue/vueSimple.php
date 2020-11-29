<!DOCTYPE html>
<html>
<!--Etat de maquette pour le moment-->

<head>
    <title>todo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8"/>
</head>

<body style="background-color: #212121; " class="text-light">

    <div>
        <div>
            <h1>Taches:</h1>
        </div>
        <!-- Mettre ici la liste des taches du l'utilisateur donné-->
        <?php
            
        ?>
    </div>


    <form method="post" name="myform" id="myform" style="width: 600px">
        <div class="form-group">
            <label for="inputNom">Nom de tache</label>
            <input type="text" class="form-control" id="inputNom" placeholder="Nom de la tache">
        </div>
        <div class="form-group">
            <label for="zoneText">Description</label>
            <textarea class="form-control" id="zoneText"></textarea>
        </div>
        <div class="form-group">
            <label for="inputDate">Date prévu</label>
            <input type="date" class="form-control" id="inputDate"/>
        </div>
        <button type="submit" class="btn btn-primary" name="action"
                value="validationFormulaire">Ajouter
        </button>
    </form>
</body>

</html>