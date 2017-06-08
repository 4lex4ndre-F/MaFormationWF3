/*
Consigne : A partir du tableau fourni, vous devez mettre en place un système d'authentification. après avoir demandé à votre utilisateur son email et mot de passe,
et après avoir vérifié ses informations, vous lui souhaiterez la bienvenue avec son nom et son prénom.
En cas d'echec, vous afficherez une alert.
*/

var BaseDeDonnees = [
{'prenom' : "Hugo", 'nom' : 'LIEGEARD', 'email' : 'wf3@hl-media.fr', 'mdp' : 'wf3'}, 
{'prenom' : "Rodrigue", 'nom' : 'NOUEL', 'email' : 'rodrigue@hl-media.fr', 'mdp' : 'wf3'}, 
{'prenom' : "Nathanael", 'nom' : 'DORDONNE', 'email' : 'nathanael@hl-media.fr', 'mdp' : 'wf3'},
];

function l(e) {
    console.log(e);
}

// -- saisie du login et du mot de passe
var login = prompt("Entrez votre email");
var pass = prompt("Entrez votre mot de passe");
l("login : " + login);
l("mot de passe : " + pass);

l("BDD length" + BaseDeDonnees.length);
// -- pour vérifier l'authernticité des login et mot de passe, il faut les comparer à la base de données.
// -- pour cela, on va devoir utiliser une fonction de vérification

function VERIF() {
    // vérification email et mot de passe
    if(login == BaseDeDonnees[i].email && pass == BaseDeDonnees[i].mdp) {
        return true
    } else {
        return false
    }
}

// -- ensuite on passe la fonction à la moulinette d'une boucle parcourant la base de données.
for(var i = 0; i < BaseDeDonnees.length; i++) {
    VERIF(i);
    l(VERIF(i));
    // -- affichage du resultat
    if(VERIF() == true) {
         l(BaseDeDonnees[i].prenom + " " + BaseDeDonnees[i].nom);
         alert("Bienvenu : " + BaseDeDonnees[i].prenom + " " + BaseDeDonnees[i].nom);
    } 
}

// -- PROBLEME : Si je place le message d'erreur dans la boucle de vérification, il me donne un message d'erreur par itération jusqu'à trouver la bonne.
// -- Il faudrait pouvoir parcourir toute la BDD puis déterminer si il existe une correspondance login / mdp