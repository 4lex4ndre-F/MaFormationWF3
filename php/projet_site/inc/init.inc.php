<?php
// connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=wf3_site', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// appel du fichier contenant toutes les fonctions.
require_once("function.inc.php");

// création de variables pouvant nous servir dans le cadre du projet:
// variable pour afficher des messages à l'utilisateur
$message = "";