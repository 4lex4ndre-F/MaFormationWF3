
<?php

require_once("inc/init.inc.php");

if(empty($_SESSION['utilisateur']['pseudo']))
{
    header('location:index.php');
}

//echo '<pre>'; print_r($_SESSION); echo '</pre>';
//echo '<pre>'; print_r($_POST); echo '</pre>';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>dialogue - Tchat</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
            <div id="conteneur">
                <h2 id="moi">Bonjour, <?php echo $_SESSION['utilisateur']['pseudo']; ?></h2>
                <div id="message_tchat"></div>
                <div id="liste_membre_connecte"></div>
                <div class="clear"></div>
                <div id="smiley">
                    <img src="smil/smiley1.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley2.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley3.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley4.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley5.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley6.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley7.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley8.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley9.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley10.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley11.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley12.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley13.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley14.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley15.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley16.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley17.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley18.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley19.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley20.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley21.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley22.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley23.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley24.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley25.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley26.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley27.gif" class="smiley" alt=":)" />
                    <img src="smil/smiley28.gif" class="smiley" alt=":)" />
                </div>
                <!-- FORMULAIRE -->
                <div id="formulaire_tchat">
                
                    <form action="#" method="post" id="form">
                    
                        <textarea name="message" id="message" maxlength="300" rows="5"></textarea></br />
                        <input type="submit" name="envoi" value="Envoi" class="submit" />
                        <div class="clear"></div>
                    </form>
                    <div id="postMessage"></div>
                
                </div>
            </div>

            <script>


                // affichage automatique de la liste des membres connectés
                // récupération de la liste des connectés via setInterval()
                setInterval("ajax(liste_membre_connecte)", 5333) // /!\ il ne faut pas que 2 setInterval se déclenchent à la même milliseconde !!!

                // idem messages
                setInterval("ajax(message_tchat)", 3375);

                // suppression de l'utilisateur sur le fichier pseudo.txt lors de la fermeture de la fenetre
                window.onbeforeunload = function () {
                    ajax("liste_membre_connecte", 'retirer');
                }

                // enregistrement des messages lors de la validation submit du formulaire
                document.getElementById('form').addEventListener("submit", function(event) {
                    event.preventDefault(); // bloque le rrechargement de page consécutif au submit du formulaire
                    ajax('postMessage', message.value); // valeur de l'id message (textarea)
                    ajax('message_tchat');
                    document.getElementById('message').value = '';
                })

                document.addEventListener("keypress", function(event){
                    $var = event.keyCode;
                    if($var == 13){
                        event.preventDefault();
                        ajax('postMessage', message.value);
                        ajax('message_tchat');
                        document.getElementById('message').value = '';
                    }
                })
            
                


                // Déclaration de la fonction ajax avec parametres car elle sera utiliisée à plusieurs reprises
                function ajax(mode, arg = '') { // mode obligatoire, arg pas obligatoire
                    if(typeof(mode) == 'object') {
                        mode = mode.id;
                        // si notre argument mode est de type object, c'est que js ne récupère ps le texte normal de l'argument mais la balise html qui possède cette id puisqu'il est possible de sélectionner un élément directement par son id. Du coup on pioche dedans pour ne récupérer que l'id (mode.id).
                    }
                    //console.log("Mode: " +mode);

                    var file = "ajax.php";
                    var param = "mode="+mode+"&arg="+arg; // les paramètres à fournir sur ajax.php

                    if(window.XMLHttpRequest) {
                        var xhttp = new XMLHttpRequest;
                    } else {
                        var xhttp = new ActiveXObject("Microsoft.XMLHTTP"); // IE
                    }

                    xhttp.open("POST", file, true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                    xhttp.onreadystatechange = function () {
                        if(xhttp.readyState == 4 && xhttp.status == 200) {
                            //console.log(xhttp.responseText);
                            var obj = JSON.parse(xhttp.responseText);
                            //console.log(obj);

                            document.getElementById(mode).innerHTML = obj.resultat; // on place la réponse dans l'élément html dont l'id à été fourni dans l'argument 'mode'
                            document.getElementById(mode).scrollTop = message_tchat.scrollHeight; // permet de descendre le scroll pour voir les derniers messages / ou les derniers membres
                        }
                    }
                    xhttp.send(param); // on envoi en fournissant les paramètres
                }

            </script>


</body>
</html>