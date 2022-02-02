<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php
    // PHP se connecte à MySQL
    $db = new PDO('mysql:host=localhost;port=3306;dbname=webflix;charset=utf8', 'root', '');
    // Cette ligne permet d'activer le détail des erreurs
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // On écrit notre première requête SQL pour récupèrer les films (dans un tableau)
    $movies = $db->query('SELECT * FROM movies')->fetchAll();

    // $movies est un tableau contenant tous les films de la BDD
    // [ [ 'title' => 'Le Parrain', 'duration' => 185 ], [ 'title' => 'Le Parrain', 'duration' => 185 ] ]
?>
    <div class="container">
        <div class="row row-cols-4">
        <?php foreach ($movies as $movie) { ?>
            <div class="col">
                <h3><?php echo $movie['title']; ?></h3>
                <img src="img/<?php echo $movie['cover']; ?>" width="150" />
                <p><?php // echo $movie['description']; ?></p>
                <a href="film.php?id=<?php echo $movie['id']; ?>" class="btn btn-primary">Voir le film</a>
            </div>
        <?php } ?>
        </div> <!-- fin du .row -->
    </div> <!-- fin du .container -->
</body>
</html>
