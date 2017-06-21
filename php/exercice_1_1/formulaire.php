<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <?php
        // echo '<pre>'; print_r($_POST); echo '</pre>';

        // vérification de la présence des champs
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['code_postal']) && isset($_POST['description']))
        {
            echo 'nom : <b>' . $_POST['nom'] . '</b><br />';
            echo 'prenom : <b>' . $_POST['prenom'] . '</b><br />';
            echo 'adresse : <b>' . $_POST['adresse'] . '</b><br />';
            echo 'ville : <b>' . $_POST['ville'] . '</b><br />';
            echo 'code postal : <b>' . $_POST['code_postal'] . '</b><br />';
            echo 'genre : <b>' . $_POST['sexe'] . '</b><br />';
            echo 'description : <b>' . $_POST['description'] . '</b><br />';
        }

    ?>

    <form action="" method="post">
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="mon nom" />
        </div>

        <div>
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" id="prenom" placeholder="mon prenom" />
        </div>

        <div>
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" placeholder="mon adresse" />
        </div>

        <div>
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" placeholder="ma ville" />
        </div>

        <div>
            <label for="code_postal">Code postal</label>
            <input type="text" name="code_postal" id="code_postal" placeholder="mon CP" />
        </div>

        <div>
            <label for="sexe">Sexe</label>
            <select name="sexe" id="sexe">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
        </div>

        <div>
            <label for="description">Dexscription</label>
            <textarea name="description" id="description" cols="" rows="" placeholder="ma description"></textarea>
        </div>

        <div>
            <input type="submit" id="submit" value="valider">
        </div>


    </form>
</body>
</html>