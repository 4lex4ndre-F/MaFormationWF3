<style>
* { font-family: calibri; }
h1 { padding: 10px; color: white; background-color: darkslategray; }
</style>
<h1>Ecriture et affichage</h1>
<!-- tout d'abord, il est possible d'écrire du html dans un fichier .php, en revanche l'inverse n'est pas possible -->
<?php // balise php ouverture et fermeture ?>
<?php
// instruction d'affichage
// variable: types / déclaration / affectation
// Concaténation
// guillemets et quotes
// constante
// condition et opérateurs de comparaison
// fonction prédéfinie
// fonction utilisateur
// boucle
// inclusion
// array
// classe et objet.

echo 'Bonjour'; // echo est une instruction permettant d'effecteur un affichage.
echo '<br />'; // il est possible de mettre du html 
echo 'Bienvenue<br />'; // si vous regardez le code source, il n'est pas possible de voir le code php car déjà interprété depuis le serveur.
print 'Print est une autre instruction d\'affichage similaire à echo<br />';

  
// les commentaires en PHP
// ceci est un commentaire sur une seule ligne.
# ceci est un commentaire sur une seule ligne.
/*
Ceci est un commentaire sur
plusieurs
lignes
*/
// autres instructions d'affichage mais spécifiques aux phases de developpement: print_r() & var_dump()

echo '<h1>Variables: types / déclaration / affectation</h1>';
// définition: une variable est un espace nommé permettant de conserver une valeur.

// déclaration d'une variable avec le signe $ // une variable est sensible à la casse // caractères autorisés: de a z, de 0  9 et le _ // /!\ une variable ne peut pas commencer par un chiffre.

// affectation d'une valeur avec le signe =
$a = 127;
echo gettype($a); // integer
echo '<br />';

$b = 1.5;
echo gettype($b); // double
echo '<br />';

$a = 'Une chaine';
echo gettype($a); // string
echo '<br />';

$b = '127';
echo gettype($b); // string
echo '<br />';

$a = true; // ou TRUE // ou l'inverse false / FALSE
echo gettype($a); // bool
echo '<br />';

echo '<h1>Concaténation</h1>';
// en php nous utiliserons le . pour la concaténation que l'on peut traduire par "suivi de"
$x = "Bonjour ";
$y = "tout le monde";
echo $x . ' ' . $y . '<br />';

echo "<br />" , 'Coucou' , '<br />'; // il est possible de faire la concaténation avec une , en revanche uniquement avec echo. (erreur avec print)

echo '<h1>Concaténation lors de l\'affectation</h1>';
$prenom1 = "Bruno ";
$prenom1 = "claire";

echo $prenom1 . '<br />'; // affiche claire

$prenom2 = "Bruno ";
$prenom2 .= "claire"; // équivalent à écrire $prenom2 = $prenom2 . 'claire';
// le .= permet de rajouter à l'existant sans l'écraser.
echo $prenom2 . '<br />';

echo '<h1>Guillemets & Quotes</h1>';

$message = "Aujourd'hui";
// ou 
$message = 'Aujourd\'hui';

// concaténation:
echo $message . ' il fait chaud<br />';
echo "$message il fait chaud<br />"; // dans des guillemets, les variables sont reconnues et donc interprétées.
echo '$message il fait chaud<br />'; // dans des quotes, les variables ne sont pas reconnues et donc interprétées comme du texte.

echo '<h1>Les constantes & constantes magiques</h1>';
// une constante est un peu comme une variable un espace nommé nous permettant de conserver une valeur sauf que comme son nom l'indique, cette valeur ne pourra pas changer durant l'exécution du script.
define("CAPITALE", "Paris"); // 1er argument: le nom de la constante / 2eme argument: sa valeur.
// Par convention, une constante s'écrit toujours en majuscule.
echo CAPITALE . '<br />';

// constante magique.
echo __FILE__ . '<br />'; // affiche le chemin complet jusqu'à ce fichier.
echo __LINE__ . '<br />'; // affiche le numéro de la ligne

echo '<h1>Exercice sur les variables</h1>';
// mettre les valeurs "lundi" "mardi" et "mercredi" dans 3 variables.
// Afficher "lundi - mardi - mercredi" en appelant les variables.
$jour1 = 'lundi';
$jour2 = 'mardi';
$jour3 = 'mercredi';
$sep = " - ";

