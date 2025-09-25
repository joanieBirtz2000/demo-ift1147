<?php
require_once 'includes/gestionFichiers.php';
require_once 'includes/affichage.php';

$categ = trim($_POST['categ'] ?? '');
$tabFilms = lireFilmsDepuisFichier();

// Filtrer si une catégorie est donnée
if ($categ !== '') {
    $tabFilms = array_filter(
        $tabFilms,
        fn($film) => strtolower($film['categ']) === strtolower($categ)
    );
}
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
  <?= creerTableau($tabFilms) ?>
</body>
</html>
