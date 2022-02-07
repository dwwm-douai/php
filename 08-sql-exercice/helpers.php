<?php

/**
 * Ici, je vais créer des fonctions pour m'aider à travailler
 * en PHP.
 */

/**
 * Permet d'établir une connexion à la base de données.
 */
function db() {
    $db = new PDO('mysql:host=localhost;dbname=exercice-sql-1;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
}

/**
 * Permet de faire un select en SQL.
 */
function select($sql) {
    return db()->query($sql)->fetchAll();
}

/**
 * Permet de faire un select en SQL (fetch).
 */
function selectOne($sql, $bindings = []) {
    $query = db()->prepare($sql);
    $query->execute($bindings);

    return $query->fetch();
}

function post($index) {
    return $_POST[$index] ?? null;
}

/**
 * Permet d'afficher un prix HT en TTC.
 */
function tax($price, $rate = 20) {
    $result = $price * (1 + $rate / 100);

    return number_format($result, 2, ',', ' ').' €';
}
