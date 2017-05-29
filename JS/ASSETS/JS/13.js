/*
LA MANIPULTAION DES CONTENUS
*/

function l(e) {
    console.log(e);
}

// -- Je souhaite récupérer mon lien ; comment procéder ?
var google = document.getElementById("google");
l(google);

// -- Maintenant, je souhaite acceder aux informations de ce lien, par exemple :

    // -- A : Le lien vers lequel pointe la balise
    l("le lien vers lequel pointe la balise");
    l(google.href);

    // -- B : L'ID de la balise
    l("L'Id de la balise");
    l(google.id);

    // -- C : La classe de la balise
    l("La classe de la balise");
    l(google.className);

    // -- D : Le texte de la blaise (l'élément)
    l('Le Texte de la Balise');
    l(google.textContent);

// -- Maintenant, je souhaite modifier le contenu de mon lien
// -- Comme une variable classique, je vais simplement venir affecter une nouvelle valeur.
google.textContent = "Mon lien vers Google !";


/*
AJOUTER UN ELEMENT
*/

// -- Nous allons utiliser 2 méthodes :

    // -- 1 : La fonction document.createElement() va permettre de créer un nouvel élément dans le DOM ; 
    // que je pourrais par la suite modifier avec les méthodes que nous venons de voir.

    // PS : Ce nouvel élément estt placé en mémoire

        // -- Définition de mon élément
        var span = document.createElement('span');

        // -- Si je souhaite lui donner un id
        span.id = "MonSpan";

        // -- si je souhaite lui attribuer du contenu...
        span.textContent = "Mon Beau texte en JS";
    
    // -- 2 : La fonction appendchild() va me permettre de rajouter un enfant à un élément du DOM.
    google.appendChild(span);

    /*
    EXERCICE
    En partant du travail déjà sur la page.
    Créez directement dans la page une balise <h1></h1> ayant comme contenu : "Titre de mon Article".

    Dans cette balise, vous créerez un lien vers une url de votre choix.

    Bonus : Ce lien sera de couleur Rouge et non-souligné.
    */

    // -- création du h1
    var h1 = document.createElement('h1');

    // -- Création de la balise a
    var a =  document.createElement('a');

    // -- Je vais donner un titre à mon lien
    a.textContent = "Titre de mon article" 

    // -- je veux donner un lien à mon lien
    a.href = "#";

    // -- appendChild()

        // -- je met mon lien a dans mon h1
        h1.appendChild(a);

        // -- je met mon h1 dans ma page, dans mon body
        document.body.appendChild(h1);

// -- Bonus

    // je veux que mon lien soit rouge
    a.style.color = "red";

    //je veux que mon lien ne soit pas souligné
    a.style.textDecoration = "none";
