<?php
$etudiants = [
  ["nom"=>"Alice","programme"=>"Info","moyenne"=>85],
  ["nom"=>"Bob","programme"=>"Math","moyenne"=>78],
  ["nom"=>"Chloé","programme"=>"IA","moyenne"=>92],
];

if (!empty($_POST["etudiants_json"])) {
  $etudiants = json_decode($_POST["etudiants_json"], true);
  if (!is_array($etudiants)) $etudiants = [];
}

$info = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $action = $_POST["action"] ?? "";

  if ($action === "tri_nom") {
    // TODO: trier par nom avec usort ou ksort
  }

  if ($action === "tri_moyenne") {
    // TODO: trier par moyenne avec usort ou asort
  }

  if ($action === "update") {
    // TODO: chercher un étudiant avec array_search et mettre à jour la moyenne
  }
}

$etudiants_json = json_encode($etudiants);
