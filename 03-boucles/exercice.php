<?php

echo '<h2>1. Ecrire une boucle qui affiche les nombres de 10 à 1</h2>';

for ($i = 10; $i >= 1; $i--) {
    echo $i.'<br>';
}

echo '<h2>2. Ecrire une boucle qui affiche uniquement les nombres pairs entre 1 et 100</h2>';

for ($i = 1; $i <= 100; $i++) {
    if ($i % 2 == 0) {
        echo $i.'<br>';
    }
}

echo '<h2>3. Ecrire le code permettant de trouver le PGCD de 2 nombres</h2>';

/*
tant que a ≠ b 
    si a > b alors
        a := a − b
    sinon
        b := b − a
retourner a
*/

$a = 96;
$b = 36;

while ($a != $b) {
    if ($a > $b) {
        $a = $a - $b;
    } else {
        $b = $b - $a;
    }
}

echo $a; // Le PGCD de 96 et 36 est 12

echo '<h2>4. Coder le jeu du FizzBuzz</h2>';

for ($i = 0; $i <= 100; $i++) {
    if ($i % 3 == 0 && $i % 5 != 0) {
        echo "Fizz ($i) <br>";
    } elseif ($i % 5 == 0 && $i % 3 != 0) {
        echo "Buzz ($i) <br>";
    } elseif ($i % 15 == 0) {
        echo "FizzBuzz ($i) <br>";
    } else {
        echo $i.'<br>';
    }
}
