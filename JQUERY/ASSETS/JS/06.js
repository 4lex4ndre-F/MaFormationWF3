/*------------------------------------
    LES SELECTEURS D'ENFANT JQUERY
------------------------------------*/

// -- Initialisation du DOM
$(function(){
    // -- Ici commence mon code
    // -- Les flemmards.js
    function l(e){
        console.log(e);
    }

    // -- Je souhaite sélectionner toutes mes div
    l($('div'))

    // -- Je souhaite sélectionner mon header
    l($('header'))

    // -- Je souhaite sélectionner tous les éléments (enfant direct) qui sont dans mon header
    l($('header').children())

    // -- Je souhaite, parmis mes descendants direct, uniquement les éléments 'ul'
    l($('header').children('ul'))

    // -- Je souhaite récupérer tous les éléments 'li' de mon ul
    l($('header').children('ul').find('li'))

    // -- Je souhaite récupérer uniquement le 2ème élément de mes li
    l($('header').find('li').eq(1))

    // -- Je souhaite connaitre le voisin immédiat de mon header
    l($('header').next())
    l($('header').next().next()) // -- Le voisin du voisin... // -- prev pour voisin d'avant

    // -- LES PARENTS
    l($('header').parent())
});