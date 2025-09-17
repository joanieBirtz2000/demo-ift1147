<?php
// --- Données du quiz ---
$questions = [
  [
    "q"        => "Méthode HTTP pour envoyer un mot de passe ?",
    "reponses" => ["GET", "POST"],
    "correct"  => "POST"
  ],
  [
    "q"        => "Code HTTP succès ?",
    "reponses" => ["200", "404"],
    "correct"  => "200"
  ],
  [
    "q"        => "Qui traduit un domaine en IP ?",
    "reponses" => ["DNS", "HTML"],
    "correct"  => "DNS"
  ],
];

// TODO: vérifier que $questions est une liste avec array_is_list
$isList = true; // à remplacer

// TODO: utiliser count pour calculer le nombre total de questions
$total = 0; // à remplacer

$score    = null;
$feedback = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // TODO: initialiser le score à 0
  // TODO: parcourir les questions avec foreach
  //   - récupérer la réponse de l’utilisateur ($_POST["q$i"])
  //   - vérifier qu’elle existe dans $q["reponses"] (array_search)
  //   - si bonne → incrémenter $score
  //   - sinon → enregistrer la bonne réponse dans $feedback
}
