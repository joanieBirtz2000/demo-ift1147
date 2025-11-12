<?php
require_once __DIR__ . '/../lib/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php?err=' . urlencode('Méthode invalide.'));
    exit;
}

$nom     = trim($_POST['nom'] ?? '');
$espece  = trim($_POST['espece'] ?? '');
$age_raw = trim($_POST['age'] ?? '');
$arr_raw = trim($_POST['arrivee'] ?? '');

if ($nom === '' || $espece === '' || $age_raw === '' || $arr_raw === '') {
    header('Location: index.php?err=' . urlencode('Tous les champs sont requis.'));
    exit;
}
if (!ctype_digit($age_raw)) {
    header('Location: index.php?err=' . urlencode('Âge invalide.'));
    exit;
}


$age_i = (int)$age_raw;   // entier
$arrivee = $arr_raw;      // string (ex: '2025-11-05')

try {
    $mysqli = db();
    $stmt = $mysqli->prepare(
        'INSERT INTO animaux (id, nom, espece, age, arrivee) VALUES (0, ?, ?, ?, ?)'
    );
    $stmt->bind_param('ssis', $nom, $espece, $age_i, $arrivee);
    $stmt->execute();

    header('Location: index.php?ok=1');
    exit;
} catch (mysqli_sql_exception $e) {
    header('Location: index.php?err=' . urlencode('Erreur MySQL: ' . $e->getMessage()));
    exit;
}
