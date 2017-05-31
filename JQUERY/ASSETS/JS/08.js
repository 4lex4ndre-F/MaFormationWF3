    /*---------------------------------------------------/
        CONSIGNE : 
        1. Créer un Formulaire HTML permettant le 
        remplissage d'une Fiche de Contact : Nom, Prénom,
        Email et le Téléphone.
        
        2. Après vérification des informations, vous
        ajouterez le nouveau contact dans un tableau de 
        contacts.
        
        3. Vous afficherez ensuite l'ensemble des contacts
        du tableau sur votre page HTML à la suite de votre
        formulaire. (Vous utiliserez une <table>)
        
        4. BONUS : Utilisation de Notification, Local Storage et Bootstrap.
    \--------------------------------------------------------*/




// -- Initialisation de JQuery

$(function (){

    // -- Déclaration de variables
    var contact =[];

    /*------------------------------------------------------------------
            DECLARATION DES FONCTIONS
    ------------------------------------------------------------------*/

    // -- fonction ajouter contact dans le tableau, mettre à jour le tableau HTML, réinitialliser le formulaire et afficher une notification
    function ajouterContact(contact) {
        // remplissage des cellules du tableau
        // ajout d'un tr à tbody
        //$('tbody').append('<tr></tr>');
        // ajout de 4 td à tr ; chaque td ayant une valeur nom.val(), prenom.val(), etc.
        
        //$('tbody').find('tr').append('<td>' + nom.val() + '</td>');
        //$('tbody').find('tr').append('<td>' + prenom.val() + '</td>');
        //$('tbody').find('tr').append('<td>' + email.val() + '</td>');
        //$('tbody').find('tr').append('<td>' + tel.val() + '</td>');

        $('tbody').append('<tr><td>' + nom.val() + '</td><td>' + prenom.val() + '</td><td>' + email.val() + '</td><td>' + tel.val() + '</td></tr>');

    };

    // -- fonction réinitialisation du formulaire : RAZ formulaire après ajout d'un contact
    function reinitialisationFormulaire() {

    };

    // -- Focntion d'affichage d'une notification
    function afficheUneNotification() {
        $('div.alert-contact').show(50).delay(2000).hide(800);
    };

    // -- Vérification de la présence de contact dans Contacts
    function estCEQunContactEstPresent () {
        // -- si présence de contact dans le tableau, on enlève le tr de classe aucuncontact
        // -- je considère que il y a au moins un contact dans le tableau si le formulaire eest bien rempli (l.112)
        $('.aucuncontact').remove();
    };

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


/*---------------------------------------------
            TRAITEMENT DU FORMULAIRE
---------------------------------------------*/
    // -- 1. Vérification des informations
    // -- récupération/raccourcis des inputs
    var nom     = $('#nom');
    var prenom  = $('#prenom');
    var email   = $('#email');
    var tel     = $('#tel');
    
    // -- élément écouté = submit
    $('#contact').on('submit', function(event) {

        // -- suppression des erreurs en début de fonction submit
        $('.has-error').removeClass('has-error');
        
        
        
        // -- annulation du comportement par défaut du submit (redirection php)
        event.preventDefault();


        // -- vérifiçation du nom
        if(nom.val().length == 0) {
            nom.parent().addClass('has-error');

        }

        // -- vérification du prénom
        if(prenom.val().length == 0) {
            prenom.parent().addClass('has-error');

        }

        // -- vérification de l'email - appel de la fonction spécifique
        if(!validateEmail(email.val())) {
            email.parent().addClass('has-error');

        }

        // -- vérification du tel
        if(tel.val().length == 0 || $.isNumeric(tel.val()) == false) {
            tel.parent().addClass('has-error');

        }

        // -- si formulaire bien rempli
        if($('#contact').find('.has-error').length == 0) {
            ajouterContact(contact);
            estCEQunContactEstPresent();
            afficheUneNotification();
        }

        
    }) //fin de l'écoute sur submit
}); // fin du code JQuery