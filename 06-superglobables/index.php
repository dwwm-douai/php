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
        <h2>Les superglobales en PHP</h2>
        <p>$_GET et $_POST sont des variables superglobales. On va les utiliser pour récupérer des valeurs dans l'URL ou dans un formulaire.</p>

        <?php
            // $_GET est un tableau qui contient les paramètres de l'URL
            // Si on va sur index.php?nom=toto&age=21, $_GET contient
            // ['nom' => 'toto', 'age' => 21]
            var_dump($_GET);
            // On va récupèrer le nom dans l'url s'il est présent
            // L'opérateur null coalescing permet de vérifier si une valeur
            // existe (dans un tableau par exemple)
            $nom = $_GET['nom'] ?? null;
            // On vérifie si on a coché "majuscule" dans le formulaire
            // isset vérifie si l'index majuscule existe dans le tableau $_GET
            if (isset($_GET['majuscule'])) {
                $nom = strtoupper($nom);
            }
            // On va essayer de récupérer l'age s'il est présent dans l'URL
            // Exemple: "Bonjour Toto, tu as 21 ans"
            // Optionnellement, on ajoutera un champ dans le formulaire où l'utilisateur peut saisir son âge
        ?>

        <?php if ($nom) { ?>
        <h1>Bonjour <?php echo $nom; ?></h1>
        <?php } ?>

        <a href="index.php?nom=toto&age=21">Hello Toto</a>
        <a href="index.php?nom=tata">Hello Tata</a>
        <a href="index.php">Hello</a>

        <h2>Un formulaire avec $_GET</h2>

        <!-- Attention, les name sont très importants dans les formulaires -->
        <form method="get" action="">
            <label>
                <input type="checkbox" name="majuscule" class="form-check-input"> Majuscule
            </label>

            <div class="input-group">
                <input type="text" name="nom" class="form-control">
                <button class="btn btn-primary">Go</button>
            </div>
        </form>
    </div>
</body>
</html>
