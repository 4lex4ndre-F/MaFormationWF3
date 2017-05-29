/*-----------------------------------
LES FONCTIONS
-----------------------------------*/

// -- Déclarer une fonction
// -- cette fonction ne retourne aucune valeur

function DitBonjour(){
    // Lors de l'appel de la fonction, les instructions ci-dessous seront executées.
    alert("Bonjour !");
}


// -- Je vais appeler ma fonction "DitBonjour" et déclencher ses instructions.
DitBonjour(); // () car fonction


// -- Déclarer une fonction qui prend une/des variable(s) en paramètre
function Bonjour(Prenom, Nom) { // -- Variables Prenom et Nom sont LOCALES : utilisables uniquement dans la fonction.
    document.write("<p>Hello <strong> " + Prenom + " " + Nom + "</strong> !</p>");
}

// -- Appeler / Utiliser une Fonction avec un Paramètre
Bonjour("Alex", "FERNANDES");

// -- OU
var Prenom = "Alex", Nom="FERNANDES"; // -- Variables de type GLOBALES
Bonjour(Prenom, Nom);

/*-----------------------------------
EXERCICE
Créez une fonction permettant d'effectuer l'addition de deux nombres passés en paramètre.
-----------------------------------*/
var nb1 = 4, nb2 = 8;
function Addition(){
    resultat = nb1 + nb2;
    document.write("Résultat : " + nb1 + " + " + nb2 + " = " + resultat); // -- écrit le résultat dans la page à chaque appel de la fonction => pas pratique
}
Addition(nb1, nb2);

// -- Correction
function Addition(nb1, nb2){
    // let resultat = nb1 + nb2; // -- let pour variable locale
    return nb1 + nb2; // -- la Fonction prend la valeur de la variable resultat
}

document.write("<p>" + Addition(10, 5) + "</p>");