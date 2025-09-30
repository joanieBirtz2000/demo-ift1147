<?php
require_once 'includes/gestionFichiers.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["idf"] ?? null;

    if ($id !== null) {
        // Lire tous les films
        $tabFilms = lireFilmsDepuisFichier();

         unset($tabFilms[$id-1]);

        // Réattribuer les idf (1,2,3,...) pour chaque film restant
        foreach ($nouveauTab as $i => &$film) {
            $film['idf'] = $i + 1;
        }
        unset($film); // bonne pratique quand foreach utilise &

        // Réécrire dans le fichier
        ecrireFilmsDansFichier($nouveauTab);

        // Redirection avec message
        header("Location: ../../client/index.php?message=Film supprimé");
        exit;
    }
}
