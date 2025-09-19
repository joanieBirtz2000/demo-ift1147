<?php
$contacts = [
  ["nom" => "Alice", "tel" => "514-111-1111"],
  ["nom" => "Bob",   "tel" => "438-222-2222"],
  ["nom" => "Chloé", "tel" => "450-333-3333"],
];

// Récupérer état précédent
if (!empty($_POST["contacts_json"])) {
  $contacts = json_decode($_POST["contacts_json"], true);
  if (!is_array($contacts)) $contacts = [];
}

$info = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $action = $_POST["action"] ?? "";

  if ($action === "add_first") {
    array_unshift($contacts, ["nom"=>$_POST["nom"], "tel"=>$_POST["tel"]]);
    $info = "Ajouté en tête.";
  }

  if ($action === "remove_first") {
    if (!empty($contacts)) {
      $c = array_shift($contacts);
      $info = "Supprimé : " . $c["nom"];
    } else {
      $info = "Annuaire vide.";
    }
  }

  if ($action === "update") {
    $idx = array_search($_POST["nom"], array_column($contacts, "nom"), true);
    if ($idx !== false) {
      $contacts[$idx]["tel"] = $_POST["tel"];
      $info = "Numéro mis à jour.";
    }
  }

  if ($action === "delete") {
    $idx = array_search($_POST["nom"], array_column($contacts, "nom"), true);
    if ($idx !== false) {
      unset($contacts[$idx]);
      $contacts = array_values($contacts); // réindexer pour éviter les trous
      $info = "Contact supprimé.";
    }
  }
}

$contacts_json = json_encode($contacts);
