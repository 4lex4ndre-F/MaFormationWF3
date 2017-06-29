<?php
require("../inc/init.inc.php");


// restriction d'accès, si l'utillisateur n'est pas admin alors il ne doit pas acceder à cette page.
if(!utilisateur_est_admin())
{
    header("location:../connexion.php");
    exit(); // pour ne pas exécuter la suite du code - arrêt de l'exécution du script 
}

//déclaration variable de controle
$erreur = "";

// préparation des variables de récupération des champs
$id_article = "";
$reference = "";
$categorie = "";
$titre = "";
$description = "";
$couleur = "";
$taille = "";
$sexe = "";
$photo_bdd = "";
$prix = "";
$stock = "";


if(isset($_POST['id_article']) && isset($_POST['reference']) &&isset($_POST['categorie']) && isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['couleur']) && isset($_POST['sexe']) && isset($_POST['prix']) && isset($_POST['stock']) && isset($_POST['taille']))
{
    // attribution des valeurs saisies dans les champs aux variables
    $id_article = $_POST['id_article'];
    $reference = $_POST['reference'];
    $categorie = $_POST['categorie'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $couleur = $_POST['couleur'];
    $taille = $_POST['taille'];
    $sexe = $_POST['sexe'];
    $prix = $_POST['prix'];
    $stock = $_POST['stock'];

    // /!\ reference = UNIQUE
    // vérification de la présence de la référence dans la BDD
    $verif_ref = $pdo->prepare("SELECT * FROM article WHERE reference = :reference");
    $verif_ref->bindParam(':reference', $reference, PDO::PARAM_STR);
    $verif_ref->execute();
    if($verif_ref->rowCount() > 0)
    {
        $message .= '<div class="alert alert-danger" role="alert" style="margin-top: 20px;">Référence article existante.<br />Essayez de nouveau.</div>';
        $erreur = true;
    }

    // vérification du champ titre (vide ou pas)
    if(empty($titre))
    {
        $message .= '<div class="alert alert-danger" role="alert" style="margin-top: 20px;">Le champs "titre" est obligatoire..<br />Essayez de nouveau.</div>';
        $erreur = true;
    }

    // --------------------------------------- Controles sur l'image ---------------------------------------
    // $_FILES est la superglobale -> tableau array multidimensionnel

    //vérification si l'utilisateur a chargé une image
    if(!empty($_FILES['photo']['name']))
    {
        // 1 fichier a été chargé via le formulaire.

        // on concatène la référence sur le titre afin de ne jamais avoir un fichier avec un nom déjà existant sur le serveur.
        $photo_bdd = $reference . '_' . $_FILES['photo']['name'];

        // vérification de l'extension de l'image (acceptées: jpg / jpeg / png / gif)
        $extension = strrchr($_FILES['photo']['name'], '.'); // cette fonction prédéfinie permet de découper une chaîne de caractère selon un caractère fourni en deuxième argument. Attention, cette fonction découpera la chaîne à partir de la dernière occurence du deuxième argument (donc on renvoi en résultat la chaîne comprise après le dernier point trouvé)
        // exemple: maphoto.jpg => on récupère .jpg
        // exemple: ma.photo.png => on récupère .png
        // var_dump($extension);

        // on transforme $extension afin que tous les caractères soient en minuscule
        $extension = strtolower($extension); // inverse strtoupper()

        // on enlève le "."
        $extension = substr($extension, 1); // .jpg => jpg

        // les extensions acceptées
        $tab_extension_valide = array("jpg", "jpeg", "png", "gif");

        // nous pouvons donc vérifier si $extension fait partie des valeurs autorisées dans $tab_extension_valide
        $verif_extension = in_array($extension, $tab_extension_valide); // in_array vérifie si une valeur fournie en premier argument fait partie des valeurs contenues dans le tableau array fournit en deuxième argument.

        if($verif_extension && !$erreur)
        {
            // extension valide + pas d'erreur
            $photo_dossier = RACINE_SERVEUR . 'photo/' . $photo_bdd;

            copy($_FILES['photo']['tmp_name'], $photo_dossier);
            // copy() permet de copier un fichier depuis un emplacement fourni en pemier argument vers un emplacement fourni en deuxième argument.
        }
        elseif(!$verif_extension) {
            // si l'extension du fichier n'est pas valide
            $message .= '<div class="alert alert-danger" role="alert" style="margin-top: 20px;">Format de l\'image invalide.<br /> extension acceptées:  "jpg", "jpeg", "png", "gif"</div>';
            $erreur = true;
        }
        


    }





    // autres vérifications à faire (sur tous les champs)
    if(!$erreur)
    {

        // insertion des produits
        $ajout_article = $pdo->prepare("INSERT INTO article (reference, categorie, titre, description, couleur, taille, sexe, prix, stock, photo) VALUES (:ref, :cat, :titre, :desc, :couleur, :taille, :sexe, :prix, :stock, :photo)");
        $ajout_article->bindParam(':ref', $reference, PDO::PARAM_STR);
        $ajout_article->bindParam(':cat', $categorie, PDO::PARAM_STR);
        $ajout_article->bindParam(':titre', $titre, PDO::PARAM_STR);
        $ajout_article->bindParam(':desc', $description, PDO::PARAM_STR);
        $ajout_article->bindParam(':couleur', $couleur, PDO::PARAM_STR);
        $ajout_article->bindParam(':taille', $taille, PDO::PARAM_STR);
        $ajout_article->bindParam(':sexe', $sexe, PDO::PARAM_STR);
        $ajout_article->bindParam(':prix', $prix, PDO::PARAM_STR);
        $ajout_article->bindParam(':stock', $stock, PDO::PARAM_STR);
        $ajout_article->bindParam(':photo', $photo_bdd, PDO::PARAM_STR);
        $ajout_article->execute();

    }
    // ----------------------------------------------------------------------------------------------------------------------
    // FIN ENREGISTREMENT DES PRODUITS
    // ----------------------------------------------------------------------------------------------------------------------
} // fin du if isset


// la ligne suivante commence les affichages dans la page
require("../inc/header.inc.php");
require("../inc/nav.inc.php");
//echo '<pre>'; print_r($_POST);echo '</pre>';
//echo '<pre>'; print_r($_FILES); echo '</pre>';
?>



    <div class="container">

        <div class="starter-template">
            <h1> Gestion Boutique</h1>
            <?php //echo $message; // messages destinés à l'utilisateur ?>
            <?= $message; /* cette balise php inclue un echo, elle est équivalente à la ligne du dessus*/ ?>
            <hr />
            <a href="?action=ajout" class="btn btn-warning">Ajouter un produit</a>
            <a href="?action=affichage" class="btn btn-warning">Afficher les produit</a>
        </div>

        <?php // affichage de contenu (formulaire d'ajout d'article) en fonction du clic
        if(isset($_GET['action']) && $_GET['action'] == 'ajout')
        {
        ?>
        
        
        <div class="row cadre">

                <h3>Ajout d'articles</h3>
                <p class="text-danger">* texte obligatoire</p>
                <div class="col-sm-6">
                    <form action="" method="post" enctype="multipart/form-data"> <!-- enctype pour accepter les pièces jointes -->
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_article" id="id_article" value="<?php //echo $id_article; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="reference">Référence article <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="reference" id="reference" value="<?php echo $reference; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="categorie">Categorie</label>
                            <select class="form-control" name="categorie" id="categorie" >
                                <option value="chaussure" >Chaussure</option>   
                                <option value="pantalon" <?php if($categorie == 'pantalon') { echo 'selected'; }?> >Pantalon</option>       
                                <option value="chemise" <?php if($categorie == 'chemise') { echo 'selected'; }?> >Chemise</option>
                                <option value="pull" <?php if($categorie == 'pull') { echo 'selected'; }?> >Pull</option>                    
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="titre">Titre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="titre" id="titre" value="<?php echo $titre; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" ><?php echo $description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="couleur">Couleur</label>
                            <select class="form-control" name="couleur" id="couleur" value="<?php echo $couleur; ?>" />
                                <option value="blanc" >blanc</option>
                                <option value="noir" <?php if($couleur == 'noir') { echo 'selected'; }?> >noir</option>
                                <option value="bleu" <?php if($couleur == 'bleu') { echo 'selected'; }?> >bleu</option>
                                <option value="rouge" <?php if($couleur == 'rouge') { echo 'selected'; }?> >rouge</option>
                                <option value="vert" <?php if($couleur == 'vert') { echo 'selected'; }?> >vert</option>
                                <option value="jaune" <?php if($couleur == 'jaune') { echo 'selected'; }?> >jaune</option>
                                <option value="orange" <?php if($couleur == 'orange') { echo 'selected'; }?> >orange</option>
                            </select>
                        </div>
                </div><!-- fin .col-sm-6 -->
                <div class="col-sm-6">
                        <div class="form-group">
                            <label for="taille">taille</label>
                            <select class="form-control" name="taille" id="taille" />
                                <option value="xxs" >XXS</option>
                                <option value="xs" <?php if($taille == 'xs') { echo 'selected'; }?> >XS</option>
                                <option value="s" <?php if($taille == 's') { echo 'selected'; }?> >S</option>
                                <option value="medium" <?php if($taille == 'medium') { echo 'selected'; }?> >M</option>
                                <option value="l" <?php if($taille == 'l') { echo 'selected'; }?> >L</option>
                                <option value="xl" <?php if($taille == 'xl') { echo 'selected'; }?> >XL</option>
                                <option value="xxl" <?php if($taille == 'xxl') { echo 'selected'; }?> >XXL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <select class="form-control" name="sexe" id="sexe"  />
                                <option value="m">Homme</option>
                                <option value="f" <?php if($sexe == 'f') { echo 'selected'; }?> >Femme</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" id="photo" />
                        </div>
                        <div class="form-group">
                            <label for="prix">prix</label>
                            <input type="text" class="form-control" name="prix" id="prix" value="<?php echo $prix; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="stock">stock</label>
                            <input type="text" class="form-control" name="stock" id="stock" value="<?php echo $stock; ?>" />
                        </div>
                        <input type="submit" class="form-control btn btn-success" value="Valider">
                    </form>
                </div><!-- fin .col-sm-6 -->
               
                    
         <?php } ?><!-- accolade de fermeture de la condition d'affichage du formulaire d'ajout d'article -->  

        </div><!-- fin .row -->
        <?php // affichage des articles dans un tableau
        if(isset($_GET['action']) && $_GET['action'] == 'affichage')
        {
            $resultat = $pdo->query("SELECT * FROM article");

                // balise ouverture du tableau
                echo '<table class="table table-bordered">';
                echo '<hr />';
                    // première ligne du tableau pour le nom des colonnes
                    echo '<tr>';
                        // récupération du nombre de colonnes dans la requête:
                        $nb_col = $resultat->columnCount();
                        for($i = 0; $i < $nb_col; $i++)
                        {
                            //echo '<pre>'; print_r($resultat->getColumnMeta($i)); echo '</pre><hr />';
                            $colonne = $resultat->getColumnMeta($i); // on récupère les informations de la colonne en cours afin ensuite de demander le name
                            echo '<th>' . $colonne['name'] . '</th>';
                        }
                    echo '</tr>';

                    // suite des lignes
                    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '<tr>';

                            foreach($ligne AS $indice => $info)
                            {
                                //conditions pour description et photo
                                if($indice == 'photo')
                                {
                                    echo '<td><img src="' . URL . 'photo/' . $info . '" width="140" /></td>';
                                }/*
                                elseif($indice == 'description')
                                {
                                    // texte troncqué
                                }*/
                                else
                                {
                                    echo '<td>' . $info . '</td>';
                                }
                            }

                        echo '</tr>';
                    }
                echo '</table>';

        }
        ?>

    </div><!-- /.container -->

    <?php
    require("../inc/footer.inc.php");