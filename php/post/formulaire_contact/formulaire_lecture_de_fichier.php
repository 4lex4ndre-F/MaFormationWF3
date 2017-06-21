<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Alexandre">

    <title>Formulaire de contact</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>Lecture de fichier</h1>        
      </div>
      <?php
        // après avoir vu comment enregistrer des données dans un fichier dans un serveur, nous allons les récupérer afin de les manipuler dans ce fichier.

        $nom_fichier = "liste.txt";
        $contenu_fichier = file($nom_fichier); // file() fait tout le travail pour nous, cette fonction retourne chaque ligne d'un fichier dans un tableau array
        echo '<pre>'; print_r($contenu_fichier); echo '</pre>';

        // afficher chaque ligne dans une liste ul li
        echo '<ul>';

        foreach($contenu_fichier AS $ligne)
        {
            echo '<li>' . $ligne . '</li>';

            // Voir manipulation des strings dans entrainement.php !
            $position_tiret = strpos($ligne, "-");
            $position_tiret += 2;
            echo '<li style="color: red;">' . substr($ligne, 0, ($position_tiret-2)) . '</li>'; // pour afficher le pseudo (avant le tiret)
            echo '<li style="color: purple;">' . substr($ligne, $position_tiret) . '</li>'; // pour affiher le mail
        }

        echo '</ul>';
      ?>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>