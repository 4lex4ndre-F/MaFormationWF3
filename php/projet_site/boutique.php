<?php
require("inc/init.inc.php");


$liste_article = $pdo->query("SELECT * FROM article");

// requetes tous les articles && filtre par catégorie
if($_POST)
{
    $condition = "";
    $arg_couleur = false;
    $arg_taille = false;

    if(!empty($_POST['couleur']))
    {
        $condition .= " WHERE couleur = :couleur";
        $arg_couleur = true;
        $filtre_couleur = $_POST['couleur'];


    }

    if(!empty($_POST['taille']))
    {
        if($arg_couleur)
        {
            $condition .= " AND taille = :taille";
        }
        else
        {
            $condition .= " WHERE taille = :taille";
        }
        $arg_taille = true;
        $filtre_taille = $_POST['taille'];
    }
        $liste_article = $pdo->prepare("SELECT DISTINCT * FROM article $condition ");
        // bindParam conditionnel
        if($arg_couleur)
        {
            $liste_article->bindParam(":couleur", $filtre_couleur, PDO::PARAM_STR);
        }

        if($arg_taille)
        {
            $liste_article->bindParam(":taille", $filtre_taille, PDO::PARAM_STR);
        }
        $liste_article->execute();
}
elseif(!empty($_GET['categorie']))
{
    $cat = $_GET['categorie'];
}


// requete toutes les categories
$liste_categorie = $pdo->query("SELECT DISTINCT categorie FROM article");

// requete de récupération des différentes couleurs de la BDD
$liste_couleur = $pdo->query("SELECT DISTINCT couleur FROM article ORDER BY couleur");

// requete de récupération des différentes tailles de la BDD
$liste_taille = $pdo->query("SELECT DISTINCT taille FROM article ORDER BY taille");

/******************************************************************************************************
                                            RECHERCHE
******************************************************************************************************/
// déclaration d'une variable de récupération du terme recherché
$demande = "";
$nb_resultats = 0;

// vérification de la demande par l'utilisateur d'une recherche sur mot clé
if(isset($_POST['recherche']) && !empty($_POST['recherche']))
{
    $message .= '<div class="alert alert-success" role="alert" style="margin-top: 20px;">Vous avez recherché le terme "' . $_POST['recherche'] . '"</div>';
    $demande = '%' . $_POST['recherche'] . '%';
    echo '<pre>'; print_r($demande); echo '</pre>';
}

// préparation d'une requete pour la barre de recherhce
$req = $pdo->prepare("SELECT * FROM article WHERE titre LIKE :titre OR description LIKE :description");
$req->bindParam(':titre',$demande, PDO::PARAM_STR);
$req->bindParam(':description',$demande, PDO::PARAM_STR);
$req->execute();
//*****************************************************************************************************
// préparation d'une requete pour les filtres



