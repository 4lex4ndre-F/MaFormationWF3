<?php

// connexionn à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));



// déclaration de variables de notification et de récup statut erreur
$message = "";
$erreur = false;

 $titre = "";
    $acteurs = "";
    $directeur = "";
    $producteur = "";
    $annee = "";
    $langue = "";
    $resume = "";
    $categorie = "";

// année en cours
$annee = date('Y');

///////////////////////////////////////////////////// controles /////////////////////////////////////////////////// 
if(!empty($_POST))
{

    // controle sur le titre
    if(empty($_POST['titre']))
    {
        $message .= '<div class="alert alert-danger">Attention, le titre du film est obligatoire.</div>';
        $erreur = true;
    }
    $taille_titre = iconv_strlen($_POST['titre']);
    if($taille_titre < 5)
    {
        $message .= '<div class="alert alert-danger">Attention, le titre du film est trop court.<br />Il doit avoir au moins 5 caractères.</div>';
        $erreur = true;
    }

    // controle sur les acteurs
    if(empty($_POST['acteurs']))
    {
        $message .= '<div class="alert alert-danger">Attention, le nom des acteurs est obligatoire.</div>';
        $erreur = true;
    }
    $taille_acteurs = iconv_strlen($_POST['acteurs']);
    if($taille_acteurs < 5)
    {
        $message .= '<div class="alert alert-danger">Attention, le nom des acteurs est trop court.<br />Il doit avoir au moins 5 caractères.</div>';
        $erreur = true;
    }

    // controle sur le directeur (réal)
    if(empty($_POST['directeur']))
    {
        $message .= '<div class="alert alert-danger">Attention, le nom du réalisateur est obligatoire.</div>';
        $erreur = true;
    }
    $taille_directeur = iconv_strlen($_POST['directeur']);
    if($taille_directeur < 5)
    {
        $message .= '<div class="alert alert-danger">Attention, le nom du réalisateur est trop court.<br />Il doit avoir au moins 5 caractères.</div>';
        $erreur = true;
    }

    // controle sur le producteur
    if(empty($_POST['producteur']))
    {
        $message .= '<div class="alert alert-danger">Attention, le nom du producteur est obligatoire.</div>';
        $erreur = true;
    }
    $taille_producteur = iconv_strlen($_POST['producteur']);
    if($taille_producteur < 5)
    {
        $message .= '<div class="alert alert-danger">Attention, le nom du producteur est trop court.<br />Il doit avoir au moins 5 caractères.</div>';
        $erreur = true;
    }

    // controle sur le synopsis
    if(empty($_POST['resume']))
    {
        $message .= '<div class="alert alert-danger">Attention, le synopsis est obligatoire.</div>';
        $erreur = true;
    }
    $taille_resume = iconv_strlen($_POST['resume']);
    if($taille_resume < 5)
    {
        $message .= '<div class="alert alert-danger">Attention, le synopsis est trop court.<br />Il doit avoir au moins 5 caractères.</div>';
        $erreur = true;
    }

    // controle sur les liens (merci Stackoverflow !)
    $url = $_POST['bande'];
    if (!empty($_POST['bande']) && !filter_var($url, FILTER_VALIDATE_URL))
    {
        $message .= '<div class="alert alert-danger">Attention, URL non valide.</div>';
        $erreur = true;
    }
    // il faudrait de plus vérifier la présence de "http://" et de "https://" et du "www." et les rajouter à l'url saise si ils sont absents.

    //////////////////////////////////////////////// fin des controles ///////////////////////////////////////////////// 


    // si le formulaire est corectement rempli, alors on insert le film dans la base de données
    if(!$erreur)
    {
        // déclaration des valeurs du formulaire dans des variables
        $titre = $_POST['titre'];
        $acteurs = $_POST['acteurs'];
        $directeur = $_POST['directeur'];
        $producteur = $_POST['producteur'];
        $annee = $_POST['annee'];
        $langue = $_POST['langue'];
        $resume = $_POST['resume'];
        $categorie = $_POST['categorie'];
        $lien = $_POST['bande'];

        // préparation de la requete d'insertion
        $req_insertion = $pdo->prepare("INSERT INTO movies (title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES (:titre, :acteurs, :directeur, :producteur, :annee, :langue, :resume, :categorie, :lien)");
        $req_insertion->bindParam(":titre", $titre, PDO::PARAM_STR);
        $req_insertion->bindParam(":acteurs", $acteurs, PDO::PARAM_STR);
        $req_insertion->bindParam(":directeur", $directeur, PDO::PARAM_STR);
        $req_insertion->bindParam(":producteur", $producteur, PDO::PARAM_STR);
        $req_insertion->bindParam(":annee", $annee, PDO::PARAM_STR);
        $req_insertion->bindParam(":langue", $langue, PDO::PARAM_STR);
        $req_insertion->bindParam(":resume", $resume, PDO::PARAM_STR);
        $req_insertion->bindParam(":categorie", $categorie, PDO::PARAM_STR);
        $req_insertion->bindParam(":lien", $lien, PDO::PARAM_STR);
        $req_insertion->execute();
        
        
        $message .= '<div class="alert alert-success">Base de données mise à jour.</div>';
    }

} // fin du if(!empty($_POST))

