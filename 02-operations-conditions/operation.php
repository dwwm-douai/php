<?php

$nombre1 = 15;
$nombre2 = 5;
$nombre3 = 8;

$resultat1 = $nombre1 + $nombre2 + $nombre3;
$resultat2 = $nombre1 * ($nombre2 - $nombre3);
$resultat3 = ($nombre3 - $nombre2) / $nombre1;

echo $nombre1.' + '.$nombre2.' + '.$nombre3.' = '.$resultat1.' <br>';
echo "$nombre1 x ($nombre2 - $nombre3) = $resultat2 <br>";
echo "($nombre3 - $nombre2) / $nombre1 = $resultat3 <br>";

if ($resultat1 < 20 || $resultat2 < 20 || $resultat3 < 20) {
    echo 'Une des opérations renvoie moins de 20.';
}
