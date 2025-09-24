<?php
require_once 'includes/gestionFichiers.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // TODO : lire les films existants avec lireFilmsDepuisFichier()
    
    // TODO : générer un nouvel id avec genererNouvelId()
    
    // TODO : créer un tableau associatif représentant le nouveau film
    // Ex : ['idf' => ..., 'titre' => ..., 'annee' => ..., 'categ' => ...]
    
    // TODO : ajouter le film au tableau et enregistrer avec ecrireFilmsDansFichier()
    
    // TODO : rediriger vers index.php avec un message GET (ex: ?message=Film ajouté)
}
?>
