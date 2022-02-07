<?php
    require 'helpers.php';

    // Récupération données formulaire
    $email = post('email');
    $subject = post('subject');
    $message = htmlspecialchars(post('message'));
    $validSubjects = ['Proposition de stage', 'Proposition d\'emploi', 'Demande de projet'];
    $errors = [];
    $success = null;

    // Si on envoie le formulaire
    if (!empty($_POST)) {
        // On vérifie les erreurs
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'L\'email est invalide.';
        }

        // if ($subject != 'Proposition de stage' && $subject == 'Proposition d\'emploi' && $subject == 'Demande de projet') {
        // On s'assure que $subject est présent dans le tableau $validSubjects
        if (!in_array($subject, $validSubjects)) {
            $errors[] = 'Le sujet est invalide.';
        }

        if (strlen($message) < 15) {
            $errors[] = 'Le message est trop court.';
        }

        // On affiche un message de succès s'il n'y a pas d'erreurs + Dans la bdd pour l'exercice 2
        if (empty($errors)) {
            insert('INSERT INTO contacts (email, subject, message, created_at) VALUES (:email, :subject, :message, :created_at)', [
                'email' => $email,
                'subject' => $subject,
                'message' => $message,
                'created_at' => date('Y-m-d H:i:s'), // 2022-02-07 15:59:12
            ]);

            $success = 'Super, ça marche';
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous contacter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="py-5">Nous contacter</h1>
    
        <?php if (!empty($errors)) { ?>
            <ul class="alert alert-danger">
                <?php foreach ($errors as $error) { ?>
                    <li><?php echo $error; ?></li>
                <?php } ?>
            </ul>
        <?php } ?>

        <?php if ($success) { ?>
            <p class="alert alert-success"><?php echo $success; ?></p>
        <?php } ?>

        <form action="" method="post" class="w-50">
            <div class="row">
                <div class="col-lg-6">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>">
                </div>

                <div class="col-lg-6">
                    <label for="subject">Sujet</label>
                    <select name="subject" id="subject" class="form-select">
                        <option disabled selected>Choisir</option>
                        <option value="Proposition de stage">Proposition de stage</option>
                        <option value="Proposition d'emploi">Proposition d'emploi</option>
                        <option value="Demande de projet">Demande de projet</option>
                    </select>
                </div>
            </div>

            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control"><?php echo $message; ?></textarea>

            <button class="btn btn-secondary">Envoyer</button>
        </form>

        <hr>

        <div class="row">
        <?php
            $contacts = select('SELECT * FROM contacts');

            foreach ($contacts as $contact) { ?>
                <div class="col-3">
                    <h3>Contact <?php echo $contact['id']; ?></h3>
                    <p class="mb-0"><?php echo $contact['email']; ?></p>
                    <p class="mb-0"><?php echo $contact['subject']; ?></p>
                    <p><?php echo $contact['message']; ?></p>
                </div>
            <?php }
        ?>
        </div>
    </div>
</body>
</html>
