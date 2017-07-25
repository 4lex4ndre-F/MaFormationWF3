<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <form method="post" action="ajax_json.php" id="form" style="width: 50%; margin: 0 auto;">
        <?php
            $fichier = file_get_contents("fichier.json"); // on récupère le contenu du fichier json
            $json = json_decode($fichier, true); // on transforme le format json en tableau array

            echo '<select name="personne" id="personne" style="width: 100%; min-height: 28px; border: 1px solid #dedede; border-radius: 3px;" >';

            foreach($json as $sous_tableau)
            {
                echo '<option>' . $sous_tableau['prenom'] . '</option>';
            }

            echo '</select><br />';

            echo '<input type="submit" value="ok" id="submit" style="width: 100%;" />';
        ?>
    </form>
    <hr />
    <div id="resultat">

    </div>
    <script
        src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous">
    </script>

    <script> // cf dossier 02 sans JQuery...
        $(document).ready(function(){

            $("#form").on("submit", function(event) {
                event.preventDefault();

                // on récupère la valeur du champ select (id personnne)
                var perso = $('#personne').val();
                var param = "personne="+perso;

                var parametres = $(this).serialize();
                // serialize récupère tout les names et valeurs d'un formulaire et nous l'envoi dans un format correct (get)
                // équivalent en js: FormData (https://developer.mozilla.org/fr/docs/Web/API/FormData)
                console.log(parametres);

                // fichier cible // on récupère la valeur de l'attribut action du formulaire
                var file = $(this).attr("action");
                console.log(file);

                // methode // on récupère la valeur de l'attribut method="" du formulaire
                var method= $(this).attr("method");
                console.log(method);

                // api: http://api.jquery.com/jquery.ajax/
                $.ajax({
                    url: file, // url: "ajax.json.php"
                    type: method, // type: "POST"
                    data: param, // ou data: parametres
                    dataType: "json",  // il faut préciser le format dses données reçues
                    success: function(reponse) {
                        $("#resultat").html(reponse.resultat); // la fonction qui sera executée lors de la réception de la réponse.
                    }
                });

                // avec la methode de jquery post
                $.post(file, param, function(reponse){
                    $("#resultat").html(reponse.resultat);
                }, "json");
                // $.post(lefichiercible, lesparametres, functionàdéclencher, format)

            });

        });
    </script>
</body>
</html>
