<?php
// Fichier : gestionFichiers.php
// Définition du chemin du fichier
define('CHEMIN_FICHIER_FILMS', __DIR__ . '/../../donnees/films.txt');

// Lire tous les films depuis le fichier
function lireFilmsDepuisFichier() {
    if (!file_exists(CHEMIN_FICHIER_FILMS)) return [];
    $lignes = file(CHEMIN_FICHIER_FILMS, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $tabFilms = [];
    foreach ($lignes as $ligne) {
        $champs = explode(';', $ligne);
        if (count($champs) === 4) {
            $tabFilms[] = [
                'idf'   => $champs[0],
                'titre' => $champs[1],
                'annee' => $champs[2],
                'categ' => $champs[3],
            ];
        }
    }
    return $tabFilms;
}

// Écrire dans le fichier
function ecrireFilmsDansFichier($tabFilms) {
    $fic = fopen(CHEMIN_FICHIER_FILMS, 'w');
    // si fopen échoue
    if (!$fic) return false;
    foreach ($tabFilms as $unFilm) {
        $ligne = implode(';', [
            $unFilm['idf'],
            $unFilm['titre'],
            $unFilm['annee'],
            $unFilm['categ'],
        ]);
        fwrite($fic, $ligne . PHP_EOL);
    }
    fclose($fic);
    return true;
}

// Générer nouvel id
function genererNouvelId($tabFilms) {
    if (empty($tabFilms)) return 1;
    $maxId = 0;
    foreach ($tabFilms as $film) {
        if ($film['idf'] > $maxId) $maxId = $film['idf'];
    }
    return $maxId + 1;
}
