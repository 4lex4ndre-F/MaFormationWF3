// -- Déclarer un tabelau Numérique - 2 façons de déclarer un tableau :
var monTableau  = [];
var myArray     = new Array;

// -- Affecter des Valeurs à un Tableau Numérique
myArray[0] = "Hugo";
myArray[1] = "Tanguy";
myArray[2] = "Géraldine";

// plusieurs curseurs en même temps [Alt] maintenu
// dupliquer [Alt]+[shift]+[fleche bas/haut]

// -- Afficher le contenu de mon Tableau Numérique dans la console
console.log(myArray[0]); // -- Hugo
console.log(myArray[1]); // -- Tanguy
console.log(myArray[2]); // -- Géraldine
console.log(myArray); // -- Affiche toutes les données.

// -- Déclarer et Affecter des Valeurs à un tableau Numérique
var NosPrenom = ["Yimin", "Alex", "Cristian", "Tristan"];
console.log(NosPrenom);
console.log(typeof NosPrenom); // -- retourne 'object'

// -- Déclarer et Affecter des Valeurs à un OBJET. (Pas de Tableau Associatifs en JS)
var Coordonnee = {
    "prenom"    : "Alexandre",
    "nom"       : "FERNANDES",
    "age"       : 41 // -- Dernier élément, pas besoin de ','
}
console.log(Coordonnee);
console.log(typeof Coordonnee);

// -- Comment créer et affecter des valeurs à un tableau à 2 Dimensions.
// -- Démonstration pour comprendre, /!\ ne pas faire comme çà.
var listeDePrenoms   = ["Hugo", "Rodrigue", "Kristie"];
var listeDeNoms      = ["LIEGARD", "NOUEL", "SOUKAI"];

// -- Je vais créer un tableau à 2 dimensions à partir de mes tableaux précédents
var Annuaire = [listeDePrenoms, listeDeNoms];
console.log(Annuaire);

// -- Afficher un Nom et un Prénom sur ma page HTML !
document.write(Annuaire[0][1]);
document.write(" ");
document.write(Annuaire[1][1]);

/*------------------------------------------------
    EXERCICE : 
    Créer un tableau à 2D appelé "AnnuaireDesStagiaires" qui contiendra toutes les coordonnées pour chaque stagiaire.
    Nom, Prénom, Tel
                                    */
var listeDeNoms              = ["BLA","BLABLA","BLABLABLA","BLABLABLABLA"];
var listeDePrenom            = ["Pre","Pre1","Pre2","Pre3"];
var Tel                      = ["01","02","03","04"];
var AnnuaireDesStagiaires    = [listeDeNoms,listeDePrenom,Tel];
console.log(AnnuaireDesStagiaires);

// Correction - Ce qu'il fallait faire :
var AnnuaireDesStagiaires = [ // --  chaque ligne est un objet - format de présentation de ce tableau => format .json
    { "prenom" : "Hugo",    "nom" : "LIEGEARD", "tel" : "0783 97 15 15" }, // -- objet
    { "prenom" : "Tanguy",  "nom" : "MANAS",    "tel" : "XXXX XX XX" }, // -- objet
    { "prenom" : "Yimin",   "nom" : "JI",       "tel" : "XXXX XX XX" } // -- objet
];
console.log(AnnuaireDesStagiaires);
console.log(AnnuaireDesStagiaires[0].nom); // -- LIEGEARD
console.log(AnnuaireDesStagiaires[1].nom); // -- MANAS

// -- Exemple pour la 3D. cf fichier transmis par Hugo


/*----------------------------------------------------------
                  AJOUTER UN ELEMENT
----------------------------------------------------------*/
var Couleurs = ["Rouge", "Jaune", "Vert"];

// Si je souhaite ajouter un élément dans mon tableau,
// je fais appel à la fonction push() qui me renvoi le nombre d'éléments de mon tableau.

console.log(Couleurs); // affiche Couleur
var nombreElementsDeMonTableau = Couleurs.push("Orange"); // ajoute "Orange" à lma fin du tableau
console.log(Couleurs);  // affiche Couleur (sans orange)
console.log(nombreElementsDeMonTableau); // affiche Couleur (avec orange), et le nombre d'éléments après ajout.

// -- NB : La Fonction unshift() permet d'ajouter un ou plusieurs éléments en début de tableau.


/*----------------------------------------------------------
        RECUPERER ET SORTIR LE DERNIER ELEMENT
 ---------------------------------------------------------- */

// -- La fonction pop() me permet de supprimer le dernier élément de mon tableau et
// -- d'en récupérer la valeur.
// -- Je peux accessoirement récupérer cette valeur dans une variable.

var monDernierElement = Couleurs.pop(); // pas besoin de préciser quel élémént va poper : c'est toujours le dernier.
console.log(monDernierElement);
console.log(Couleurs);

// -- La même chose est possible avec le premier élément en utilisant la fonction shift();

// -- NB : La fonction splice() vous permet de faire sortir un ou plusieurs éléments
// -- de votre tableau.