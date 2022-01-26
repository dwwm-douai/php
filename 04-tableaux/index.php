<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les tableaux</title>
</head>
<body>
    <?php
        echo '<h2>Les tableaux numériques</h2>';
        // Un tableau est un type de donnée qui permet de stocker plusieurs données.
        // Un tableau numérique contient des valeurs associées à un index (0, 1, 2)
        //              0           1          2
        $prenoms = ['Fiorella', 'Marina', 'Matthieu'];

        // Comment afficher Matthieu ?
        echo $prenoms[2].'<br>';

        // Comment ajouter un prénom au tableau ?
        $prenoms[] = 'Toto';

        // Comment afficher tous les prénoms ?
        // var_dump($prenoms);
        echo '<ul>';
        foreach ($prenoms as $index => $prenom) {
            echo '<li>'.$index.' : '.$prenom.'</li>';
        }
        echo '</ul>';

        echo '<h2>Les tableaux associatifs</h2>';
        // Un tableau associatif possède des indexs non numériques (que l'on définit nous même)
        // Un index est unique. On n'est pas obligé de définir tous les indexs.
        $fruits = ['rouge' => 'Fraise', 'jaune' => 'Banane', 'vert' => 'Tomate'];

        // On peut mixer chaine ou entier pour les noms des indexs.
        // Quel est l'index de tata ? 12
        // var_dump([11 => 'toto', 'z' => 'titi', 'tata']);

        echo $fruits[1]; // Erreur car l'index n'existe pas
        echo $fruits['jaune']; // Affiche Banane

        echo '<ul>';
        foreach ($fruits as $couleur => $fruit) {
            echo '<li>Le fruit '.$fruit.' est '.$couleur.'</li>';
        }
        echo '</ul>';

        echo '<h2>Le tableau multidimensionnel</h2>';

        // Tableau à 3 niveaux (ou 3 dimensions)
        $utilisateurs = [
            0 => [
                'prenom' => 'Fiorella',
                'nom' => 'Mota',
                'telephone' => '0600000000',
                'adresses' => ['Hulluch', 'Lens'],
            ],
            1 => [
                'prenom' => 'Marina',
                'nom' => 'Mota',
                'telephone' => '0600000000',
                'adresses' => ['Hulluch'],
            ],
        ];

        // Comment afficher Fiorella Mota vit à Hulluch, Lens.
        echo $utilisateurs[0]['prenom'].' '.$utilisateurs[0]['nom'].' vit à '.$utilisateurs[0]['adresses'][0].', '.$utilisateurs[0]['adresses'][1].'<br>';

        // Comment afficher tous les contacts avec toutes leurs adresses ?
        foreach ($utilisateurs as $utilisateur) {
            echo $utilisateur['prenom'].' '.$utilisateur['nom'].' vit à ';

            echo '<ul>';
            foreach ($utilisateur['adresses'] as $adresse) {
                echo '<li>'.$adresse.'</li>';
            }
            echo '</ul>';

            echo '<br>';
        }

        // Comment compter le nombre d'utilisateurs ?
        echo 'Nous avons '.count($utilisateurs).' utilisateurs sur le site.';
    ?>
</body>
</html>
