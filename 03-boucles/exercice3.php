<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tables</title>
    <link rel="stylesheet" href="exercice3.css">
</head>
<body>
    <?php
        $table = 5;
        for ($table = 1; $table <= 10; $table++) {
            echo '<div class="table">';
            echo '<h2>Table de '.$table.'</h2>';
            for ($i = 1; $i <= 10; $i++) {
                echo $table.' x '.$i.' = '.$table * $i.' <br>';
            }
            echo '</div>';
        }
    ?>
</body>
</html>
