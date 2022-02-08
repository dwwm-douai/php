<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plusieurs formulaires sur une page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <h1>Multiform</h1>
    <p>Parfois, on a besoin d'afficher plusieurs formulaires sur une seule page.</p>
    <p>On peut simplement définir un name sur chaque button pour identifier chaque formulaire.</p>

    <?php
        // Récupère les données
        $email = $_POST['email'] ?? null;
        $errors = [];
        // Traitement du form 1
        if (isset($_POST['form1'])) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Email du form1 invalide';
            }

            if (empty($errors)) {
                echo "$email SUR LE FORM1";
            }
        }

        // Traitement du form 2
        if (isset($_POST['form2'])) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Email du form2 invalide';
            }

            if (empty($errors)) {
                echo "$email SUR LE FORM2";
            }
        }

        foreach ($errors as $error) {
            echo $error;
        }
    ?>

    <form action="" method="post">
        <input type="text" name="email" placeholder="Email">
        <button name="form1">Form 1</button>
    </form>

    <form action="" method="post">
        <input type="text" name="email" placeholder="Email">
        <button name="form2">Form 2</button>
    </form>
</body>
</html>
