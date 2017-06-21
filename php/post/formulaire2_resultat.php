<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        * { font-family: sans-serif;  }
        h1 { padding: 1px; background-color: navy; color: white; }
        p.succes { background-color: lightgreen; text-align: center; padding: 10px; margin-top: 20px;}
        p.erreur { background-color: red; color: white; text-align: center; padding: 10px; margin-top: 20px;}
    </style>
</head>
<body>
    
</body>
</html>


<?php
echo '<a href="formulaire2.php">Retour</a><br />';
echo '<pre>'; print_r($_POST); echo '</pre>';
/*
if(isset($_POST['pseudo']) && isset($_POST['email']))
{
    if (iconv_strlen($_POST['pseudo']) >= 4 && iconv_strlen($_POST['pseudo']) <= 14)
    {
        echo 'Le pseudo est : ' . $_POST['pseudo'] . '<br />';
        if( filter_var( $_POST['email'] ,FILTER_VALIDATE_EMAIL ) )
        {
            echo 'L\'email est : ' . $_POST['email'];
        } else {
            echo 'Veuillez vérifier votre email.';
        }
    } else {
        echo 'Votre pseudo doit contenir entre 4 et 14 caractères, il contient actuellement : <b>' . iconv_strlen($_POST['pseudo']) . '</b> caratères.';
        
    }
} */

// RAPPEL iconv_strlen($_POST[pseudo]); ==> Longueur du pseudo


/* utilisation fliter_var()
if( filter_var( $_POST['email'] ,FILTER_VALIDATE_EMAIL ) )
{

}
*/

// Le même exercice en utilisant 2 fonctions d'affichage :
// La première pour la validation du pseudo,
// la seconde pour l'email

function pseudo($pseudo)
{
    if (iconv_strlen($pseudo) >= 4 && iconv_strlen($pseudo) <= 14)
    {
        return '<p class="succes">Le pseudo est : ' . $pseudo . '</p><br />';
    } else {
        return '<p class="erreur">Votre pseudo doit contenir <b>entre 4 et 14 caractères</b>, il contient actuellement : <b>' . iconv_strlen($_POST['pseudo']) . ' caratères</b>.</p><br />';
    }
}
function email($email)
{
    if( filter_var( $email ,FILTER_VALIDATE_EMAIL ) )
    {
        return '<p class="succes">L\'email est : ' . $email . '</p>';
    } else {
        return '<p class="erreur">Veuillez vérifier votre email.</p>';
    }
}
if(isset($_POST['pseudo']) && isset($_POST['email']))
{
    echo pseudo($_POST['pseudo']);
    echo email($_POST['email']);
}

// CA FONCTIONNE !


// ---------------------------------------- CORRECTION MATHIEU ----------------------------------------
$message = ""; // variable pour le message final de validation ok ou pas ok

if(isset($_POST['pseudo']) && isset($_POST['email']))

$pseudo = $_POST['pseudo'];
$email = $_POST['email'];

// conttrole sur la taille du pseudo
if (iconv_strlen($pseudo) >= 4 && iconv_strlen($pseudo) <= 14)
    {
        $message .= '<p class="succes">Votre pseudo est : ' . $pseudo . '</p>';
    } else {
        // il y a un soucis sur la taille
        $message .= '<p class="erreur">Attention, la taille du pseudo est invalide !<br>En effet, le pseudo doit avoir entre 4 et 14 caractères inclus</p>';
    }

// control sur le format de l'email
if(filter_var( $email ,FILTER_VALIDATE_EMAIL))
    {
        $message .= '<p class="succes">Votre email est : ' . $email . '</p>';
    } else {
        $message .= '<p class="erreur">Attention, le format du mail est invalide !<br>Veuillez vérifier votre saisie.</p>';
    }


echo '<h1>Résultats:</h1>';

echo $message;
// ---------------------------------------- FIN CORRECTION MATHIEU ----------------------------------------