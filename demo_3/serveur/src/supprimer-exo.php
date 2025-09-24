<?php
require_once 'includes/gestionFichiers.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["idf"] ?? null;

    if ($id !== null) {
        // TODO : lire tous les films
        
        // TODO : créer un nouveau tableau sans le film correspondant à $id
        
        // TODO : réécrire le fichier avec ecrireFilmsDansFichier()
        
        // TODO : rediriger vers index.php avec un message de confirmation
    }
}
