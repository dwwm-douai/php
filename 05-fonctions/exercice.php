<?php

// exo 1

function carre($nombre) {
    return $nombre * $nombre;
}

echo carre(5).'<br>'; // affiche 25

// exo 2

function aireRectangle($longueur, $largeur) {
    return $longueur * $largeur;
}

function aireCercle($rayon) {
    return round(pi() * carre($rayon), 2);
}

echo aireRectangle(5, 10).'<br>'; // affiche 50
echo aireCercle(5).'<br>'; // affiche 78,5

// exo 3

function prixTTC($prixHT, $taux = 20, $HTVersTTC = true) {
    if (!$HTVersTTC) {
        return $prixHT / (1 + $taux / 100);
    }

    return $prixHT * (1 + $taux / 100); // 10 * 1.2
}

echo prixTTC(10).'<br>'; // Afficher 12
echo prixTTC(10, 30).'<br>'; // Affiche 13 (30% de TVA)

// exo 4

function prixHT($prixTTC, $taux = 20) {
    return $prixTTC / (1 + $taux / 100); // 12 / 1.2
}

echo prixHT(12).'<br>'; // affiche 10
echo prixHT(13, 30).'<br>'; // affiche 10

// true => HT vers TTC
// false => TTC vers HT
echo prixTTC(12, 20, false).'<br>'; // affiche 10
echo prixTTC(10, 20, true).'<br>'; // affiche 12
