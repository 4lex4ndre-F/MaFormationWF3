<style>
* { font-family: sans-serif; }
h3 { padding: 10px; background-color: darkblue; color: white; }
</style>
<?php
// sur page1.php et page2.php, mettre un titre avec le nom de la page et un lien qui permet de passer d'une apge à l'autre
echo '<h3>page2.php</h3>';
echo '<a href="page1.php">aller à la page 1</a>';

// Pour récupérer une ou des informations depuis l'url, nous pouvons utiliser le protocole HTTP GET
// en php nous utilisons la superglobale $_GET// une superglobale est disponible dans tous les environnements, notamment dans une fonction sans avoir besoin de l'appeler avec le mot-clé "global"
// TOUTES les superglobales sont des tableaux ARRAY.

// dans l'url le "?" précise que l'url est finie, tout ce qui see trouve après le ? sont des informations que nous retrouverons dans $_GET
// syntaxe:
// ?indice1=valeur1&indice2=valeur2&indice3=valeur3 etc.
echo '<pre>'; print_r($_GET); echo '</pre>'; // $_GET est integré dans http

// /!\ $_GET et $_POST sont toujours existantes !!!
// si je fais : if(isset($_GET)) la réponse sera systématiquement "vrai"

// Afficher proprement les informations GET
if(isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['couleur']))
{
    echo 'L\'article est : ' . $_GET['article'] . '<br />';
    echo 'La couleur est : ' . $_GET['couleur'] . '<br />';
    echo 'Le prix est : ' . $_GET['prix'] . '<br />';
}