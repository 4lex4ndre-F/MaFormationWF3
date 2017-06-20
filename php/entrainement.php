<style>
* { font-family: calibri; }
h1 { padding: 10px; color: #fff; background-color: darkslategray; }
</style>
<h1>Ecriture et affichage</h1>
<!-- Tout d'abord, il est possible d'écrire du html dans un fichier php .php, en revanche l'inverse n'est pas possible -->
<?php // balise php ouverture et fermeture ?>
<?php
// Instruction d'affichage
// Variable: types / déclaration / affectaton
// Concaténation
// Guillemets et quotes
// Constante
// Condition et opérateurs de comparaison
// Fonction prédéfinie
// Fonction utilisateur
// Boucle
// Inclusion
// Array
// Classes et objet

echo 'Bonjour'; // echo est une instruction permettant d'effectuer un affichage.
echo '<br>'; // il est possible de mettre du html.
echo 'Bienvenue<br>'; // Si vous regardez le code source, il n'est pas possible de voir le code php car il est déjà interprété depuis le serveur.
print 'Print est une autre instruction d\'affichage similaire à echo<br>';

// Les commentaires en PHP
// Ceci est un commentaire sur une seule ligne
# Ceci est un commentaire sur une seule ligne
/*
Ceci est un commentaire sur
plusieurs
lignes
*/
// Autres instructions d'affichage mais spécifiques aux phases de développement : print r() & var_dump()

echo '<h1>Variables : types / déclaration / affectation </h1>';
// Définition : Une variable est un espace nommé permettant de conserver une valeur.

// Déclaration d'une variable avec le signe $ // Une variable est sensible à la casse
// Caractères autorisés: de a à z, de 0 à 9 et le _ // /!\ Une variable ne peut pas commencer par un chiffre.

// Affectation d'une valeur avec le signe =
$a = 127;
echo gettype($a); // integer
echo '<br>';

$b = 1.5;
echo gettype($b); // double (décimale)
echo '<br>';

$a = 'Une chaine';
echo gettype($a); // string
echo '<br>';

$b = '127';
echo gettype($b); // string
echo '<br>';

$a = true; // ou TRUE // ou l'inverse false / FALSE
echo gettype($a); // bool
echo '<br>';

echo '<h1>Concaténation</h1>';
//En PHP, nous utiliserons le . pour la concaténation qu'on peut traduier par "suivi de".
$x = "Bonjour";
$y = "tout le monde";
echo $x . ' ' . $y . '<br>';

echo "<br>", 'Coucou', "<br>"; // Il est possible de faire la concaténation avec une , en revanche uniquement avec echo. (erreur avec print)

echo '<h1>Concaténation lors de l\'affectation</h1>';
$prenom1 = "Bruno ";
$prenom1 = "Claire";

echo $prenom1 . '<br>'; // affiche Claire

$prenom2 = "Bruno ";
$prenom2 .= "Claire"; // équivalent à écrire $prenom2 = $prenom2 . 'Claire';
// Le .= permet de rajouter à l'existant sans l'écraser.
echo $prenom2 . '<br>';

echo '<h1>Guillemets & Quotes</h1>';

$message = "Aujourd'hui";
// ou
$message = 'Aujourd\'hui';

// Concaténation
echo $message . ' il fait chaud<br>';
echo "$message il fait chaud<br>"; // Dans des guillemets, les variables sont reconnues et donc interprétées.
echo '$message il fait chaud<br>';  // Dans des quotes, les variables ne sont pas reconnues et interprétées comme du texte.

echo "<h1>Les constantes et constantes magiques</h1>";
// Une constante est un peu comme une variable un espace nommé nous permettant de conserver une valeur sauf que comme son nom l'indique, cette valeur ne pourra pas changer durant l'exécution du script.
define("CAPITALE", "Paris"); // 1er argument: le nom de la variable / 2e argument: sa valeur.
// Par convention, une constante s'écrit toujours en majuscules.
echo CAPITALE . '<br>';

// Constante magique
echo __FILE__ . '<br>'; // Affiche le chemin complet jusqu'à ce fichier.
echo __LINE__ . '<br>'; // Affiche le numéro de la ligne.

echo '<h1>Exercice sur les variables</h1>';
// Mettre les valeurs "lundi" "mardi" et "mercredi" dans 3 variables.
// Afficher "lundi - mardi  - mercredi" en apppelant les variables.
$lu = "lundi";
$ma = "mardi";
$me = "mercredi";
$sep = " - ";

echo $lu . ' - ' . $ma . ' - ' . $me . '<br>';
echo $lu . $sep . $ma . $sep . $me . '<br>';
echo "$lu - $ma - $me";

echo '<h1>Opérateurs arithmétiques</h1>';
$a = 10; $b = 2;
echo $a + $b . '<br>'; // affiche 12
echo $a - $b . '<br>'; // affiche 8
echo $a * $b . '<br>'; // affiche 20
echo $a / $b . '<br>'; // affiche 5
echo $a % $b . '<br>'; // modulo => affiche 0 (le reste de la division)

// Facilité d'écriture:
echo $a += $b . '<br>'; // équivaut à $a = $a + $b
// $a -= $b;
// $a *= $b;
// $a -/ $b;

echo '<h1>Structures conditionnelles (if / elseif / else) et opérateurs de comparaison</h1>';
// isset - empty

// isset teste si l'élement existe (s'il a été dééclaré au préalable dans notre script par exemple)
// empty teste si l'élément est vide (à savoir , empty vérifie au préalable si l'élément est défini avant de tester s'il est vide)

$var1 = 0; // ou $var1 = ''; $var1 = false;

if(empty($var1))
{
    echo 'La variable var1 est vide ou non définie<br>';
}


$var2 = "";
if(isset($var2))
{
    echo "La variable var2 existe ! <br>";
}

if(isset($test)) echo $test;

if(isset($test)) :
echo $test;
endif;

// Opérateurs de comparaison
$a = 10; $b = 5; $c = 2;

if ($a > $b) // si "a" est strictemment supérieur à "b"
{
    print "'a' est bien supérieur à b<br>";
}
else { // sinon => Toutes les autres possibilités
    print "'a' n'   est pas supérieur à 'b'<br>";
}

// ET
if($a > $b && $b > $c) // Si "a" est supérieur à "b" ET DANS E MEME TEMPS, si "b" est supérieur à "c", && ou AND
{
    echo 'Ok pour les deux conditions<br>';
}

// OU
if($a == 9 || $b > $c) // Si "a" est égal à 9, OU si "b" est supérieur à "c"
{
    echo 'Ok pour au moins une des deux conditions<br>';
}

// XOR
if($a == 10 XOR $b < $c) // avec XOR on ne rentre dans la condition que si l'une des deux conditions est vraie. Si les conditions sont vraies, on ne rentre pas
{
    echo 'Ok pour une seule des conditions (condition exclusive)<br>';
}
// Avec XOR:
// true XOR true => false
// false XOR false => false
// true XOR false => true
// false XOR true => true 

// if(var) = if(var == true);

if($a == 8)
{
    print 'réponse 1<br>';
}
elseif($a != 10)
{
    print 'réponse2<br>';
}
else {
    echo 'réponse 3<br>';
}

$a1 = 1;
$a2 = "1";

if($a1 == $a2)
{
    echo 'C\'est la même chose<br>';
}
/*
    =       Affectation
    ==      Comparaison des valeurs
    ===     Comparaison des valeurs et du type
    !=      différent de (en terme de valeur)
    !==     différent de (en terme de valeur ou de type)
    >       strictement supérieur
    <       strictement inférieur
    >=      supérieur ou égal
    <=      inférieur ou égal
*/

// Forme contractée des if: autre écriture (méthode ternaire)
echo ($a == 10) ? 'forme contractée' : 'else en forme contractée<br>';
// Le ? représente le if
// Les : représentent le else

echo '<h1>Conditions switch</h1>';
// Les cases représentent des cas différents dans lesquels nous pouvons potentiellement rentrer.
$couleur = "jaune";
switch($couleur)
{
    case 'bleu': 
        echo 'Vous aimez le bleu<br>';
    break;
    case 'rouge':
        echo 'Vous aimez le rouge<br>';
    break;
    case 'vert';
        echo 'Vous aimez le vert<br>';
    break;
    default: // toutes les autres possibilités
        echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert<br>';
    break;
}

// EXERCICE : refaire la condition précédente avec if / elseif / else

if($couleur == "bleu")
{
    echo 'Vous aimez le bleu';
}
elseif($couleur == "rouge")
{
    echo 'Vous aimez le rouge';
}
elseif($couleur == "vert")
{
    echo 'Vous aimez le vert';
}
else
{
    echo 'Vous aimez le jaune';
}

echo '<h1>Fonction prédéfinie</h1>';
// Une fontion prédéfinie est déjà inscrite dans le langage, le développeur ne fait que l'exécuter.
echo 'Date du jour:<br>';
echo date("d/m/Y H:i:s");
// date est une fonction prédéfinie permettant d'afficher la date
// en argument, cette fonction accepte une chaine de caractères
// selon les caractères fournis, cette fonnction renvoie différents formats de date.
// Voir la doc pour les formats disponibles : http://php.net/manual/fr/function.date.php

// string date ( string $format [, int $timestamp = time() ] )
// - string date : format de la réponse (type)
// - string $format : arguments qu'on peut passer à la fonction et leur format
// - [] : argument facultatif ; = time () : valeur par défaut
//Toujours se demander les arguments à fournir, et la réponse attendue

echo '<hr>' . time() . '<hr>'; // time() nous affiche le timestamp (nb de secondes s écoulées depuis le 1er janvier 1970)

// Traitement des chaines de caractères (iconv_strlen() / strpos() / substr())
$email = 'luront@gmail.com';
echo strpos($email, '@') . '<br>';
// strpos permet de chercher dans une chaine de caractères (fournie en 1er argument) une autre chaine (fournie en 2e argument) 
// /!\ Dans une chaine, le 1er caractère a la position 0

// Valeur de retour
    // Succes   => on obtient un int (la position)
    // Echec    => booleen false

$email2 = "gmkquebgkbeqqgbm";
echo strpos($email2, '@') . '<br>';
var_dump(strpos($email2, '@')); // var_dump() est une instruction d'affichage améliorée nous affichant la valeur de ce qu'on teste + son type, ainsi que sa longueur si le type est string.
// Ici var-dump() nous permet de voir le false obtenu via la fonction strpos().

// iconv_strlen
$phrase = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo aperiam nam, tenetur ad quis repellat. Id, repellendus? Non minima, deserunt maxime, dolores delectus amet mollitia eveniet repellendus, impedit fugit veniam.";
echo '<br>';
echo iconv_strlen($phrase) .'<br>';
// iconv_strlen permet de compter le nombre de caractères dans une chaine
// Succes => int (la longueur de la chaine)

// substr
$texte = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident quod fuga illum, libero animi error dolores aliquid pariatur eius dolorem quam fugiat rem labore ab cum ex, reprehenderit dignissimos. Fuga quod totam quis doloremque nam quasi ipsum, sit voluptas facere autem eum, aliquid, ex assumenda impedit saepe. Nesciunt libero, veniam odio beatae vitae, quos voluptatum quod doloremque blanditiis, saepe illo porro ab perspiciatis autem quasi iusto harum cum ducimus nihil voluptas ut culpa. Maxime, doloribus.";

echo substr($texte, 0, 50) . " ... <a href='#'>Lire la suite</a>";
// substr:
    // substr permet de découper une chaine
        // 1er argument => la chaine à découper
        // 2e argument  => la positio de départ
        // 3e argument  => le nombre de caractères à renvoyer. (cet argument est facultatif, s'il n'est pas présent on récupère tout depuis la position de départ)

echo '<h1>Fonction utilisateur</h1>';
// Non inscrite au langage, c'est le développeur qui les déclare puis les exécute.

function separation()
{
    echo '<hr><hr><hr>';
}

// Execution:
separation();

// Fonction avec un argument
function bonjour($qui)
{
    return "Bonjour " . $qui . "<br>";
}
// Un return nous renvoie le résultat de cette fonction en revanche si on veut faire un affichage il faudra passer par un echo
echo bonjour('Tristan');
$prenom = "Marie";
echo bonjour($prenom);

//Fonction pour appliquer la TVA
function applique_tva($nombre)
{
    return $nombre * 1.2;
}
echo applique_tva(1000).'<br>';

// EXERCICE: Refaire la fonction précédente en donnant la possibilité à l'utilisateur de choisir le taux. (Qu'il ne soit pas figé à 1.2)
function applique_tva_avec_taux($nombre, $taux)
{
    return $nombre * $taux;
}
echo applique_tva_avec_taux(1000, 1.2).'<br>';
echo applique_tva_avec_taux(1000, 5.6).'<br>';

// Avec l'argument $taux initialisé par défaut:
function applique_tva_avec_taux2($nombre, $taux = 1.2)
{
    return $nombre * $taux;
}
echo applique_tva_avec_taux2(1000) . '<br>'; // Avec un argument initialisé par défaut, il devient facultatif. Si je ne fournis qu'un seul argument, alors $taux a par défaut la valeur 1.2
echo applique_tva_avec_taux2(1000, 5.6) . '<br>';

// Environnements global & local
// global   => le script complet
// local    => à l'intérieur d'une fonction

function jour_semaine()
{
    $jour = "lundi";
    return $jour;
}
// echo $jour; // $jour n'es pas définie dans l'espce global
echo jour_semaine() . '<br>';

$jour2 = jour_semaine();
echo $jour2 . '<br>';

// global vers local
$pays = 'France';

affichage_pays(); // Il est possible d'exécuter une fonction avant sa déclaration car l'interpéteur PHP charge toutes les fonctions du script avant d'exécuter le script.

function affichage_pays() 
{
    global $pays; // Grâce au mot-clé global, il est possible de récupérer une variable depuis l'espace global, sinon ce n'est pas possible car nous sommes dans un espace local (dans une fonction)
    echo 'le pays est : ' . $pays . '<br>';
}

echo '<h1>Structure itérative : les boucles</h1>';

// Boucle WHILE

$i = 0; // valeur de départ
while($i < 10) // Condition d'entrée
{
    echo $i . ' - ';
    $i++; // Incrémentation ou décrémentation // équivaut à écrire $i = $i + 1
}

echo '<br>';

// EXERCICE - Refaire une boucle similaire en enlevant le dernier - affiché après la valeur 9

$i = 0;
while($i < 10) 
{
    if($i <= 8)
    {
        echo $i . ' - ';
    }
    else
    {
        echo $i;
    }
    $i++;

}
echo '<br>';

// Boucle FOR
// for(valeur_de_depart; condition_dentree; incrementation)

for($i = 0 ; $i < 10 ; $i++)
{
    echo $i;
}

// Afficher en utilisant une boucle while ou for un tableau html contenant 10 cellules
// exemple
?>
<table style="border-collapse: collapse;" border=1>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
        <td>9</td>
        <td>10</td>
    </tr>
</table>

<?php
echo '<br>';

echo "<table style='border-collapse: collapse;' border=1><tr>";
for($i = 0; $i < 10; $i++)
{
    echo "<td>" . "$i" . "</td>";
}
echo "</tr></table>";

// Pour aller plus loin, faire un tableau allant de 0 à 99 avec 10 cellules x 10 lignes
echo '<hr />';
echo '<hr />';

echo "<table style='border-collapse: collapse;' border=1><tr>";
for($i = 0; $i < 100; $i++)
{
    if($i%10==0 && $i != 0)
    {
        echo "</tr><tr>";
    }
    echo "<td>$i</td>";
}
echo "</tr></table>";

/*---------------------------------------------------------------------------------------------------------------------------------
 Mardi 20 juin 2017
---------------------------------------------------------------------------------------------------------------------------------*/

// correction Mathieu
echo "<table style='border-collapse: collapse;' border='1'; width: 100%; text-align: center; color: red;'>";
for($i = 0; $i < 10; $i++)
{
    echo '<tr>';
    for($y = 0; $y < 10; $y++)
    {
        echo '<td>' . $i . $y . '</td>;'; // Affiche toujours 2 chiffres, même pour '00'
    }
    echo '</tr>';
}
echo '</table>';


// affichage météo
function affichage_meteo($saison, $temperature)
{
    return "Nous sommes en " . $saison . ' et il fait ' . $temperature . ' degré(s)<br/>';
    'nous sommes mardi<br />'; // instruction ne sera pas executée car après return
    // le return dans une fonction nous fait sortir de la fonction !
}

//echo affichage_meteo('été', 27);
//echo affichage_meteo('hiver', -1);
//echo affichage_meteo('printemps', 17);


// - rrefaire cette fonction avec au printemps et sans le 's' à degré
function meteo($saison, $temperature)
{
    if($temperature < -1 || $temperature > 1) // degrés
    {
        if($saison == 'printemps')
        {
            return "Nous sommes au " . $saison . " et il fait " . $temperature . " degrés<br />";
        } else 
        {
            return "Nous sommes en " . $saison . " et il fait " . $temperature . " degrés<br/>";
        }
    } elseif($saison !== 'printemps')
    {
        return "Nous sommes en " . $saison . " et il fait " . $temperature . " degré<br/>";
    } else
    {
        return "Nous sommes au " . $saison . " et il fait " . $temperature . " degré<br/>";
    }
}
echo "<br /><h3>fonction meteo</h3>";
echo meteo('été', 30);
echo meteo('printemps', 20);
echo meteo('hiver', -1);
echo meteo('printemps', 1);
echo meteo('automne', 5);

// - correction Mathieu
function meteo2($saison, $temperature)
{
    $en = 'en';
    $s = 's';

    // les éléments à adapter à la saison et aux températures sont le 'en/au' et 'degré/degrés'
    if($saison == 'printemps')
    {
        $en = 'au';
    }

    if($temperature >-2 && $temperature < 2)
    {
        $s = '';
    }

    return "Nous sommes " . $en . " " . $saison . ' et il fait ' . $temperature . ' degré' . $s . '<br />';
}
echo "<br /><h3>fonction meteo2</h3>";
echo meteo2('printemps', '0');
echo meteo2('été', '25');



/*---------------------------------------
           -- LES INCLUSIONS  --
---------------------------------------*/
echo '<h1>Inclusion de fichier</h1>';
// créer un fichier dans le même dossier que celui-ci : exemple.inc.php
// dans ce fichier, mettere du texte. (lorem ipsum, html,...)

echo '<b>Première fois avec include:</b><br />';
include("exemple.inc.php");

echo '<hr /><b>Deuxième fois avec include_once:</b><br />';
include_once("exemple.inc.php"); // n'affiche pas le contenu car il est déjà présent

echo '<hr /><b>Première fois avec require:</b><br />';
require("exemple.inc.php");

echo '<hr /><b>Deuxième fois avec require_once:</b><br />';
require_once("exemple.inc.php");


/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
|Différences entre include et require : 
|En cas d'erreur comme par exemple une faute de frappe sur le nom du fichier ou le fichier a été déplacé, etc.$_COOKIE
|-Include provoque une erreur MAIS continu l'exécution du script
|- Require provoque une erreur ET bloque l'exécution de la suite du script.
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/


/*---------------------------------------
           -- LES TABLEAUX  --
---------------------------------------*/
echo '<h1>Les tableaux ARRAY</h1>';
// un tableaux array est déclaré un peu comme une variable sauf qu'au lieu de ne conserver qu'une seule et unique valeur, dans un tableau nous allons avoir un ensemble de valeur.

// Déclaration d'un tableau
$tableau = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");

// outils pour pouvoir voir le contenu du tableau :
echo '<b>Affichage du tableau avec print_r:</b><br />';
echo '<pre>'; print_r($tableau); echo '</pre>';

echo '<b>Affichage du tableau avec var_dump:</b><br />';
echo '<pre>'; var_dump($tableau); echo '</pre>';

// autre façon de déclarer un tablleau ARRAY
$tab = array(); // pas obligatoire
$tab[] = "France";
$tab[] = "Italie";
$tab[] = "Espagne";
$tab[] = "Angleterre";
$tab[] = "Portugal";
$tab[] = "Belgique";
$tab[] = "Hollande";

// Affichage du tableau
echo '<b>affichage</b><br/>';
echo '<pre>'; var_dump($tab); echo '</pre>';

// Affichage de la valeur Espagne
echo $tab[2]; // pour extraire un élément du tableau array, on appelle l'indice correspondant.
// dans le doute faire un var_dump ou print_r pour vérification.$_COOKIE

// Boucle foreach pour les tableaux de données ARRAY ou OBJECT
echo '<hr />';
foreach($tab AS $valeur)
{
    // foreach est un outil pour faire une boucle spécifique aux tableaux array et object.
    // cette boucle est dynamique et trournera autant de fois qu'il y a d'éléments dans notre tableau ou objet.
    // Le mot-clé AS est obligatoire et permet de donner un alias via une variable qui représentera à chaque tour de boucle la valeur en cours.
    echo $valeur . '<br />';
}

echo '<hr />';
// pour récupérer également l'indice en cours, il nous suffit de rajouter une variable de réception après le mot-clé AS:
foreach($tab as $ind => $val)
{
    echo $ind . ' - ' . $val . '<br />';
}

// il est possible de choisir nous même les indices
$plats = array( 'un' => 'pâtes', 'deux' => 'Crepes', 'trois' => 'Salade de fruits', 77 => 'Eau');
echo '<pre>'; echo var_dump($plats); echo '</pre>';
$couleur = array();
$couleur['j'] = 'jaune';
$couleur['b'] = 'bleu';
$couleur['bl'] = 'blanc';
$couleur['r'] = 'rouge';
$couleur['v'] = 'vert';
$couleur['p'] = 'pourpre';
echo '<pre>'; var_dump($couleur); echo '</pre>';
echo $couleur['b'] . '<br />';















?>

<!-- echo '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>'; -->