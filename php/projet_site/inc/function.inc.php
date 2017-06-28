<?php

// fonction pour savoir si un utilisateur est connecté
function utilisateur_est_connecte()
{
    if(isset($_SESSION['utilisateur']))
    {
        // si l'indice utilisateur existe alors l'utilisateur est connecté car il est passé par la page de connexion
        return true; // on sort de la fonction et le return false en dessous ne sera pas pris en compte.
    }
    return false; // si on rentre pas dans le if, on retourne false.
}

// fonction pour savoir si un utilisateur est connecté mais aussi a la statut administrateur
function utilisateur_est_admin()
{
    if(utilisateur_est_connecte() && $_SESSION['utilisateur']['statut'] == 1)
    {
        return true;
    }
    return false;
}


/* fonction pour savoir si un utilisateur est connecté mais aussi a la statut administrateur
function utilisateur_est_admin_test()
{
    if(utilisateur_est_connecte() && $_SESSION['utilisateur']['statut'] == 1)
    {
        $retour = array();
        $retour['statut'] = true;

        return true;
    }
    return false;
}
*/