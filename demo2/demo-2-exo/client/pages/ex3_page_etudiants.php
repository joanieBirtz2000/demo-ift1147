<?php require_once("../../serveur/src/ex3_etudiants.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Gestion Étudiants</title>
  <link href="../util/bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
  <h2>Gestion d’étudiants</h2>

  <table class="table table-striped">
    <thead class="table-dark">
      <tr><th>Nom</th><th>Programme</th><th>Moyenne</th></tr>
    </thead>
    <tbody>
      <?php foreach ($etudiants as $e): ?>
        <tr>
          <td><?= htmlspecialchars($e["nom"]) ?></td>
          <td><?= htmlspecialchars($e["programme"]) ?></td>
          <td><?= $e["moyenne"] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Trier par nom -->
  <form method="post" class="d-inline">
    <input type="hidden" name="action" value="tri_nom">
    <input type="hidden" name="etudiants_json" value='<?= htmlspecialchars($etudiants_json) ?>'>
    <button class="btn btn-outline-secondary">Trier par Nom (ksort)</button>
  </form>

  <!-- Trier par moyenne -->
  <form method="post" class="d-inline">
    <input type="hidden" name="action" value="tri_moyenne">
    <input type="hidden" name="etudiants_json" value='<?= htmlspecialchars($etudiants_json) ?>'>
    <button class="btn btn-outline-secondary">Trier par Moyenne (asort)</button>
  </form>

  <!-- Mettre à jour moyenne -->
  <form method="post" class="card card-body mt-3">
    <h6>Mettre à jour la moyenne</h6>
    <input class="form-control mb-2" name="nom" placeholder="Nom (ex: Alice)">
    <input class="form-control mb-2" name="moyenne" type="number" min="0" max="100">
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="etudiants_json" value='<?= htmlspecialchars($etudiants_json) ?>'>
    <button class="btn btn-primary">Mettre à jour</button>
  </form>

  <?php if (!empty($info)): ?>
    <div class="alert alert-info mt-3"><?= htmlspecialchars($info) ?></div>
  <?php endif; ?>

  <script src="../util/jquery-3.7.1.min.js"></script>
  <script src="../js/global.js"></script>
</body>
</html>
