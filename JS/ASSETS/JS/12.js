/*-----------------------------------------------------------------------------------------
LE DOM
-----------------------------------------------------------------------------------------
Le DOM, est une interface de développement en JS pour HTML. Grâce au DOM, je vais être 
en mesure d'accêder / modifier mon HTML.

L'objet "document" : c'est le point d'entrée vers mon contenu HTML !

Chaque page chargées dans mon navigateur a un objet "document".
-----------------------------------------------------------------------------------------*/

// -Comment puis-je faire pour récupérer les différentes informations de ma page HTML ?

/*
document.getElementById() : C'set une fonction qui va permettre de récupérer un
élément HTML à partir de son Identifiant unique : ID
*/

var bonjour = document.getElementById("bonjour");
console.log(bonjour);


/*
document.getElementsByClassName : C'est une fonction qui va permettre de récupérer
un ou plusieurs éléments (une liste) HTML à partir d'e leur classe.
*/

var contenu = document.getElementsByClassName("contenu");
console.log(contenu);

// Me renvoi un tableau JS avec mes éléments HTML, ou encore autrement dit,
// une collection d'éléments HTML.


/*
document.getElementByTagName() : c'est une focntion qui va permettre de récupérer 
un ou plusieuers éléments (une liste) HTML à aprtir de leur <nom de balise>
*/

var span = document.getElementsByTagName("span");
console.log(span);