//echo '<pre>'; print_r($annee); echo '</pre>';
echo '<pre>'; print_r($_POST); echo '</pre>';
?>
<!DOCTYPE html>
<html lang="fren">
<head>
    <meta charset="UTF-8">
    <title>gestion des films</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">


        <!-- Static navbar -->
        <nav class="navbar navbar-default">
                
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="exercice_3_liste.php">Liste des films</a></li>
                        <li><a href="exercice_3.php">Ajouter un film</a></li>
                    </ul>                    
                </div><!--/.nav-collapse -->
        </nav>

        <!-- titre et notifications -->
        <h1>Ajouter un film</h1>
        <?= $message ?>
        <hr />

        <!-- Formulaire d'ajout de film -->
        <div class="row">
            <form class="form-horizontal" method="post" action="">
                <div class="form-group">
                    <label for="titre" class="col-sm-2 control-label">Titre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="titre" name="titre">
                    </div>
                </div>
                <div class="form-group">
                    <label for="acteurs" class="col-sm-2 control-label">Acteurs</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="acteurs" name="acteurs">
                    </div>
                </div>
                <div class="form-group">
                    <label for="directeur" class="col-sm-2 control-label">Réalisateur</label>
                        <div class="col-sm-10">
                    <input type="text" class="form-control" id="directeur" name="directeur">
                    </div>
                </div>
                <div class="form-group">
                    <label for="producteur" class="col-sm-2 control-label">Producteur</label>
                        <div class="col-sm-10">
                    <input type="text" class="form-control" id="producteur" name="producteur">
                    </div>
                </div>
                <div class="form-group">
                    <label for="annee" class="col-sm-2 control-label">Année de production</label>
                    <div class="col-sm-10">
                        <select name="annee" id="annee">
                            <?php
                                //boucle d'affichage des années
                                for($i = 1900; $i <= $annee; $i++)
                                {
                                    echo '<option class="form-control" value="' . $i . '">' . $i . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="langue" class="col-sm-2 control-label">Langue</label>
                    <div class="col-sm-10">
                        <select name="langue" id="langue">
                            <!-- Je ne met pas toutes les langues du monde de ce select par soucis de gain de temps !-->
                            <option class="form-control" value="fr">Français</option>
                            <option class="form-control" value="vostfr">Version originale sous-titrée</option>
                            <option class="form-control" value="vo">Version originale</option>
                        </select>
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="categorie" class="col-sm-2 control-label">Catégorie</label>
                    <div class="col-sm-10">
                        <select name="categorie" id="categorie">
                            <!-- Je ne met pas toutes les langues du monde de ce select par soucis de gain de temps !-->
                            <option class="form-control" value="fiction">Fiction</option>
                            <option class="form-control" value="documentaire">Documentaire</option>
                            <option class="form-control" value="film sérieux">Film sérieux</option>
                            <option class="form-control" value="film de propagande">Film de propagande</option>
                        </select>
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="resume" class="col-sm-2 control-label">Synopsis</label>
                    <div class="col-sm-10">
                        <textarea name="resume" id="resume" class="form-control" rows=""></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bande" class="col-sm-2 control-label">Bande annonce</label>
                        <div class="col-sm-10">
                    <input type="text" class="form-control" id="bande" name="bande">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>

            </form>

        </div><!-- fin .row -->
    </div><!-- fin .container -->
</body>
</html>