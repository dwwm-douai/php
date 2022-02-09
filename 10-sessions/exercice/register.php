<?php
require 'helpers.php';

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;
$confirm_password = $_POST['confirm_password'] ?? null;
$errors = [];
$success = null;

if (!empty($_POST)) {
    if (empty($username)) {
        $errors[] = 'Le pseudo est invalide.';
    }

    // On vérifie que le mot de passe soit rempli et qu'il soit identique
    // au champ confirm_password
    if (empty($password) || $password != $confirm_password) {
        $errors[] = 'Le mot de passe est invalide.';
    }

    // On va vérifier si l'utilisateur existe déjà...
    $user = selectOne('SELECT * FROM users WHERE username = :username', [
        'username' => $username,
    ]);
    if ($user) {
        $errors[] = 'Le pseudo est déjà utilisé.';
    }

    if (empty($errors)) {
        insert('INSERT INTO users (username, password) VALUES (:username, :password)', [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        $success = 'Vous êtes bien inscrit.';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <ul>
        <?php foreach ($errors as $error) { ?>
            <li><?php echo $error; ?></li>
        <?php } ?>
    </ul>

    <?php if ($success) { ?>
        <p><?php echo $success; ?></p>
    <?php } ?>

    <form action="" method="post">
        <input type="text" name="username" placeholder="Pseudo">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe">

        <button>Inscription</button>
    </form>

    <a href="index.php">Connexion</a>
</body>
</html>