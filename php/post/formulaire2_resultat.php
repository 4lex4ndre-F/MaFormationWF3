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
        return 'Le pseudo est : ' . $pseudo . '<br />';
    } else {
        return '<p class="alert">Votre pseudo doit contenir entre 4 et 14 caractères, il contient actuellement : <b>' . iconv_strlen($_POST['pseudo']) . '</b> caratères.</p><br />';        
    }
}
function email($email)
{
    if( filter_var( $email ,FILTER_VALIDATE_EMAIL ) )
        {
            return 'L\'email est : ' . $email;
        } else {
            return '<p class="alert">Veuillez vérifier votre email.</p>';
    }
}
if(isset($_POST['pseudo']) && isset($_POST['email']))
{
    echo pseudo($_POST['pseudo']);
    echo email($_POST['email']);
}

// CA FONCTIONNE ! sauf pour p.alert...