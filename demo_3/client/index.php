<?php
// Récupérer un éventuel message transmis par les scripts PHP (ajout/suppression)
$msg = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Films</title>
  <link rel="stylesheet" href="./util/bootstrap-5.3.8-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <script src="./util/jquery-3.7.1.min.js"></script>
  <script src="./util/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
  <script src="./js/global.js"></script>
</head>

<body>
  <header>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Films</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <!-- Lien qui ouvre le modal ajouter -->
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#idModalAjouter">Ajouter (C)</a>
            </li>
            <!-- lister film -->
            <li class="nav-item">
              <a class="nav-link" href="../serveur/src/lister.php">Lister (R)</a>
            </li>
            <!-- Lien qui ouvre le modal supprimer -->
            <li class="nav-item">
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#idModalSupprimer">Supprimer (D)</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#idModalCategorie">Par catégorie</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>


  <?php if ($msg) : ?>
    <!-- Message d'information affiché si $msg existe -->
    <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
      <?= $msg ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
    </div>
  <?php endif; ?>

  <main class="container py-4">
    <h1 class="mb-4">Bienvenue dans la gestion des films</h1>
    <p>Utilisez la barre de navigation pour effectuer les opérations CRUD :</p>
    <ul>
      <li><b>C</b> : Créer un film (modal)</li>
      <li><b>R</b> : Lister tous les films</li>
      <li><b>D</b> : Supprimer un film</li>
      <li><b>Filtrer</b> : Lister par catégorie</li>
    </ul>
  </main>

  <!-- Modal pour Ajouter un film -->
  <div class="modal fade" id="idModalAjouter" tabindex="-1" aria-labelledby="idModalAjouterLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- DEBUT FORM -->
        <form method="post" action="../serveur/src/ajouter.php">
          <div class="modal-header">
            <h5 class="modal-title" id="idModalAjouterLabel">Ajouter un film</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Titre</label>
              <input type="text" class="form-control" name="titre" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Année</label>
              <input type="number" class="form-control" name="annee" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Catégorie</label>
              <input type="text" class="form-control" name="categ" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          </div>
        </form>
        <!-- FiN FORM -->
      </div>
    </div>
  </div>


  <!-- Modal 1 supprimer : saisie de l’ID -->
  <div class="modal fade" id="idModalSupprimer" tabindex="-1" aria-labelledby="idModalSupprimerLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="formSupprimer" method="post" action="../serveur/src/supprimer.php">
          <div class="modal-header">
            <h5 class="modal-title" id="idModalSupprimerLabel">Supprimer un film</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <label for="idFilm" class="form-label">ID du film à supprimer</label>
            <input type="number" class="form-control" name="idf" id="idFilm" required>
          </div>
          <div class="modal-footer">
            <!-- juste un bouton avec id -->
            <button type="button" class="btn btn-danger" id="btnShowConfirm" data-bs-toggle="modal" data-bs-target="#idModalConfirmer">
              Supprimer
            </button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal 2 supprimer : confirmation -->
  <div class="modal fade" id="idModalConfirmer" tabindex="-1" aria-labelledby="idModalConfirmerLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="idModalConfirmerLabel">Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Êtes-vous sûr de vouloir supprimer le film avec ID
          <b id="confirmId"></b> ?
        </div>
        <div class="modal-footer">
          <!-- bouton confirmation -->
          <button type="button" class="btn btn-danger" id="btnConfirmDelete">Oui, supprimer</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non, annuler</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Par Catégorie -->
<div class="modal fade" id="idModalCategorie" tabindex="-1" aria-labelledby="idModalCategorieLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="../serveur/src/listerParCategorie.php">
        <div class="modal-header">
          <h5 class="modal-title" id="idModalCategorieLabel">Rechercher par catégorie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <label for="categ" class="form-label">Catégorie</label>
          <input type="text" class="form-control" name="categ" id="categ" placeholder="Ex: Animation">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Rechercher</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        </div>
      </form>
    </div>
  </div>
</div>



</body>

</html>