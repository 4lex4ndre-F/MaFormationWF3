/*-----------------------------------
LES OPERATEURS ARITHMETIQUES
-----------------------------------*/

// ---- L'Addition ----

// -- La Déclaration de plusisuers variables
var nb1, nb2, resultat; // -- plusieurs variables déclarées, séparées par une ","

nb1 = 10;
nb2 = 5;


// -- Addition de nb1 + nb2 avec l'opérateur "+"
resultat = nb1 + nb2;

// -- Affichage du résultat dans la console
console.log("L'addition de nb1 et nb2 est égale à : " + resultat);


// ---- La Soustraction ----

// -- La soustraction de nb1 - nb2 avec l'opérateur "-"
resultat = nb1 - nb2;
console.log("La soustraction de nb1 et nb2 est égale à : " + resultat);


// ---- La Multiplication ----

// -- La multiplication de nb1 * nb2 avec l'opérateur "*"
resultat = nb1 * nb2;
console.log("La multiplication de nb1 et nb2 est égale à : " + resultat);


// ---- La Division ----

// -- La division de nb1 / nb2 avec l'opérateur "/"
resultat = nb1 / nb2;
console.log("La division de nb1 par nb2 est égale à : " + resultat);


// ---- Le Modulo ---- Retourne le reste de la division

// -- Le modulo de nb1 et nb2 avec l'opérateur "%"
nb1 = 11;
resultat = nb1 % nb2;
console.log("Le reste de la division de " + nb1 + " et " + nb2 + " est égale à : " + resultat);


/*--------------^--------------------
LES ECRITURES SIMPLIFIEES
--------------------------~--------*/

nb1 = 15;
nb1 = nb1 + 5;
console.log(nb1);

nb1 +=5; // -- Ce qui équivaut à écrire nb1 = nb1 +5;
// -- Ici j'ai incrémenté et réaffecté.

console.log(nb1);
// -- Je peux procéder de la même manière pour tous les autres opérateurs arithmétiques :
// : "+", "-", "/", "/", "%"