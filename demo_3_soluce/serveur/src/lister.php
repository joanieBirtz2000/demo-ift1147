<?php
require_once 'includes/gestionFichiers.php';
require_once 'includes/affichage.php';

// Lire les films et afficher
$tabFilms = lireFilmsDepuisFichier();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Lister les films</title>
    <link rel="stylesheet" href="../../client/util/bootstrap-5.3.8-dist/css/bootstrap.min.css">
</head>

<body class="container py-4">
    <a href="../../client/index.php" class="btn btn-secondary mb-3">← Retour</a>
    <?= creerTableau($tabFilms) ?>
</body>

</html>