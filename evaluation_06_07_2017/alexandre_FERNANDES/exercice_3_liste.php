<?php

// connexionn à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// déclaration d'une variable pour les éventuels messages
$message = "";

//////////////////////////// AFFICHAGE TABLEAU FILM //////////////////////////
// preparation de requetes simples
$req_liste_film = $pdo->query("SELECT * FROM movies");
// nbre de colonnes
$nb_col = $req_liste_film->columnCount();
//////////////////////////////////////////////////////////////////////////////////

?>
<!DOCTYPE html>
<html lang="fr">
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
        <h1>Liste des films</h1>
        <?= $message ?>
        <hr />

        <?php
        // tableau
        echo '<table class="table table-bordered">';

            // header
                echo '<thead>';
                    /*for($i = 0; $i < $nb_col; $i++)
                    {
                        $nom_colonne = $req_liste_film->getColumnMeta($i);
                        echo '<th>' . $nom_colonne['name'] . '</th>';
                    } ABANDON DE TECHNIQUE, JE LE FAIS A LA MAIN*/
                    echo '<th>Titre</th>';
                    echo '<th>Réalisateur</th>';
                    echo '<th>Année</th>';
                    echo '<th>+ d\'infos</th>';
                echo '</thead>';
            // body
            echo '<tbody>';
                while($film = $req_liste_film->fetch(PDO::FETCH_ASSOC))
                {
                    // création d'une ligne
                    echo '<tr>';
                        

                        if($film['title'])
                        {                             
                            echo '<td>' . $film['title'] . '</td>';
                        }
                        if($film['director'])
                        {                             
                            echo '<td>' . $film['director'] . '</td>';
                        }
                        if($film['year_of_prod'])
                        {
                            echo '<td>' . $film['year_of_prod'] . '</td>';
                        }

                        // ajout du bouton + d'info
                        echo '<td><a href="?action=fiche_film&id_film=' . $film['id_movie'] . '" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span></a></td>';

                        // requete additionnelle
                        //$req_id_film = $pdo->query"(SELECT id_movie FROM movies WHERE id_movie = ")

                    echo '</tr>'; // fin ligne
                }


            echo '</tbody>';

        echo '</table>';
        // a t'on demandé ++ d'infos ?
        if(isset($_GET['action']) && isset($_GET['id_film']))
        {
            echo '<div>
            
                cadre d\'affichage des détails du film, basiquement tous les autres champs non affichés
                
            
            
            </div>';
        }
        ?>
    </div><!-- fin .container -->
</body>
</html>