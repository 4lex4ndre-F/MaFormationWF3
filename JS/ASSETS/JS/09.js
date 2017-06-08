/*
LES BOUCLES
*/

// -- La boucle FOR

// -- Pour i = 1 ; tant que i <= (strictement inférieur ou égale) 10 ; alors, j'incrémente
for(var i = 1; i<= 10; i++) {
    document.write("<p>Instruction executée : <strong> " + i + "</strong></p>");
}

document.write("<hr>");


// -- La boucle WHILE : Tant que

var j = 1;
while(j <= 10) {
    document.write("<p>Instruction executée : <strong> " + j + "</strong></p>");
    j++;
}

/*
EXERCICE :
*/

// -- Supposons, le tableau suivant :
var Prenoms = ['Hugo', 'Jean', 'Matthieu', 'Luc', 'Pierre', 'Marc'];

/* CONSIGNE : Grâce à une boucle FOR, afficher la liste des prénoms du tableau suivant dans la console ou sur votre page. */
for(var k = 0; k <= (Prenoms.length -1); k++) {
    document.write(Prenoms[k] + "<br>");
}

// -- 1ère façon de faire
for(var k = 0; k < 6; k++) {
    document.write(Prenoms[k] + "<br>");
}

// -- 2ème façon
var NbElementDansMonTableau = Prenoms.length; // plus rapide que ce que j'ai fait
for(var k = 0; k < NbElementDansMonTableau; k++) {
    document.write(Prenoms[k] + "<br>");
}

// -- 3ème façon avec WHILE
var j = 0;
while(j < Prenoms.length) {
    console.log(Prenoms[j]);
    j++;
}

// -- même exercice avec forEach
// -- :!\ Au coût en performances !
Prenoms.forEach(affichePrenoms);

function affichePrenoms(prenom, index) {
    console.log(prenom);
}

// liens à récupérer sur la correction pour les performances des boucles.