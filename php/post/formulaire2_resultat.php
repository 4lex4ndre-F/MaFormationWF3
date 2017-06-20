<?php
echo '<a href="formulaire2.php">Retour</a><br />';
echo '<pre>'; print_r($_POST); echo '</pre>';

if(isset($_POST['pseudo']) && isset($_POST['email']))
{
    if (iconv_strlen($_POST['pseudo']) >= 4 && iconv_strlen($_POST['pseudo']) <= 14)
    {
        echo 'Le pseudo est : ' . $_POST['pseudo'] . '<br />';
        echo 'L\'email est : ' . $_POST['email'];
    } else {
        echo 'Votre pseudo doit contenir entre 4 et 14 caractères, il contient actuellement : <b>' . iconv_strlen($_POST['pseudo']) . '</b> caratères.';
    }
}

// RAPPEL iconv_strlen($_POST[pseudo]); ==> Longueur du pseudo


/* utilisation fliter_var()
if( filter_var( $_POST['email'] ,FILTER_VALIDATE_EMAIL ) )
{

}
*/