<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        
        echo '<ul>';
            echo '<li><a href="?pays=france">France</a></li>';
            echo '<li><a href="?pays=espagne">Espagne</a></li>';
            echo '<li><a href="?pays=italie">Italie</a></li>';
            echo '<li><a href="?pays=angleterre">Angleterre</a></li>';
        echo '</ul>';
    
        echo'<pre>'; print_r($_GET); echo '</pre>';
        $pays = '';

        if(isset($_GET['pays'])) {
            
            if($_GET['pays'] == 'france') {
                $pays = 'français';
            }
            if($_GET['pays'] == 'espagne') {
                $pays = 'espagnol';
            }
            if($_GET['pays'] == 'italie') {
                $pays = 'italien';
            }
            if($_GET['pays'] == 'angleterre') {
                $pays = 'anglais';
            }

            echo 'vous êtes ' . $pays . ' ?';
        }
        ?>
    </body>
</html>