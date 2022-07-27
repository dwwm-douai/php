<?php
session_start();

require 'Character.php';

// On crée le personnage si le formulaire est envoyé
$name = $_POST['name'] ?? null;
$class = $_POST['class'] ?? null;
$tribe = $_POST['tribe'] ?? null;
$character = null;

if (!empty($_POST)) {
    $character = new Character($name, $class, $tribe);

    // On vérifie si la checkbox est cochée
    if (isset($_POST['random'])) {
        $character->generateName();
    }

    if (!$character->hasErrors()) {
        // Insert dans la BDD
        $character->save();
    }
}

// On regarde si on a cliqué sur le bouton
if (isset($_GET['incarn'])) {
    $_SESSION['incarn'] = $_GET['incarn'];
}

$incarn = null;
// On regarde si un personnage est choisi
if (isset($_SESSION['incarn'])) {
    $incarn = Character::find($_SESSION['incarn']);
    var_dump($incarn);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RPG</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">POO RPG</h1>

        <?php if ($character && !$character->hasErrors()) { ?>
            <h1>Salut <?php echo $character->name; ?></h1>
            <img src="<?php echo $character->image(); ?>" alt="<?php echo $character->name; ?>">

            <p>Tu es un <?php echo $character->class.' '.$character->tribe; ?>.</p>

            <ul>
                <li>Ta santé: <?= $character->health; ?></li>
                <li>Ta force: <?= $character->strength; ?></li>
                <li>Ton mana: <?= $character->mana; ?></li>
            </ul>

            <a href="index.php">Je veux un autre personnage</a>
        <?php } ?>

        <?php if ($character) { ?>
            <ul class="alert alert-danger">
                <?php foreach ($character->errors() as $error) { ?>
                    <li><?= $error; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>

        <div class="w-50 mx-auto">
            <form action="" method="post">
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Votre nom...">
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="random" id="random">
                    <label class="form-check-label" for="random">Générer un nom aléatoire</label>
                </div>

                <div class="mb-3">
                    <label for="tribe">Votre tribu ?</label>

                    <select name="tribe" id="tribe" class="form-select">
                        <option disabled selected>Choisir</option>
                        <option value="Humain">Humain</option>
                        <option value="Nain">Nain</option>
                        <option value="Elfe">Elfe</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Votre classe ?</label>

                    <div class="d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="class" id="warrior" value="Guerrier">
                            <label class="form-check-label" for="warrior">
                                Guerrier
                                <img src="img/guerrier.jpg" alt="">
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="class" id="magus" value="Mage">
                            <label class="form-check-label" for="magus">
                                Mage
                                <img src="img/mage.jpg" alt="">
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="class" id="hunter" value="Chasseur">
                            <label class="form-check-label" for="hunter">
                                Chasseur
                                <img src="img/chasseur.jpg" alt="">
                            </label>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary">Créer</button>
            </form>
        </div>

        <div class="row my-5">
            <?php foreach (Character::all() as $character) { ?>
                <div class="col-lg-2">
                    <div class="card">
                        <img class="card-img" src="<?= $character->image(); ?>" alt="<?= $character->name; ?>">
                        <div class="card-body">
                            <h2 class="card-title"><?= $character->name; ?></h2>
                            <p>Tu es un <?php echo $character->class.' '.$character->tribe; ?>.</p>
                            <ul>
                                <li>Ta santé: <?= $character->health; ?></li>
                                <li>Ta force: <?= $character->strength; ?></li>
                                <li>Ton mana: <?= $character->mana; ?></li>
                            </ul>

                            <?php if ($incarn) { ?>
                                <a class="btn btn-primary" href="fight.php?attacker=<?= $incarn->id; ?>&target=<?= $character->id; ?>">Combattre</a>
                            <?php } else { ?>
                                <a class="btn btn-primary" href="index.php?incarn=<?= $character->id; ?>">Incarner</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