echo $jour1 . " - " . $jour2 . ' - '. $jour3 . '<br />';
echo $jour1 . $sep . $jour2 . $sep . $jour3 . '<br />';
echo "$jour1 - $jour2 - $jour3";

echo '<h1>Opérateurs arithmétique</h1>';
$a = 10; $b = 2;
echo $a + $b . '<br />'; // affiche 12
echo $a - $b . '<br />'; // affiche 8
echo $a * $b . '<br />'; // affiche 20
echo $a / $b . '<br />'; // affiche 5
echo $a % $b . '<br />'; // modulo => affiche 0 (le restant de la division)

// facilité d'écriture:
echo $a += $b; // équivaut à $a = $a + $b
// $a -= $b
// $a *= $b
// $a /= $b


echo '<h1>Structures conditionelles (if / elseif / else) et opérateurs de comparaison</h1>';
// isset - empty

// isset test si l'élément existe (s'il a été déclaré au préalable dans notre script par exemple)
// empty test si l'élément est vide (à savoir, empty vérifie au préablable si l'élément est défini avant de tester s'il est vide.)

$var1 = 0; // ou $var1 = ""; $var1 = false;

if(empty($var1)) 
{
	echo 'la variable var1 est vide ou non définie<br />';
}	


$var2 = "";
if(isset($var2))
{
	echo "La variable var2 existe ! <br />";
}

// opérateurs de comparaison
$a = 10; $b = 5; $c = 2;

if($a > $b) // si "a" est strictement supérieur à "b"
{
	print "'a' est bien supérieur à 'b'<br />";
}
else { // sinon => toutes les autres possibilités
	print "'a' n'est pas supérieur à 'b'<br />";
}

// ET
if($a > $b && $b > $c) // si "a" est supérieur à "b" ET DANS LE MEME TEMPS si "b" est supéieur à "c"
{
	echo 'Ok pour les deux conditions<br />';
}

// OU
if($a == 9 || $b > $c) // si "a" est égal à 9 OU si "b" est supérieur à "c"
{
	echo 'Ok pour au moins une des deux conditions<br />';
}

// XOR 
if($a == 10 XOR $b < $c) // avec XOR on ne rentre dans la condition que si l'une des deux conditions est vrai. Si les deux conditons sont vrais on ne rentre pas
{
	echo 'Ok pour une seule des deux conditions (condition exclusive)<br />';
}
// Avec XOR:
// true XOR true => false
// false XOR false => false
// true XOR false => true
// false XOR true => true

if($a == 8)
{
	print 'réponse 1<br />';
}
elseif($a != 10)
{
	print 'réponse 2<br />';
}
else {
	echo 'réponse 3<br />';
}

$a1 = 1;
$a2 = '1';

if($a1 == $a2)
{
	echo 'C\'est la même chose<br />';
}
if($a1 === $a2)
{
	echo 'C\'est la même chose<br />';
}
/*
	=		Affectation
	==		Comparaison des valeurs
	===		Comparaison des valeurs & de types
	!=		différent de (en terme de valeur)
	!==		différent de (en terme de valeur ou de type)
	> 		strictement supérieur
	< 		strictement inférieur
	>=		supérieur ou égal
	<=		inférieur ou égal
*/

// forme contractée des if: autre écriture
echo ($a == 10) ? 'if en forme contractée<br />' : 'else en forme contractée<br />';
// le ? représente le if
// les : représentent le else
	
echo '<h1>Condition switch</h1>';
// les cases représentent des cas différents dans lesquel nous pouvont potentiellement rentrer.
$couleur = 'jaune';
switch($couleur)
{
	case 'bleu':
		echo 'Vous aimez le bleu<br />';
	break;
	case 'rouge':
		echo 'Vous aimez le rouge<br />';
	break;
	case 'vert':
		echo 'Vous aimez le vert<br />';
	break;
	default: // toutes les autres possibilités
		echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert<br />';
	break;
}

// EXERCICE: refaire la condition précédente avec if / elseif / else
$couleur = 'jaune';
if($couleur == 'bleu')
{
	echo 'Vous aimez le bleu<br />';
}
elseif($couleur == "rouge")
{
	echo 'Vous aimez le rouge<br />';
}
elseif($couleur == "vert")
{
	echo 'Vous aimez le vert<br />';
}
else {
	echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert<br />';
}

