<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement externe form PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Traitement externe form PHP</h1>
    <p>Parfois, on veut séparer le traitement du formulaire sur une autre page.</p>
    <p>Pour cela, on a besoin des sessions.</p>

    <?php
        session_start();
    
        // S'il y a eu des erreurs sur le formulaire (ou pas)
        $errors = $_SESSION['errors'] ?? [];

        foreach ($errors as $error) {
            echo $error;
        }

        echo $_SESSION['success'] ?? null;

        // On supprime les erreurs après les avoir afficher
        unset($_SESSION['errors']);
        unset($_SESSION['success']);
    ?>

    <form action="form.php" method="post">
        <input type="text" name="email" placeholder="Email">
        <button>Submit</button>
    </form>
</body>
</html>
