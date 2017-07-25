<?php

// formulaire pseudo + mdp + validation
// evenement soumission on bloque le rechargement de page

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div>

        <form id="form" action="" method="post">

            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo">

            <label for="mdp">Mot de passe</label>
            <input type="text" name="mdp" id="mdp">

            <input type="submit" value="connexion">

        </form>

    </div>

    <div id="resultat"></div><!-- réponse de l'ajax dans cette div -->

    <script> // DU JS !! Arrete d'oublier

        // o nrécupère l'élement <form> qui a pour id form et on écoute l'évènement submit
        document.getElementById('form').addEventListener('submit', function (e) {
            // variable e représente l'évènement, on bloque la soumission du formulaire
            e.preventDefault();

            // on appelle la fonction ajax qui lancera la requete ajax
            ajax();
        });

        // définition de la fonction ajax (js) nous permettant de lancer une requete ajax
        function ajax() {
            // le fichier cible qui sera executé lors de la requete ajax
            var file = 'ajax.php';

            // condition pour la compatibilité
            if(window.XMLHttpRequest)
                var xhttp = new XMLHttpRequest();
            else
                var xhttp = new ActiveXObject('Microsoft.XMLHTTP');

            // --------------récupération des valeurs des champs--------------
            // le champs pseudo
            var p = document.getElementById("pseudo");
            //la valeur de pseudo
            var pseudo = p.value;
            console.log('Pseudo: ' + pseudo);
            
            // le champs
            var m = document.getElementById("mdp");
            //la valeur
            var mdp = m.value;
            console.log('Mdp: ' + mdp);
            // on récupère la valeur en 2 étapes car il eest possible que nous ayons besoin de cibler uniquemennt le champs + tard

            // --------------préparation des paramètres--------------
            var param = "pseudo="+pseudo+"&mdp="+mdp;
            console.log("param: "+param);

            // --------------communication et requete ajax (cf en-têtes HTTP)--------------
            // on ouvre la requete ajax en mode post, en fournissant le fichier cible concerné (mode true -> asynchrone)
            xhttp.open("POST", file, true);
            // on transmet à notre requete ajax un header http (cf dans la doc) obligatoire lorsque nous utilisons la méthode post
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            // mise en place de l'évènement
            xhttp.onreadystatechange = function () {
                // on teste le status de la requete ajax ainsi que le statut http
                if(xhttp.readyState == 4 && xhttp.status == 200) {
                    console.log('log: '+xhttp.responseText); // réponse de l'ajax (propriété .responseText), indique aussi les éventuelles erreurs php
                    // si on récupère une chaine de caractères au format JSON, nous devons utiliser JSON.parse() afin d'en créer un objet js
                    var result = JSON.parse(xhttp.responseText);

                    // on cible la div id="resultat" et on y ajoute du html contenant le résulltat de la requete ajax
                    document.getElementById("resultat").innerHTML = result.resultat; // .resultat = indice qu'on va définir en php

                } // fin if
            } // fin fonction anonyme onreadystatechange

            // cette ligne déclenche l'envoi de la requete ajax en fournissant les paramètres attendus sur ajax.php
            xhttp.send(param);

        } // fin fonction ajax

    </script>

</body>
</html>