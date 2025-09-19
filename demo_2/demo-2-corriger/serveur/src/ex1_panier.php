<?php
$catalogue = ["Clavier", "Souris", "Écran", "Casque", "Webcam"];

$panier = []; // tableau vide au départ

// Récupérer l'état précédent via hidden input
if (!empty($_POST["panier_json"])) {
  $panier = json_decode($_POST["panier_json"], true); //json en tableau PHP
  if (!is_array($panier)) $panier = [];
}

$info = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $action = $_POST["action"] ?? "";
  $item   = trim($_POST["item"] ?? ""); //supprime les espaces inutiles autour

  if ($action === "add" && $item !== "") {
    if (!in_array($item, $panier, true)) { //vérifie si l’article est déjà dans le panier.
      array_push($panier, $item);
      $info = "Ajouté: $item";
    } else {
      $idx = array_search($item, $panier, true);
      $info = "$item déjà présent (index $idx)";
    }
  }

  if ($action === "pop") {
    if (count($panier) > 0) { //verifie si le panier n'est pas vide
      $retire = array_pop($panier);
      $info = "Retiré: $retire";
    }else{
      $info = "Panier vide, rien à retirer";
    }
  }

  if ($action === "remove_at") {
    $idx = (int)($_POST["index"] ?? -1);
    if ($idx >= 0 && $idx < count($panier)) { //verifie si l'index est valide
      $retire = $panier[$idx];
      unset($panier[$idx]);
      $panier = array_values($panier);
      $info = "Supprimé: $retire";
    } else {
      $info = "Index invalide: $idx";
    }
  }
}

$nbArticles = count($panier);

// JSON du panier pour le prochain formulaire
$panier_json = json_encode($panier);
