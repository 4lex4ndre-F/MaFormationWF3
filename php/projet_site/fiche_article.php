<?php
require("inc/init.inc.php");

//***************************************
//          restrictions d'accès
//***************************************

// on vérifie si l'indice id_article existe dans GEt ou s'il n'est pas vide ou s'il est bien un chiffre.
if(empty($_GET['id_article']) || !is_numeric($_GET['id_article']))
{
    header("location:boutique.php");
}

// récupération du produit
$id_article = $_GET['id_article'];
$recup_article = $pdo->prepare("SELECT * FROM article WHERE id_article = :id_article");
$recup_article->bindParam(':id_article', $id_article, PDO::PARAM_STR);
$recup_article->execute();

// récupération du stock
$stock = $pdo->query("SELECT stock FROM article");

// vérification si l'on a bien récupéré un article ou si nous avons une réponse vide (exemple changement d'id_article dans l'url par l'utiliisateur.)
if($recup_article->rowCount() < 1)
{
    // s'il y a moins d'une ligne, alors la réponse de la BDD est vide donc on redirige vers l'accueil
    header("location:boutique.php");
}

//***************************************
//          FIN restrictions d'accès
//***************************************

$article = $recup_article->fetch(PDO::FETCH_ASSOC);

// affichage sexe
$sexe = "";
if($article['sexe'] == 'm')
{
    $sexe = 'Homme';
}
else{
    $sexe = 'Femme';
}






// la ligne suivante commence les affichages dans la page
require("inc/header.inc.php");
require("inc/nav.inc.php");
echo '<pre>'; print_r($article); echo '</pre>';

// Dans cette page, afficher les informations de l'article sauf le stock
// mettre également en place un lien retour vers votre sélection sur la boutique

?>

    <div class="container">

        <div class="starter-template">
            <h1>Fiche article</h1>
            <?php //echo $message; // messages destinés à l'utilisateur ?>
            <?= $message; // cette balise php inclue un echo, elle est équivalente à la ligne du dessus ?>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <img class="img-responsive" src="<?= URL ?>photo/<?= $article['photo'] ?>" />
            </div>

            <div class="col-sm-6">
                <h5>Article: <?= $article['titre']; ?></h5>
                <p>Référence: <?= $article['reference']; ?></p>
                <p>Catégorie: <?= $article['categorie']; ?></p>
                <p>Couleur: <?= $article['couleur']; ?></p>
                <p>Taille: <?= $article['taille']; ?></p>
                <p>Sexe: <?= $sexe ?></p>
                <p>Descfription: <?= $article['description']; ?></p>
            </div>

            <div class="col-sm-3">
                <p>prix: <?= $article['prix'] ?> €</p>
                <?php

                    // on affiche le formulaire si le stock est >= 0
                    if($article['stock'] > 0)
                    {

                        // formulaire d'ajout au panier
                        echo '<form action="panier.php" method="post">';
                            
                            // on récupère l'id_article dans un champ caché afin de savoir ensuite quel est le produit qui a été ajouté.
                            echo '<input type="hidden" name="id_article" value="' . $article['id_article'] .'" />';

                            // faire un champ select pour le choix de la quantité selon la quantité disponible du produit avec une sécurité" pour afficher maximum 7 si la quantité est supérieure
                            echo '<select name="quantite" class="form-control">';
                                for($i = 1; $i <= $article['stock'] && $i <8; $i++) // 2 conditions dans la boucle
                                {
                                    echo '<option>' . $i . '</option>';
                                }
                            echo '</select>';

                            echo '<input type="submit" name="ajout_panier" value="Ajouter au panier" class="form-control btn btn-warning"/>';

                        echo '</form>';

                    }
                    else
                    {
                        echo '<h3>Rupture de stock pour ce produit.</h3>';
                    }

                    // bouton retour boutique
                    echo '<a href="boutique.php?categorie=' . $article['categorie'] . '" class="btn btn-warning form-control">Retour vers votre sélection</a>';
                ?>
            </div>
        </div><!-- /row -->

    </div><!-- fin /.container -->



<?php
require("inc/footer.inc.php");