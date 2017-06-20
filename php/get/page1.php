<style>
* { font-family: sans-serif; }
h3 { padding: 10px; background-color: darkred; color: white; }
</style>
<?php
// sur page1.php et page2.php, mettre un titre avec le nom de la page et un lien qui permet de passer d'une apge à l'autre
echo '<h3>page1.php</h3>';
echo '<a href="page2.php?article=jean&couleur=bleu&prix=40">aller à la page 2</a>'; // voir la page2.php pour les explications sur $_GET