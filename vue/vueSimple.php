<!DOCTYPE html>
<html>
<!--Etat de maquette pour le moment-->

<head>
    <title>todo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8"/>
</head>

<body >

    <div>
        <div>
            <h1>Liste des taches:</h1>
        </div>
        <!-- todo Mettre ici la liste des taches du l'utilisateur donné -->
        <?php
        if (isset($dVueEreur) && count($dVueEreur)>0) {
            echo "<h2>ERREUR !!!!!</h2>";
            foreach ($dVueEreur as $value){
                echo $value."<br/>";
            }}
        ?>
        <ul>
            <?php
                if (isset($dVue))
                foreach ($dVue as $r){
                    echo "<li>Pour le ".$r['DatePrevu'].": ".$r['Titre'].": ".$r['Description']."( fait le :". $r['DateInscrite']. ")</li>";
                }
            ?>
        </ul>
    </div>
    <div>
        <h1>Ajouter une tache </h1>
    </div>
    <form method="post" name="myform" id="myform" style="width: 100%;">
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
</body>

</html>