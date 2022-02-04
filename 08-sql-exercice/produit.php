<?php
require 'helpers.php';

$id = $_GET['id'] ?? null;
$product = selectOne('SELECT * FROM products WHERE id = :id', ['id' => $id]);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name']; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <a href="index.php">Retour aux produits</a>

        <div class="row align-items-center">
            <div class="col-6">
                <h2><?= $product['name']; ?></h2>
                <p><?= tax($product['price']); ?></p>

                <div class="mb-3">
                    <?php if ($product['state']) { ?>
                        <span class="badge bg-success">En stock</span>
                    <?php } else { ?>
                        <span class="badge bg-danger">Hors stock</span>
                    <?php } ?>
                </div>

                <a class="btn btn-info" href="produit.php?id=<?= $product['id']; ?>">Voir</a>
            </div>
            <div class="col-6">
                <img class="img-fluid" src="img/<?= $product['photo']; ?>" alt="<?= $product['name']; ?>">
            </div>
        </div>
    </div>
</body>
</html>
