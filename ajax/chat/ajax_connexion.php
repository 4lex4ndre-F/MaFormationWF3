<?php

// inclusion du fichie init contenant la connexion à la BDD et le lancement d'une session
require_once("inc/init.inc.php");


$tab = array();
$tab['resultat'] = "";
// rajout d'un indice dans le tableau array qui sera renvoyé nous permettant de faire un contrôle sur la disponibilité du pseudo
$tab['pseudo'] = "disponible";
$erreur = false;

// récup des valeurs du post
$pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : "";
$sexe = isset($_POST['sexe']) ? $_POST['sexe'] : "";
$ville = isset($_POST['ville']) ? $_POST['ville'] : "";
$date_de_naissance = isset($_POST['date_de_naissance']) ? $_POST['date_de_naissance'] : "";

// requete en BDD pour vérifier si le pseudo existe déjà
$resultat = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
$resultat->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
$resultat->execute();

$membre = $resultat->fetch(PDO::FETCH_ASSOC);
if($resultat->rowCount() === 0)
{
    // ici le pseudo n'existe pas car nous n'avous pas récupéré une ligne
    $inscription = $pdo->prepare("INSERT INTO membre (pseudo, sexe, ville, date_de_naissance, ip, date_connexion) VALUES (:pseudo, :sexe, :ville, :date_de_naissance, :ip, NOW())");
    $inscription->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
    $inscription->bindParam(":sexe", $sexe, PDO::PARAM_STR);
    $inscription->bindParam(":ville", $ville, PDO::PARAM_STR);
    $inscription->bindParam(":date_de_naissance", $date_de_naissance, PDO::PARAM_STR);
    // adresse ip
    $inscription->bindParam(":ip", $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
    $inscription->execute();

    // on récupère l'id inséré pour le placer dans un 2ème temps dans la session
    $id_membre = $pdo->lastInsertId();
}
elseif($resultat->rowCount() > 0 && $membre['ip'] == $_SERVER['REMOTE_ADDR'])
{
    // si rowCount() > 0 alors le pseudo existe mais il est possible que ce soit la même personne. On compare donc l'adresse ip en cours ($_SERVER['REMOTE_ADDR']) avec l'adresse ip enregistrée dans la bdd
    $id_membre = $membre['id_membre'];
    // on met donc la date de connexion à jour
    $pdo->query("UPDATE membre SET date_connexion = NOW() WHERE id_membre = $id_membre");
}
else {
    // si on rentre dans ce else, le pseudo existe déjà et l'adresse ip n'est pas la même que celle pré-enregistrée.

    // on envoi un message d'erreur
    $tab['resultat'] = "<p style='color: red;'>Ce pseudo est déjà utilisé, veuillez en choisir un autre.</p>";
    // on change la valeur de la variable $erreur
    $erreur = true;
    // on change la valeur de la variable $tab['pseudo'] afin de savoir si il y a une erreur via javascript sur index.php
    $tab['pseudo'] = "reserve";
}

// vérification si il n'y a pas eu d'erreur au préalable:
if(!$erreur) // si $erreur = false
{
    // on inscrit dans la session des informations sur l'utilisateur
    $_SESSION['utilisateur'] = array();
    $_SESSION['utilisateur']['pseudo'] = $pseudo;
    $_SESSION['utilisateur']['sexe'] = $sexe;
    $_SESSION['utilisateur']['id_membre'] = $id_membre;

    // création d'un fichier pour inscrire les utilisateurs présent sur le tchat
    $f = fopen("pseudo.txt", "a");
    if(filesize("pseudo.txt") === 0) // avant d'enregistrer l'information, on regarde si le fichier à une taille = 0, si c'est le cas alors c'est la première ligne du fichier.
    {
        fwrite($f, $pseudo);
    }
    else {
        // si on rentre ici alors des pseudo sont déjà présents dans le fichier, on commence par sauter un ligne
        fwrite($f, "\n" . $pseudo);
    }
}

echo json_encode($tab);