<?php
require("inc/init.inc.php");
$erreur = "";

/**********************************************************************************************************************
// Exercice:
// 1. modifier le projet site afin d'avoir la photo dans le panier et de l'afficher sur la page panier.
// 2. Afficher le prix total par ligne pour chaque article.
// 3. Mettre en place des filtres de recherche sur la page boutique (couleur / taille / sexe / prix / mot- clé)
// 4. envoyer un mail au client
**********************************************************************************************************************/ 






// vider le panier - avant la création du panier
if(isset($_GET['action']) && $_GET['action'] == 'delete')
{
    unset($_SESSION['panier']); // on pourrait aussi écraser les valuers du paniers avec des valeurs nulles, mais pas à cet emplacement
}

// Retirer un article du panier
if(isset($_GET['action']) && $_GET['action'] == 'retirer' && !empty($_GET['id_article']))
{
    retirer_article_du_panier($_GET['id_article']);
}



// création du panier
creation_panier();

// si l'utilisateur à cliqué sur ajouter au panier
if(isset($_POST['ajout_panier']))
{
    // si l'indice existe dans post alors l'utilisateur a cliqué sur le bouton ajouter au panier (depuis la page fiche_article.php)
    $info_article = $pdo->prepare("SELECT * FROM article WHERE id_article = :id_article");
    $info_article->bindParam(":id_article", $_POST['id_article'], PDO::PARAM_STR);
    $info_article->execute();

    $article = $info_article->fetch(PDO::FETCH_ASSOC);

    // ajout de la tva sur le prix
    $article['prix'] = $article['prix'] * 1.2;

    ajouter_article_au_panier($_POST['id_article'], $article['prix'], $_POST['quantite'], $article['titre']);

    // on redirige vers la même page pour perdre les informations dans le post afin d'éviter que la touche F5 rajoute un article au panier.
    header("location:panier.php");
}


// VALIDATION DU PAIEMENT DU PANIER
if(isset($_GET['action']) && $_GET['action'] == 'payer' && !empty($_SESSION['panier']['prix']))
{
   
    // si l'utiliisateur clic sur le bouton payer
    // 1ère action: vérification du stock disponible en comparaison des quantités demandées.
    for($i=0; $i < count($_SESSION['panier']['prix']); $i++)
    {
        $resultat = $pdo->query("SELECT * FROM article WHERE id_article = " . $_SESSION['panier']['id_article'][$i]);
        $verif_stock = $resultat->fetch(PDO::FETCH_ASSOC);
        if($verif_stock['stock'] < $_SESSION['panier']['quantite'][$i])
        {
           
            // si on rentre dans cete condition, alors il y a un stock inférieur à la quantité demandée.
            // 2 cas de figure: stock à zéro ou stock < quantité demandée
            if($verif_stock['stock'] > 0)
            {
                // il reste du stock alors on affecte directment le stock restant pour la quantité
                $_SESSION['panier']['quantite'][$i] = $verif_stock['stock'];
                $message .= '<div class="alert alert-danger" role="alert" style="margin-top: 20px;">Attention, la quantité de l\'article "' . $_SESSION['panier']['titre'][$i] . '" a été modifiée car notre stock est insuffisant !<br />Veuillez vérifier votre commande.</div>';
            }
            else
            {
                // il n'y a plus de stock, on retire l'article du panier
                retirer_article_du_panier($_SESSION['panier']['id_article'][$i]);
                $message .= '<div class="alert alert-danger" role="alert" style="margin-top: 20px;">Attention, l\'article "' . $_SESSION['panier']['titre'][$i] . '" a été supprimé de votre panier car nous sommes en rupture de stock !<br />Veuillez vérifier votre commande.</div>';
                $i--; // si nous enlevons un article du panier, il est necessaire de décrémenter (-1) la variable $i car avec array_splice() (voir retirer_article_du_panier() sur fonction.inc.php) les indices sont réordonnés.
            }
        $erreur = true;
        }
    }
    if(!$erreur) // pas d'erreur au niveau des stocks
    {   
        $id_membre = $_SESSION['utilisateur']['id_membre'];
        $montant_commande = montant_total();
        $pdo->query("INSERT INTO commande (id_membre, montant, date) VALUES ($id_membre, $montant_commande, NOW())");
        $id_commande = $pdo->lastInsertId(); // on récupère l'id inséré par la dernière requete
        $nb_tout_panier = count($_SESSION['panier']['titre']);
        for($i = 0; $i < $nb_tout_panier; $i++)
        {
            $id_article_commande = $_SESSION['panier']['id_article'][$i];
            $quantite_commande = $_SESSION['panier']['quantite'][$i];
            $prix_commande = $_SESSION['panier']['prix'][$i];
            $pdo->query("INSERT INTO details_commande (id_commande, id_article, quantite, prix) VALUES ($id_commande, $id_article_commande, $quantite_commande, $prix_commande)");

            // mise à jour du stock
            $pdo->query("UPDATE article SET stock = stock - $quantite_commande WHERE id_article = $id_article_commande");
        }
        unset($_SESSION['panier']);
    }
}

