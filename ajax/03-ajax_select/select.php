<?php
$tab = array();
$tab['resultat'] = "";

if(!empty($_POST['pays']))
{
    // exercice: renvoyer dans $tab['resultat'] les villes selon la valeur de l'indice pays
    // sous-forme '<option>ville1</option><option>ville2</option>'
    $pays = $_POST['pays'];

    if($pays == 'France')
    {
        $tab['resultat'] = '<option>Paris</option>
                            <option>Bordeau</option>
                            <option>Lille</option>';
    }
    elseif($pays == 'Italie')
    {
        $tab['resultat'] = '<option>Rome</option>
                            <option>Milan</option>
                            <option>Turin</option>';
    }else
    {
        $tab['resultat'] = '<option>Madrid</option>
                            <option>San Sebastian</option>
                            <option>Valencia</option>';
    }
}

echo json_encode($tab);