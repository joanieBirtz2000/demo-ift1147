<?php
// ----------------------
// EXERCICE 5 : QUIZ AVANCÉ
// Objectif : pratiquer array_is_list, count, array_search, tableaux multidimensionnels
// ----------------------

// Étape 1 : Créez un tableau multidimensionnel $questions
//   Chaque question doit être un tableau avec :
//   - "q"        => texte de la question
//   - "reponses" => tableau des réponses possibles
//   - "correct"  => la bonne réponse
// Exemple : ["q"=>"Code HTTP succès ?", "reponses"=>["200","404"], "correct"=>"200"]

// Étape 2 : Vérifiez si $questions est une liste avec array_is_list($questions)

// Étape 3 : Créez $score = null pour stocker le résultat
// Étape 4 : Créez $feedback = [] pour donner une correction par question

// Étape 5 : Si $_SERVER["REQUEST_METHOD"] === "POST"
//   - Initialisez $score = 0
//   - Pour chaque question (foreach avec index $i) :
//       • Récupérez la réponse de l’utilisateur ($_POST["q$i"])
//       • Vérifiez que la réponse est bien dans le tableau des "reponses" (avec array_search)
//       • Si c’est correct → incrémentez $score et ajoutez ["ok"=>true,"correct"=>"..."] dans $feedback
//       • Sinon → ["ok"=>false,"correct"=>"..."]

// Étape 6 : Stockez $total = count($questions) pour l’affichage final