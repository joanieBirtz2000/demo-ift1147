<?php
$articles = [
  ["titre"=>"Intro PHP", "tags"=>["php","web"]],
  ["titre"=>"Guide Bootstrap", "tags"=>["css","frontend"]],
];

// Récupérer état précédent
if (!empty($_POST["articles_json"])) {
  $articles = json_decode($_POST["articles_json"], true);
  if (!is_array($articles)) $articles = [];
}

$info = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if ($_POST["action"] === "create") {
    $tags = array_filter(array_map("trim", explode(",", $_POST["tags"])));
    $articles[] = ["titre"=>$_POST["titre"], "tags"=>$tags];
    $info = "Article créé avec ".count($tags)." tags.";
  }
}

$articles_json = json_encode($articles);