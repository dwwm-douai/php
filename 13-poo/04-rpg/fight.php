<?php
session_start();

require 'Character.php';

$attacker = Character::find($_GET['attacker'] ?? 0);
$target = Character::find($_GET['target'] ?? 0);

if (!$attacker || !$target) {
    die(404);
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RPG - Combat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">RPG - Combat</h1>

        <div class="w-50 mx-auto">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <img class="card-img" src="<?= $attacker->image(); ?>" alt="<?= $attacker->name; ?>">
                        <div class="card-body">
                            <h2 class="card-title"><?= $attacker->name; ?></h2>
                            <p>Attaquant <?php echo $attacker->class.' '.$attacker->tribe; ?>.</p>
                            <ul>
                                <li>Ta santé: <?= $attacker->health; ?></li>
                                <li>Ta force: <?= $attacker->strength; ?></li>
                                <li>Ton mana: <?= $attacker->mana; ?></li>
                            </ul>

                            <p>A gagné le combat</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <img class="card-img" src="<?= $target->image(); ?>" alt="<?= $target->name; ?>">
                        <div class="card-body">
                            <h2 class="card-title"><?= $target->name; ?></h2>
                            <p><?php echo $target->class.' '.$target->tribe; ?> attaqué.</p>
                            <ul>
                                <li>Ta santé: <?= $target->health; ?></li>
                                <li>Ta force: <?= $target->strength; ?></li>
                                <li>Ton mana: <?= $target->mana; ?></li>
                            </ul>

                            <p>A perdu le combat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
