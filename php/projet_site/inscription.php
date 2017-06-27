<?php
require("inc/init.inc.php");

// déclaration des variables de récupération des champs
$pseudo = "";
$mdp = "";
$nom = "";
$prenom = "";
$email = "";
$sexe = "";
$ville = "";
$cp = "";
$adresse = "";

if(isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['sexe']) && isset($_POST['ville']) && isset($_POST['cp']) && isset($_POST['adresse']))
{
  // attribution des nouvelles valeurs: cf. value="" dans le formulaire
  $pseudo = $_POST['pseudo'];
  $mdp = $_POST['mdp'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $sexe = $_POST['sexe'];
  $ville = $_POST['ville'];
  $cp = $_POST['cp'];
  $adresse = $_POST['adresse'];
}





// la ligne suivante commence les affichages dans la page
require("inc/header.inc.php");
require("inc/nav.inc.php");

// vérification des indices
echo '<pre>'; print_r($_POST); echo '</pre>';




?>



    <div class="container">

      <div class="starter-template">
        <h1><span class="glyphicon glyphicon-user"></span> Inscription</h1>
        <?php //echo $message; // messages destinés à l'utilisateur ?>
        <?= $message; // cette balise php inclue un echo, elle est équivalente à la ligne du dessus ?>
      </div>

      <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
        
          <form action="" method="post">
              <div class="form-group">
                <label for="pseudo">Pseudo<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="pseudo" id="pseudo" value="<?php echo $pseudo; ?>" />
              </div>
              <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="text" class="form-control" name="mdp" id="mdp" value="<?php echo $mdp; ?>" />
              </div>
              <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $nom; ?>" />
              </div>
              <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $prenom; ?>" />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" />
              </div>
              <div class="form-group">
                <label for="sexe">Sexe</label>
                <select class="form-control" name="sexe" id="sexe" />
                  <option value="m">Homme</option>
                  <option value="f" <?php if($sexe == 'f') { echo 'selected'; } // m dans la bdd, condition uniquement sur f ?> >Femme</option>
                </select>
              <div class="form-group">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" name="ville" id="ville" value="<?php echo $ville; ?>" />
              </div>
              <div class="form-group">
                <label for="cp">CP</label>
                <input type="text" class="form-control" name="cp" id="cp" value="<?php echo $cp; ?>" />
              </div>
              <div class="form-group">
                <label for="adresse">Adresse</label>
                <textarea class="form-control" name="adresse" id="adresse" value=""><?php echo $adresse; // dans textarea ?></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="form-control btn btn-success" name="inscription" id="inscription" value="Inscription" />
              </div>
          </form>

        </div>
      </div>
    

    </div><!-- /.container -->

    <?php
    require("inc/footer.inc.php");