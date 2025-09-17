<?php
$contacts = [
  ["nom"=>"Alice","tel"=>"514-111-1111"],
  ["nom"=>"Bob","tel"=>"438-222-2222"],
];

if (!empty($_POST["contacts_json"])) {
  $contacts = json_decode($_POST["contacts_json"], true);
}

$info = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $action = $_POST["action"] ?? "";

  if ($action === "add_first") {
    // TODO: utiliser array_unshift pour ajouter un contact au début
  }

  if ($action === "remove_first") {
    // TODO: utiliser array_shift pour retirer le premier contact
  }

  if ($action === "update") {
    // TODO: chercher un nom avec array_search et mettre à jour le tel
  }

  if ($action === "delete") {
    // TODO: chercher un nom et le supprimer avec unset + array_values
  }
}

$contacts_json = json_encode($contacts);
