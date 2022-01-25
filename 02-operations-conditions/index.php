<?php

echo '<h2>Opérations en PHP</h2>';

$nombre1 = 3;
$nombre2 = 4;
$nombre3 = 5;

// Opérateurs arithmétiques
$resultat1 = $nombre1 + $nombre2;
echo "3 + 4 = $resultat1 <br />"; // 7

echo '4 x 5 = ';
echo $nombre2 * $nombre3.'<br />'; // 20

echo '5 / 3 = ';
echo round($nombre3 / $nombre1, 2).'<br />'; // ~1,66

// Le modulo... est le reste de la division entre 2 nombres
echo '5 % 3 = ';
echo $nombre3 % $nombre1.'<br />'; // 2

// L'exponentielle
echo '2 ^ 3 = ';
echo 2 ** 3; // 8
echo '<br />';

// La priorité des calculs se fait comme en maths
echo 10 + 3 * 5; // 25
echo '<br />';
echo (10 + 3) * 5; // 65
echo '<br />';

// Opérateur d'incrémentation
echo $resultat1 += 3; // $resultat1 vaut 10
echo $resultat1++; // $resultat1 vaut 11 et renvoie 10
echo $resultat1.'<br />';

// -=, *=, /=, %=, **=
$phrase = 'Hello';
$phrase .= ' Fiorella <br />';
echo $phrase; // Affiche "Hello Fiorella"

echo '<h2>Comparaisons en PHP</h2>';

echo '$nombre1 == 3 ';
var_dump($nombre1 == 3); // renvoie true si $nombre1 vaut 3 ou false sinon...

echo '<br />';

echo '3 == 3';
var_dump('3' == 3); // true car on compare la valeur seulement
echo '<br />';
echo '3 === 3';
var_dump('3' === 3); // false car on compare la valeur et le type
echo '<br />';

// Les comparaisons n'ont un intérêt qu'avec les conditions
$estConnecte = true;

if ($estConnecte == true) {
    echo 'Vous êtes connecté.';
} else {
    echo 'Vous n\'êtes pas connecté';
}

echo '<br />';
$credit = -100; // On a un crédit sur un compte
$manque = 500 - $credit;
// - Avec un crédit de 1000 ou plus, on a accès au premium
// - Avec un crédit de 500 ou plus, on a accès au standard
// - Avec moins de 500, on dit à l'utilisateur combien il lui manque pour
// arriver à 500
// - Avec 0, on lui dit de revenir plus tard

if ($credit >= 1000) {
    echo 'Accès au compte premium';
}
elseif ($credit >= 500) {
    echo 'Accès au compte standard';
}
elseif ($credit < 500 && $credit > 0) {
    echo 'Il manque '.$manque.' euros pour arriver à 500';
}
elseif ($credit < 0) {
    echo 'Vous nous devez '.-$credit.' euros';
}
else {
    echo 'Reviens avec la money';
}

echo '<h2>Les opérateurs logiques</h2>';
// - && (and)
// - || (or) Le symbole Pipe avec Alt Gr + 6 (Option + shift + L)

// Pour aller au restaurant, on doit avoir le vaccin ou un test PCR
$estVaccine = true;
$estTeste = true;

// Vacciné ou testé
if ($estVaccine || $estTeste) {
    echo 'Je vais au restaurant <br />';
}

// ! est la négation donc n'est pas vacciné et n'est pas testé
if (!$estVaccine && !$estTeste) {
    echo 'Je ne vais pas au restaurant <br />';
}

// Pour faire un sandwich, j'ai besoin de pain ET de poulet OU de thon
$pain = false;
$poulet = false;
$thon = true;

if ($pain == true && ($poulet == true || $thon == true)) {
    echo 'Je peux faire un sandwich <br />';
} else {
    echo 'Je ne peux pas faire de sandwich. <br />';
}
