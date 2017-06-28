<?php
// init.inc.php est chargé en premier par toutes les pages constituant le site.


// connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=wf3_site', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// appel du fichier contenant toutes les fonctions.
require_once("function.inc.php");

// création de variables pouvant nous servir dans le cadre du projet:
// variable pour afficher des messages à l'utilisateur
$message = "";

// ouverture de la seesion
session_start();

// définition de cosntante pour le chemin absolu ainsi que pour la racine serveur
// racine site
define("URL", "/FORMATION/PARIS-IV/php/projet_site/");

//racine serveur - nécessaire pour les pièces jointes
// DOCUMENT_ROOT dans $_SERVER
define("RACINE_SERVEUR", $_SERVER['DOCUMENT_ROOT'] . URL);