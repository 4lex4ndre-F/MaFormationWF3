/*-----------------------------------
INCREMENTATION ET DECREMENTATION
-----------------------------------*/

// ----- Incrémentation -----

var nb1 = 1;
nb1 = nb1 + 1;
console.log(nb1);

// -- Ecriture simplifiée
nb1++; // -- "++" incrémentation par pas de 1. Sinon "+=" pour autres valeurs d'incrémentation.
console.log(nb1);

// ----- Décrémentation -----

nb1 = nb1 - 1;
console.log(nb1);

// -- Ecriture simplifiée
nb1--;
console.log(nb1);


// ----- Subtilité ----- /!\ Point à Revoir... Faut comprendre le truc

nb1 = 1;
console.log("nb1++ = " + nb1++); // -- Incrémentation après nb1

nb1 = 1;
console.log("++nb1 = " + ++nb1); // -- Incrémentation avant nb1

console.log(nb1); // -- L'incrémentation est tout de même effective : nb1 = 2;