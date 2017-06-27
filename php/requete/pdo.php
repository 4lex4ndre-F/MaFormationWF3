<?php
/*-------------------------------------------------------------------------------------------------

                     -------------------- PDO --------------------

                                   connexion php à BDD

    PDO = Php Data Object

    PHP = Php Hypertext Preprocessor (boucle infinie 'oo)

-------------------------------------------------------------------------------------------------

// EXEC()
    INSERT, UPDATE, DELETE : Exec() est une methode de l'objet pdo qui est utilisée pour la formulation de requête ne retournant pas de résultat.
    Valeur de retour:
    -----------------
    succes => on obtient un entier (int) correspondant au nombre de lignes affectées.
    echec (erreur de syntaxe) => on obtient le booléen false.

// QUERY()
    INSERT, UPDATE, DELETE, SELECT, SHOW, etc. : Query() est utilisé pour tout type de requête.
    Valeur de retour:
    -----------------
    succes => on obtient un nouvel objet issu de la class PDOStatement.
    echec => on obtient le booléen false.  

// PREPARE() + EXECUTE()
    INSERT, UPDATE, DELETE, SELECT, SHOW, etc. : Prepare() permet de préparer la requête mais ne l'exécute pas. Execute() éxécute la requête.
    Valeur de retour:
    -----------------
    prepare() => on obtient systématiquement un nouvel objet issu de la class PDOStatement
    execute()
        succès => PDOStatement
        échec => false

    // Les requêtes préparées sont à préconiser pour sécuriser les données.
    // Cela permet également d'éviter le cycle complet d'une requête:
        analyse / interprétation / exécution

-------------------------------------------------------------------------------------------------*/

