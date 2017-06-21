<?php
// sur formualire2.php, mette nep lace un formulaire avec deux champs (pseudo et email) en type text + bouton de validation
// ce formulaire doit envoyer les informations saisies sur la page formulaire2_resultat.php
// faire en sorte d'afficher les informations reçues (var_dump ou print_r)
// ensuite afficher proprement les informations saisies.
// ATTENTION aux cas d'erreur, par exemple si j'arrive directement au fichier cible sans ^^etre passé par la validation du formulaire, y'a t'il des erreurs.
// Pour aller plus loin tester la taille du pseudo : le pseudo doit avboir entre 4 et 14 caractères inclus.
// S'il la taille est ok : on affiche le pseudo est : ... etc.
// S'il y a un souci sur la taille du pseudo, on affiche un message à l'utilisateur.
// Conttroler les emails avec Filter_var()
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <style>
            * { font-family: sans-serif ;}
            form { width: 30%; margin: 0 auto; }
            label { display: inline-block; width: 100%; font-style: italic }
            input, textarea { height: 30px; border: 1px solid #eee; width: 100%; resize: none; background-color: lightgrey;}
            #submit { width: 100%; }
            textarea { height: 60px; }
        </style>
    </head>
    <body>
        <form method="post" action="formulaire2_resultat.php" enctype="multipart/form-data">
            <label for="pseudo">Pseudo</label> <!-- for pour lier le label à l'input -->
            <input type="text" name="pseudo" id="pseudo" value="" required />

            <label for="email">email</label>
            <textarea name="email" id="email"></textarea><br />
            
            <input type="submit" id="submit" value="Valider" />
        </form>
    </body>
</html>