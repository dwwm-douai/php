<?php
$photo = $_FILES['photo'] ?? null;
$errors = [];
$success = null;

var_dump($photo);

if (!empty($_FILES)) {
    // Vérifier les erreurs du fichier (taille, type)
    // 4096 = 4ko
    // 4096 * 1024 = 4Mo
    if ($photo['size'] > 4096) {
        $errors[] = "L'image doit faire 4ko maximum.";
    }

    $mime = mime_content_type($photo['tmp_name']); // image/jpeg
    $mimeTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
    // On vérifie que le fichier uploadé est bien une image...
    if (!in_array($mime, $mimeTypes)) {
        $errors[] = 'Le fichier doit être une image';
    }

    // On fait l'upload s'il n'y a pas d'erreurs
    if (empty($errors)) {
        // On va s'assurer que le dossier uploads existe sur le serveur
        if (!is_dir('uploads')) {
            mkdir('uploads');
        }

        $filename = $photo['name']; // avatar.jpeg
        // avatar.jpeg devient avatar-123456.jpeg
        $file = pathinfo($filename); // => ['filename' => 'avatar', 'extension' => 'jpeg'];
        $filename = $file['filename'].'-'.uniqid().'.'.$file['extension']; // avatar-123456.jpeg
        // On upload le fichier sur le serveur
        move_uploaded_file($photo['tmp_name'], 'uploads/'.$filename);

        $success = 'uploads/'.$filename;
    } // fin du empty($errors)
} // fin du empty($_FILES)
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>
    <ul>
        <?php foreach ($errors as $error) { ?>
            <li><?php echo $error; ?></li>
        <?php } ?>
    </ul>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="photo">

        <button>Upload</button>
    </form>

    <?php
        // Renvoie tous les fichiers du dossier uploads dans un tableau
        $photos = glob('uploads/*');

        foreach ($photos as $photo) { ?>
            <img width="80" src="<?php echo $photo; ?>" alt="">
    <?php } ?>

    <?php if ($success) { ?>
        <p>Voici la photo que vous avez envoyé.</p>
        <img src="<?php echo $success; ?>" alt="">
    <?php } ?>
</body>
</html>
