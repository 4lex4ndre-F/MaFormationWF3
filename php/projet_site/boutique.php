<?php
require("inc/init.inc.php");



// requetes tous les articles
$produits = $pdo->query("SELECT * FROM article");

// requete toutes les categories
$liste_categorie = $pdo->query("SELECT * FROM article GROUP BY categorie");



// la ligne suivante commence les affichages dans la page
require("inc/header.inc.php");
require("inc/nav.inc.php");
?>



    <div class="container">

        <div class="starter-template">
            <h1>Boutique</h1>
            <?php //echo $message; // messages destinés à l'utilisateur ?>
            <?= $message; // cette balise php inclue un echo, elle est équivalente à la ligne du dessus ?>
        </div>

        <div class="row">
        <!-- menu latéral -->
            <div class="col-sm-2">
                <?php 
                    // récupérer totues les catégories en BDD et les afficher dans une liste ul li sous forme de liens href avec une information GET par exemple: ?categorie=pantalon

                    
                    echo '<ul>';
                    while($liste = $liste_categorie->fetch(PDO::FETCH_ASSOC))
                    {
                        // echo '<pre>'; print_r($liste); echo '</pre>';
                        echo '<a href="?categorie=' . $liste['categorie'] .'"><li>' . $liste['categorie'] . '</li></a>';
                    }
                    echo '</ul>';                 

                ?>            
            </div>        
        

            <!-- articles -->
            <div class="col-sm-10">
                <?php
                // echo '<pre>'; print_r($_GET); echo '</pre>';
                    // afficher tous les produits dans cette page par exemple: un block avec image + titre + prix produit
                    
                    $categorie = "";
                    if(!isset($_GET['categorie']))
                    {
                        while($tous_les_produits = $produits->fetch(PDO::FETCH_ASSOC))
                        {
                            echo '<div class="vignette-article"><img src="' . URL . 'photo/' . $tous_les_produits['photo'] . '" width="150" /><br />' . $tous_les_produits['titre'] . '</div>';
                        }
                    } elseif(isset($_GET['categorie']))
                    {
                        $categorie = $_GET['categorie'];
                        echo '<pre>'; print_r($categorie); echo '</pre>';
                        // *******************************************************
                        //                      A FINIR !!!!
                        // *******************************************************
                    }                   
                ?>
            </div>
        </div>


    </div><!-- /.container -->

    <?php
    require("inc/footer.inc.php");