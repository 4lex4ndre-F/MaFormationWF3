<?php
// connexion BDD
$pdo = new PDO('mysql:host=localhost;dbname=crud', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// démarrage session
session_start();

// déclaration de variable
$content = "";

// inclusions de fichier
require_once('fonction.inc.php');