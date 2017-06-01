// -- DECLARATION DE FONCTION de VALIDATION des EMAILS - paulund.co.uk : https://paulund.co.uk/regular-expression-to-validate-email-address
function validateEmail(email){
	var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	var valid = emailReg.test(email);

	if(!valid) {
        return false;
    } else {
    	return true;
    }
}

// -- Initialisation de JQuery

$(function() {

    // -- Ecouter a quel mompent est soumi notre formulaire
    // -- A la soumission du formullaire, je vais exécuter une fonction anonyme
    // En JS : document.getElementbyId('contact').addEventListener('submit', MaFonctionAExecuter);

    $('#contact').on('submit', function(event) {
        // -- event correspond ici à notre évênement "submit"


        // -- Arreter la redirection HTML5
        event.preventDefault();

        // -- Suppression des erreurs à chaque submit
        // -- RAZ des classes has-error
        $('#contact .has-error').removeClass('has-error');
        // -- Suppression des <p> de classe text-danger
        $('#contact .text-danger').remove();
        // -- Suppression des div de classe alert
        $('#contact .alert').remove();


        // -- Déclaration des variables (champs à vérifier)
        var nom         = $('#nom'); // -- pas de .val() ici car on veut récupérer le champs entier et no seulement sa valeur !
        var prenom      = $('#prenom');
        var email       = $('#email');
        var tel         = $('#tel');
        

        // -- Je passe à la vérification de chaque champs

            // -- 1. Vérification du nom
            if(nom.val() == "") {          
                nom.parent().addClass('has-error'); // -- On rajoute la classe Bootstrap has-error
                
                // -- Rajouter un paragraphe d'alerte
                $("<p class='text-danger'>N'oubliez pas de saisir votre nom</p>").appendTo(nom.parent());
            }

            // -- 2. vérification du prénom
            if(prenom.val().length == 0) {          
                prenom.parent().addClass('has-error'); // -- On rajoute la classe Bootstrap has-error
                
                // -- Rajouter un paragraphe d'alerte
                $("<p class='text-danger'>N'oubliez pas de saisir votre prenom</p>").appendTo(prenom.parent());
            }

            // -- 3. Vérification de l'email avec la focntion du haut de page (récup sur le net)
            if(!validateEmail(email.val())){
                email.parent().addClass('has-error');
                $("<p class='text-danger'>Vérifiez votre adresse email</p>").appendTo(email.parent());
            }

            // -- 4. vérification du tel
            if(tel.val().length == 0 || $.isNumeric(tel.val()) == false) {
                tel.parent().addClass('has-error');
                $("<p class='text-danger'>Vérifiez votre n° de téléphone</p>").appendTo(tel.parent());
            }

        
        if($(this).find('.has-error').length == 0) {
            $(this).replaceWith('<div class="alert alert-success">Votre demande a bien été envoyée ! Nous vous contacterons dans les plus brefs délais.</div>');
        } else {
            $(this).prepend('<div class="alert alert-danger">Nous n\'avons pas été en mesure de valider votre demande</div>');
        }


    });
});