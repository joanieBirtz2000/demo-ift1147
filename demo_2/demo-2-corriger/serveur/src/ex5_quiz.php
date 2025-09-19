<?php
$questions = [
  ["q"=>"Méthode HTTP pour envoyer un mot de passe ?", "reponses"=>["GET","POST"], "correct"=>"POST"],
  ["q"=>"Code HTTP succès ?", "reponses"=>["200","404"], "correct"=>"200"],
  ["q"=>"Qui traduit un domaine en IP ?", "reponses"=>["DNS","HTML"], "correct"=>"DNS"],
];

$isList = array_is_list($questions); // vérification
$total  = count($questions);         // nb total de questions

$score    = null;
$feedback = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $score = 0;

  foreach ($questions as $i => $q) {
    $rep = $_POST["q$i"] ?? null;

    $repValide = ($rep !== null) && (array_search($rep, $q["reponses"], true) !== false);

    if ($repValide && $rep === $q["correct"]) {
      $score++;
      $feedback[$i] = ["ok" => true,  "correct" => $q["correct"]];
    } else {
      $feedback[$i] = ["ok" => false, "correct" => $q["correct"]];
    }
  }
}