echo '<h1>Fonction prédéfinie</h1>';
// une fonction prédéfinie est déjà inscrite dans le langage, le developpeur ne fait que l'exécuter.
echo 'Date du jour:<br />';
echo date("d/m/Y H:i:s");
// date est une fonction prédéfinie permettant d'afficher la date.
// en argument cette fonction accepte une chaine de caractère.
// Selon les caractères fournis, cette fonction nous renvoie différent format de date.
// voir la doc pour les formats disponibles: http://php.net/manual/fr/function.date.php

echo '<hr />' . time() . '<hr />'; // time() nous affiche le timestamp (nb de seconde s ecoulées depuis le 1er janvier 1970)

// traitement des chaines (iconv_strlen() / strpos() / substr())
$email = 'mathieuquittard@evogue.fr';
echo strpos($email, '@') . '<br />';
// strpos permet de chercher dans une chaine (fournie en 1er argument) une autre chaine (fournie en 2eme argument)
// /!\ dans une chaine le premier caractère a la position 0

// valeur de retour
	// Succes => on obtient un int (la position)
	// Echec  => booleen false

$email2 = "rljgrlezjg";
echo strpos($email2, '@') . '<br />';	
var_dump(strpos($email2, '@')); // var_dump() est une instruction d'affichage ameliorée nous affichant la valeur de ce que l'on test + son type et si le type est string on obtient également sa longueur.
// ici var_dump() nous permet de voir le false obtenu via la fonction strpos()

// iconv_strlen
$phrase = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
echo '<br />';
echo iconv_strlen($phrase) . '<br />';
// iconv_strlen permet de compter le nombre de caractère dans une chaine.
// valeur de retour en cas de succes => int (la longueur de la chaine)	
	
// substr
$texte = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis tincidunt lorem. Phasellus mollis consectetur ligula, sit amet ultricies neque dapibus a. Duis sit amet vulputate lectus. Aliquam sollicitudin volutpat ante, vitae accumsan ligula blandit eget.";	
	
echo substr($texte, 0, 35) . " ...<a href='#'>Lire la suite</a>";
// substr permet de découper une chaine
	// 1er argument => la chaine a découper
	// 2eme argument=> la position de depart
	// 3eme argument=> le nombre de caractères à renvoyer. (cet argument est facultatif, s'il n'est pas présent on récupère tout depis la position de départ)
	

echo '<h1>Fonction utilisateur</h1>';
// non inscrite au langage, c'est le developpeur qui les déclare puis les exécute.

// déclaration d'une fonction
function separation()
{
	echo '<hr /><hr /><hr />';
}

// execution:
separation();	
	
	
// fonction avec 1 argument
function bonjour($qui)
{
	return "Bonjour " . $qui . '<br />';
}
// une return nous renvoie le resultat de cette fonction en revanche si l'on veut faire un affichage il faudra passer par un echo	
echo bonjour('Mathieu');	
$prenom = "Marie";
echo bonjour($prenom);

// fonction pour appliquer la tva
function applique_tva($nombre)
{
	return $nombre * 1.2;
}
echo applique_tva(1000) . '<br />';

// EXERCICE: refaire la fonction précédente en donnant la possibilité à l'utilisateur de choisir le taux. (que ce ne soit pas figé sur le taux 1.2)
	
function applique_tva_avec_taux($nombre, $taux)
{
	return $nombre * $taux;
}	
echo applique_tva_avec_taux(1000, 1.2) . '<br />';
echo applique_tva_avec_taux(1000, 5.6) . '<br />';
	
// avec l'argument $taux initialisé par defaut:
function applique_tva_avec_taux2($nombre, $taux = 1.2)
{
	return $nombre * $taux;
}	
echo applique_tva_avec_taux2(1000) . '<br />'; // avec un argument initialisé par défaut, il devient facultatif. Si je ne fournis qu'un seul argument, alors $taux a par défaut la valeur 1.2
echo applique_tva_avec_taux2(1000, 5.6) . '<br />';	
	
	
// environnement global & local
// global => le script complet
// local  => à l'intérieur d'une fonction

