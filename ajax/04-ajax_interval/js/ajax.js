setInterval('ajax()', 5000);
// setInterval va executer la fonction ajax() toutes lles 5 sec.

function ajax() {

    if(window.XMLHttpRequest)
    {
        var xhttp = new XMLHttpRequest();
    }
    else
    {
        var xhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    // le fichier cible (de la requete)
    var file = 'ajax.php';

    xhttp.open("POST", file, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function () {
        if(xhttp.readyState == 4 && xhttp.status == 200) {
            console.log(xhttp.responseText);
            var retour = JSON.parse(xhttp.responseText);
            document.getElementById("conteneur").innerHTML = retour.tableau;
            // .tableau représente l'indice généré sur le script php contenant la réponse
        }
    }
    xhttp.send();
}