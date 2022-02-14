<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO</title>
</head>
<body>
    <?php
        require 'Chat.php';

        $chat1 = new Chat();
        $chat1->nom = 'Bianca';
        $chat1->type = 'Chat de gouttière';
        $chat1->couleur = 'Blanc';
        $chat2 = new Chat('Mina', 'Chat de gouttière', 'Noir');
    ?>

    <div>
        <h2>Mon premier chat s'appelle <?php echo $chat1->nom ?></h2>
        <p>
            Il est <?php echo $chat1->couleur ?> et
            c'est un <?php echo $chat1->type ?>.
        </p>
        <p>
            Parfois, le chat fait
            <?php echo $chat1->miaule() ?>
        </p>
        <p><?php echo $chat1->joueAvec($chat2) ?></p>
        <p><?php echo $chat2->joueAvec($chat1) ?></p>

        <p>Mon chat a <?php echo $chat1->getPattes() ?> pattes.</p>
    </div>
</body>
</html>
