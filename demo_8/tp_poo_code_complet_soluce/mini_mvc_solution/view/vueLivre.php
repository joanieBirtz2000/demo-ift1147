<?php
// view/vueLivre.php (solution)
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Livre</title>
</head>
<body>
    <h1>Informations sur le livre</h1>

    <p>
        <?php echo $livre->getDescription(); ?>
    </p>

    <!-- Variante :
    <p><?php echo $livre->titre . " — " . $livre->auteur; ?></p>
    -->
</body>
</html>

