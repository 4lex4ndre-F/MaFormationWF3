<?php

require_once("inc/init.inc.php");

$tab = array();
$tab['resultat'] = "";

$arg = isset($_POST['arg']) ? $_POST['arg'] : "";
$mode = isset($_POST['mode']) ? $_POST['mode'] : "";

if($mode == 'liste_membre_connecte' && !empty($arg) && $arg == 'retirer')
{
    // si on rentre ici, nous devons retirer un pseudo du fichier pseudo.txt. /!\ au sens entre cette condition et la suivante car la valeur de $mode est la même pour les deux...

    // on récupère le contenu de pseudo.txt sous forme de string
    $contenu = file_get_contents("pseudo.txt");

    // on remplace dans la chaine de caractère représentée par $contenu le pseudo par rien (pour le supprimer)
    $contenu = str_replace($_SESSION['utilisateur']['pseudo'], '', $contenu);

    // on remet le contenu dans le fichier pseudo.txt
    file_put_contents('pseudo.txt', $contenu);

}
elseif($mode == 'liste_membre_connecte')
{
    // si on rntre ici, nous devons récupérer la liste des membres sur le fichier pseudo.txt puis la renvoyer
    $fichier = file("pseudo.txt"); // $fichier est un array qui contient 1 indice pour chaque pseudo
    if(!empty($fichier)){
        // implode() permet de récupérer les valeurs d'un tableau array et de les renvoyer sous forme de chaine de caractères séparés par un séparateur fourni en premier argument.
        $tab['resultat'] .= '<p>' . implode('</p><p>', $fichier) . '</p>';
    }
    
}
elseif($mode == 'postMessage')
{
    // si l'la valeur de mode est égale à postMessage alors nous devons enregistrer le message de l'utilisateur
    if(!empty($arg)) // $arg est censé contenir le message à enregistrer, donc s'il n'est pas vide on l'enregistre
    {
        $id = $_SESSION['utilisateur']['id_membre'];
        $enregistrement = $pdo->prepare("INSERT INTO dialogue (id_membre, message, date_dialogue) VALUES ($id, :message, NOW())");
        $enregistrement->bindParam(':message', $arg, PDO::PARAM_STR);
        $enregistrement->execute();
        $tab['resultat'] .= "<p>message enregistré</p>";
    }
}
elseif($mode == 'message_tchat')
{
    // exercice: récupérer tous les messages de la bdd ainsi que les psuedo correspondant
    //les renvoyer dans $tab['resultat']
    // chaque message doit être affiché sous la forme: pseudo > message (couleur par sexe)

    $messages = $pdo->query("SELECT dialogue.message, membre.pseudo, membre.sexe FROM membre, dialogue WHERE membre.id_membre = dialogue.id_membre ORDER BY date_dialogue");
    while ($message = $messages->fetch(PDO::FETCH_ASSOC))
    {
        if ($message['sexe'] == 'f')
        {
            $tab['resultat'] .= "<span class='rose'>" . $message['pseudo'] . "</span>" . " > " . $message['message'] . "<br />";
        }
        else {
            $tab['resultat'] .= "<span class='bleu'>" . $message['pseudo'] . "</span>" . " > " . $message['message'] . "<br />";
        }
    }
}




echo json_encode($tab);