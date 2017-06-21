<?php
// récupération du choix de l'utilisateur ou cas par ddéfaut
if(isset($_GET['langue']))
{
    $langue = $_GET['langue']; // choix de l'utilisateur
}
else {
    $langue = 'fr'; // cas par defaut
}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

</head>
<body>
    <ul>
        <li><a href="?langue=fr">France</a></li>
        <li><a href="?langue=es">Espagne</a></li>
        <li><a href="?langue=it">Italie</a></li>
        <li><a href="?langue=en">Angleterre</a></li>
    </ul>

    <?php
        // affichage d'un texte selon la langue
        switch($langue) // on test la valeur de $langue
        {  
            case 'fr':
                echo '<p>Bonjour, <br /> vous visiter le site en langue française</p>';
            break;
            case 'en':
                echo '<p>Hello, <br /> vous visiter le site en langue française</p>';
            break;
            case 'it':
                echo '<p>Ciao, <br /> vous visiter le site en langue française</p>';
            break;
            case 'es':
                echo '<p>Hola, <br /> vous visiter le site en langue française</p>';
            break;
            default:
                echo '<p>Langue inconnue</p>';
            break;
        }
    ?>
</body>
</html>