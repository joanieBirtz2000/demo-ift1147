<?php
// ----------------------
// EXERCICE 4 : ARTICLES & TAGS
// Objectif : pratiquer explode, implode, array_merge
// ----------------------

// Étape 1 : Créez un tableau $articles avec quelques articles
//           Chaque article = ["titre"=>"Intro PHP","tags"=>["php","web"]]
// Étape 2 : Si $_POST["articles_json"] existe, décoder pour récupérer l’état
// Étape 3 : Créez une variable $info = ""

// Étape 4 : Si action = "create"
//    - Récupérez $_POST["titre"] et $_POST["tags"]
//    - Utilisez explode(",", $_POST["tags"]) pour transformer en tableau
//    - Nettoyez les espaces avec trim()
//    - Fusionnez avec un tableau supplémentaire (ex: ["pedago"]) avec array_merge
//    - Ajoutez le nouvel article à $articles
//    - Stockez un message dans $info
// Étape 5 : Pour l’affichage, utilisez implode(", ", $article["tags"]) pour montrer les tags
// Étape 6 : Encoder $articles en JSON
