<?php
// appel d'init.inc.php
require("../inc/init.inc.php");

// Restriciton d'accès aux admins
if(!utilisateur_est_admin())
{
    header("location:../connexion.php");
    exit;
}

// UPDATE quand on modifie l'état de la commande
$etat = "";
$id = "";
if(!empty($_POST['etat_commande']))
{
    $etat = $_POST['etat_commande'];
    $id = $_POST['id_commande'];
    $req_update = $pdo->query("UPDATE commande SET etat = '$etat' WHERE id_commande = $id");
}



//////////////////////////// AFFICHAGE TABLEAU COMMANDES//////////////////////////
// preparation de requetes simples
$req_commande = $pdo->query("SELECT * FROM commande");
// nbre de colonnes
$nb_col_commande = $req_commande->columnCount();
//////////////////////////////////////////////////////////////////////////////////

///////////////////////////////// DETAILS COMMANDE ///////////////////////////////
$detail_commande = "";
if(!empty($_GET['id_commande']))
{
// requete sur details_commande pour l'id_commande en cours
$detail_commande = $_GET['id_commande'];
$req_details_commande = $pdo->query("SELECT details_commande.id_article, article.titre, details_commande.quantite, details_commande.prix FROM commande, details_commande, article WHERE commande.id_commande = details_commande.id_commande AND details_commande.id_article = article.id_article AND details_commande.id_commande = $detail_commande");

// nbre de colonnes
$nb_col_detail = $req_details_commande->columnCount();
}
////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////// INFOS CLIENT ///////////////////////////////
$detail_client = "";
if(!empty($_GET['id_commande']))
{
$detail_client = $_GET['id_commande'];
// requete
$req_membre = $pdo->query("SELECT membre.id_membre, membre.nom, membre.prenom, membre.email, membre.adresse, membre.cp, membre.ville FROM membre, commande WHERE commande.id_membre = membre.id_membre AND commande.id_commande = $detail_client");
$infos_membre = $req_membre->fetch(PDO::FETCH_ASSOC);
}
////////////////////////////////////////////////////////////////////////////////////






// appel de header et de nav => début de l'affichage sur la page
require("../inc/header.inc.php");
require("../inc/nav.inc.php");

// echo de vérification
//echo '<pre>'; print_r($nb_col_commande); echo '</pre>';
//echo '<pre>'; print_r($req_details_commande); echo '</pre>';
//echo '<pre>'; print_r($_GET); echo '</pre>';
//echo '<pre>'; print_r($detail_client); echo '</pre>';
//echo '<pre>'; print_r($infos_membre); echo '</pre>';
echo '<pre>'; print_r($_POST); echo '</pre>';
?>

    <div class="container">

        <div class="starter-template">
            <h1> Gestion Commandes</h1>
            <?= $message; /* cette balise php inclue un echo, elle est équivalente à la ligne du dessus*/ ?>
            <hr />
        </div>
        <div class="row">
        <?php
            // affichage du tableau commande
            echo '<h3>liste des commandes</h3>';
            echo '<table class="table table-bordered">';
                echo '<thead>';
                    for($i = 0; $i < $nb_col_commande; $i++)
                    {
                        $nom_colonne = $req_commande->getColumnMeta($i);
                        echo '<th>' . $nom_colonne['name'] . '</th>';
                    }
                    echo '<th>modif état commande</th>';
                    echo '<th>détails commande</th>';

                echo '</thead>';
                echo '<tbody>';
                    while($commande = $req_commande->fetch(PDO::FETCH_ASSOC))
                    {
                        // création d'une ligne
                        echo '<tr>';
                            
                            foreach($commande AS $indice => $valeur)
                            {                                
                                echo '<td>' . $valeur . '</td>';
                            }

                        // ajout des boutons de fonctionnalité
                        echo '<td>  <form class="form-group" action="" method="post">
                                        <select name="etat_commande" class="">
                                            <option value="en cours de traitement">en cours de traitement</option>
                                            <option value="envoyé">envoyé</option>
                                            <option value="livré">livré</option>
                                        </select>
                                        <input type="hidden" name="id_commande" id="id_commande" class="form-control" value="' . $commande['id_commande'] . '">
                                        <button type="submit" class="btn btn-warning" value=""><span class="glyphicon glyphicon-pencil"></span></button>
                                    </form>
                            </td>';
                        echo '<td><a href="?action=détails_commande&id_commande=' . $commande['id_commande'] . '" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></a></td>';

                        echo '</tr>'; // fin ligne
                    }
                echo '</tbody>';
            echo '</table>';
        ?>
        </div><!-- fin .row -->

        <!-- Affichage fiche de commande, conditionnel -->
        <div class="row">
        <?php
        if(!empty($_GET['id_commande']))
        {
            
            // cadre de résultat
            echo '<div class="cadre">';

                // row 1
                echo '<div class="row">';

                    echo '<h4>commande n° ' . $_GET['id_commande'] . '</h4>';

                    // partie gauche
                    echo '<div class="col-sm-9">';
                        // Tableau détails commande: 1 ligne par article
                        echo '<table class="table table-bordered">';
                            echo '<thead>';
                                for($i = 0; $i < $nb_col_detail; $i++)
                                {
                                    $nom_colonne = $req_details_commande->getColumnMeta($i);
                                    echo '<th>' . $nom_colonne['name'] . '</th>';
                                }
                            echo '</thead>';
                            echo '<tbody>';
                                while($commande = $req_details_commande->fetch(PDO::FETCH_ASSOC))
                                {
                                    // création d'une ligne
                                    echo '<tr>';
                                        foreach($commande AS $indice => $valeur)
                                        {
                                            echo '<td>' . $valeur . '</td>';
                                        }
                                    echo '</tr>'; // fin ligne
                                }
                            echo '</tbody>';
                        echo '</table>';                       




                    echo '</div>';

                    // partie droite
                    echo '<div class="col-sm-3">';
                        echo '<h5>Infos client</h5>';
                        foreach ($infos_membre as $key => $value)
                        {
                            echo $key . ': <b>' . $value . '</b>';
                            echo '<br />';
                        }
                    echo '</div>';

                echo '</div>'; // fin .row 1

                echo '<hr />';
                // row 2
                echo '<div class="row">';

                    // montant
                    echo '<div class="col-sm-8">';
                        $commande = $_GET['id_commande'];
                        $req_commande = $pdo->query("SELECT * FROM commande WHERE id_commande = $commande");
                        $montant = $req_commande->fetch(PDO::FETCH_ASSOC);
                        echo '<p>Montant de la commande : <b>' . $montant['montant'] . ' €</b></p>';
                    echo '</div>';
                    // rappel état commande
                    echo '<div class="col-sm-3">';
                        echo 'Etat de la commande: <br />';
                        echo '<b>' . $montant['etat'] . '</b>';
                    echo '</div>';

                echo '</div>';


            echo '</div>'; // fin .cadre  
        }
        else{
            echo '<p>Cliquez sur <a href="" class="btn btn-warning"><span class="glyphicon glyphicon-search"></span></a> pour accéder / modifier la commande.</p>';
        } 
        ?>
        </div><!-- fin .row tableau -->

        <?php




        ?>

    </div><!-- fin .container -->

<?php
// appel de footer.inc.php
require("../inc/footer.inc.php");