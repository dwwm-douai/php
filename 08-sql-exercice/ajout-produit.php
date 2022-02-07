<?php
    require 'helpers.php'; // On inclus tout le code dans le fichier helpers.php

    // Récupérer les données du formulaire
    // $name = $_POST['name'] ?? null;
    // htmlspecialchars est une fonction qui va nous protéger des attaques XSS
    // <script> va devenir &lt;script&gt;
    $name = htmlspecialchars($_POST['name'] ?? null);
    $price = post('price');
    $description = htmlspecialchars(post('description'));
    $state = $_POST['state'] ?? 0;
    $errors = [];

    // Si le formulaire est soumis
    if (!empty($_POST)) {
        // Vérifier les erreurs
        if (strlen($name) < 2) {
            $errors[] = 'Le nom est trop court.';
        }

        if ($price < 1 || $price > 9999) {
            $errors[] = 'Le prix doit être entre 1 et 9999.';
        }

        // Vérification optionnelle...
        if ($state != '0' && $state != '1') {
            $errors[] = "L'état n'est pas valide.";
        }

        // Si on a pas d'erreurs, on ajoute le produit dans la BDD
        if (empty($errors)) {
            // On fait une requête SQL sur MySQL => On a insére un produit dans la BDD
            // J'insère un produit où le name est $name, description est $description...
            $requete = db()->prepare("INSERT INTO products (name, description, price, state) VALUES (:name, :description, :price, :state)");

            try {
                $requete->execute([
                    'name' => $name,
                    'description' => $description,
                    'price' => $price,
                    'state' => $state,
                ]);
            } catch (Exception $e) { ?>
                <!-- si le code dans le try échoue, on exécute le code suivant -->
                <div class="alert alert-danger">
                    <p><?php echo $e->getMessage(); ?></p>
                    <p>Tu as fait une erreur à la ligne <?php echo $e->getLine(); ?></p>
                    <img class="img-fluid" width="150" src="img/travolta.gif" alt="John Travolta">
                </div>
            <?php }
        }
    } // Fin du if pour le formulaire soumis
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos produits</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center py-5">Ajouter un produit</h1>

        <?php if (!empty($errors)) { ?>
            <ul class="alert alert-danger">
                <?php foreach ($errors as $error) { ?>
                    <li><?php echo $error; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>

        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <form action="" method="post">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">

                    <label for="price">Prix</label>
                    <input type="text" name="price" id="price" class="form-control" value="<?php echo $price; ?>">

                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control"><?php echo $description; ?></textarea>

                    <div class="form-check form-switch mt-3">
                        <input class="form-check-input" type="checkbox" name="state" id="state" value="1" <?= ($state == 1) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="state">En stock ?</label>
                    </div>

                    <button class="btn btn-primary w-100 mt-4">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
