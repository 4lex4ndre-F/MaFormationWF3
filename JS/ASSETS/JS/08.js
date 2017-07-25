/*=====================================================
LES CONDITIONS
=====================================================*/ 
/*
var MajoriteLegaleFR = 10;

if(16 > MajoriteLegaleFR) {
    alert("Bienvenu !");
} else {
    alert("Google...");
}
*/
/* EXERCICE
Créer une fonction permettant de vérifier l'age d'un visiteur (prompt).
S'il a la majorité légale, alors je lui souhaite la bienvenue, sinon ,
je fais une redirection sur Google après lui avoir signalé le soucis.
*/

// fonction

/*
// ---- CORRECTION
// 1-- Déclarer la Majorité Légale
var MajoriteLegaleFR = 18;

// 2-- Créer une fonction pour demander son age
function verifierAge() {
    // Demande l'age de mon visiteur puis je le retourne
    return parseInt(prompt("Bonjour, quel age avez-vous?","<age>"));
}

// 3-- Une condition pour vérifier si l'age de l'utilisateur est supérieur à la MajoritéLegaleFR
if(verifierAge() >= MajoriteLegaleFR) {
    // -- J'affiche un message de bienvenu
    alert("Bienvenu");
} else {
    // -- J'affiche le message d'exclusion
    alert("ATTENTION  ...");

    // -- Je redirige vers Google
    document.location.href = "http://google.fr";
} */


/*=====================================================
LES OPERATEURS DE COMPARAISON
=====================================================*/ 

// -- L'Opérateur de Comparaison "==" signifie : égal à ...
// -- Il permet de vérifier que 2 variables sont identiques

// -- L'Opérateur de Comapraiison "===" signifie : strictement égal à...
//-- Il va comparer la valeur mais aussi le type de données.

// -- L'Opérateur de Comparaison "!=" signifie : différent de ...

// -- L'Opérateur de Comapraison "!==" signifie : strictement différent de...

/*
EXERCICE :
J'arrive sur un Espace Sécurisé au moyen d'un email et d'un mot de passe.
Je dois saisir mon email et mon mot de passe afin d'être authentifié sur le site.
En cas d'échec une alert m'informe du problème.
Si tous se passe bien, un message de bienvenue m'accueille
*/

// -- BASE DE DONNEES
var email, mdp, //emailId, mdpId;

email = "wf3@hl-media.fr";
mdp = "wf3";

/* mon travail
// fonction de récup identifiant
function Verif() {
    emailId = prompt("Votre email","<nom@adresse>");    
}
// comparaison des identifiants avec la base de données
Verif();
if (email === emailId) {
    mdpId = prompt("mot de passe", "Password");
    if (mdp === mdpId) { // mettre le prompt mpd si email est bon ?
        alert("OK");
    }
    else {
        alert("erreur de mpd");
    }
} else {
    alert("erreur d'identifiant");
}
// FONCTIONNE !!!!!
                            */

// CORRECTION

// 1 -- Demander son email à l'utilisateur
var emailLogin = prompt ("Bonjour, quel est votre email?","<email>");

// 2 -- Vérification de l'email
if(emailLogin === email) {
    // 2a -- si tout est ok, je continu la vérification avec le mot de passe
    // 2a1. Demande du mot de passe
    var mdpLogin = prompt("votre mot de passe ?","<mdp>");
    if(mdpLogin === mdp) {
        alert("Bienvenu utilisateur");
    } else {
        // 2a2. meesage de mauvais mot de passe
        alert("pas le bon mot de passe");
    }

} else {
    // 2b -- sinon :
    alert("ATTENTION, email incconu");
}


// -- EXEMPLE avec FONCTION - pas d'indication quand mauvais ID ou mdp

function connexion(user, motdepasse) {
    if(user == email && motdepasse == mdp) { // -- && = AND
        return true;
    } else {
        return false;
    }
}
var emailLogin = prompt ("Bonjour, quel est votre email?","<email>");
var mdpLogin = prompt("votre mot de passe ?","<mdp>");

if(connexion(user, motdepasse)) {
    alert("Bienvenu");
} else {
    document.location.href = "http://www.google.fr";
}

/*=====================================
LES OPERATEURS DE LOGIQUES
=====================================*/

// L'Opérateur ET : && ou AND

// -- Si la combianaison EmailLogin et email correspond ET la combianaison mdpLogin et mdp correspond

// -- Dans cette condition, les 2 doivent obligatoirement correspondre pour être vaalidée.

if( (emailLogin === email) && (mdpLogin === mdp)) {...} 


// -- L'Opérateur OU : || ou OR

// -- Si la combianaison emailLogin et email correspond OU la combianaison mdpLogin et mdp correspond.

// -- Ici, dans cette condition, au moins l'une des 2 doit correspondre pour ^trre validée.

if( (emailLogin == email) || (mdpLogin === mdp)) {...}


// -- L'Opérateur "!" : qui signifie le CONTRAIRE de, ou encore NOT

var siMonutilisateurEstApprouve = true;
if(!siMonutilisateurEstApprouve) { } // si l'utilisateur n'est pas approuvé