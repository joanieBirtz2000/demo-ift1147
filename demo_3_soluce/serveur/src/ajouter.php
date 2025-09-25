<?php
require_once 'includes/gestionFichiers.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lire les films existants
    $tabFilms = lireFilmsDepuisFichier();

    // Générer un nouvel ID
    $newId = genererNouvelId($tabFilms);

    // Créer le film à ajouter
    $nouveauFilm = [
        'idf'   => $newId,
        'titre' => trim($_POST['titre']),
        'annee' => trim($_POST['annee']),
        'categ' => trim($_POST['categ']),
    ];

    // Ajouter dans le tableau
    array_push($tabFilms, $nouveauFilm);
    //$tabFilms[] = $nouveauFilm;
    

    // Réécrire le fichier
    ecrireFilmsDansFichier($tabFilms);

    // Redirection vers index avec message
    header("Location: ../../client/index.php?message=Film ajouté");
    exit;
}