function jour_semaine()
{
	$jour = 'lundi';
	return $jour;
}
// echo $jour; // $jour n'est pas défini dans l'espace global => erreur
echo jour_semaine() . '<br />';

$jour2 = jour_semaine();
echo $jour2 . '<br />';

// global vers local:
$pays = 'France';

affichage_pays(); // il est possible d'exécuter une fonction avant sa déclaration car l'interpréteur php charge toutes les fonctions du script avant d'exécuter le script.

function affichage_pays()
{
	global $pays; // grace au mot clé global, il est possible de récupérer une variable depuis l'espace global sinon ce n'est pas possible car nous sommes dans un espace local (dans une fonction)
	echo 'Le pays est: ' . $pays . '<br />';
}	

// affichage météo
function affichage_meteo($saison, $temperature)
{
	return "Nous sommes en " . $saison . ' et il fait ' . $temperature . ' degré(s)<br />';
	echo 'nous sommes mardi<br />'; // cette instruction ne sera jamais exécutée car après un return.
	// le return dans une fonction nous fait sortir de la fonction !
}

echo affichage_meteo('été', 27);
echo affichage_meteo('hiver', -1);
echo affichage_meteo('printemps', 18);
echo '<hr /><hr /><hr />';
// refaire la fonction affichage_meteo en gérant le "en" qui doit être "au" pour le printemps et également, il faut gérer le (s) de degré(s)
function meteo($saison, $temperature)
{
	$en = 'en';
	$s = 's';
	
	if($saison == 'printemps')
	{
		$en = 'au';
	}
	
	if($temperature > -2 && $temperature < 2)
	{
		$s = "";
	}

	return "Nous sommes " . $en . " " . $saison . ' et il fait ' . $temperature . ' degré' . $s . '<br />'; 
}
echo meteo('printemps', 18);
echo meteo('été', 18);
echo meteo('hiver', -3);
echo meteo('printemps', 0);
echo meteo('hiver', 1);
echo meteo('hiver', -1);








echo '<h1>Structure itérative: les boucles</h1>';

$i = 0; // valeur de depart
while($i < 10) // condition d'entrée
{
	echo $i . ' - ';
	$i++; // incrémentation ou décrementation // équivaut à écrire $i = $i+1
}
// EXERCICE refaire une boucle similaire en enlevant le dernier - affiché après la valeur 9:
// 0 - 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9 - (actuel)
// 0 - 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9   (voulu)
echo '<br />';
$y = 0;
while($y < 10)
{
	if($y == 9)
	{
		echo $y;		
	}
	else {
		echo $y . ' - ';		
	}	
	$y++;
}
echo '<br />';
// boucle for
// for( valeur_de_depart; condition_dentree; incrementation)	
	
for($i = 0; $i < 10; $i++)	
{
	echo $i;
}

// afficher en utilisant while ou for un tableau html contenant 10 cellules
// exemple
?>
<table style="border-collapse: collapse; width: 100%;" border="1">
	<tr>
		<td>0</td>
		<td>1</td>
		<td>2</td>
		<td>3</td>
		<td>4</td>
		<td>5</td>
		<td>6</td>
		<td>7</td>
		<td>8</td>
		<td>9</td>
	</tr>
</table>
<hr />
<?php		
echo '<table style="border-collapse: collapse; width: 100%; text-align: center;" border="1"><tr>';

for($i = 0; $i < 10; $i++)
{
	echo '<td>' . $i . '</td>'; 
}

echo '</tr></table>';

echo '<hr /><hr />';
// pour aller plus loin faire un tableau allant de 0 à 99 avec 10 cellules x 10 lignes	
echo '<table style="border-collapse: collapse; width: 100%; text-align: center;" border="1">';
for($y = 0; $y < 10; $y++)
{
	echo '<tr>';
	for($i = 0; $i < 10; $i++)
	{
		echo '<td>' . (($y*10)+$i) . '</td>'; 
	}
	echo '</tr>';
}
echo '</table>';