// la ligne suivante commence les affichages dans la page
require("inc/header.inc.php");
require("inc/nav.inc.php");                        
echo '<pre>'; print_r($_POST); echo '</pre>';
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
                    // récupérer toutes les catégories en BDD et les afficher dans une liste ul li sous forme de liens href avec une information GET par exemple: ?categorie=pantalon

                    
                    echo '<ul class="list-group">';
                    echo '<li class="list-group-item"><a href="boutique.php">Tous les articles</a></li>';
                    while($liste = $liste_categorie->fetch(PDO::FETCH_ASSOC))
                    {
                        // echo '<pre>'; print_r($liste); echo '</pre>';
                        echo '<li class="list-group-item"><a href="?categorie=' . $liste['categorie'] .'">' . $liste['categorie'] . '</a></li>';
                    }
                    echo '</ul>';
                    echo '<hr />';

                    // Formulaire de recherche
                    echo    '<form action="" method="post">
                                <div class="form-group">
                                    <label for="recherche" class="recherche" ><span class="glyphicon glyphicon-search"></span>  Rechercher un mot</label>
                                    <input type="text" class="form-control" name="recherche" id="recherche" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary" value="Rechercher" name="bouton" id="bouton" />
                                </div>
                            </form>';

                    // filtres de recherche
                    echo    '<form action="" method="post">';/*

                                <label>filter par taille: </label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="taille-xxl"  id="taille-xxl" value="true">
                                        XXL
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="taille-xl"  id="taille-xl" value="true">
                                        XL
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="taille_l"  id="taille_l" value="true">
                                        L
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="taille-m"  id="taille-m" value="true">
                                        M
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="taille-s"  id="taille-s" value="true">
                                        S
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="taille-xs"  id="taille-xs" value="true">
                                        XS
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="taille-xxs" id="taille-xxs" value="true">
                                        XXS
                                    </label>
                                </div>';*/

                        echo '<hr />';
                        
                        // affichage couleur
                        echo '<div class="form-group">
                                <label for="couleur">Filtrer par couleur</label>
                                <select name="couleur" id="couleur" class="form-control">';
                                echo '<option></option>';
                                while($couleur = $liste_couleur->fetch(PDO::FETCH_ASSOC))
                                {
                                    echo '<option>' . $couleur['couleur'] . '</option>';
                                }
                        echo '</select></div>';
                        echo '<hr />';

                        // affichage taille
                        echo '<div class="form-group">
                                <label for="taille">Filtrer par taille</label>
                                <select name="taille" id="taille" class="form-control">';
                                echo '<option></option>';
                                while($taille = $liste_taille->fetch(PDO::FETCH_ASSOC))
                                {
                                    echo '<option>' . $taille['taille'] . '</option>';
                                }
                        echo '</select></div>';
                        echo '<hr />';

                        // bouton submit
                        echo  '<div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary" value="Filtrer" name="bouton-filtre" id="bouton-filtre" />
                                </div>';

                        echo '</form>';

                    

                ?>
            </div><!-- /menu lateral -->
        

            <!-- articles -->
            <div class="col-sm-10">
                <?php
                    // vérification de la demande par l'utilisateur d'une recherche sur mot clé ***********************************************
                    if(isset($_POST['recherche']) && !empty($_POST['recherche']))
                    {
                        $message .= '<div class="alert alert-success" role="alert" style="margin-top: 20px;">Vous avez recherché le terme "' . $_POST['recherche'] . '"</div>';
                        $demande = $_POST['recherche'];                        
                        echo '<pre>'; print_r($demande); echo '</pre>';

                        // afficher tous les élément comprenant les mots recherchés
                        echo '<div class="row">';
                        $compteur ="";
                        while($article = $req->fetch(PDO::FETCH_ASSOC))
                        {
                            // afin de ne pas avoir de soucis avec le float, on ferme et on ouvre une ligne bootstrap (class="row") pour gérer les lignes d'afffichage
                            if($compteur%4 == 0 && $compteur != 0) { echo '</div><div class="row">'; }
                            $compteur ++;                            

                            echo '<div class="col-sm-3">';
                            echo '<div class="panel panel-default">';
                            echo '<div class="panel-body text-center">';
                            echo '<h5>' . $article['titre'] . '</h5>';
                            echo '<img src="' . URL . 'photo/' . $article['photo'] . '" class="img-responsive" />';
                            echo '<br /><p><b>Prix :</b>' . $article['prix'] . '€</p>';
                            echo '<hr />';
                            echo '<a href="fiche_article.php?id_article=' . $article['id_article'] . '" class="btn btn-primary">Voir la fiche article</a>';
                            echo '</div></div></div>';
                        }
                        echo '</div>'; 

                    }
                    else
                    {                   
                        // afficher tous les produits dans cette page par exemple: un block avec image + titre + prix produit 
                        echo '<div class="row">';
                            $compteur ="";
                            while($article = $liste_article->fetch(PDO::FETCH_ASSOC))
                            {
                                // afin de ne pas avoir de soucis avec le float, on ferme et on ouvre une ligne bootstrap (class="row") pour gérer les lignes d'afffichage
                                if($compteur%4 == 0 && $compteur != 0) { echo '</div><div class="row">'; }
                                $compteur ++;

                                echo '<div class="col-sm-3">';
                                echo '<div class="panel panel-default">';
                                echo '<div class="panel-body text-center">';
                                echo '<h5>' . $article['titre'] . '</h5>';
                                echo '<img src="' . URL . 'photo/' . $article['photo'] . '" class="img-responsive" />';
                                echo '<br /><p><b>Prix :</b>' . $article['prix'] . '€</p>';
                                echo '<hr />';
                                echo '<a href="fiche_article.php?id_article=' . $article['id_article'] . '" class="btn btn-primary">Voir la fiche article</a>';
                                echo '</div></div></div>';
                            }
                        echo '</div>';  
                    }              
                ?>
            </div>
        </div>


    </div><!-- /.container -->

    <?php
    require("inc/footer.inc.php");