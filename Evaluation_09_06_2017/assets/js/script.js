
// -- FONCTIONS -------------

// Les feignasses.js ;-)
function l(e) {
    console.log(e)  
}

// Validation du textarea
function verifText(t){
    validation = true;  // On est optimiste, on sait que l'user fait les choses correctement...

    
    // Mais on vérifie tout de même
    if (t.length < 15) {
        validation = false;

        // on ajoute la classe .has-error au text-area
        $('#texteAdoption').addClass('has-error');
        // on ajoute une petite ligne d'info
        $('#texteAdoption').append('<p class="text-danger">Veuillez saisir au moins 15 caractères, merci.</p>');

    } // fin du if = pas bien



    //l("true ou false ?  : " + validation);
    return validation;

} // fin de la fonction verifText







// -- APPEL DE JQUERY -------------
$ (function() {
    l('JQuery est opérationnel');

    // Vérifaction du formaulaire au moment du submit
    $('form').on('submit', function(e) {
        

        // annulation de la redirection automatique
        e.preventDefault();

        
        // on annule la classe .has-error au text-area
        $('#texteAdoption .has-error').removeClass('has-error');
        // on retire la petite ligne d'info
        $('#texteAdoption .text-danger').remove();


        // la <select> n'a pas de possibilité de champs vide, du coup je ne pense pas qu'une validation s'impose, enfin si mais je ne pense pas avoir le temps de faire mon <select> moins bien afin de pouvoir faire une superbe validation dessus après.

        // Résultat du champ saisi
        texte = $('textarea').val();
        l("texte saisi dans textarea : " + texte);      // Je vérifie mon texte
        l("longueur du textarea : " + texte.length);    // Je vérifie ca marche

        // appel de la fonction de vérifiaction du textarea
        verifText(texte);

        if (validation) {
            // -- Affichage du message de félicitation
            $('#formulaireRemplaceable').remove();
            $('main div.container div.row').append('<div class="col-md-3 col-md-pull-9"><h3>Félicitation, vous venez d\'adopter un chat !</h3></div>');
        }


    }) // Fin du on.Submit



}); // Fi,n de JQuery