<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

$entite = $_GET['entite'] ?? ($_POST['entite'] ?? '');
$action = $_GET['action'] ?? ($_POST['action'] ?? '');

if ($entite === '') {
    echo json_encode(['succes' => false, 'message' => 'Aucune entité fournie']);
    exit;
}

switch ($entite) {
    case 'animal':
        require_once __DIR__ . '/Animal/ControleurAnimal.php';
        \ControleurAnimal::traiter($action);
        break;

    default:
        echo json_encode(['succes' => false, 'message' => 'Entité inconnue']);
        break;
}
