/*
LE CHAINAGE DE METHODES JQUERY
*/

$(function() {
    // -- Je souhaite chacher les div de ma page HTML
    // hide = fonction de JQuery
    $('div').hide('slow', function() {
        // une fois que la méthode hide() est terminée, mon alert peut s'exécuter.
        alert('fin du hide');

        // NOTA BENE : La Fonction s'exécutera pour l'ensemble des éléments du sélecteur.

        // -- CSS
        $('div').css("background","yellow");
        $('div').css("color","red");

        // -- Réaparition des div
        $('div').show();
    }); // -- Fin Fonction Anonyme

    // -- En utiliisant le chainage de méthode, vous pouvez faire s'enchainer plusieurs 
    // fonctions, les unes après les autres.

    $('p').hide().css('color', 'blue').css('font-size', '20px').delay(2000).show(500); //temps en millisecondes

    // -- Mais, c'est encore trop long !
    $('p').hide().css({'color' : 'blue' , 'font-size' : '20px'}).delay(2000).show(400); // {Objet avec CSS}
});


