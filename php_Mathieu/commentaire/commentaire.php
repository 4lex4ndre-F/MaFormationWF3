<?php
$pdo = new PDO('mysql:host=localhost;dbname=commentaire', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// ici nous allons avoir un formulaire permettant à l'utilisateur d'écrire un commentaire. Il faudra enregistrer ce commentaire en BDD pour l'afficher ensuite dans la page.
// 1 - faire un formulaire avec ces champs: 
	// pseudo (type text)
	// commentaire (textarea)
// 2 - récupération des saisies et affichage sur la meme page
// 3 - insertion des données dans la BDD
// 4 - Affichage des commentaires dans la page (récupération depuis la bdd + traitement)
// 5 - Afficher les derniers commentaires (enregistrés) en premier dans la page
// 6 - Afficher le nombre de commentaires
// 7 - Afficher la date et l'heure du commentaire en français
// 8 - css


$message_utilisateur = ""; // variable pour afficher des messages à l'utilisateur
if(isset($_POST['pseudo']) && isset($_POST['message']))
{
	// htmlentities() permet d'éviter l'injection de code (sql, css, xss, etc.) cete fonction transforme les caractères tels que < > & ... en entité html, cela permet d'avoir un code source propre et de bloquer les injecttions.
	// le deuxième argument ENT_QUOTES permet la prise en charge également des " et '.
	$pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES);
	$message = htmlentities($_POST['message'], ENT_QUOTES);
	
	if(!empty($pseudo) && !empty($message))
	{
		// enregsitrement avec la methode prepare car les informations venant du formulaire peuvent contenir des injections sql
		$enregistrement = $pdo->prepare("INSERT INTO commentaire (pseudo, message, date) VALUES (:pseudo, :message, NOW())");
		$enregistrement->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
		$enregistrement->bindParam(":message", $message, PDO::PARAM_STR);
		$enregistrement->execute();
		// $message_utilisateur = "<div style='margin: 20px 0;color: white; background-color: green; padding: 10px;'>Message enregistré</div>"; 
		// header() fonction nous permettant de rediriger vers une url
		// /!\ cette fonction doit etre exécutée avant le moindre affichage dans la page.
		header("location:commentaire.php");
		// echo '<script>window.location = "commentaire.php"; </script>';
	}
	else {
		$message_utilisateur = "<div style='margin: 20px 0;color: white; background-color: red; padding: 10px;'>Attention, les champs pseudo et message sont obligatoires<br />Veuillez recommencer</div>"; 
	}	
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<style>
			* { font-family: calibri; }
			form { width: 50%; min-width: 200px; margin: 0 auto; }
			input, textarea { width: 100%; border: 1px solid #dedede; border-radius: 3px; min-height: 30px; padding: 5px; box-sizing: border-box; }
			.container { width: 1000px; margin: 0 auto; }
			input:focus { border-color: red; }
		</style>
	</head>
	
	<body>
		<div class="container">
		<?php 
			// echo '<pre>'; print_r($_POST); echo '</pre>';
			echo $message_utilisateur;
		?>
			<form method="post" action="">
				<label for="pseudo">Pseudo <span style="color: red">*</span></label>
				<input type="text" name="pseudo" id="pseudo" />
				<label for="message">Message</label>
				<textarea name="message" id="message"></textarea><hr />
				<input type="submit" value="Valider" />
			</form>
			
			<hr />
			<?php
			// récupération des commentaires en BDD
			$liste_commentaires = $pdo->query("SELECT pseudo, message, date_format(date, '%d/%m/%Y à %H:%i:%s') AS date_fr FROM commentaire ORDER BY date DESC");
			echo '<h4>' . $liste_commentaires->rowCount() . ' Commentaire(s)</h4>';
			while($commentaires_en_cours = $liste_commentaires->fetch(PDO::FETCH_ASSOC))
			{
				// echo '<pre>'; print_r($commentaires_en_cours); echo '</pre><hr />';
				echo '<div style="margin-bottom: 5px; border: 1px solid #dedede; padding: 20px;text-align: center; width: 50%; margin: 0 auto;">';
				echo '<div><h3>Par: ' . $commentaires_en_cours['pseudo'] . '<small> le ' . $commentaires_en_cours['date_fr'] . '</small></h3><hr /></div>';
				echo '<div>' . $commentaires_en_cours['message'] . '</div>';				
				echo '</div><br />';
			}			
			?>			
		</div>
	</body>
</html>