<?php
$articles = [
    ["titre" => "Intro PHP", "tags" => ["php", "web"]],
    ["titre" => "Guide Bootstrap", "tags" => ["css", "frontend"]],
];

if (!empty($_POST["articles_json"])) {
    $articles = json_decode($_POST["articles_json"], true);
    if (!is_array($articles)) $articles = [];
}

$info = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["action"] === "create") {
        // TODO: utiliser explode pour séparer $_POST["tags"] (CSV)
        // TODO: utiliser array_merge pour fusionner avec ["web","pedago"]
        // TODO: ajouter l’article au tableau $articles
    }
}

$articles_json = json_encode($articles);
