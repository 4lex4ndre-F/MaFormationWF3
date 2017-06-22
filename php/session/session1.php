<?php
// ------------------------------------------- SESSION ------------------------------------------- 
// = fichier généré coté serveur qui contient des informations, chaque user à sa session.

// Lors de la création d'une session, un cookie d'identifiant est crée côté utilisateur pour avoir le lien entre la session et l'utilisateur.
// relation session / cookie : le cookie identifie le n° de session.
// Le cookie de session s'efface quand on ferme le navigateur

// pour créer une session (inexistante par défaut)
session_start(); // si la session n'existe pas, on la crée; si elle existe déjà, on l'ouvre.
// /!\ la fonction session_start() est a mettre avant le moindre affichage html!

// Pour voir les fichiers de session => /tmp à la racine du serveur (xampp / wamp / etc.)

$_SESSION['pseudo'] = "marie"; // $_SESSION est une superglobale, toutes les superglobales sont ds tbaleau array. Il est donc possible de créer des indices avec valeurs dans notre session (de manière temporaire).
$_SESSION['password'] = 'soleil';
$_SESSION['email'] = 'mail@mail.fr';
$_SESSION['age'] = 40;
$_SESSION['adresse']['code_postal'] = 75000;
$_SESSION['adresse']['ville'] = 'paris';
$_SESSION['adresse']['adresse'] = 'rue du tertre';

echo 'Premier affichage de la session : <br />';
echo '<pre>'; print_r($_SESSION); echo '</pre>';

// pour supprimer un élément de la sesssion => unset ()
unset($_SESSION['password']); // unset($_SESSION) pour supprimer la session
echo 'Deuxième affichage de la session (on supprime password): <br />';
echo '<pre>'; print_r($_SESSION); echo '</pre>';

// pour dettrurie la session
session_destroy(); // nous permet de supprimer la session, EN REVANCHE il faut savoir que l'information session_destroy() est vue par l'interpréteur php, mise de côté puis exécutée uniquement à la fin du script en cours.

// le script xi-dessous sera interprété avant le session_destroy();
echo 'Troisième affichage de la session : <br />';
echo '<pre>'; print_r($_SESSION); echo '</pre>';

?>