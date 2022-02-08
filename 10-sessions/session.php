<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Sessions</title>
</head>
<body>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="session.php">Voir la session</a></li>
    </ul>

    <a href="session.php?logout=1">Supprimer la session</a>

    <?php
        session_start();

        // Si on a le paramètre logout dans l'URL, on veut
        // supprimer la session
        $logout = $_GET['logout'] ?? null;
        if ($logout) {
            // On peut supprimer une valeur de variable en PHP
            unset($_SESSION['user']);
        }

        var_dump($_SESSION);
    ?>
</body>
</html>
