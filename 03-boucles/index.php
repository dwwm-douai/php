<?php

/**
 * La boucle for...
 *
 * Le for est composé d'une initialisation, une condition d'exécution et un code à exécuter
 * à chaque itération.
 */

echo '<h2>La boucle for</h2>';
// la boucle suivante se répète 10 fois de 0 à 9
for ($i = 0; $i < 10; $i++) {
    echo $i.'<br>';
}

echo '<h2>La boucle foreach</h2>';
$prenoms = ['Fiorella', 'Marina', 'Matthieu'];

foreach ($prenoms as $prenom) {
    echo $prenom.'<br>';
}

echo '<h2>Le while</h2>';
/**
 * Le while est similaire au for sauf qu'il n'y a qu'une seule instruction.
 */
$i = 0;
while ($i < 10) {
    // echo ++$i; // affiche 12345678910
    $i = $i + 1;
    echo $i;

    echo $i++; // affiche 0123456789
    echo $i;
    $i = $i + 1;
}

echo '<h2>Le do while</h2>';
// Le do while va s'exécuter au moins une fois
$i = 0;
do {
    echo $i++;
} while ($i < 10);
