<?php
// ex5_polymorphisme_solution.php

class Vehicule
{
    public function afficher(): string
    {
        return "Je suis un véhicule.";
    }
}

class Voiture extends Vehicule
{
    public function afficher(): string
    {
        return "Je suis une voiture.";
    }
}

class Moto extends Vehicule
{
    public function afficher(): string
    {
        return "Je suis une moto.";
    }
}

$vehicules = [
    new Voiture(),
    new Moto(),
    new Voiture(),
];

foreach ($vehicules as $v) {
    echo $v->afficher() . "<br>";
}

