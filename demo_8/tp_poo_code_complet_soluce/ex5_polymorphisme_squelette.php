<?php
// ex5_polymorphisme_squelette.php

// Classe de base
class Vehicule
{
    // TODO: méthode afficher()
    // qui retourne une chaîne générique, ex: "Je suis un véhicule."
}

// Classe Voiture qui hérite de Vehicule
class Voiture extends Vehicule
{
    // TODO: redéfinir afficher()
    // ex: "Je suis une voiture."
}

// Classe Moto qui hérite de Vehicule
class Moto extends Vehicule
{
    // TODO: redéfinir afficher()
    // ex: "Je suis une moto."
}

// TODO: créer un tableau $vehicules contenant des Voiture et des Moto

// TODO: faire un foreach sur $vehicules
// et afficher le résultat de ->afficher() pour chacun

