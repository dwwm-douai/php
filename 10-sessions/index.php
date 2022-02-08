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

    <?php
        // Grâce au session, on va pouvoir garder en mémoire
        // des variables. On pourra donc utiliser les mêmes
        // variables sur plusieurs pages.

        // Pour utiliser les sessions, on doit faire
        // (en haut de la page)
        session_start();

        // Pour ajouter quelque chose dans la session, on doit
        // utiliser une superglobale ($_SESSION) qui est un
        // tableau.
        $_SESSION['user'] = 'Fiorella'; // ['user' => 'Fiorella']

        // Si le formulaire est envoyé, on ajoute le pseudo saisi
        // dans la session
        if (!empty($_POST)) {
            $_SESSION['user'] = $_POST['user'];
        }

        // On peut afficher quelque chose de la session
        $user = $_SESSION['user'] ?? null;
        if ($user) {
            echo "Bonjour $user";
        }
    ?>

    <form method="post">
        <input type="text" name="user" placeholder="Pseudo...">
        <button>Connexion</button>
    </form>
</body>
</html>