// la ligne suivante commence les affichages dans la page
require("inc/header.inc.php");
require("inc/nav.inc.php");
// echo '<pre>'; print_r($_POST); echo '</pre>';
// echo '<pre>'; print_r($_SESSION); echo '</pre>';
?>



    <div class="container">

        <div class="starter-template">
            <h1><span class="glyphicon glyphicon-shopping-cart"></span> Panier</h1>
            <?php //echo $message; // messages destinés à l'utilisateur ?>
            <?= $message; // cette balise php inclue un echo, elle est équivalente à la ligne du dessus ?>
        </div>

        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

            <table class="table table-bordered">
                <tr>
                    <th>Image</th>
                    <th>Article</th>
                    <th>Titre</th>
                    <th>Quantité</th>
                    <th>Prix unitaire TTC</th>
                    <th>Prix TTC</th>
                    <th>Action</th>
                </tr>
                <?php

                    // vérification si le panier est vide sur n'importe quel tableau array du dernier niveau
                    if(empty($_SESSION['panier']['id_article']))
                    {
                        echo '<tr><th colspan="7">Aucun article dans le panier</th></tr>';
                    }
                    else
                    {
                        // sinon on affiche tous les produits dans un tableau html sur n'importe quel tableau array du dernier niveau
                        $taille_tableau = sizeof($_SESSION['panier']['titre']);
                        for($i = 0; $i < $taille_tableau; $i++)
                        {
                            echo '<tr>';
                                // affichage image
                                $req_photo = $pdo->query("SELECT * FROM article WHERE id_article = " .$_SESSION['panier']['id_article'][$i]);
                                $photo = $req_photo->fetch(PDO::FETCH_ASSOC);
                                //echo '<pre>'; print_r($req_photo); echo '</pre>';
                                //echo '<pre>'; print_r($photo); echo '</pre>';
                                echo '<td><img class="img-responsive" src="' . URL .'photo/' . $photo['photo'] .'" alt="image_test" /></td>';

                                echo '<td>' . $_SESSION['panier']['id_article'][$i] . '</td>';
                                echo '<td>' . $_SESSION['panier']['titre'][$i] . '</td>';
                                echo '<td>' . $_SESSION['panier']['quantite'][$i] . '</td>';
                                echo '<td>' . number_format($_SESSION['panier']['prix'][$i], 2, ',', ' ') . ' €</td>';
                                // prix par ligne
                                echo '<td>' . number_format(($_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i]), 2, ',', ' ') . ' €</td>';
                                // bouton retirer
                                echo '<td ><a class="btn btn-danger" href="?action=retirer&id_article=' . $_SESSION['panier']['id_article'][$i] .'"><span class="glyphicon glyphicon-remove"></span></a></td>';
                            echo '</tr>';
                        }

                        // rajouter une ligne du tableau qui affiche un lien a href (?action=payer) pour payer le panier si l'utilisateur est connecté. Sinon proposer un texte pour proposer à l'utilisateur de s'inscrire ou de se connecter
                        if(utilisateur_est_connecte())
                        {
                            // ok bouton payer
                            echo '<tr>';
                                echo '<td colspan="2"><a class="btn btn-success" href="?action=payer">Payer</a></td>';
                                echo '<td colspan="2" class="total_ttc"><b>Total TTC:</b></td>';
                                echo '<td colspan="3"><b>' . number_format(montant_total(), 2, ',', ' ') . ' €</b></td>';
                            echo '</tr>';
                        }
                        else{
                            // pas ok. s'inscrire, se connecter
                            echo '<tr>';
                                echo '<td colspan="4"><a class="btn btn-warning" href="inscription.php">S\'inscrire</a></td>';
                                echo '<td colspan="3"><a class="btn btn-warning" href="connexion.php">Se connecter</a></td>';
                            echo '</tr>';
                        }
                        // rajouter une ligne du tableau qui affiche un bouton vider le panier uniquement si le panier n'est pas vide. Et faire le traitement afin que si on clique sur le bouton, le panier se vide. unset()
                        echo '<tr>';
                            echo '<td colspan="7"><a class="btn btn-warning" href="?action=delete">Vider le panier</a></td>';
                        echo '</tr>';                                              
                    }


                ?>
            </table>
            <hr />
            <p>Règlement par chèque uniquement ! <br />A l'adresse: 18 Geoffroy Lasnier 75004 Paris</p>
            <p>
            <?php
            if(utilisateur_est_connecte())
            {
                // si l'utilisateur est connecté
                echo '<address><b>Votre adresse de livraison est: </b><br />' . $_SESSION['utilisateur']['adresse'] . '<br />' . $_SESSION['utilisateur']['cp'] . '<br />' . $_SESSION['utilisateur']['ville'] .'</address>';
            }
            ?>
            </p>
            
            </div>
        </div><!-- /row -->
    </div><!-- /.container -->

    <?php
    require("inc/footer.inc.php");