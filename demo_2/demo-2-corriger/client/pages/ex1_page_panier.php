<?php require_once("../../serveur/src/ex1_panier.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Panier dynamique (sans session)</title>
  <link href="../util/bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

  <h2>Catalogue</h2>
  <ul class="list-group mb-4">
    <?php foreach ($catalogue as $p): ?>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <?= htmlspecialchars($p) ?>
        <form method="post" class="m-0">
          <input type="hidden" name="panier_json" value='<?= htmlspecialchars($panier_json) ?>'>
          <input type="hidden" name="action" value="add">
          <input type="hidden" name="item" value="<?= htmlspecialchars($p) ?>">
          <button class="btn btn-sm btn-primary">Ajouter</button>
        </form>
      </li>
    <?php endforeach; ?>
  </ul>

  <h2>Panier (<?= $nbArticles ?> articles)</h2>
  <ul class="list-group">
    <?php if (empty($panier)): ?>
      <li class="list-group-item text-muted">Panier vide</li>
    <?php else: ?>
      <?php foreach ($panier as $i => $p): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          #<?= $i ?> — <?= htmlspecialchars($p) ?>
          <form method="post" class="m-0">
            <input type="hidden" name="panier_json" value='<?= htmlspecialchars($panier_json) ?>'>
            <input type="hidden" name="action" value="remove_at">
            <input type="hidden" name="index" value="<?= $i ?>">
            <button class="btn btn-sm btn-outline-danger">Supprimer</button>
          </form>
        </li>
      <?php endforeach; ?>
    <?php endif; ?>
  </ul>

  <div class="mt-3 d-flex gap-2">
    <form method="post">
      <input  type="hidden" name="panier_json" value='<?= htmlspecialchars($panier_json) ?>'>
      <input type="hidden" name="action" value="pop">
      <button class="btn btn-warning">Retirer dernier</button>
    </form>
  </div>

  <?php if (!empty($info)): ?>
    <div class="alert alert-info mt-3"><?= htmlspecialchars($info) ?></div>
  <?php endif; ?>

  <script src="../util/jquery-3.7.1.min.js"></script>
  <script src="../js/global.js"></script>
</body>
</html>
