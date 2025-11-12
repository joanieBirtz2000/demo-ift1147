<?php
// refuge_bootstrap/public/index.php

// Charge les fonctions d’accès aux données (mysqli + requêtes)
require_once __DIR__ . '/../lib/animaux.php';

// Récupère tous les enregistrements pour l’affichage
$animaux = get_animaux();
// $animal = get_animal_by_id_obj(1);
// echo $animal->nom;
?>
<!doctype html>
<html lang="fr" data-bs-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Refuge d'animaux — Démo Bootstrap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom mb-4">
  <div class="container">
    <a class="navbar-brand fw-semibold" href="index.php">Refuge</a>
    <!-- Bouton qui déclenche l’ouverture du modal #modalAjouter -->
    <button class="btn btn-primary ms-auto" type="button" data-bs-toggle="modal" data-bs-target="#modalAjouter">
      + Ajouter
    </button>
  </div>
</nav>

<main class="container">
  <?php if (isset($_GET['ok']) && $_GET['ok'] === '1'): ?>
    <!-- Message de succès si la redirection après ajout a mis ?ok=1 -->
    <div class="alert alert-success">Animal enregistré.</div>
    
  <?php elseif (isset($_GET['err']) && $_GET['err'] !== ''): ?>
    <!-- Message d’erreur si la redirection a mis ?err=... -->
    <!-- htmlspecialchars() évite l’injection HTML dans le message -->
    <div class="alert alert-danger"><?= htmlspecialchars($_GET['err']) ?></div>
  <?php endif; ?>

  <?php if ($animaux): ?>
    <!-- Table responsive Bootstrap -->
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead class="table-light">
          <tr>
            <th>#</th><th>Nom</th><th>Espèce</th><th>Âge</th><th>Arrivée</th><th>Créé</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($animaux as $r): ?>
            <tr>
              <!-- (int) pour caster l’ID et l’âge en entier -->
              <td><?= (int)$r['id'] ?></td>
              <!-- htmlspecialchars() protège l’affichage des champs texte -->
              <td><?= htmlspecialchars($r['nom']) ?></td>
              <td><?= htmlspecialchars($r['espece']) ?></td>
              <td><?= (int)$r['age'] ?></td>
              <td><?= htmlspecialchars($r['arrivee']) ?></td>
              <!-- <small> pour un rendu visuel plus discret -->
              <td><small><?= htmlspecialchars($r['created_at']) ?></small></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <!-- Cas où il n’y a aucun enregistrement -->
    <p class="text-muted">Aucun enregistrement.</p>
  <?php endif; ?>
</main>

<!-- Modal Bootstrap pour ajouter un animal -->
<div class="modal fade" id="modalAjouter" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- En-tête du modal -->
      <div class="modal-header">
        <h5 class="modal-title">Enregistrer un animal</h5>
        <!-- Bouton de fermeture du modal -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <!-- Formulaire envoyé en POST vers public/ajouter.php -->
      <form method="post" action="ajouter.php">
        <div class="modal-body">
          <!-- Champ nom (obligatoire) -->
          <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom" required>
          </div>

          <!-- Sélecteur d’espèce (obligatoire) -->
          <div class="mb-3">
            <label class="form-label">Espèce</label>
            <select class="form-select" name="espece" required>
              <option value="">— Choisir —</option>
              <option>Chien</option>
              <option>Chat</option>
              <option>Lapin</option>
              <option>Oiseau</option>
              <option>Autre</option>
            </select>
          </div>

          <!-- Ligne avec deux champs : âge et date d’arrivée -->
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Âge (années)</label>
              <!-- min=0 + step=1 pour forcer un entier positif -->
              <input type="number" class="form-control" name="age" min="0" step="1" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Date d'arrivée</label>
              <input type="date" class="form-control" name="arrivee" required>
            </div>
          </div>
        </div>

        <!-- Pied du modal avec boutons Annuler / Enregistrer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- JS Bootstrap (inclut Popper) depuis le CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
