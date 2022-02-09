<?php

/**
 * Permet d'établir une connexion à la base de données.
 */
function db() {
    $db = new PDO('mysql:host=localhost;dbname=exercice-sql-1;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
}

/**
 * Permet de faire un insert en SQL.
 */
function insert($sql, $bindings = []) {
    $query = db()->prepare($sql);

    return $query->execute($bindings);
}

/**
 * Permet de faire un select en SQL (fetch).
 */
function selectOne($sql, $bindings = []) {
    $query = db()->prepare($sql);
    $query->execute($bindings);

    return $query->fetch();
}
