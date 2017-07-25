<?php
require("inc/init.inc.php");

echo '<pre>'; print_r($_POST); echo '</pre>';

if($_POST)
{
    $erreur = '';
    // Exercice: controler les champs pseudo, nom, prenom, taille max: 20 caractères, taille min: 4 caractères
    // Controler que le pseudo lors de l'inscription n'existe pas déjà en BDD

    // -------------------------------------- controle pseudo --------------------------------------
    $pseudo_inscription = $_POST['pseudo'];
    $taille_pseudo = iconv_strlen($_POST['pseudo']);
    //echo '<pre>'; print_r($taille_pseudo); echo '</pre>';
    $req_verif_pseudo = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
    $req_verif_pseudo->bindParam(':pseudo', $pseudo_inscription, PDO::PARAM_STR);
    $req_verif_pseudo->execute();

    $verif_pseudo = $req_verif_pseudo->fetch(PDO::FETCH_ASSOC);
    //echo '<pre>'; var_dump($verif_pseudo); echo '</pre>';

    // controle disponibilité pseudo
    if($verif_pseudo)
    {
        $content .= '<p class="alert alert-danger">Le pseudo que vous avez choisi est indisponible.<br >Veuillez choisir un autre pseudo.</p>';
        $erreur = true;
    }

    // controle de la taille du pseudo
    if($taille_pseudo < 4 || $taille_pseudo > 20)
    {
        $content .= '<p class="alert alert-danger">Erreur dans la taille du pseudo.<br >Il doit contenir entre 4 et 20 caractères</p>';
        $erreur = true;
    }

    // -------------------------------------- controle nom --------------------------------------
    $taille_nom = iconv_strlen($_POST['nom']);

    // controle de la taille du pseudo
    if($taille_nom < 4 || $taille_nom > 20)
    {
        $content .= '<p class="alert alert-danger">Erreur dans la taille du nom.<br >Il doit contenir entre 4 et 20 caractères</p>';
        $erreur = true;
    }

    // -------------------------------------- controle prenom --------------------------------------
    $taille_prenom = iconv_strlen($_POST['prenom']);

    // controle de la taille du pseudo
    if($taille_prenom < 4 || $taille_prenom > 20)
    {
        $content .= '<p class="alert alert-danger">Erreur dans la taille du prénom.<br >Il doit contenir entre 4 et 20 caractères</p>';
        $erreur = true;
    }


    // si tout est ok ==> insertion
    if(!$erreur)
    {
        $resultat = $pdo->prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse) VALUES (:pseudo, :mdp; :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse)");
        $resultat->bindParam(":pseudo", $_POST['pseudo'], PDO::PARAM_STR);
        $resultat->bindParam(":mdp", $_POST['mdp'], PDO::PARAM_STR);
        $resultat->bindParam(":nom", $_POST['nom'], PDO::PARAM_STR);
        $resultat->bindParam(":prenom", $_POST['prenom'], PDO::PARAM_STR);
        $resultat->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
        $resultat->bindParam(":civilite", $_POST['civilite'], PDO::PARAM_STR);
        $resultat->bindParam(":ville", $_POST['ville'], PDO::PARAM_STR);
        $resultat->bindParam(":code_postal", $_POST['cp'], PDO::PARAM_STR);
        $resultat->bindParam(":adresse", $_POST['adresse'], PDO::PARAM_STR);
        $resultat->execute();
    }


}





require("inc/haut.inc.php");
?>



<section>
    <div class="container">
        <?php echo $content; ?>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label for="pseudo" class="col-sm-2 control-label">Pseudo</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mdp" class="col-sm-2 control-label">Mot de passe</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nom" class="col-sm-2 control-label">Nom</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prenom" class="col-sm-2 control-label">Prenom</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="civilite" class="col-sm-2 control-label">Civilité</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="civilite" id="sexe" />
                                <option value="m">Homme</option>
                                <option value="f">Femme</option>
                            </select>                   
                        </div>                  
                    </div>
                    <div class="form-group">
                        <label for="ville" class="col-sm-2 control-label">Ville</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cp" class="col-sm-2 control-label">Code postal</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="cp" name="cp" placeholder="Code postal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="adresse" class="col-sm-2 control-label">Adresse</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                        </div>
                    </div>
                </form>

            </div><!-- fin .col-sm-8 -->
        </div><!-- fin .row -->   
    </div><!-- fin .container -->
</section>

<?php
require("inc/bas.inc.php");