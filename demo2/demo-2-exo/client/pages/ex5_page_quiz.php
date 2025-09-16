<?php require_once("../../serveur/src/ex5_quiz.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Quiz</title>
  <link href="../util/bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
  <h1>Mini Quiz HTTP</h1>
  <form method="post" class="quiz-http">
    <fieldset class="mb-3">
      <legend>1. Pour envoyer un mot de passe ?</legend>
      <label><input type="radio" name="q1" value="GET"> GET</label>
      <label><input type="radio" name="q1" value="POST"> POST</label>
    </fieldset>
    <fieldset class="mb-3">
      <legend>2. Code HTTP succès ?</legend>
      <label><input type="radio" name="q2" value="200"> 200</label>
      <label><input type="radio" name="q2" value="404"> 404</label>
    </fieldset>
    <fieldset class="mb-3">
      <legend>3. Qui traduit un domaine en IP ?</legend>
      <label><input type="radio" name="q3" value="DNS"> DNS</label>
      <label><input type="radio" name="q3" value="HTML"> HTML</label>
    </fieldset>
    <button class="btn btn-primary">Valider</button>
  </form>

  <?php if ($score !== null): ?>
    <div class="alert alert-info mt-3">
      Score : <?= $score ?>/<?= $totalQuestions ?>
    </div>
  <?php endif; ?>

  <script src="../util/jquery-3.7.1.min.js"></script>
  <script src="../js/global.js"></script>
</body>
</html>
