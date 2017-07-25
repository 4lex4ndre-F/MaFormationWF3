<?php
require_once("inc/init.inc.php");
if(!empty($_SESSION['utilisateur']['pseudo']))
{
    header('location:dialogue.php');
}
echo '<pre>'; var_dump($_SESSION); echo '</pre>';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - connexion</title>
    <link rel="stylesheet" href="css/style.css" />

</head>
<body>
    <div class="contenu">

        <fieldset>
            <div id="message">
                Bonjour, veuillez saisir les champs de ce formulaire.
            <!-- mettre en place une requete ajax déclenchée lors de la validation du formulaire. Récupérer les paramètres à fournir puis tester si la communication est ok si vous recevez bien la réponse depuis ajax.php -->
            </div>
        </fieldset>
        <fieldset>
            <form action="" method="post" id="form">

                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo">

                <label for="sexe">Sexe</label>
                <select name="sexe" id="sexe" name="sexe">
                    <option value="m">Homme</option>
                    <option value="f">Femme</option>
                </select>

                <label for="ville">Ville</label>
                <input type="text" name="ville" id="ville"> 

                <label for="date_de_naissance">Date de naissance</label>
                <input type="date" name="date_de_naissance" id="date_de_naissance" placeholder="AAAA/MM/JJ" >

                <input type="submit" value="Connection au tchat" >

            </form>
        </fieldset>

    </div><<!-- fin .contenu -->

    <script>

        // on récup form pour écouter le submit
        document.getElementById('form').addEventListener("submit", function (e) {
            
            // on stop le comportement du submit
            e.preventDefault();

            // fonction ajax lancée au submit
            ajax();

        });

        // déclaration de la fonction ajax()
        function ajax() {

            // le champs pseudo
            var p = document.getElementById("pseudo");
            var pseudo = p.value;

            // le champs sexe
            var s = document.getElementById("sexe");
            var sexe = s.value;

            // le champs ville
            var v = document.getElementById("ville");
            var ville = v.value;

            // le champs date_de_naissance
            var d = document.getElementById("date_de_naissance");
            var date = d.value;

            // préparation des paramètres que nous allons envoyer sur ajax_connexion.php via ajax
            var param = "pseudo="+pseudo+"&sexe="+sexe+"&villle="+ville+"&date_de_naissance="+date;
            console.log(param);
            
            // déclaration du fichier cible
            var file = 'ajax_connexion.php';

            // instanciation de l'objet ajax représenté par la variable xhttp
            if(window.XMLHttpRequest)
                var xhttp = new XMLHttpRequest();
            else
                var xhttp = new ActiveXObject('Microsoft.XMLHTTP');

            xhttp.open("POST", file, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.onreadystatechange = function () {
                if(xhttp.readyState == 4 && xhttp.status == 200) {
                    console.log(xhttp.responseText);
                    var reponse =JSON.parse(xhttp.responseText);
                    document.getElementById("message").innerHTML = reponse.resultat;

                    if(reponse.pseudo == 'disponible') {
                        // si la valeur de l'indice pseudo est 'disponnible' alors je sais qu'il n'y a pas d'erreur et je redirige vers dialogue.php
                        window.location.href = 'dialogue.php';
                    }
                }
            }

            xhttp.send(param);

        }//fin déclaration ajax()

    </script>

</body>
</html>