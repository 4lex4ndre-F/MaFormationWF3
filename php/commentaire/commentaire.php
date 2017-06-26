<?php
// ici nous allons avoir un formulaire permettant à l'utilisateur d'écrire un commentaire. Il faudra enregistrer ce commentaire en BDD pour l'afficher ensuite dans la page.

// 1. faire un formulaire avec ces champs:
    // pseudo (type text)
    // commentaire (textarea)
// 2. récupération des saisie et affichage sur la même page
// 3. insertion des données dans la bdd
// 4. affichage des commentaires dans la page (récupération depuis la bdd + traitement)
// 5. afficher les derniers commentaires enregistrés en premier dans la page.
// 6. afficher le nombre de commentaires
// 7. afficher la date et l'heure du commentaire en francais
// 8. css
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <form action="" method="post">
        <label for="pseudo">pseudo</label>
        <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" />
        <textarea name="comm" id="comm" cols="30" rows="10"></textarea>
        <input type="submit" value="Valider" />
    </form>

    <?php
        $pdo = new PDO('mysql:host=localhost;dbname=commentaire', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        //echo '<pre>'; print_r($_POST); echo '</pre>';
        if(isset($_POST['pseudo']) && isset($_POST['comm'])) // MARCHE PAS !!!!!!!!!!!!!
        {
            $pseudo = $_POST['pseudo'];
            $comm = $_POST['comm'];
            // 2. récupération des saisie et affichage sur la même page
            echo '<b>Votre nom: </b>' . $pseudo . '<br />';
            echo '<b>Votre message: </b>' . $comm . '<br />';

            // 3. insertion des données dans la bdd
            $resultat = $pdo->prepare("INSERT INTO commentaire (id_commentaire, message, pseudo, date) VALUES (null, :comm, :pseudo, NOW())");
            $resultat->bindParam(':comm', $comm, PDO::PARAM_STR);
            $resultat->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $resultat->execute();

            // 4. affichage des commentaires dans la page (récupération depuis la bdd + traitement)
            // 5. afficher les derniers commentaires enregistrés en premier dans la page.
            // echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>';
            $messages = $pdo->query("SELECT * FROM commentaire ORDER BY date DESC");
            echo '<ul>';
            while($listeMessages = $messages->fetch(PDO::FETCH_ASSOC))
            {
            // echo '<pre>'; print_r($listeMessages); echo '</pre>';
                echo '<li>';
                    echo '<h3>message de <b>' . $listeMessages['pseudo'] . '</b> / date : ' . $listeMessages['date'] . '<hr />';
                    echo '<p>' . $listeMessages['message'] . '</p>';
                echo '</li>';
            }
            echo '</ul>';

            // 6. afficher le nombre de commentaires
            $nb = $pdo->query("SELECT COUNT(*) FROM commentaire");
            $nbreDeComm = $nb->fetch(PDO::FETCH_NUM);
            // echo '<pre>'; print_r($nbreDeComm); echo '</pre>';
            echo '<h3>Nombre de commentaires: ' . $nbreDeComm[0] . '</h3>';
        }

    ?>


</body>
</html>
