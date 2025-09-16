<?php require_once("../../serveur/src/ex2_annuaire.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Annuaire téléphonique</title>
  <link href="../util/bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
  <h2>Annuaire téléphonique</h2>

  <table class="table table-bordered table-hover mb-4">
    <thead class="table-dark">
      <tr><th>#</th><th>Nom</th><th>Téléphone</th></tr>
    </thead>
    <tbody>
      <?php foreach ($contacts as $i => $c): ?>
        <tr><td><?= $i ?></td><td><?= htmlspecialchars($c["nom"]) ?></td><td><?= htmlspecialchars($c["tel"]) ?></td></tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Ajouter en tête -->
  <form method="post" class="card card-body mb-3">
    <h6>Ajouter au début</h6>
    <input class="form-control mb-2" name="nom" placeholder="Nom">
    <input class="form-control mb-2" name="tel" placeholder="Téléphone">
    <input type="hidden" name="action" value="add_first">
    <input type="hidden" name="contacts_json" value='<?= htmlspecialchars($contacts_json) ?>'>
    <button class="btn btn-success">Ajouter (array_unshift)</button>
  </form>

  <!-- Retirer premier -->
  <form method="post" class="mb-3">
    <input type="hidden" name="action" value="remove_first">
    <input type="hidden" name="contacts_json" value='<?= htmlspecialchars($contacts_json) ?>'>
    <button class="btn btn-warning">Retirer premier (array_shift)</button>
  </form>

  <!-- Mettre à jour -->
  <form method="post" class="card card-body mb-3">
    <h6>Mettre à jour numéro</h6>
    <input class="form-control mb-2" name="nom" placeholder="Nom">
    <input class="form-control mb-2" name="tel" placeholder="Nouveau téléphone">
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="contacts_json" value='<?= htmlspecialchars($contacts_json) ?>'>
    <button class="btn btn-primary">Mettre à jour</button>
  </form>

  <!-- Supprimer -->
  <form method="post" class="card card-body mb-3">
    <h6>Supprimer un contact</h6>
    <input class="form-control mb-2" name="nom" placeholder="Nom">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" name="contacts_json" value='<?= htmlspecialchars($contacts_json) ?>'>
    <button class="btn btn-danger">Supprimer</button>
  </form>

  <?php if (!empty($info)): ?>
    <div class="alert alert-info"><?= htmlspecialchars($info) ?></div>
  <?php endif; ?>

  <script src="../util/jquery-3.7.1.min.js"></script>
  <script src="../js/global.js"></script>
</body>
</html>
