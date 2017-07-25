<?php
/*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Exercice 2 : « On part en voyage »
    Créer une fonction permettant de convertir un montant en euros vers un montant en dollars
    américains.
    Cette fonction prendra deux paramètres :
    ● Le montant de type int ou float
    ● La devise de sortie (uniquement EUR ou USD).
    Si le second paramètre est “USD”, le résultat de la fonction sera, par exemple :
    1 euro = 1.085965 dollars américains
    Il faut effectuer les vérifications nécessaires afin de valider les paramètres.
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

// Taux de change selon google:
// 1 Euro = 1.13626 U.S. dollars

// déclaration de la fonction de conversion
function conversion_euro_dollar ($somme, $devise_sortie)
{
    $taux = 0 ;
    if($devise_sortie == 'EUR' || $devise_sortie == '€')
    {
        $taux = 1 / 1.13626;
    }
    elseif($devise_sortie == 'USD' || $devise_sortie == '$')
    {
        $taux = 1.13626;
    }

    $resultat = $somme * $taux;
    $resultat = number_format($resultat, 2, ',', ' ');
    return $resultat;
}

//echo '<pre>'; print_r($_POST); echo '</pre>';



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Convertisseur monétaire</title>
</head>
<body>

    <div>
        <h3>montant à convertir</h3>
        <form action="" method="post">
            <div>
                <label for="montant">Montant</label>
                <input type="number" name="montant" />
            </div>
            <div>
                <label for="devise">Devise</label>
                <select name="devise" id="">
                    <option value="--">devise de sortie</option>
                    <option value="EUR">EUR - €</option>
                    <option value="USD">USD - $</option>
                </select>
            </div>
            <div>
                <input type="submit" value="convertir">
            </div>
        </form>
    </div>

    <div>
        <h3>Conversion en <?= $_POST['devise'] ?></h3>
        <p>Le montant que vous avez saisi correspond à : <?php echo conversion_euro_dollar($_POST['montant'], $_POST['devise']) . " " . $_POST['devise']; ?>
    </div>

</body>
</html>