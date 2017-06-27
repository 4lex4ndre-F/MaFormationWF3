<style>
	* { font-family: sans-serif; }
	h3 { padding: 10px; background-color: navy; color: white; }
</style>
<?php
// sur page1.php et page2.php mettre un titre avec le nom de la page et un lien qui permet de passer d'une page vers l'autre
echo '<h3>Page 2</h3>';
echo '<a href="page1.php">Aller sur la page 1</a><hr />';

// Pour récupérer une ou des informations depuis l'url, nous pouvons utiliser le protocole HTTP GET
// en php nous utilisons la superglobale $_GET 
// Une superglobale est disponible dans tous les environnement, notamment dans une fonction sans avoir besoin de l'appeler avec le mot clé "global"
// TOUTES les superglobales sont des tableaux  
// dans l'url le "?" précise que l'url est finie, tout ce qui se trouve après le ? sont des informations que nous retrouverons dans $_GET
// syntaxe:
// ?indice1=valeur1&indice2=valeur2&indice3=valeur3 etc...

echo '<pre>'; print_r($_GET); echo '</pre>';

// /!\ $_GET & $_POST sont toujours existantes !!!
// si je fais: if(isset($_GET)) la réponse sera systématiquement "vrai"

if(isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['prix']))
{
	echo 'L\'article est: ' . $_GET['article'] . '<br />';
	echo 'La couleur est: ' . $_GET['couleur'] . '<br />';
	echo 'Le prix est: ' . $_GET['prix'] . '<br />';
}







