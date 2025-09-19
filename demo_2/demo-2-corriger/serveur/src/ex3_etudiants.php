<?php
$etudiants = [
  ["nom"=>"Alice", "programme"=>"Info", "moyenne"=>85],
  ["nom"=>"Bob",   "programme"=>"Math", "moyenne"=>78],
  ["nom"=>"Chloé", "programme"=>"IA",   "moyenne"=>92],
];

// Récupérer état précédent
if (!empty($_POST["etudiants_json"])) {
  $etudiants = json_decode($_POST["etudiants_json"], true);
  if (!is_array($etudiants)) $etudiants = [];
}

$info = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $action = $_POST["action"] ?? "";

  if ($action === "update") {
    $idx = array_search($_POST["nom"], array_column($etudiants,"nom"), true);
    if ($idx !== false) {
      $etudiants[$idx]["moyenne"] = (int)$_POST["moyenne"];
      $info = "Moyenne mise à jour.";
    }
  }

  if ($action === "tri_nom") {
    usort($etudiants, fn($a,$b)=>strcmp($a["nom"],$b["nom"]));
    $info = "Tri par nom.";
  }

  if ($action === "tri_moyenne") {
    usort($etudiants, fn($a,$b)=>$a["moyenne"] <=> $b["moyenne"]);
    $info = "Tri par moyenne.";
  }
}

$etudiants_json = json_encode($etudiants);
