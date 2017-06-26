<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        * {font-family: calibri;}
        form {
            width: 25%;
            min-width: 200px; margin: 0 auto;
        }
        label {
            display: inline-block;
            width: 100px;
        }
        input {
            display: inline-block;
            box-sizing: border-box;
            width: 100%;
            border: 1px solid #dedede;
            border-radius: 3px;
            height: 28px;
        }
    
    </style>
</head>
<body>

    <?php // ----------------------- PHP -----------------------

        echo '<pre>'; print_r($_POST); echo '</pre>';

        // connexion à la BDD
        $pdo = new PDO('mysql:host=localhost;dbname=connexion', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));



        if(isset($_POST['pseudo']) && isset($_POST['mdp']))
        {
            $pseudo = $_POST['pseudo'];
            $mdp = $_POST['mdp'];

            // récupération des informations en ajoutant la fonction prédéfinie addslashes() pour gérer les quotes et les guillemets
            //$pseudo = addslashes($_POST['pseudo']);
            //$mdp = addslashes($_POST['mdp']);
            // addslashes() rajoute un antislash des qu'il trouve une quote ou un guillemet dans une chaine de caractères.

            echo '<b>Pseudo:</b> ' . $pseudo . '<br />';
            echo '<b>Mot de passe:</b> ' . $mdp . '<br />';

            $req = "SELECT * FROM utilisateur WHERE pseudo = '$pseudo' AND mdp = '$mdp'";
            echo '<b>Requête:</b> ' . $req . '<br />'; // affichage de la requete pour comprendre les injections

            // execution de la requete
            // $resultat = $pdo->query($req);
            // la ligne au dessus permet l'injection de code via le formulaire (injection sql notament), pour sécuriser, il nous suffit d'utiliser prepare + execute
            $resultat = $pdo->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo AND mdp = :mdp");
            // echo '<pre>'; print_r(get_class_methods($resultat)); echo '</br>';
            $resultat->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
            $resultat->bindParam(":mdp", $mdp, PDO::PARAM_STR);
            $resultat->execute();

            $membre = $resultat->fetch(PDO::FETCH_ASSOC); // le fetch() renvoi un résultat vide si aucune entrée de la bdd ne correspond à $pseudo et $mdp.
            // echo '<pre>'; print_r($membre); echo '</br>';

            if(!empty($membre)) // si nous récupérons qq chose dans la bdd
            {
                // alors le pseudo et le mdp son correct
                echo '<h1 style="background-color: green; color: white; padding: 10px;">Vous êtes connecté</h1>';
                echo'<b>Vos informations: </b><br />';
                echo '<b>id_utilisateur: </b>' . $membre['id_utilisateur'] . '<br />';
                echo '<b>pseudo: </b>' . $membre['pseudo'] . '<br />';
                echo '<b>mot de passe: </b>' . $membre['mdp'] . '<br />';
                echo '<b>Sexe: </b>' . $membre['sexe'] . '<br />';
                echo '<b>email: </b>' . $membre['email'] . '<br />';
                echo '<b>adresse: </b>' . $membre['adresse'] . '<br />';
            }
            else {
                echo '<h1 style="background-color: red; color: white; padding: 10px;">Erreur sur le pseudo ou le mot de passe<br />Veuillez recommencer</h1>';
            }
        }

    ?>

    <hr />
    <form action="" method="post">
        <label for="pseudo">pseudo</label>
        <input type="text" name="pseudo" id="pseudo" />
        <label for="mdp">mot de passe</label>
        <input type="text" name="mdp" id="mdp" />
        <hr />
        <input type="submit" value="Connexion" />
    </form>
    <hr />
</body>
</html>