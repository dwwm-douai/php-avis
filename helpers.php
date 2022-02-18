<?php

session_start();

/**
 * Moyenne des avis
 */
function reviews_avg($reviews) {
    if (count($reviews) == 0) {
        return 0;
    }

    return array_sum(array_column($reviews, 'note')) / count($reviews);
}

/**
 * Nombre d'avis pour une note donnée
 */
function reviews_count_note($reviews, $note) {
    $count = 0;

    foreach ($reviews as $review) {
        if ($review['note'] == $note) {
            $count++;
        }
    }

    return $count;
}

/**
 * Pourcentage d'avis pour une note donnée
 */
function reviews_percentage_note($reviews, $note) {
    return reviews_count_note($reviews, $note) * 100 / count($reviews);
}

/**
 * Formate une date US en FR
 */
function format_date($string) {
    $date = date('l j F Y à H\hi', strtotime($string));

    $date = str_replace(
        ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'],
        $date
    );

    $date = str_replace(
        ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'],
        $date
    );

    return $date;
}

/**
 * Permet d'établir une connexion à la base de données.
 */
function db() {
    $db = new PDO('mysql:host=localhost;dbname=exercice-sql-1;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
}

/**
 * Permet de faire un select en SQL (Plusieurs résultats).
 */
function select($sql, $bindings = []) {
    $query = db()->prepare($sql);
    $query->execute($bindings);

    return $query->fetchAll();
}

/**
 * Permet de faire un select en SQL (1 seul résultat).
 */
function selectOne($sql, $bindings = []) {
    $query = db()->prepare($sql);
    $query->execute($bindings);

    return $query->fetch();
}

/**
 * Permet de faire un insert en SQL.
 */
function insert($sql, $bindings = []) {
    $query = db()->prepare($sql);

    return $query->execute($bindings);
}

/**
 * Permet de récupèrer une donnée dans un formulaire.
 */
function post($key) {
    return $_POST[$key] ?? null;
}

/**
 * Permet de récupèrer un fichier dans un formulaire.
 */
function files($key) {
    return $_FILES[$key] ?? null;
}

/**
 * Permet de vérifier qu'un formulaire est soumis.
 */
function submit() {
    return !empty($_POST);
}

/**
 * Permet de faire un upload dans un dossier.
 */
function upload($pfile, $directory = 'uploads') {
    if ($pfile['error'] != 0) {
        return null;
    }

    if (!is_dir($directory)) {
        mkdir($directory);
    }

    $file = pathinfo($pfile['name']);

    $filename = $file['filename'].'-'.uniqid().'.'.$file['extension'];
    move_uploaded_file($pfile['tmp_name'], $directory.'/'.$filename);

    return $directory.'/'.$filename;
}

/**
 * Permet de récupérer l'utilisateur connecté en session.
 */
function user() {
    return $_SESSION['user'] ?? null;
}
