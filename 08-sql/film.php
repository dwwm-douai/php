<?php
// On doit récupèrer l'id présent dans l'URL (paramètre $_GET)
$id = $_GET['id'] ?? null;

// PHP se connecte à MySQL
$db = new PDO('mysql:host=localhost;port=3306;dbname=webflix;charset=utf8', 'root', '');
// Cette ligne permet d'activer le détail des erreurs
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupèrer le film dont l'id correspond dans la BDD
// SELECTIONNE TOUS LES FILMS Où L'ID EST SUR 1
$movie = $db->query('SELECT * FROM movies WHERE id = '.$id)->fetch();

// Si le film n'existe pas
if (!$movie) {
    echo '404';
    die(); // On arrête le PHP
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $movie['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <a href="index.php">Retour aux films</a>
        <h1><?php echo $movie['title']; ?></h1>
        <img src="img/<?php echo $movie['cover']; ?>" width="150" />
        <p><?php echo $movie['description']; ?></p>
    </div>
</body>
</html>
