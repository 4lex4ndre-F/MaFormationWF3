<?php
/*-------------------------------------------------------------------------------------------------

                     -------------------- PDO --------------------

    PDO = Php Data Object

    PHP = Php Hypertext Preprocessor (boucle infinie 'oo)

-------------------------------------------------------------------------------------------------

// EXEC()
    INSERT, UPDATE, DELETE : Exec() est une methode de l'objet pdo qui est utilisée pour la formulation de requête ne retournant pas de résultat.
    Valeur de retour:
    -----------------
    succes => on obtient un entier (int) correspondant au nombre de lignes affectées.
    echec (erreur de syntaxe) => on obtient le booléen false.

//QUERY()
    INSERT, UPDATE, DELETE, SELECT, SHOW, etc. : Query() est utilisé pour tout type de requête.
    Valeur de retour:
    -----------------
    succes => on obtient un nouvel objet issu de la class PDOStatement.
    echec => on obtient le booléen false.  

//PREPARE() + EXECUTE()
    INSERT, UPDATE, DELETE, SELECT, SHOW, etc. : Prepare() permet de préparer la requête mais ne l'exécute pas. Execute() éxécute la requête.
    Valeur de retour:
    -----------------
    prepare() => on obtient systématiquement un nouvel objet issu de la class PDOStatement
    execute()
        succès => PDOStatement
        échec => false

    // Les requêtes préparées sont à préconiser pour sécuriser les données.
    // Cela permet également d'éviter le cycle complete d'une requête:
        analyse / interprétation / exécution

-------------------------------------------------------------------------------------------------*/

// 1. connexion à une BDD
$pdo = new PDO('mysql:host=localhost;dbname=wf3_entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
// arguments: 1 - (serveur+nombdd)
// arguments: 2 - identifiant
// arguments: 3 - mot de passe
// arguments: 4 - options
//echo '<pre>'; var_dump($pdo); echo '</pre>';
//echo '<pre>'; var_dump(get_class_methods($pdo)); echo '</pre>'; // get_class_methods sert à voir les méthodes disponibles pour un objet

// 2. PDO: exec()
// inseret
// $resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, salaire, date_embauche) VALUES('Luke', 'SKYWALKER', 'm', 'informatique', 2000, '2107-06-22')"); // variable de réception de la réponse
// echo "nombre de lignes insérées par la dernière requete: " . $resultat . '<br />';

// 3. PDO:: QUERY => SELECT + FETCH (pour un seul résultat)
$resultat = $pdo->query("SELECT * FROM employes WHERE id_employes=350");
echo '<pre>'; var_dump($resultat); echo '</pre>';
// echo '<pre>'; var_dump(get_class_methods($resultat)); echo '</pre>';

// $résultat est inexploitable tel quel en php ; nous devons le traiter avec la methode FETCH afin de rendre les informations exploitables sous-forme d'array.

$info_employe = $resultat->fetch(PDO::FETCH_ASSOC); // FETCH_ASSOC pour un tabelau array associatif (cad le noms des colonnes commes indices du tableau)
// $info_employe = $resultat->fetch(PDO::FETCH_NUM);
// $info_employe = $resultat->fetch(); //ou $info_employe = $resultat->fetch(PDO::FETCH_BOTH); // c'est le mode par défaut // FETCH_BOTH est un mélange de FETCH_ASSOC + FETCH_NUM
// $info_employe = $resultat->fetch(PDO::FETCH_OBJ); // FETCH_OBJ pour obtenir un objet avec les éléments disponibles en propriétés publiques.

echo '<pre>'; print_r($info_employe); echo '</pre>';

echo $info_employe['prenom'] . '<hr />'; // avec FETCH_ASSOC
// echo $info_employe[1] . '<hr />'; // avec FETCH_NUM
// echo $info_employe->prenom . '<hr />'; // avec FETCH_OBJ

/*--------------------------------------------- Remarques -----------------------------------------------------------------------------
- $pdo représente un objet[1] issue de la classe prédéfinie PDO
- Quand on éxécute une rquete de sélection avec la methode query sur notre objet $pdo:
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

while($info_employe = $resultat->fetch(PDO::FETCH_ASSOC))
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
echo '<ul>';
while($bdd = $resultat->fetch(PDO::FETCH_ASSOC))
{
    echo '<li>' . $bdd['Database'] . '</li>';
}
echo '</ul>';













//echo '<pre>'; print_r($resultat); echo '</pre>';
