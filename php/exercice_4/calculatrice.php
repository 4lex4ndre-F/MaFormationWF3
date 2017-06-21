<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body>

    <form action="" method="">
        <input type="number" name="x" id="x" />

        <select name="operateur" id="operateur">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>

        <input type="number" name="y" id="y" />

        <input type="submit" value="calculer" />


    </form>
    <?php
        if(isset($_GET['x']) && isset($_GET['operateur']) && isset($_GET['y'])) 
        {
            $x = $_GET['x'];
            $y = $_GET['y'];
            $op = $_GET['operateur'];
            $resultat = 0;

            if($op == '+') {
                $resultat = ($x + $y);
            }

            if($op == '-') {
                $resultat = ($x - $y);
            }

            if($op == '*') {
                $resultat = ($x * $y);
            }

            if($op == '/') {
                $resultat = ($x / $y);
            }

            echo $x . ' ' . $op . ' ' . $y . ' = ' . $resultat;
        }

    ?>
</body>
</html>