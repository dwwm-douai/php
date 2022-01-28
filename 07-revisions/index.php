<?php

// Les conditions
// 1 - Créer une variable $heure entre 0 et 24. Utiliser une condition pour afficher un message si l'heure est
//     - Le matin
//     - L'après midi
//     - La nuit
// 2 - Créer un bouton (<a>) vert (Connexion) en HTML / CSS et un bouton (<a>) rouge (Déconnexion).
//   - Créer une variable $isLogged. Si la variable est true, afficher le bouton rouge sinon afficher le bouton vert
//   - BONUS: En cliquant sur les boutons, ajouter un paramètre $_GET permettant de changer la valeur de $isLogged.

// Les boucles
// 1 - Grâce à une boucle, afficher tous les départements de la région 62 (62000 et 62999). Avec un for et un while.
// 2 - Définir un nombre à 3 chiffres. Ecrire une boucle qui permet au PHP de trouver ce bon nombre. A chaque itération, il faudra utiliser la
//     fonction rand(). Tant que ce nombre (random) ne correspond pas au nombre (à trouver), on réitère la boucle. On affichera le
//     nombre d'essais nécessaires pour trouver le nombre.

// Les tableaux
// 1 - Créer un tableau PHP contenant des véhicules (Marque, modèle et prix). Le prix doit être stocké sous forme de float ou d'entier.
//   - L'afficher sous cette forme (voir screen-1.png).
// 2 - On imagine le tableau suivant contenant des vendeurs et des véhicules :
//           | Megane | Clio | Captur
//     André |   0    |  3   |   0
//     Joe   |   2    |  3   |   1
//     Eric  |   1    |  1   |   1
// Exemple de ce tableau en PHP
[
    'André' => ['Megane' => 0, 'Clio' => 3, 'Captur' => 0],
    'Joe' => ['Megane' => 2, 'Clio' => 3, 'Captur' => 1],
    'Eric' => ['Megane' => 1, 'Clio' => 1, 'Captur' => 1],
];
//     PRIX
//     Megane | 30 000
//     Clio   | 20 000
//     Captur | 40 000
//
//   - Donner le nombre de ventes pour chaque vendeur
//   - Donner le nombre d'exemplaires vendus pour chaque modèle
//   - Calculer le chiffre d'affaires généré par chaque vendeur

// Les fonctions
// 1 - Créer une fonction qui permet de calculer la moyenne des nombres d'un tableau => average([1, 2, 3])
// 2 - Fonction HTML. Créer une fonction qui permet de mettre un texte dans une balise HTML.
//   - Exemple: html('Salut', 'h1') doit renvoyer <h1>Salut</h1>
//   - BONUS: On ne devra autoriser que certaines balises (h1, h2 et p par exemple).
