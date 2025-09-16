<?php
// ----------------------
// EXERCICE 1 : PANIER
// Objectif : pratiquer array_push, array_pop, unset, array_values, count, in_array, array_search
// ----------------------

// Étape 1 : Créez un tableau $catalogue avec quelques produits (ex: "Clavier","Souris","Écran")
// Étape 2 : Créez un tableau $panier (vide au départ)
// Étape 3 : Vérifiez si $_POST["panier_json"] existe
//           - si oui : décoder avec json_decode pour recharger l’ancien panier
// Étape 4 : Créez une variable $info = "" (pour afficher les messages)

// Étape 5 : Vérifiez si $_SERVER["REQUEST_METHOD"] === "POST"
//           - Récupérez $action = $_POST["action"]
//           - Récupérez $item = $_POST["item"] (si défini)
//           - Selon $action :
//              • "add"    → si $item n’est pas déjà dans $panier (in_array), l’ajouter avec array_push
//              • "pop"    → retirer le dernier élément avec array_pop
//              • "remove_at" → supprimer un élément à un index donné avec unset puis réindexer avec array_values
//              • "select" → afficher l’élément #index avec $panier[$index] (vérifier les bornes avec count)
// Étape 6 : Stockez la taille du panier avec count()
// Étape 7 : Recréez une version JSON du panier avec json_encode (à renvoyer au formulaire)
