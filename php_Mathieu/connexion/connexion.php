<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<style>
			* { font-family: calibri; }
			form { width: 25%; min-width: 200px; margin: 0 auto; }
			input { width: 100%; border: 1px solid #dedede; border-radius: 3px; height: 28px; }
		</style>
	</head>
	
	<body>
		<?php 
		echo '<pre>'; print_r($_POST); echo '</pre>';
		// connexion à la bdd
		$pdo = new PDO('mysql:host=localhost;dbname=connexion', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		// echo '<pre>'; var_dump(get_class_methods($pdo)); echo '</pre>';
		
		if(isset($_POST['pseudo']) && isset($_POST['mdp']))
		{
			$pseudo = $_POST['pseudo'];
			$mdp = $_POST['mdp'];
			
			// récupération des informations en ajoutant la fonction prédéfinie addslashes() pour gérer les quotes et guillemets.
			// $pseudo = addslashes($_POST['pseudo']);
			// $mdp = addslashes($_POST['mdp']);
			// addslashes() rajoute un antislash des qu'il trouve une quote ou guillement dans une chaine de caractères
			
			echo '<b>Pseudo:</b> ' . $pseudo . '<br />';
			echo '<b>Mot de passe:</b> ' . $mdp . '<br />';
			
			$req = "SELECT * FROM utilisateur WHERE pseudo = '$pseudo' AND mdp = '$mdp'";
			echo '<b>Requète:</b> ' . $req . '<br />'; // affichage de la requete pour comprendre les injections
			
			// execution de la requete
			// $resultat = $pdo->query($req);
			// la ligne au dessus permet l'injection de code via le formulaire (injections sql notamment), pour sécuriser, il nous suffit d'utiliser prepare + execute
			
			$resultat = $pdo->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo AND mdp = :mdp");
			// echo '<pre>'; print_r(get_class_methods($resultat)); echo '</pre>';
			$resultat->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
			$resultat->bindParam(":mdp", $mdp, PDO::PARAM_STR);
			$resultat->execute();
			
			$membre = $resultat->fetch(PDO::FETCH_ASSOC);
			
			if(!empty($membre)) // si nous récupérons qq chose de la bdd
			{
				// alors le pseudo et le mdp son correct
				echo '<h1 style="background-color: green; color: white; padding: 10px">Vous êtes connecté</h1>';
				echo '<b>Vos informations:</b><br />';
				echo '<b>id_utilisateur:</b> ' . $membre['id_utilisateur'] . '<br />';
				echo '<b>Pseudo:</b> ' . $membre['pseudo'] . '<br />';
				echo '<b>Mot de passe:</b> ' . $membre['mdp'] . '<br />';
				echo '<b>Sexe:</b> ' . $membre['sexe'] . '<br />';
				echo '<b>Email:</b> ' . $membre['email'] . '<br />';
				echo '<b>Adresse:</b> ' . $membre['adresse'] . '<br />';
			}
			else {
				echo '<h1 style="background-color: red; color: white; padding: 10px">Erreur sur le pseudo ou le mot de passe<br />Veuillez recommencer</h1>';
			}
			
		}
		
		
		?>
	
		<hr />
		<form method="post" action="">
			<label for="pseudo">Pseudo</label>
			<input type="text" name="pseudo" id="pseudo" />
			<label for="mdp">Mot de passe</label>
			<input type="text" name="mdp" id="mdp" /><hr />
			<input type="submit" value="Connexion" />
		</form>
		<hr />
	</body>
</html>