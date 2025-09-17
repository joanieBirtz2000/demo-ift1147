<?php
$catalogue = ["Clavier", "Souris", "Écran", "Casque", "Webcam"];
$panier = [];

if (!empty($_POST["panier_json"])) {
  $panier = json_decode($_POST["panier_json"], true);
}

$info = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $action = $_POST["action"] ?? "";
  $item   = trim($_POST["item"] ?? "");

  if ($action === "add" && $item !== "") {
    // TODO: utiliser array_push pour ajouter $item si pas déjà présent
  }

  if ($action === "pop") {
    // TODO: utiliser array_pop pour retirer le dernier élément
  }

  if ($action === "remove_at") {
    $idx = (int)($_POST["index"] ?? -1);
    // TODO: supprimer l’élément à l’indice $idx avec unset + array_values
  }
}

$nbArticles = count($panier);
$panier_json = json_encode($panier);
