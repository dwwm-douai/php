<?php

echo '<h2>Les capitales</h2>';

$capitales = [
    'France' => 'Paris',
    'Espagne' => 'Madrid',
    'Italie' => 'Rome',
];

foreach ($capitales as $pays => $ville) {
    echo "La capitale de $pays est $ville. <br>";
}

echo '<h2>Population avec 20M</h2>';

$population = [
    'France' => 67595000,
    'Suede' => 9998000,
    'Suisse' => 8417000,
    'Kosovo' => 1820631,
    'Malte' => 434403,
    'Mexique' => 122273500,
    'Allemagne' => 82800000,
];

$somme = 0;
foreach ($population as $pays => $pop) {
    if ($pop >= 20 * 10 ** 6) {
        echo $pays.'<br>';
    }

    if ($pays != 'Mexique') {
        $somme += $pop;
    }
}

echo 'Population Europe : <br>';
echo array_sum($population) - $population['Mexique'];
echo ' OU BIEN '.$somme;