echo '<hr /><hr />';
// pour aller plus loin faire un tableau allant de 0 à 99 avec 10 cellules x 10 lignes	
echo '<table style="border-collapse: collapse; width: 100%; text-align: center; color: red;" border="1">';
$xx = 0;
for($y = 0; $y < 10; $y++)
{
	echo '<tr>';
	for($i = 0; $i < 10; $i++)
	{
		echo '<td>' . $xx . '</td>';
		$xx++;
	}
	echo '</tr>';
}
echo '</table>';
	
echo '<hr /><hr />';
// pour aller plus loin faire un tableau allant de 0 à 99 avec 10 cellules x 10 lignes	
echo '<table style="border-collapse: collapse; width: 100%; text-align: center; color: green;" border="1">';
for($y = 0; $y < 10; $y++)
{
	echo '<tr>';
	for($i = 0; $i < 10; $i++)
	{
		echo '<td>' . $y . $i . '</td>';
	}
	echo '</tr>';
}
echo '</table>';




echo '<h1>Inclusion de fichier</h1>';	
// créez un fichier dans le même dossier que celui-ci: exemple.inc.php
// dans ce fichier mettez du texte. (lorem ipsum, html, ...)
	
echo '<b>Première fois avec include:</b><br />';
include("exemple.inc.php");

echo '<hr /><b>deuxième fois avec include_once:</b><br />';
include_once("exemple.inc.php");
	
echo '<hr /><b>Première fois avec require:</b><br />';
require("exemple.inc.php");	
	
echo '<hr /><b>deuxième fois avec require_once:</b><br />';
require_once("exemple.inc.php");

/*
Différences entre include et require:
En cas d'erreur comme par exemple une faute de frappe sur le nom du fichier ou le fichier a été déplacé, etc ...
- Include provoque une erreur MAIS continu l'exécution du script
- Require provoque une erreur ET bloque l'exécution la suite du script.
*/	

echo '<h1>Les tableaux ARRAY</h1>';
// un tableau array est  déclaré un peu comme une variable sauf qu'au lieu de ne conserver qu'une seule et unique valeur, dans un tableau nous allons avoir un ensemble de valeur.

// déclaration d'un tableau
$tableau = array("lundi", "mardi", "mercredi", 'jeudi', 'vendredi', 'samedi', 'dimanche');
	
// outils pour pouvoir voir le contenu du tableau:
echo '<b>Affichage du tableau avec print_r:</b><br />';
echo '<pre>'; print_r($tableau); echo '</pre>';	

echo '<b>Affichage du tableau avec var_dump:</b><br />';
echo '<pre>'; var_dump($tableau); echo '</pre>';	
	
// autre façon de déclarer un tableau array

$tab[] = "France";	
$tab[] = "Italie";	
$tab[] = "Espagne";	
$tab[] = "Angleterre";	
$tab[] = "Portugal";	
$tab[] = "Belgique";	
$tab[] = "Hollande";	
	
	
// exercice: afficher le contenu du tableau avec un print_r ou un var_dump puis essayer de sortir la valeur "Espagne" avec un echo en passant par le tableau.	
echo '<pre>'; var_dump($tab); echo '</pre>';
echo $tab[2] . '<br />'; // pour extraire un élément du tableau array, on appelle l'indice correspondant.
// dans le doute faire un var_dump ou print_r pour vérification.
echo '<hr />';
// Boucle foreach pour les tableaux de données ARRAY ou Object
foreach($tab AS $valeur)
{
	// foreach est un outil pour faire une boucle spécifique aux tableaux array & object.
	// cette boucle est dynamique et tournera autant de fois qu'il y a d'éléments dans notre tableau ou objet
	// Le mot clé AS est obligatoire et permet de donner un alias via une variable qui représentera à chaque tour de boucle la valeur en cours.
	echo $valeur . '<br />';
}
	
echo '<hr />';
// pour récupérer également l'indice en cours, il nous suffit de rajouter une variable de réception après le mot clé AS:
foreach($tab as $ind => $val)
{
	echo $ind . ' - ' . $val . '<br />';
}	
	
