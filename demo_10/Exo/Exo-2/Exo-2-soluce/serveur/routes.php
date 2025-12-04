<?php

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

// URL complète, ex : /projet/serveur/voiture/liste
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Dossier où se trouve routes.php, ex : /projet/serveur
$scriptDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

// On enlève le préfixe du dossier serveur
$path = preg_replace('#^' . preg_quote($scriptDir, '#') . '#', '', $uri);
// Résultat attendu : /voiture/liste
$path = trim($path, '/');              // "voiture/liste" ou "" si racine
$segments = $path === '' ? [] : explode('/', $path);

$entite = $segments[0] ?? '';          // "voiture"
$action = $segments[1] ?? 'liste';     // "liste" par défaut

switch ($entite) {
    case 'voiture':
        require_once __DIR__ . '/Voitures/ControleurVoitures.php';
        \ControleurVoiture::traiter($action);
        break;

    case '':
        // Par défaut, on peut renvoyer une info ou un 404 JSON
        echo json_encode(['succes' => false, 'message' => 'Aucune ressource demandée']);
        break;

    default:
        echo json_encode(['succes' => false, 'message' => 'Entité inconnue']);
        break;
}
