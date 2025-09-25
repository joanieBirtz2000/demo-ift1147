<?php
require_once 'includes/gestionFichiers.php';
require_once 'includes/affichage.php';

// Récupérer la catégorie depuis le formulaire
$categ = trim($_POST['categ'] ?? '');

// Lire tous les films
$tabFilms = lireFilmsDepuisFichier();

// TODO : si $categ n’est pas vide, filtrer $tabFilms 
//        pour garder seulement ceux dont la catégorie correspond
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Films par catégorie</title>
  <link rel="stylesheet" href="../../client/util/bootstrap-5.3.8-dist/css/bootstrap.min.css">
</head>
<body class="container py-4">
  <a href="../../client/index.php" class="btn btn-secondary mb-3">← Retour</a>
  <h2>Résultats pour catégorie : <?= htmlspecialchars($categ ?: "Toutes") ?></h2>
  
  <!-- TODO : afficher le tableau avec creerTableau($tabFilms) -->
</body>
</html>
