<?php

echo '<h2>Les fonctions</h2>';

// Une fonction permet de ranger du code PHP afin de le réutiliser plusieurs fois.

echo 'Bonjour Fiorella <br>';
echo 'Bonjour Toto <br>';

// On déclare une fonction bonjour qu'on pourra
// utiliser plus tard.
// Une fonction peut contenir des paramètres / arguments
// Un argument est une variable qui est utilisable uniquement dans la fonction
// L'argument $age a une valeur par défaut, ce qui le rend optionnel
function bonjour($prenom, $age = 0) {
    // echo "Bonjour $prenom, tu as $age ans. <br>";
    return "Bonjour $prenom, tu as $age ans. <br>";
}

echo bonjour('Fiorella', 2); // Afficher "Bonjour" en appelant la fonction bonjour qui doit être déclarée au préalable
echo bonjour(47);
// strtoupper met en majuscule
echo strtoupper(bonjour('Titi'));

// On va essayer de créer une fonction permettant d'additionner
// 2 nombres.
function addition($nombre1, $nombre2) {
    return $nombre1 + $nombre2;
}

echo addition(4, 8); // Affiche 12
echo addition(2, 3); // Affiche 5

echo addition(1, 3) + addition(5, 5); // 14

echo addition(addition(1, 3), addition(5, 5));

echo '<br>';

// $mois est une variable avec une portée globale (pas utilisable dans une fonction)
$mois = ['Janvier', 'Février', 'Décembre'];

// Portée des variables
function jour($numeroJour) {
    global $mois; // On autorise la variable $mois à être utilisable dans la fonction
    // $jours est une variable avec une portée locale (utilisable uniquement dans la fonction)
    $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

    return $jours[$numeroJour - 1];
}

echo jour(1); // Lundi
echo jour(7); // Dimanche

echo '<br>';

// On peut faire appel à d'autres fonctions dans une fonction.
// On peut donc appeller une fonction dans elle-même, on appelle cela la récursivité. (Exemple Fibonacci)
function fibonacci($number) {
    if ($number == 0) {
        return 0; // Le return arrête la fonction
    }

    if ($number == 1) {
        return 1;
    }

    return fibonacci($number - 1) + fibonacci($number - 2);
}

for ($i = 0; $i <= 16; $i++) {
    echo fibonacci($i).', '; // Affiche 0, 1, 1, 2, 3, 5, 8 ... 89
}
