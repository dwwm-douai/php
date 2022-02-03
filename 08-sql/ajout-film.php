<?php
    // PHP se connecte à MySQL
    $db = new PDO('mysql:host=localhost;port=3306;dbname=webflix;charset=utf8', 'root', '');
    // Cette ligne permet d'activer le détail des erreurs
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupèrer les données du formulaire
    $title = $_POST['title'] ?? null;
    $released_at = $_POST['released_at'] ?? null;
    $description = $_POST['description'] ?? null;
    $duration = $_POST['duration'] ?? null;
    $erreurs = [];

    // Vérifier qu'on a soumis le formulaire
    if (!empty($_POST)) {
        // Vérifier s'il y a des erreurs dans le formulaire
        if (strlen($title) < 2) {
            $erreurs[] = 'Le titre est trop court.';
        }

        if (empty($released_at)) {
            $erreurs[] = 'La date est requise.';
        }

        if (strlen($description) < 10) {
            $erreurs[] = 'La description est trop courte.';
        }
        var_dump($duration);
        if ($duration < 1) {
            $erreurs[] = 'La durée doit être au moins de 1.';
        }

        // S'il y a des erreurs, on les affichera plus bas sur la page
        // S'il n'y a pas d'erreurs, on fait la requête SQL pour insèrer le film
        if (empty($erreurs)) {
            // Requête de test (pour le cours)
            // $db->query('INSERT INTO movies (title, released_at, `description`, duration) VALUES ("Toto", "2022-02-01", "Lorem ipsum", 143)');
            $query = $db->prepare('INSERT INTO movies (title, released_at, `description`, duration) VALUES (:title, :released_at, :description, :duration)');
            $query->execute([
                'title' => $title, 'released_at' => $released_at, 'description' => $description, 'duration' => $duration,
            ]);
        } // Fin du if sur les erreurs

    } // fin du if pour savoir si on a soumis le formulaire
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert SQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Ajouter un film</h1>
        <a href="index.php">Retour</a>

        <?php if (!empty($erreurs)) { ?>
            <ul class="alert alert-danger">
                <?php foreach ($erreurs as $erreur) { ?>
                    <li><?php echo $erreur; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>

        <form action="" method="post">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control">

            <label for="released_at">Date de sortie</label>
            <input type="date" name="released_at" id="released_at" class="form-control">

            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>

            <label for="duration">Durée</label>
            <input type="number" name="duration" id="duration" class="form-control">

            <button class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>
