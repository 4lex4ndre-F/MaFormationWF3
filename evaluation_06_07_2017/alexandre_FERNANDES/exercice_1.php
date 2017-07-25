<?php

// création d'un tableau en php
$tab = array('Prénom' => 'Alexandre', 'Nom' => 'FERNANDES', 'Adresse' => '4 place dees Canuts', 'code Postal' => 95100, 'Ville' => 'Argenteuil', 'Email' => '4lex.fernandes@gmail.com', 'Téléphone' => '06 30 86 91 90', 'Date de naissance' => '1976-01-31');
//echo '<pre>'; print_r($tab); echo'</pre>';
//echo '<pre>'; print_r($tab['Date de naissance']); echo'</pre>';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 1</title>
</head>
<body>
    <?php
        // Affichage des données du tableau dans un tableau HTML

        echo '<table>';

        // affichage des en-tête
            echo '<thead>';
                echo '<tr>';

                    foreach($tab AS $valeur => $indice)
                    {
                        echo '<td style="border: 1px solid black; padding: 5px;">' . $valeur . '</td>';
                    }

                echo '</tr>';
            echo '</thead>';
        // affichage des données
            echo '<tbody>';
                echo '<tr>';

                    foreach($tab AS $valeur => $indice)
                    {
                        // affichage date de naissance
                        if($valeur == 'Date de naissance')
                        {                            
                            $date = date_create_from_format ('Y-m-j', $indice);
                            echo '<td style="border: 1px solid black; padding: 5px;">' . date_format($date, 'j m Y') . '</td>';
                        }
                        // affichage des autres valeurs
                        else
                        {
                            echo '<td style="border: 1px solid black; padding: 5px;">' . $indice . '</td>';
                        }
                    }

                echo '</tr>';
            echo '</tbody>';

        echo '</table>';
    ?>
</body>
</html>