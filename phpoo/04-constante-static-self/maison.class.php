<?php
//04-constante-static-self/maison.class.php

class Maison
{
    public $couleur = 'blanc'; // couleur par défaut - Appartient à l'objet
    public static $espaceTerrain = "500m2"; // Appartient à la classe <==> STATIC
    private $nbPorte = 10; // Appartient à l'objet
    private static $nbPiece = 7; // Appartient à la classe
    const HAUTEUR = '10m'; // Appartient à la classe.

    public function getNbPorte(){
        return $this -> nbPorte;
    }

    public static function getNbPiece(){
        return self::$nbPiece; // self fait référence à elle même
    }
}
echo 'Terrain : ' . Maison::$espaceTerrain . '<br />'; // OK, j'accède à un élément de la classe par la classe.
echo 'piece : ' . Maison::getNbPiece() . '<br />'; // Ok j'accède à un élément private de la classe via un getter appartenant à la classe.
echo 'Hauteur : ' . Maison::HAUTEUR . '<br />'; // OK, j'accède à un élément appartenant à la classe via la classe.


//-------------------------------------------------------
$maison = new Maison;
echo 'Couleur : ' . $maison -> couleur . '<br />'; // Ok, j'acccède à une ropriété public via l'objet.
//echo 'Terrain : ' . $maison -> espaceTerrain . '<br />'; // Erreur, j'essaye d'accèder à une propriété appartenant à la classe par l'objet.
//echo 'nbre de porte : ' . $maison -> nbPorte . '<br />'; // Erreur private il faut un getter
echo 'nbre de porte : ' . $maison -> getNbPorte() . '<br />'; // OK, j'accède à un élément appartenant à l'objet et private via un getter appartenant à l'objet

/*
Commentaires:
    Opérateurs :
        $objet ->   : élément d'un objet à l'exterieur de la classe.
        $this ->    : élément d'un objet à l'interieur de la classe.
        Class::     : élément d'une classe à l'extérieur de la classe.
        self::      : élément d'une classe à l'interieur de la classe.
        parent::    : cf chapitre 6.

    2 questions à se poser :
        - Est-ce que l'élément est static ?
            -> Si oui, ( Class:: ou self:: )
                Est-ce que je suis à l'intérieur ou à l'extérieur de la classe ?
                - intérieur: self::
                - extérieur : Class::
            -> si non, ( $Objet ou $this )
                Est-ce que je suis à l'intérieur ou à l'extérieur de la classe ?
                - inérieur : $this
                - exterieur : $Objet

    Static signifie qu'un élément appartient à la classe. Pour y accéder, on devra donc l'appeler par la classe ( Class:: ou self::). Une propriété peut être modifiée, et tous les objets qui suivront auront la nouvelle valeur (exemple: singleton).

    Const signifie qu'une propriété apppartient à la classe et qu'elle ne peut pas être modifiée.
    */