// il est possible de choisir nous même les indices
$plats = array( 'un' => 'Pâtes', 'deux' => 'Crepes', 'trois' => 'Salade de fruits', 77 => 'Eau');	
echo '<pre>'; var_dump($plats); echo '</pre>';	
$couleur = array();	
// $couleur = "";
$couleur['j'] = 'jaune';	
$couleur['b'] = 'bleu';	
$couleur['bl'] = 'blanc';	
$couleur['r'] = 'rouge';	
$couleur['v'] = 'vert';	
$couleur['p'] = 'pourpre';
echo '<pre>'; var_dump($couleur); echo '</pre>';	
echo $couleur['b'] . '<br />';	
	
	
// Pour connaitre la taille d'un tableau (combien d'éléments dans le tableau array)
echo 'Taille du tableau couleur: ' . count($couleur) . '<br />';
echo 'Taille du tableau couleur: ' . sizeof($couleur) . '<br />';
	
echo '<h1>Tableau array multidimensionnel</h1>';
// nous parlons de tableaux array multidimensionnel lorsqu'un tableau est lui même contenu dans un autre tableau.

$tableau_etudiants = array( 0 => array('pseudo' => 'Marie', 'Nom' => 'Durand', 'email' => 'marie@email.fr'), 1 => array('pseudo' => 'Luc', 'Nom' => 'Dupond', 'email' => 'luc@email.fr'), 2 => array('pseudo' => 'jean', 'Nom' => 'Soleil', 'email' => 'jean@email.fr') );	

$tableau_etudiants = array( 
						0 => array(
							'pseudo' => 'Marie', 
							'Nom' => 'Durand', 
							'email' => 'marie@email.fr'), 
						1 => array(
							'pseudo' => 'Luc', 
							'Nom' => 'Dupond', 
							'email' => 'luc@email.fr'), 
						2 => array(
							'pseudo' => 'jean', 
							'Nom' => 'Soleil', 
							'email' => 'jean@email.fr') 
						);	
						
echo '<pre>'; print_r($tableau_etudiants); echo '</pre>';
	
echo $tableau_etudiants[1]['email'] . '<hr />'; // nous rentrons d'abords à l'indice 1 du premier niveau puis à l'indice 'email' du deuxième niveau	

$taille_tableau = count($tableau_etudiants);
for($i = 0; $i < $taille_tableau; $i++)	
{
	// afficher les emails du deuxième niveau de ce tableau
	echo $tableau_etudiants[$i]['email'] . '<br />';
}
echo '<hr />';
// avec un foreach	
foreach($tableau_etudiants AS $valeur)
{
	echo $valeur['email'] . '<br />';
}
echo '<hr />';	
// double foreach
foreach($tableau_etudiants AS $valeur)
{
	foreach($valeur as $val)
	{
		echo $val . '<br />';
	}
	echo '<hr />';
}	
	
	
echo '<h1>Les Objets</h1>';
// un objet est un autre type de données. Un peu à la manière d'un array, il permet de conserver des valeurs mais cela va plus loin puisqu'on peut également avoir des fonctions dans un objet.	 
// une information dans un objet s'appelle une propriété ou attribut
// une fonction dans un objet s'appelle une methode
	
//un objet est toujours issu d'une classe (son modèle de construction)

// pour déclarer une classe
class Etudiant
{
	public $prenom = 'Marie';
	// public est un mot clé permettant de préciser que l'élément sera accessible directement sur l'objet. Sinon il faudrait passer par des methodes permettant de récupérer cette propriété ou de la modifier. (il existe aussi protected / private / static)
	public $age = 25;
	public function pays()
	{
		return 'France';
	}
}	
// un objet est un conteneur symbolique, qui possède sa propre existence et incorpore des informations (propriétés) et des fonctions (methodes)
	
// Pour instancier un objet:
$mon_objet_1 = new Etudiant(); // new est un mot clé obligatoire permettant d'instancier un objet depuis une classe	
$mon_objet_2 = new Etudiant(); 
echo '<pre>'; var_dump($mon_objet_1); echo '</pre>';
echo '<pre>'; var_dump($mon_objet_2); echo '</pre>';
	
// pour voir les methodes de l'objet
echo '<pre>'; var_dump(get_class_methods($mon_objet_1)); echo '</pre>';	
	
// pour récupérer une propriété de l'objet
echo $mon_objet_1->prenom . '<br />';	
	
// pour récupérer une methode de l'objet
echo $mon_objet_1->pays() . '<br />';	
	
// modification d'une propriété	
$mon_objet_1->prenom = "Pierre";	
echo $mon_objet_1->prenom . '<br />';	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	







echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
echo '<br />';
