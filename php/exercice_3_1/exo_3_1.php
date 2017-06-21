<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        for ( $i = 0 ; $i <=100 ; $i++)
        {
            if($i != 50) {
            echo $i . ' ';
            } else {
                echo '<span style="color: red;">' . $i . '</span> ';
            }
        }
        echo '<br /><br /><br />';
        for($j = 2000 ; $j >= 1930 ; $j--) {
            echo $j . ' ';
        }
    ?>


</body>
</html>