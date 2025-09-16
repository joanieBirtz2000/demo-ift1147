<?php require_once("../../serveur/src/ex4_articles_tags.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Articles & Tags</title>
  <link href="../util/bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
  <h2>Articles & Tags</h2>

  <ul class="list-group mb-4">
    <?php foreach ($articles as $i => $a): ?>
      <li class="list-group-item">
        <strong><?= htmlspecialchars($a["titre"]) ?></strong>
        <div class="small text-muted">Tags: <?= implode(", ", $a["tags"]) ?></div>
      </li>
    <?php endforeach; ?>
  </ul>

  <!-- Ajouter un article -->
  <form method="post" class="card card-body">
    <h6>Créer un article</h6>
    <input class="form-control mb-2" name="titre" placeholder="Titre">
    <input class="form-control mb-2" name="tags" placeholder="Tags CSV (ex: php,web,dev)">
    <input type="hidden" name="action" value="create">
    <input type="hidden" name="articles_json" value='<?= htmlspecialchars($articles_json) ?>'>
    <button class="btn btn-success">Créer (explode + merge)</button>
  </form>

  <?php if (!empty($info)): ?>
    <div class="alert alert-info mt-3"><?= htmlspecialchars($info) ?></div>
  <?php endif; ?>

  <script src="../util/jquery-3.7.1.min.js"></script>
  <script src="../js/global.js"></script>
</body>
</html>
