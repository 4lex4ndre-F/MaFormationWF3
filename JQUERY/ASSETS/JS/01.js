/*
DISPONIBILITE DU DOM
*/

/*
a Partir du moment ou mon DOM, cad, l'ensemble de l'arborescence de ma page est complètement chargé,
je peux commencer à utiliser JQuery.

Je vais mettre l'ensemble de mon code dans une fonction, cette fonction sera 
appelée automatiquement par JQuery lorsque le DOM sera entièrement défini.

3 façons de faire :
*/

// -- 1 :
jQuery(document).ready(function() {
    // -- Ici ,le DOM st entièrement chargé, je peux procéder à mon code JS.
});

// -- 2ème possibilité
$(document).ready(function() {
    // -- Ici ,le DOM st entièrement chargé, je peux procéder à mon code JS.
});

// -- 3ème possibilité, sans le (document).ready(). Celle qu'on va utiliser.

$(function() { // -- /!\ Tout le code JS sera dans cette fonction
    // -- Ici ,le DOM st entièrement chargé, je peux procéder à mon code JS.
    alert('Hello'); // différence de vitesse d'execution entre "" et '' -- /!\ attention aux apostrophes
   
    // -- En JS
    document.getElementById('TexteEnJQuery').innerHTML = "<strong>Mon texte en JS</strong>";

    // $ pour appeler des fonctions JQuery 
    // -- En Jquery, tous les sélecteurs sont identiques au CSS !!!!
    $("#TexteEnJQuery").html("Mon Texte en JQuery !"); // .html pour ajouter du contenu html dans #TexteEnJQuery. Si <> alors elles seront interprétée.

});