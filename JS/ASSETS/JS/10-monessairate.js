// TABLEAU de MOYENNES par ETUDIANT

/* Les étudiants sont en <ol>, les matières sont en <ul>
*/

// Création du tableau 3D
var TableauMoyenne = [
    //chaque étudiant est un objet
    {
        "étudiant" : "Hugo LIEGEARD",
            // les matières et les notes sont contenus dans l'objet étudiant
            "matières" : {
                "francais"  : 4,
                "math"      : 8,
                "physique"  : 18
            },
     },
     
    //chaque étudiant est un objet
    {
        "étudiant" : "Karim IDAHADENE",
            // les matières et les notes sont contenus dans l'objet étudiant
         "matières" : {
            "francais"  : 8,
            "math"      : 18.5,
            "physique"  : 18,
            "anglais"   : 13
         },
     },
    //chaque étudiant est un objet
    {
        "étudiant" : "Rudy HERICOURT",
            // les matières et les notes sont contenus dans l'objet étudiant
        "matières" : {
            "francais"  : 10.5,
            "math"      : 11,
            "physique"  : 4
        },
     },
];



// affichage de la liste des étudiants
document.write("<ol>");
for(var i=0; i < TableauMoyenne.length; i++) { 
   document.write("<li>" + TableauMoyenne[i].étudiant + "</li>");
        //boucle d'affichage des matières
        document.write("<ul>");
        for(var k = 0; k < TableauMoyenne[i].matières.length; k++) {
            
            document.write("<li>" + TableauMoyenne[i].matières + "</li>")
        }
        document.write("</ul>")
}

document.write("</ol>");
console.log(TableauMoyenne[2].matières);