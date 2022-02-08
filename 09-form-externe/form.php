<?php

session_start();

// Récupère les champs
$email = $_POST['email'];
$errors = [];

// Vérifier les erreurs
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "L'email n'est pas valide";
}

// Il peut y avoir d'autres vérifications...

// On ajoute les erreurs dans la session pour pouvoir
// les afficher sur une autre page
$_SESSION['errors'] = $errors;

// Equivalent du code précédent
// $errors = [
//     'errors' => [
//         'email' => "L'email n'est pas valide",
//     ],
// ];

// S'il n'y a pas d'erreurs, on ajoute un message
// de succès dans la session
if (empty($errors)) {
    // Traitement (insert...)
    $_SESSION['success'] = 'Formulaire réussi.';
}

// On redirige vers index après le traitement
header('Location: index.php');
