<?php

// connexion à la base de donnée
$pdo = new PDO('mysql:host=localhost;dbname=connexion', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// récupération des arguments dans post fournis via notre requete ajax (variable param)
// écriture en ternaire: (condition) ? si condition : sinon
$pseudo = (isset($_POST['pseudo'])) ? $_POST['pseudo'] : "";
$mdp = (isset($_POST['mdp'])) ? $_POST['mdp'] : "";

/* ecriture classique:
if(isset($_POST['pseudo']))
{
    $pseudo = $_POST['pseudo'];
}
elsse {
    $pseudo  ="";
}
*/

// déclaration d'un tableau array qui contiendra notre réponse à la requete ajax
$tab = array();
// déclaration de l'indice dans le tableau array qui contiendra la réponse, c'est cet indice que l'on appelle dans l'évènement onreadystagechange:
$tab['resultat'] = "";

// EXERCICE:
// faire le controle si le pseudo et le mot de passe correspondent à une entrée de la BDD
// si il y a une erreur, renvoyer une chaine de caractère annoncant l'erreur à l'utilisateur
// si le pseudo et le mdp sont ok, envoyer un message du type 'vous êttes connecté, + infos personnelles



// requete prepare car saisies en provenance d'un formulaire
$req = $pdo->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo AND mdp = :mdp");
$req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
$req->bindParam(':mdp', $mdp, PDO::PARAM_STR);
$req->execute();

// on vérifie le nb de ligne dans la réponse de la bdd
// si il y a moins d'une ligne alors le pseudo ou le mdp ou les deux sont faux
if($req->rowCount() < 1)
{
    // message d'erreur à l'utilisateur
    $tab['resultat'] = "Erreur sur le pseudo...";
}
else {
    // on transforme la ligne présente dans la réponse en tableau array
    $utilisateur = $req->fetch(PDO::FETCH_ASSOC);

    // condition ternaire sur le sexe
    $sexe = ($utilisateur['sexe'] == 'm') ? 'masculin' : 'féminin';

    $tab['resultat'] = "Vous êtes connecté.<br>pseudo: " . $utilisateur['pseudo'] . "<br>mail: " . $utilisateur['email'] . "<br />sexe: " . $sexe;
}

// envoi de la réponse en encodant sous le format JSON:
echo json_encode($tab);