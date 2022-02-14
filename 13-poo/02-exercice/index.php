<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TP Car</title>
</head>
<body>
    <?php
        require 'Car.php';

        $car1 = new Car('Renault', 'Mégane', 'Bleu');
        $car2 = new Car('Alfa Roméo', '147', 'Gris');
    ?>

    <p><?php echo $car1->klaxon(); ?></p>
    <?php while($car2->hasFuel()) { ?>
    <p><?php echo $car2->drive(); ?></p>
    <?php } ?>
    <p><?php echo $car1->getDetails() ?></p>
    <?php $car2->repaint('Bleu') ?>
    <p><?php echo $car2->getDetails() ?></p>
</body>
</html>
