<meta charset="utf-8" />
<style>
	* { font-family: sans-serif; }	
	h1 { padding: 10px; background-color: navy; color: white; }
	.erreur { margin-top: 20px; background-color: darkred; color: white; padding: 10px; text-align: center; }
	.succes { margin-top: 20px; background-color: green; color: white; padding: 10px; text-align: center; }
</style>
<a href="formulaire2.php">Retour au formulaire</a>

<hr />
<?php

$message = "";

echo '<pre>'; print_r($_POST); echo '</pre>';
echo '<hr />';
if(isset($_POST['pseudo']) && isset($_POST['email']))
{
	// echo 'Le pseudo est: ' . $_POST['pseudo'] . '<br />';
	// echo 'Le mail est: ' . $_POST['email'] . '<br />';
	
	$pseudo = $_POST['pseudo'];
	$email = $_POST['email'];
	
	// controle sur la taille du pseudo
	
	if(iconv_strlen($pseudo) > 3 && iconv_strlen($pseudo) < 15)
	{
		$message .= '<p class="succes">Votre pseudo est: ' . $pseudo . '</p>';
	}
	else {
		// il y a un souci sur la taille du pseudo
		$message .= '<p class="erreur">Attention, la taille du pseudo est invalide<br />En effet, le pseudo doit avoir entre 4 et 14 caractères inclus</p>';
	}
	
	// controle sur le format de l'email
	if(filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$message .= '<p class="succes">Votre email est: ' . $email . '</p>';
	}
	else {
		$message .= '<p class="erreur">Attention, le format du mail est invalide<br /> veuillez vérifier votre saisie</p>';
	}
}




echo '<h1>Résultats:</h1>';

echo $message;














