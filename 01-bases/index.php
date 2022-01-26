<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Le PHP</title>
</head>
<body>
    <?php
        // Echo permet d'afficher du texte
        echo 'Salut les gens <br>';
        echo 'Salut PHP <br>';
        // On peut utiliser les doubles et / ou échapper les quotes avec un \
        echo "J'affiche un \"texte\"";

        echo '<h2>Les variables</h2>';
        // En PHP, on peut déclarer des variables
        $age = 30; // Un integer (entier)
        $city = 'Douai'; // Un string (Une chaine de caractères)
        $price = 2.99; // Un float (Un nombre à virgules)
        $monkeyEatBanana = true; // Un boolean (Booléen vrai ou faux)

        // La concaténation, c'est mettre bout à bout plusieurs chaines
        // de caractères et / ou variables.
        echo 'J\'ai '.$age.' ans et je vais à '.$city.'. <br>';
        echo "La variable \$price contient $price. <br>";
    ?>
</body>
</html>
