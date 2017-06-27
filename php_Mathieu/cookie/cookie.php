<?php 
// récupération du choix de l'utilisateur ou cas par defaut

if(isset($_GET['langue']))
{
	$langue = $_GET['langue']; // choix de l'utilisateur
}
elseif(isset($_COOKIE['langue']))
{
	$langue = $_COOKIE['langue'];
}
else {
	$langue = 'fr'; // cas par defaut
	// $langue = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); // cas par defaut
}

// nombre de seconde dans une année
$un_an = 365*24*3600; // nb_de_jour*nb_heure*nb_seconde

// création d'un cookie sur le poste utilisateur
// /!\ la fonction setCookie() doit etre appeler avant le moindre affichage dans la page !!!
// pour générer un cookie: 3 arguments setCookie(nom, valeur, duree_de_vie)
setCookie("langue", $langue, time()+$un_an);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
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
					echo '<p>Bonjour,<br /> vous visitez le site en langue française</p>';
				break;
				case 'en':
					echo '<p>Hello,<br /> vous visitez le site en langue anglaise</p>';
				break;
				case 'it':
					echo '<p>Ciao,<br /> vous visitez le site en langue italienne</p>';
				break;
				case 'es':
					echo '<p>hola,<br /> vous visitez le site en langue espagnole</p>';
				break;
				default:
					echo '<p>Langue inconnue !</p>';
				break;
			}
			
			// echo '<pre>'; print_r($_SERVER); echo '</pre>';
			// il est possible de récupérer la langue du navigateur de l'utilisateur
			echo 'langue du navigateur: ' . substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) . '<br />'; 
			echo time(); // time() affiche la valeur du timestamp
			echo '<pre>'; print_r($_COOKIE); echo '</pre>';
			// echo '<pre>'; var_dump(get_defined_vars()); echo '</pre>';
			
			
		?>
	</body>
</html>











