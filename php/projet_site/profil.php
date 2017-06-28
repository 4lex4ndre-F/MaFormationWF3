<?php
require("inc/init.inc.php");

// vérification si l'utilisateur est connecté, sinon redirection
if(!utilisateur_est_connecte())
{
    header("location:connexion.php");
}

// admin ou membre
if(utilisateur_est_admin())
{
    $stat = 'administrateur';
}
else {
    $stat = 'membre';
}


// la ligne suivante commence les affichages dans la page
require("inc/header.inc.php");
require("inc/nav.inc.php");

?>



    <div class="container">

        <div class="starter-template">
            <h1><span class="glyphicon glyphicon-user"></span> Profil</h1>
            <?php //echo $message; // messages destinés à l'utilisateur ?>
            <?= $message; // cette balise php inclue un echo, elle est équivalente à la ligne du dessus ?>
        </div>
        <!-- nom du profil + statut -->
        <p class="">Bonjour <?= $_SESSION['utilisateur']['pseudo']; ?>, vous êtes <?= $stat; ?>.</p>
        <!-- cadre contenant les infos profil -->
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 cadre">

                <!-- row avec infos + photo -->
                <!-- infos profils -->
                <div class="col-sm-6">
                    <ul>
                        <li>nom: <?= $_SESSION['utilisateur']['nom']; ?></li>
                        <li>prénom: <?= $_SESSION['utilisateur']['prenom']; ?></li>
                        <li>sexe: <?= $_SESSION['utilisateur']['sexe']; ?></li>
                    </ul>
                </div>

                <!-- photo -->
                <div class="col-sm-6">
                    <img src="img/profile.ico" alt="profil" />
                </div>
                <!-- options de profil -->

            </div>
        </div><!-- fin .row -->

    </div><!-- /.container -->

    <?php
    require("inc/footer.inc.php");