<?php

// init.inc.php est chargé en premier par toutes les pages du site.


// CONNEXION A LA BDD
$pdo = new PDO('mysql:host=localhost;dbname=wf3_repertoire', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// appel du fichier contenant toutes les fonctions (je sais pas si je vais m'en servir ici.
require_once("function.inc.php");

// déclaration d'une variable pour les messages admin
$message = "";

// déclaration d'une variable erreur
$erreur = "";

// ---------------------------------- LIENS INTERNES AU SITE ----------------------------------
// définition de constante pour le chemin absolu ainsi que pour la racine serveur
// racine site
define("URL", "/FORMATION/FormationWeb/PARIS-IV/php/exercice_5/"); // modifier le repository chez moi

//racine serveur - nécessaire pour les pièces jointes
// DOCUMENT_ROOT dans $_SERVER
define("RACINE_SERVEUR", $_SERVER['DOCUMENT_ROOT'] . URL);