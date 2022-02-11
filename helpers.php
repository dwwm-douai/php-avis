<?php

/**
 * Moyenne des avis
 */
function reviews_avg($reviews) {
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
