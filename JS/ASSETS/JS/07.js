/* --

Votre mission, que vous devez accepter !
Réaliser une fonction permettant à un internaute de :
    - Saisir son prénom dans un prompt,
    - Retourner à l'utilisateur : Bonjour [Prénom], Quel age as-tu ?
    - Saisir son age
    - Retourner à l'utilisateur : Tu es donc né en [ANNEE DE NAISSANCE].
    - Afficher ensuite un récapitulatif dans la page.
    Bonjour, [Prenom], tu as [age] ans.

-- */

/* Ma Réponse : fonctionne mais age en string
function infoPerso(){
    let time = new Date(); // élément Date qui permettra de calculer l'année de naissance
    let Prenom = prompt("Quel est votre Prénom ?"); // demande du prénom
    let age = prompt("Bonjour, " + Prenom + " quel age as-tu ?"); // demande de l'age
    alert("Tu es donc né en : " + (time.getFullYear() - age)); // annonce de l'année de naissance - /!\ ne pas oublier les () après getFullYear()
    document.write("Bonjour, " + Prenom + ", tu as " + age + " ans.") // écriture du récap
}
infoPerso();
*/

// ---- CORRECTION ----

// 1 -- Initialisation des variables
var AnneeActuelle = new Date();
// 2 -- Création de ma fonction
function Hello(){

    // 2a. Je demande à l'utilisateur son prénom
    let Prenom = prompt("Hello ! What's your name ?","<saisir votre prénom>");
    console.log(Prenom);
    console.log(typeof Prenom);

    // 2b. Je demande à l'utilisateur son age
    let age = parseInt(prompt("Hello " + Prenom + " ! How old are you ?","<saisir votre age>"));
    console.log(age);
    console.log(typeof age);

    // 2c. J'affiche une alert avec son année de naissance !
    alert("AMAZING ! So you were born in " + (AnneeActuelle.getFullYear() - age) +" !");

    // 2d. Affichage dans ma page html
    document.write("Hello " + Prenom + " it's AMAZING ! You're " + age + " years old !");
}
// 3 -- Execution de ma fonction
Hello();