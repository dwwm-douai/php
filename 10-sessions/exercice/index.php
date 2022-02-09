<?php

session_start();
require 'helpers.php';

// Récupère les données
$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;
$errors = [];

if (!empty($_POST)) {
    // On vérifie la valeur saisie dans le champ username
    if ($username != 'admin') {
        // 1ère version
        // $errors[] = 'Le login est faux.';
    }

    if ($password != 'admin') {
        // $errors[] = 'Le mot de passe est faux.';
    }

    // 2ème version, on vérifie que l'utilisateur est inscrit
    $user = selectOne('SELECT * FROM users WHERE username = :username', [
        'username' => $username,
        // 'password' => $password,
    ]);

    // $user['password'] est le hash (généré par password_hash) de l'utilisateur qui veut se connecter
    // $password est le mot de passe en clair saisi par l'utilisateur pour se connecter

    // var_dump(password_verify('password', '$2y$10$eTnDAZ26bWzrovwsUowgGe3YPzJlYpxe1rhAH14K2RwP7Upn8BvvO')); // true pour matthieu
    // var_dump(password_verify('password', '$2y$10$2lkvD/QiD.tk0fQg2RESg.pxEwNXhNzkNHHEobrFsFwMWLjz/oxHS')); // true fiorella
    // var_dump(password_verify('bidon', '$2y$10$2lkvD/QiD.tk0fQg2RESg.pxEwNXhNzkNHHEobrFsFwMWLjz/oxHS')); // false
    // var_dump($user); die();

    // Avec password_verify, on vérifie si $password correspond au hash
    if (!$user || !password_verify($password, $user['password'])) {
        $errors[] = 'Identifiants incorrects.';
    }

    // Si on n'a pas d'erreurs, on se connecte...
    if (empty($errors)) {
        $_SESSION['user'] = $username; // On se connecte (avec la session)
        header('Location: connecte.php');
    }
}

// var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <ul>
        <?php foreach ($errors as $error) { ?>
            <li><?php echo $error; ?></li>
        <?php } ?>
    </ul>

    <form action="" method="post">
        <input type="text" name="username" placeholder="Pseudo">
        <input type="password" name="password" placeholder="Mot de passe">

        <button>Login</button>
    </form>

    <a href="register.php">Inscription</a>
</body>
</html>
