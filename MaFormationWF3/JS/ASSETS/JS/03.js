/*
    LA CONCATENATION
                            */
var DebutDePhrase       =   "Aujourd'hui ";
var DateDuJour          =   new Date(); // nouvel élément de type DATE (avec des propriété intrasèques).
var SuiteDePhrase       =   ", sont présents : ";
var NombreDeStagiaires  =   19;
var FinDePhrase         =   " stagiaires.<br>";

// -- Nous souhaitons afficher grâce à la concaténation, afficher tout ce petit monde,
// -- en un seul morceau !

document.write(DebutDePhrase + DateDuJour.getDate() + "/" + (DateDuJour.getMonth() + 1) + "/" + DateDuJour.getFullYear() + SuiteDePhrase + NombreDeStagiaires + FinDePhrase);

/*------------------------------------------------------------------
            EXERCICE :
            Créer une concaténation à partir des éléments suivants:
------------------------------------------------------------------*/

var phrase1     =   "Je m'appelle ";
var phrase2     =   "Alexandre et j'ai ";
var age         =   41;
var phrase3     =   " ans !";

document.write(phrase1 + phrase2 + age + phrase3);