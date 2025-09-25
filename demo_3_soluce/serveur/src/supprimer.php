<?php
require_once 'includes/gestionFichiers.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["idf"] ?? null;

    if ($id !== null) {
        // Lire tous les films
        $tabFilms = lireFilmsDepuisFichier();

        // Garder uniquement les films dont l'idf est différent
        $nouveauTab = array_filter($tabFilms, fn($film) => $film['idf'] != $id);
        $nouveauTab = array_values($nouveauTab);



        // Parcours pour supprimer par "idf"
        // foreach ($tabFilms as $key => $film) {
        //     if ($film['idf'] == $id) {
        //         unset($tabFilms[$key]);
        //         break; // on arrête après avoir trouvé
        //     }
        // }

        // // Réindexer
        // $nouveauTab = array_values($tabFilms);

        // Réécrire dans le fichier
        ecrireFilmsDansFichier($nouveauTab);

        // Redirection avec message
        header("Location: ../../client/index.php?message=Film supprimé");
        exit;
    }
}
