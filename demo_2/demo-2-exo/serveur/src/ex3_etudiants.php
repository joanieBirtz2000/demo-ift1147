<?php
// ----------------------
// EXERCICE 3 : ÉTUDIANTS
// Objectif : pratiquer sort, asort, ksort, array_search, in_array, mise à jour d’élément
// ----------------------

// Étape 1 : Créez un tableau multidimensionnel $etudiants
//           Chaque étudiant = ["nom"=>"Alice","programme"=>"Info","moyenne"=>85]
// Étape 2 : Si $_POST["etudiants_json"] existe, décoder pour récupérer l’état
// Étape 3 : Créez une variable $info = ""

// Étape 4 : Si la requête est POST :
//    - action = $_POST["action"]
//    - Si action = "tri_nom"      → trier $etudiants par nom avec usort (strcmp sur $a["nom"],$b["nom"])
//    - Si action = "tri_moyenne"  → trier $etudiants par moyenne avec usort
//    - Si action = "update"       → chercher l’étudiant avec array_search sur array_column($etudiants,"nom")
//                                   puis mettre à jour la moyenne
// Étape 5 : Tester in_array pour savoir si "Info" existe dans les programmes
// Étape 6 : Encoder $etudiants en JSON
