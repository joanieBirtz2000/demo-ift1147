<?php
// ----------------------
// EXERCICE 2 : ANNUAIRE
// Objectif : pratiquer array_unshift, array_shift, array_search, unset/array_values
// ----------------------

// Étape 1 : Créez un tableau $contacts contenant au départ 2–3 contacts
//           Chaque contact est un tableau associatif ["nom"=>"Alice","tel"=>"514-..."]
// Étape 2 : Si $_POST["contacts_json"] existe, décoder pour récupérer l’état actuel
// Étape 3 : Créez une variable $info = ""

// Étape 4 : Si la requête est POST :
//    - action = $_POST["action"]
//    - Si action = "add_first"   → ajouter un contact en début avec array_unshift
//    - Si action = "remove_first"→ retirer le premier avec array_shift
//    - Si action = "update"      → chercher le contact avec array_search sur array_column($contacts,"nom")
//                                   puis mettre à jour le téléphone
//    - Si action = "delete"      → chercher le contact et le supprimer avec unset + array_values
// Étape 5 : Encoder $contacts en JSON avec json_encode
