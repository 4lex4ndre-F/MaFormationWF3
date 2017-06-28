<?php
require("../inc/init.inc.php");


// TOUS LES CHEMINS SONT A REFAIRE






// la ligne suivante commence les affichages dans la page
require("../inc/header.inc.php");
require("../inc/nav.inc.php");
?>



    <div class="container">

        <div class="starter-template">
            <h1><span class="glyphicon glyphicon-user"></span> Gestion Boutique</h1>
            <?php //echo $message; // messages destinés à l'utilisateur ?>
            <?= $message; // cette balise php inclue un echo, elle est équivalente à la ligne du dessus ?>
        </div>

    </div><!-- /.container -->

    <?php
    require("../inc/footer.inc.php");