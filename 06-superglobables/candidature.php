<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superglobales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Formulaire de candidature</h2>
        <a href="index.php">Retour à l'accueil</a>

        <?php
            // Grâce à la superglobale $_POST, on va pouvoir traiter le formulaire.
            var_dump($_POST);
            // On va commencer par récupèrer tous les champs
            $prenom = $_POST['prenom'] ?? null;
            $password = $_POST['password'] ?? null;
            $erreurs = [];

            // On vérifie si le formulaire est soumis (envoyé / rempli...)
            if (!empty($_POST)) {
                // Vérifier s'il y a des erreurs dans le formulaire
                // Si le prénom est vide, on ajoute une erreur dans le tableau
                if (empty($prenom)) {
                    $erreurs[] = 'Le prénom est invalide.';
                }

                if (empty($erreurs)) {
                    // On affiche un message de succès si tout va bien
                    echo "<div class='alert alert-success'>Merci $prenom pour votre candidature</div>";
                } else {
                    // Afficher les erreurs...
                    // Mission => Afficher les erreurs proprement...
                    var_dump($erreurs);
                }
            }
        ?>

        <form method="post" action="">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" />

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" />

            <button class="btn btn-primary w-100">Postuler</button>
        </form>
    </div>
</body>
</html>
