// -- DOM Ready
$(function(){

    // -- Ecoute de l'évênement click sur button
    $('#play').click(function() {
        // -- Executer l'animation sur la classe carre avec animate()
        $('.carre').animate({
            left    : 250,
            width   : 250,
            height  : 250
        }, 1000,    function() {
                        alert('Fin de l\'animation')
                    });
    })
    /* 
        JQuery dispose aussi de fonctions raccourcies pour les animations les plus courantes :
            fadeIn(), fasdeOut() mais aussi slideDown() et slideUp().
    */
});