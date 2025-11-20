<?php
// controller/LivreController.php (solution)

require_once "../model/Livre.php";

// Création d'un objet Livre
$livre = new Livre("Harry Potter à l'école des sorciers", "J.K. Rowling");

// Envoi à la vue
require "../view/vueLivre.php";

