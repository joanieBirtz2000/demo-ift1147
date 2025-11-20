<?php
// person_sans_poo.php

$prenom1 = "Paul";
$nom1    = "Langevin";
$age1    = 48;

$prenom2 = "Marie";
$nom2    = "Dubois";
$age2    = 34;

function identite($prenom, $nom, $age) {
    return "$prenom $nom, $age ans";
}

echo identite($prenom1, $nom1, $age1);
echo "<br>";
echo identite($prenom2, $nom2, $age2);

