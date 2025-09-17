<?php require_once("../../serveur/src/ex5_quiz.php"); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Exo 5 — Quiz avancé (squelette)</title>
  <link href="../util/bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container py-5">
  <h2 class="mb-3">Exercice 5 — Quiz avancé (Tableaux multidimensionnels)</h2>

  <!-- Info structure (array_is_list) -->
  <div class="alert alert-<?= $isList ? 'success' : 'danger' ?>">
    $questions est une "liste" ? <strong><?= $isList ? "Oui" : "Non" ?></strong> (array_is_list)
  </div>

  <form method="post" class="quiz-advanced">
    <?php foreach ($questions as $i => $q): ?>
      <fieldset class="mb-3 p-3 border rounded">
        <legend class="h6 mb-2"><?= htmlspecialchars($q["q"]) ?></legend>

        <?php foreach ($q["reponses"] as $r): ?>
          <label class="me-3">
            <input type="radio" name="q<?= $i ?>" value="<?= htmlspecialchars($r) ?>">
            <?= htmlspecialchars($r) ?>
          </label>
        <?php endforeach; ?>

        <?php if ($score !== null): ?>
          <?php
          // Affichage du feedback s’il existe (donné par le serveur)
          $ok = $feedback[$i]["ok"] ?? false;
          $c  = $feedback[$i]["correct"] ?? "";
          ?>
          <div class="mt-2 small <?= $ok ? 'text-success' : 'text-danger' ?>">
            <?= $ok ? "Bonne réponse " : "Mauvaise réponse — Correct : " . htmlspecialchars($c) ?>
          </div>
        <?php endif; ?>
      </fieldset>
    <?php endforeach; ?>

    <button class="btn btn-primary">Valider</button>
  </form>

  <?php if ($score !== null): ?>
    <div class="alert alert-info mt-3">
      Score : <strong><?= $score ?></strong> / <?= $total ?> (count)
    </div>
  <?php endif; ?>

  <script src="../util/jquery-3.7.1.min.js"></script>
  <script src="../js/global.js"></script>
</body>

</html>