// 1. connexion à une BDD
$pdo = new PDO('mysql:host=localhost;dbname=wf3_entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
// arguments: 1 - (serveur+nombdd) // dbname peut être vide
// arguments: 2 - identifiant
// arguments: 3 - mot de passe
// arguments: 4 - options
//echo '<pre>'; var_dump($pdo); echo '</pre>'; // ne montre que les propriétés publiques
//echo '<pre>'; var_dump(get_class_methods($pdo)); echo '</pre>'; // get_class_methods sert à voir les méthodes disponibles pour un objet

// 2. PDO: exec()
// insert
// $resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, salaire, date_embauche) VALUES('Luke', 'SKYWALKER', 'm', 'informatique', 2000, '2107-06-22')"); // variable de réception de la réponse
// echo "nombre de lignes insérées par la dernière requete: " . $resultat . '<br />';

// 3. PDO:: QUERY => SELECT + FETCH (pour un seul résultat) - pas sécurisé
$resultat = $pdo->query("SELECT * FROM employes WHERE id_employes=350");
echo '<pre>'; var_dump($resultat); echo '</pre>';
// echo '<pre>'; var_dump(get_class_methods($resultat)); echo '</pre>';

// $résultat est inexploitable tel quel en php ; nous devons le traiter avec la methode FETCH afin de rendre les informations exploitables sous-forme d'array.

$info_employe = $resultat->fetch(PDO::FETCH_ASSOC); // FETCH_ASSOC pour un tabelau array associatif (cad le noms des colonnes commes indices du tableau)
// $info_employe = $resultat->fetch(PDO::FETCH_NUM); // tableau array avec valeurs numeriques
// $info_employe = $resultat->fetch(); //ou $info_employe = $resultat->fetch(PDO::FETCH_BOTH); // c'est le mode par défaut // FETCH_BOTH est un mélange de FETCH_ASSOC + FETCH_NUM
// $info_employe = $resultat->fetch(PDO::FETCH_OBJ); // FETCH_OBJ pour obtenir un objet avec les éléments disponibles en propriétés publiques.

echo '<pre>'; print_r($info_employe); echo '</pre>';

echo $info_employe['prenom'] . '<hr />'; // avec FETCH_ASSOC
// echo $info_employe[1] . '<hr />'; // avec FETCH_NUM
// echo $info_employe->prenom . '<hr />'; // avec FETCH_OBJ

/*--------------------------------------------- Remarques -----------------------------------------------------------------------------
- $pdo représente un objet[1] issue de la classe prédéfinie PDO
- Quand on éxécute une requete de sélection avec la methode query sur notre objet $pdo:
- On obtient un nouvel objet[2] issu de la classe PDOStatement. Cet objet a donc des propriétés et méthodes différentes.

- $résultat représente la réponse de la BDD et c'est un résulat inexploitable en l'état.
- $info_employe est la réponse à exploitable (grace au fetch())
- /!\ attention, il faut choisir l'un des traitements fetch(PDO::...)
- Il n'est pas possible d'appliquer plusieurs traitement fetch sur un même résultat.

- Le résultat est la réponse de la BDD et est inexploitable car Mysql nous renvoie beaucoup d'informations. Le fetch() permet des les organiser.
--------------------------------------------------------------------------------------------------------------------------------------*/


// 4. PDO: QUERY + WHILE + FETCH (plusieurs résultats)
$resultat = $pdo->query("SELECT * FROM employes");

echo "Le nombre d'employés: " . $resultat->rowCount() . '<br />'; // la méthode rowCount() de l'objet PDOStatement retourne le nombre de ligne dans notre résultat.

while($info_employe = $resultat->fetch(PDO::FETCH_ASSOC)) // le WHILE parcours tout l'objet PDOStatement
{
    // à chaque tour de boucle while, on traite avec un fetch la ligne en cours et on passe à la suivante.
    // echo '<pre>'; print_r($info_employe); echo'</pre>'; echo '<hr />';
    echo '<div style="box-sizing: border-box; padding: 10px; background-color: darkred; color: white; display: inline-block; width: 23%; margin: 1%;">';

        echo 'Id_employes: ' . $info_employe['id_employes'] . '<br />';
        echo 'Nom: ' . $info_employe['nom'] . '<br />';
        echo 'Prénom: ' . $info_employe['prenom'] . '<br />';
        echo 'Salaire: ' . $info_employe['salaire'] . '<br />';
        echo 'Sexe: ' . $info_employe['sexe'] . '<br />';
        echo 'Service: ' . $info_employe['service'] . '<br />';
        echo 'Date d\'embauche: ' . $info_employe['date_embauche'] . '<br />';

    echo '</div>';
}

// 5. EXERCICE:
// récupérer la liste des BDD présentes sur le serveur.
// les traiter puis les afficher dans une liste ul li
// Attention à l'indice si vous utiliser FETCH_ASSOC (les indices sont sensibles à la casse) Sur cette requete il y a une majuscule dans l'indice récupérer.

$resultat = $pdo->query("SHOW DATABASES");
//echo '<pre>'; print_r($resultat); echo '</pre>';
//$resultat->rowCount(); pour vérifier le nombre de lignes
echo '<ul>';
while($bdd = $resultat->fetch(PDO::FETCH_ASSOC))
{
    //echo '<pre>'; print_r($bdd); echo '</pre>'; pour controler les résultats à chaque tour de boucle
    echo '<li>' . $bdd['Database'] . '</li>';
}
echo '</ul>';

// -----------------------------------------------------------------------------
//    6. PDO: QUERY + FETCHALL + FETCH_ASSOC (plusieurs résultats)
// -----------------------------------------------------------------------------
echo '<hr />';
echo '<h1>6. PDO: QUERY + FETCHALL + FETCH_ASSOC (plusieurs résultats)</h1>';
$resultat = $pdo->query("SELECT * FROM employes");
// fetchAll() - transforme le résultat complet en array multidimensionnel
$liste_employes = $resultat->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($liste_employes); echo '</pre>';
// fetchAll( traite toutes les lignes dans notre résultat et on obtient un tableau array multidimensionnel
// )er niveau la ligne en cours, ème niveau les informations de la lignes.

foreach($liste_employes AS $valeur)
{
    echo $valeur['prenom'] . '<br />'; // affiche tous les prénoms de la table employes
}


// --------------------------------------------------------------------------------------------
//     7. PDO: QUERY + AFFICHAGE EN TABLEAU - boucle dynamique quelque soit la BDD / table
// --------------------------------------------------------------------------------------------
echo '<hr />';
echo '<h1>7. PDO: QUERY + AFFICHAGE EN TABLEAU</h1>';
// Afficher le résultat d'une requete sous forme de tableau html (typique back office)

$resultat = $pdo->query("SELECT * FROM employes");

// balise ouverture du tableau
echo '<table border="1" style="width: 80%; margin: 0 auto; border-collapse: collapse; text-align: center;">';
echo '<hr />';
    // première ligne du tableau pour le nom des colonnes
    echo '<tr>';
        // récupération du nombre de colonnes dans la requête:
        $nb_col = $resultat->columnCount();
        for($i = 0; $i < $nb_col; $i++)
        {
            //echo '<pre>'; print_r($resultat->getColumnMeta($i)); echo '</pre><hr />';
            $colonne = $resultat->getColumnMeta($i); // on récupère les informations de la colonne en cours afin ensuite de demander le name
            echo '<th style="padding: 10px;">' . $colonne['name'] . '</th>';
        }
    echo '</tr>';

    // suite des lignes
    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
    {
        echo '<tr>';
        
            foreach($ligne AS $info)
            {
                echo '<td style="padding: 10px;">' . $info . '</td>';
            }

        echo '</tr>';
    }
echo '</table>';



//-----------------------------------------------------------------------------------------------------------------------

//*********************************************** SECURISATION DES DONNEES **********************************************

//-----------------------------------------------------------------------------------------------------------------------


// --------------------------------------------------------------------------------------------
//      8. PDO: PREPARE + BINDPARAM + EXECUTE
// --------------------------------------------------------------------------------------------
echo '<hr />';
echo '<h1>8. PDO: PREPARE + BINPARAM + EXECUTE</h1>';

$nom = "Laborde";

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom"); // :nom est un marqueur nominatif

// nous pouvons maintenant fournir la valeur du marqueur :nom
$resultat->bindParam(":nom", $nom, PDO::PARAM_STR); // bindParam(nom_du_marqueur, valeur_du_marqueur, type_attendu)

$resultat->execute();
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($donnees); echo '</pre>';
// BINDPARAM n'accepte que des valeurs sous forme de variable !!!



// implode() & explode() - fonctions prédéfinies php
// implode() permet d'afficher tous les élémnets d'un tableau array séparées par un séparateur fourni en 1er argument
// explode() découpe une chaine de caractère selon un séparateur fourni en 1er argument et place chaque segment de cette chaîne dans un tableau array
// exemple:
echo implode('<br />', $donnees);

// --------------------------------------------------------------------------------------------
//      9. PDO: PREPARE + BINDVALUE + EXECUTE
// --------------------------------------------------------------------------------------------
echo '<hr />';
echo '<h1>9. PDO: PREPARE + BINDVALUE + EXECUTE</h1>';
$resultat = $pdo->prepare("SELECT * FROM employes WHERE id_employes = :id"); // :nom est un marqueur nominatif
$resultat->bindValue(":id", 350, PDO::PARAM_INT); // bindValue(nom_du_marqueur, valeur_du_marqueur, _type_attendu)
$resultat->execute();
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo '<pre>'; print_r($donnees); echo '</pre>';

// BINDVALUE accepte une variable ou la valeur directement pour le marqueur. (ce n'esst pas le cas de bindParam qui n'accepte qu'une variable)