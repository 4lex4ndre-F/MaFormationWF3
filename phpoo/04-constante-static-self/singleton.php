<?php
//04-constante-static-self/singleton.php

// Design Pattern (Patron de conception): C'est une réponse trouvée par d'autres développeurs à un problème rencontré par la communauté.

// Singleton : C'est la réponse à la question suivante : Comment faire pour créer une classe qui ne peut être instanciable qu'UNE SEULE ET UNIQUE FOIS ? On s'en sert souvent pour gérer la connexion en bdd par pdo.

class Singleton
{
    private static $instance = NULL;
    private function __construct(){} // fonction private donc la classe ne peut pas être instanciée...
    private function __clone(){} // fonction private donc l'objet de la classe ne pourra pas être cloné.

    public static function getInstance(){
        if(is_null(self::$instance)){
        //if(!self::$instance))
        //if(self::$instance == NULL)
            self::$instance = new Singleton;
            // self::$instance = new self;        
        }
        return self::$instance; // 1 seul objet $instance possible avec cette méthode.
    }
}

//-------------------------------------------------------------------
//$singleton = new Singleton; // IMPOSSIBLE !!!
$objet = Singleton::getInstance();
$objet2 = Singleton::getInstance();


 // c'est le même objet !
echo '<pre>';
var_dump($objet);
var_dump($objet2);
echo '</pre>';