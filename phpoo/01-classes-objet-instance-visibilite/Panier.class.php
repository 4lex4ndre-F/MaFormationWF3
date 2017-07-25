<?php
//01-classes-objet-instance-visibilite/Panier.class.php
/* En objet :
    Variable = Propriété
    Foncton = Méthode
*/

// nom de classe avec une majuscule par convention
class Panier
{
    public $nbProduit; // propriété (défaut : NULL)
    public $montantTotal;

    // echo 'bonjour !'; // Erreur, tout le code des classes doit être encapsulé dans des méthodes (fonctions)

    public function ajouterProduit() {
        // Traitements de ma méthode
        return 'Le produit a été ajouté au panier !';
    }

    protected function retirerProduit() {
        return 'Le produit a été retiré du panier !';
    }

    private function affichagePanier() {
        return 'Voci les produits dans le panier !';
    }
}
//------------------------------------------------------------------------
$panier = new Panier; // instanciation d'un nouvel objet de class Panier
echo '<pre>'; var_dump($panier); echo '</pre>'; // #1
/* Résultat du var_dump
object(Panier)#1 (1) {
  ["nbProduit"]=>
  NULL
  ["montantTotal"]=>
  NULL
}
*/

echo '<pre>'; var_dump(get_class_methods($panier)); echo '</pre>';
/* affiche les methodes publiques
array(1) {
  [0]=>
  string(14) "ajouterProduit"
}
*/

$panier -> nbProduit = 5; // J'affcete la valeur 5 à la propriété $nbProduit;
echo 'Le nombre de produit dans le panier est: ' . $panier -> nbProduit . ' ! <br />'; // Me retourne la valeur affectée dans la propriété $nbProduit de mon objet

echo 'Panier : ' . $panier -> ajouterProduit() . ' <br />';
//echo 'Panier : ' . $panier -> retirerProduit() . ' <br />';
//echo 'Panier : ' . $panier -> affichagePanier() . ' <br />';

// En l'état, seuls les éléments public sont accessibles...$_COOKIE

$panier2 = new panier;
echo '<pre>'; var_dump($panier2); echo '</pre>'; // #2
// La  propriété nbProduit de panier2 est NULL aliors que celle de panier contient la valeur 5.

/*
Commentaires :
    - new est un mot-clé qui permet de créer un objet d'une classe. On parle d'instanciation.$_COOKIE
    - On peut créer plusieurs objets d'une même classe
    - Niveau de visibilité :
        --> public : Les éléments sont accessibles de partout
        --> protected : Les éléments sont accessibles à l'interieur de la classe où ils ont été déclarés et à l'interieur des classes héritières.
        --> private : Les éléments sont accessibles UNIQUEMENT à l'intérieur de la classe où ils sont déclarés.
*/