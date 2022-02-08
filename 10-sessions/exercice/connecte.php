<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
</head>
<body>
    <?php
        session_start();

        $logout = $_GET['logout'] ?? null;
        if ($logout) {
            unset($_SESSION['user']); // On se déconnecte
            header('Location: index.php');
        }

        $user = $_SESSION['user'] ?? null;
    ?>

    <?php if ($user) { ?>
        <p>Bonjour <strong><?php echo $user; ?></strong></p>
        <a href="index.php?logout=1">Déconnexion</a>
    <?php } else { ?>
        <p>
            Vous n'êtes pas connecté...
            <a href="index.php">Me connecter</a>
        </p>
    <?php } ?>  
</body>
</html>
