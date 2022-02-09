<?php
$photo = $_FILES['photo'] ?? null;
$errors = [];

var_dump($photo);

if (!empty($_FILES)) {
    // Vérifier les erreurs du fichier (taille, type)

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
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="photo">

        <button>Upload</button>
    </form>
</body>
</html>
