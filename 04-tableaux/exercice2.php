<?php

$eleves = [
    0 => [
        'nom' => 'Matthieu',
        'notes' => [10, 8, 16, 20, 17, 16, 15, 2]
    ],
    1 => [
        'nom' => 'Thomas',
        'notes' => [4, 18, 12, 15, 13, 7]
    ],
    2 => [
        'nom' => 'Jean',
        'notes' => [17, 14, 6, 2, 16, 18, 9]
    ],
    3 => [
        'nom' => 'Enzo',
        'notes' => [1, 14, 6, 2, 1, 8, 9]
    ]
];

echo '<h2>Afficher la liste de tous les éléves avec leurs notes.</h2>';

foreach ($eleves as $eleve) {
    echo $eleve['nom'].' a eu ';

    echo '<ul>';
    foreach ($eleve['notes'] as $note) {
        echo '<li>'.$note.'</li>';
    }
    echo '</ul>';
}

echo '<h2>Calculer la moyenne de Jean. On part de $eleves[2]["notes"]</h2>';

// [17, 14, 6, 2, 16, 18, 9] / 7 notes
$moyenne = array_sum($eleves[2]['notes']) / count($eleves[2]['notes']);

echo 'La moyenne de Jean est '.round($moyenne, 2);

echo '<h2>Combien d\'élèves ont la moyenne ?</h2>';

echo '<h2>Quel(s) éléve(s) a(ont) la meilleure note ?</h2>';

echo '<h2>Qui a eu au moins un 20 ?</h2>';
