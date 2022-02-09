<?php
$firstname = $_POST['firstname'] ?? null;
$cv = $_FILES['cv'] ?? null;
$errors = [];
$success = null;

if (!empty($_FILES)) {
    if (empty($firstname)) {
        $errors[] = 'Le prénom est obligatoire';
    }

    if ($cv['error'] != 0) {
        $errors[] = 'Le CV est obligatoire.';
    }

    if ($cv['size'] > 5 * 1024 * 1024) {
        $errors[] = 'Votre CV doit faire 5Mo maximum.';
    }

    $mime = '';
    // Parfois le tmp_name est vide si on envoie pas de fichier
    if (!empty($cv['tmp_name'])) {
        $mime = mime_content_type($cv['tmp_name']);
    }

    $mimeTypes = ['application/msword', 'application/pdf'];
    if (!in_array($mime, $mimeTypes)) {
        $errors[] = 'Le fichier doit être un pdf ou un .doc.';
    }

    if (empty($errors)) {
        if (!is_dir('uploads')) {
            mkdir('uploads');
        }

        $file = pathinfo($cv['name']);
        // On enlève les espaces et les majuscules du prénom
        // La fonction enlève les espaces au début et à la fin de la chaine
        $firstname = trim($firstname); // ToTo a. aotot. a
        $firstname = str_replace(' ', '-', $firstname); // ToTo-a.-aotot.-a
        $firstname = strtolower($firstname); // toto-a.-aotot.-a
        // cv-toto-12345.pdf
        $filename = 'cv-'.$firstname.'-'.uniqid().'.'.$file['extension'];
        move_uploaded_file($cv['tmp_name'], 'uploads/'.$filename);

        $success = 'uploads/'.$filename;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Stack Developer</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="app.css" rel="stylesheet">
</head>
<body>
    <div class="job">
        <h1>Full-Stack Developer</h1>

        <ul class="errors">
            <?php foreach ($errors as $error) { ?>
                <li><?php echo $error; ?></li>
            <?php } ?>
        </ul>

        <form method="post" enctype="multipart/form-data">
            <div>
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname">
            </div>

            <div>
                <label>Votre CV</label>
                <input type="file" name="cv">
            </div>

            <button>Envoyer</button>
        </form>

        <iframe src="<?php echo $success; ?>" frameborder="0"></iframe>
    </div>
</body>
</html>
