<?php

// json_encode() => transforme un tableau ARRAY en format JSON
// json_decode() => transforme un format JSON en tableau ARRAY

$tab = array();
$tab['resultat'] = "";


if(isset($_POST['personne']))
{
    $prenom = $_POST['personne'];

    // récupération du contenu d'un fichier
    $fichier = file_get_contents("fichier.json");
    $json = json_decode($fichier, true);

    // boucle de parcours du tableau $json
    foreach($json AS $valeur)
    {
        if($valeur['prenom'] == strtolower($prenom))
        {
            $tab["resultat"] = "<table border='1' style='border-collapse: collapse; margin: 0 auto;'>
                                    <tr>
                                        <td style='padding: 10px'>" . $valeur['nom'] . "</td>
                                        <td style='padding: 10px'>" . $valeur['prenom'] . "</td>
                                        <td style='padding: 10px'>" . $valeur['salaire'] . "</td>
                                        <td style='padding: 10px'>" . $valeur['dateEmbauche'] . "</td>
                                    </tr>
                                </table>";
        }
    }
}
echo json_encode($tab);