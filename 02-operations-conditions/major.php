<?php

$age = 12;

if ($age >= 18) {
    echo 'Vous pouvez entrer';
} elseif ($age >= 16) {
    echo 'Vous êtes presque majeur';
} elseif ($age >= 14) {
    echo 'Vous êtes jeune';
} else {
    echo 'Interdit. Vous êtes trop jeune.';
}
