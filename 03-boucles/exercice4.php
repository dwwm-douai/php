<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table carré</title>
    <link rel="stylesheet" href="exercice4.css">
</head>
<body>
    <div class="carre">
        <!-- F - Ici, on affiche la légende du haut de 0 à 10 avec x en premier -->
        <div class="flex">
            <div class="resultat legend-haut legend light-grey">x</div>
            <?php for ($i = 0; $i <= 10; $i++) {
                if ($i % 2 != 0) {
                    $class = 'light-grey';
                } else {
                    $class = '';
                }
                // L'opérateur ternaire est une manière simplifié d'écrire un if...else
                $class = ($i % 2 != 0) ? 'light-grey' : '';
            ?>
                <div class="resultat legend-haut <?php echo $class; ?>"><?php echo $i; ?></div>
            <?php } ?>
        </div>
        <!-- A - En premier, on a simplement affiché le carré avec les résultats des multiplications -->
        <!-- B - Pour faire ça, on a 2 boucles ($table représente les lignes et $multiple représente les colonnes) -->
        <?php for ($table = 0; $table <= 10; $table++) { ?>
            <div class="flex">
                <?php
                    if ($table % 2 != 0) {
                        $class = 'light-grey';
                    } else {
                        $class = '';
                    }
                ?>
                <!-- E - Ici, on affiche la légende (chaque ligne de 0 à 10) -->
                <div class="resultat legend <?php echo $class; ?>"><?php echo $table; ?></div>
                <!-- C - La 2ème boucle permet d'afficher chaque colonne ($multiple) -->
                <?php for ($multiple = 0; $multiple <= 10; $multiple++) {
                    // G - Si on arrive sur un nombre carré (4 x 4 = 16 par exemple), on ajoutera
                    // la classe dark-grey sur la case du résultat (fond gris foncé).
                    if ($table == $multiple) {
                        $class = 'dark-grey';
                    // H - Pour les cases en gris clair, on doit déterminer si $table et $multiple sont pairs
                    // ou impairs en même temps
                    } elseif ($multiple % 2 == 0 && $table % 2 == 0) {
                        $class = 'light-grey';
                    } elseif ($multiple % 2 != 0 && $table % 2 != 0) {
                        $class = 'light-grey';
                    } else {
                        $class = '';
                    }
                ?>
                    <div class="resultat <?php echo $class; ?>">
                        <!-- D - On affiche le résultat entre chaque ligne et chaque colonne -->
                        <?php echo $table * $multiple; ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</body>
</html>
