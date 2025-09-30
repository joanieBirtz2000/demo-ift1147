<?php
require_once 'includes/gestionFichiers.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lire les films existants
    $tabFilms = lireFilmsDepuisFichier();

    // --- VALIDATION ---
    $titre = trim($_POST['titre'] ?? '');
    $annee = trim($_POST['annee'] ?? '');
    $categ = trim($_POST['categ'] ?? '');

    if ($titre === '' || $annee === '' || $categ === '') {
        header("Location: ../../client/index.php?message=Erreur: champs obligatoires");
        exit;
    }

    // Générer un nouvel ID
    $newId = genererNouvelId($tabFilms);

    // Créer le film à ajouter
    $nouveauFilm = [
        'idf'   => $newId,
        'titre' => $titre,
        'annee' => $annee,
        'categ' => $categ,
    ];

    // Ajouter et sauvegarder
    $tabFilms.array_push($nouveauFilm);
    ecrireFilmsDansFichier($tabFilms);

    // Redirection succès
    header("Location: ../../client/index.php?message=Film ajouté");
    exit;
}
