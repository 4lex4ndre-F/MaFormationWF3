<?php

// $_POST est une superglobale donc un tableau ARRAY
// $_POST est toujours existant mais par défaut est vide !
// $_POST nous permet de récupèrer les informations provenant d'un formulaire.
// L'indice correspondant à la saisie d'un champ sera l'attribut name="" du champ.
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <style>
            * { font-family: sans-serif ;}
            form { width: 30%; margin: 0 auto; }
            label { display: inline-block; width: 100%; font-style: italic }
            input, textarea { height: 30px; border: 1px solid #eee; width: 100%; resize: none;}
            #submit { width: 100%; }
            textarea { height: 60px; }
        </style>
    </head>
    <body>
        <?php
            echo '<pre>'; print_r($_POST); echo'</pre><br />';
            if(isset($_POST['pseudo']) && isset($_POST['message']))
            {
                echo 'Le pseudo est : ' . $_POST['pseudo'] . '<br />';
                echo 'Le message est : ' . $_POST['message'];
            }
                
        ?>
        <form method="post" action="" enctype="multipart/form-data"> <!-- method='GET' par défaut ; action pour cibler où envoyer les données  ; enctype pour récupérer les pièces jointes-->
            <label for="pseudo">Pseudo</label> <!-- for pour lier le label à l'input -->
            <input type="text" name="pseudo" id="pseudo" value="" /> 

            <label for="message">Message</label>         
            <textarea name="message" id="message"></textarea><br />
            
            <input type="submit" id="submit" value="Valider" />
        </form>
    </body>
</html>