/*-------------------------------------------------------------------------------------
                                    LES EVENEMENTS
-------------------------------------------------------------------------------------

Les Evenement vont me permettre de déclencher une fonction,
cad une série d'instruction, suite à une action de mon utilisateur.

OBJECTIF : Être en mesure de capturer ces évènements,
afin d'executer une fonction.


/!\ LISTE NON EXHAUSTIVE /!\

Les Êvenements :    MOUSE (souris)

    click       : au clic sur un élément
    mouseenter  : la souris passe au dessus de la zone qu'occupe un élément
    mouseleave  : la souris sort de cette zone


Les Evenements :    KEYBOARD (clavier)

    keydown     : une touche du clavier est enfoncée
    keyup       : une touche a été relachée

Les Evenements :    WINDOW (fenêtre)

    scroll      : défilement de la fenêtre
    resize     : redimensionnement de la fenêtre

Les Evenements :    FORM (formulaire) /!\ Evaluation !

    change      : pour les éléments <input>, <select> et <textarea>
    submit      : à l'envoi (la soumission) d'un formulaire

Les Evenements :    DOCUMENT

    DOMContentLoaded : executé lorsque le document HTML est complètement chargé,
    sans attendre le CSS et les images.
-------------------------------------------------------------------------------------*/

/*
LES ECOUTEURS D'EVENEMENTS

Pour attacher un évènement à un élément, ou autrement dit, pour déclarer un écouteur
d'évênement qui se chargera de lancer une action, c'est à dire une fonction 
pour un évènement donné, je vais utiliser la syntaxe suivante :
*/

var p = document.getElementById("MonParagraphe");
console.log(p);

// -- je souhaite que mon paragraphe soit rouge au clic de la souris

    // -- 1 : Je défini une fonction chargée d'executer cette action
    function changeColorTored() {
        p.style.color = "red";
    }

    // -- 2 : Je déclare un écouteur qui se chargera d'appeler la fonction
    // au déclenchement de l'évènement.
    p.addEventListener("click", changeColorTored); // pas de () à la fonction car je n'appelle pas la fonction


/*
EXERCICE PRATIQUE
A l'aide de javascript, créez un champ "input" type text avec un ID unique.
Affichez ensuite dans une alerte, la saisie de l'utilisateur.
*/

// -- Création du champ input
var MonInput = document.createElement('input');
// -- Attribution d'un attribut
MonInput.setAttribute('type','text');
MonInput.setAttribute('placeholder','écrivez-ici');
// -- attribution d'une id
MonInput.id = "texte";
// -- ajout d'input dans body
document.body.appendChild(MonInput);

// -- Création d'un écouteur
MonInput.addEventListener("change" , affichage);   // -- change pour détecter quand on valide le formulaire. 
                                                // --Execute la fonction quand 'change' est détecté.

function affichage() {
    alert(MonInput.value); // -- on affiche la valeur d'input
}