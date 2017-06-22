<?php
// récupération du choix de l'utilisateur ou cas par défaut


if(isset($_GET['langue'])) // choix de l'user toujours prioritaire
{
    $langue = $_GET['langue']; // choix de l'utilisateur
}
elseif(isset($_COOKIE['langue'])) 
{
    $langue = $_COOKIE['langue'];
}
else 
{
    $langue = 'fr'; // cas par defaut
    // $langue = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); // cas par defaut
}

// ----------------------------------------------------- GENERATION D'UN COOKIE -----------------------------------------------------
// sur le poste utilisateur
// :!\ La fonction setCookie() doit être appelée avant le moindre affichage dans la page !!!
// pour générer un cookie: 3 arguments setCookie(nom, valeur, duree_de_vie) - 2 derniers sont optionnels: durée de vie par défaut = 0

// nombre de secondes dans une année
$un_an = 365 * 24 * 3600;

setCookie("langue", $langue, time()+$un_an);

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
        switch($langue) // on teste la valeur de $langue
        {  
            case 'fr':
                echo '<p>Bonjour, <br /> vous visiter le site en langue française</p>';
            break;
            case 'en':
                echo '<p>Hello, <br /> vous visiter le site en langue anglaise</p>';
            break;
            case 'it':
                echo '<p>Ciao, <br /> vous visiter le site en langue italienne</p>';
            break;
            case 'es':
                echo '<p>Hola, <br /> vous visiter le site en langue espagnole</p>';
            break;
            default:
                echo '<p>Langue inconnue</p>';
            break;
        }

        // echo '<pre>'; print_r($_SERVER); echo '</pre>';
        // il eest possible de récupérer la langue par défaut du navigateur
        echo 'langue du navigateur: ' . substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) . '<br />';
        echo time(); // Affichage de la valeur du timestamp
        echo'<pre>'; print_r($_COOKIE); echo '</pre>';


    ?>
</body>
</html>