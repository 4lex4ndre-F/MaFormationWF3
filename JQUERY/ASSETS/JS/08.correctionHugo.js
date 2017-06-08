// -- Initialisation de jQuery (DOM READY)
$(function() {

    // -- Déclaration de Variables
    var CollectionDeContacts = [];

    /* -------------------------------------------------------------\
    |              ~~~~ DECLARATION DES FONCTIONS ~~~~              |
    \------------------------------------------------------------- */

    // -- Fonction ajouterContact(Contact) : Ajouter un Contact dans le tableau de Contacts, mettre à jour le tableau HTML, réinitialiser le formulaire et afficher une notification.
    function ajouterContact(UnContact) {

        // -- ajout de "UnContact" dans le tableau CollectionDeContact
        CollectionDeContacts.push(UnContact);
        //console.log(CollectionDeContacts);

        // -- MAJ tableau HTML : enlever la ligne indiquant "aucun contact"
        $('.aucuncontact').hide(); // -- ou remove() pour effacer

        // -- MAJ tableau HTML : création du tr et des td correspondants à l'objet contact
        $('tbody').append('<tr><td>' + UnContact.nom + '</td><td>' + UnContact.prenom + '</td><td>' + UnContact.email + '</td><td>' + UnContact.tel + '</td></tr>');

        // -- appel de la fonction reinitialisation
        reinitialisationDuFormulaire();

        // -- appel notification
        afficheUneNotification()


}

    // -- Fonction RéinitialisationDuFormulaire() : Après l'ajout d'un contact, on remet le formulaire à 0 !
    function reinitialisationDuFormulaire() {

        // -- En Javascript
        // -- document.getElementById('contact').releasePointerCapture();

        // -- En JQuery -- get(0) car JQuery renvoi un tableau et reset est une fonction Javascript
        // -- console.log("contact log : " + $('#contact'));
        // -- console.log("contact.get(0) log : " + $('#contact').get(0));
        $('#contact').get(0).reset();
        // -- autre méthode
        // -- $('#contact .form-control').val('');

    }

    // -- Affichage d'une Notification
    function afficheUneNotification() {
        $('.alert-contact').fadeIn().delay(3000).fadeOut();
    }

    // -- Vérification de la présence d'un Contact dans Contacts
    function estCeQunContactEstPresent(UnContact) {
        
        // -- Booleenqui indique la présence ou pas d'un contact
        var estPresent = false;

        // -- On parcourt le tableau à la recherche d'une coreespondance
        for(var i = 0; i < CollectionDeContacts.length; i++) {

            // -- Vérification pour chaque contact du tableau si il y a une correspondance mon objet Contact - par l'email uniquement
            if(UnContact.email === CollectionDeContacts[i].email){
                
                // -- Si une correspondancce eest trouvée "estPresent" passe à VRAI (true)
                estPresent = true;

                // -- On arrête la boucle, plus besoin de poursuivre
                break;

            }

        }
        // -- On retourne estPresent
        return estPresent;

    }

    // -- Vérification de la validité d'un Email
    // : https://paulund.co.uk/regular-expression-to-validate-email-address
    function validateEmail(email){
        var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        var valid = emailReg.test(email);

        if(!valid) {
            return false;
        } else {
            return true;
        }
    }

    /* --------------------------------------------------------------
                    TRAITEMENT DE MON FORMULAIRE
    -------------------------------------------------------------- */

    // -- Détection de la soumission de mon Formulaire
    $('#contact').on('submit', function(e) {
        // -- Voir le contenu de l'évênement
        console.log(e);

        // -- Stopper la redirection de la page
        e.preventDefault();

        // -- Récupération des champs à vérifier
        var nom, prenom, email, tel;
        nom     = $('#nom');
        prenom  = $('#prenom');
        email   = $('#email');
        tel     = $('#tel');

        // -- Vérification des informations (remplissage des champs) - ô méthode / 07-validationForm.js
        var mesInformationsSontValides = true;

        // -- Vérification du nom
        if(nom.val().length == 0) {
            mesInformationsSontValides = false;
        }
        // -- Vérification du prenom
        if(prenom.val().length == 0) {
            mesInformationsSontValides = false;
        }
        // -- Vérification de l'email
        if(!validateEmail(email.val())) {
            mesInformationsSontValides = false;
        }
        // -- Vérification du tel
        if(tel.val().length == 0) {
            mesInformationsSontValides = false;
        }
        console.log('Est-ce que mes Informations sont valides ? ' + mesInformationsSontValides);

        if(mesInformationsSontValides) {
            // -- tout est correct, préparation du contact
            var contact = {
                'nom'       :   nom.val(),
                'prenom'    :   prenom.val(),
                'email'     :   email.val(),
                'tel'       :   tel.val()
            }
            // -- Observons dans la console
            console.log(contact);

            // -- Vérification avec estCeQunContactEstPresent
            if(!estCeQunContactEstPresent(contact)) {
                
                // -- Ajout du contact
                ajouterContact(contact);

                

            } else {
                alert('ATTENTION\nCe contact est déjà présent.')
                reinitialisationDuFormulaire();
            }



        } else {
            // -- Les information ne sont pas valides
            alert('ATTENTION\nVeuillez bien remplir tous les champs.') // -- \n = retour à la ligne
        }

    });

}); // -- Fin de jQuery READY !