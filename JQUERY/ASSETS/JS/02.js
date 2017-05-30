/*
LES SELECTEURS JQUERY
*/

// -- Format : $('selecteur')
// -- En JQuery, tous les sécleteurs CSS sont disponibles...

// -- DOM READY !
$(function(){
    // lesFlemards.js
    function l(e) {
        console.log(e);
    }

    // -- Sélectionner les <span>

        // Version en JS
        l('SPAN en JS :');
        l(document.getElementsByTagName('span'));

        // Version JQuery
        l('SPAN en JQuery');
        l($("span")); // ";" pas obligatoires

    // -- Sélectionner mon menu (#menu)

        // Version en JS
        l('ID en JS :');
        l(document.getElementsByTagName("menu"));

        // version en JQuery
        l('ID via JQuery');
        l($("#menu"));

    // -- Sélectionner une classe
        l('Par classe');
        l($('.MaClasse'));

    // -- Sélectionner par ATTRIBUT

        l('Par attribut (lien google.fr)');
        l($("[href='http://www.google.fr']"));
});

