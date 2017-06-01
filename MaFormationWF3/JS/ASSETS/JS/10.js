// TABLEAU de MOYENNES par ETUDIANT
// COORECTION


// -- Petites fonctions de raccourci (lesflemmards.js)
function w(t) {
    document.write(t);
}
function l(e) {
    console.log(e);
}

// tableau 3D
var PremierTrimestre = [
    {
        "nom"       :   "LIEGEARD",
        "prenom"    :   "Hugo",
        "moyenne"   :   {
                            "francais"  :   4,
                            "math"      :   8,
                            "physique"  :  18
                        }
    }, 
    {
        "nom"       :   "MANNAS",
        "prenom"    :   "Tanguy",
        "moyenne"   :   {
                            "francais"  :   6,
                            "math"      :   15,
                            "physique"  :   9,
                            "anglais"   :   15.5
                        }
    }, 
    {
        "nom"       :   "ARAUJO",
        "prenom"    :   "Thiago",
        "moyenne"   :   {
                            "francais"  :   10,
                            "math"      :   15,
                            "physique"  :   16
                        }
    }, 
];


w('<ol>');
// je souhaite afficher la liste des étudiants.
for(i = 0; i < PremierTrimestre.length; i++ ) {

    // On récupère l'objet étudiant de l'itération - Etape pas nécessaire, utile pour la compréhension de l'exo
    let Etudiant = PremierTrimestre[i];

    // vérification avec fonction console.log
    l(Etudiant);

    // affichager le prénom et le nom d'un étudiant
    w('<li>');
    w(Etudiant.prenom + " " + PremierTrimestre[i].nom);
        // Afficher la moyenne des notes de l'étudiant
        w('<ul>');
        var it = 0; // compteur itération à zero
        var tot = 0; // compteur note à zero
        for(let matiere in Etudiant.moyenne) { // parcours l'objet moyenne dans Etudiant - tous les éléments seront successivement pris comme valeur
            l(matiere);
            l(Etudiant.moyenne[matiere]) // log de la variable locale matiere
            w('<li>');
                w(matiere + " : " + Etudiant.moyenne[matiere]);
            w('</li>');
            // calucl du nombre d'itération (= nbre de matières) : 
            it ++;
            // calcul total
            tot += Etudiant.moyenne[matiere];
        }
        // fin de la boucle For in
        
            w('<li>');
                w('<strong>');
                    w("Moyenne : " + Math.round(tot / it)); // trouver pour 2 décimales après la virgule.
                w('</strong>');
            w('</li>');
        w('</ul>');
    w('</li>');
}
w('</ol>');