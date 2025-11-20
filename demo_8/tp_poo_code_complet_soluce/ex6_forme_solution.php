<?php
// ex6_forme_solution.php

abstract class Forme
{
    abstract public function aire(): float;
}

class Rectangle extends Forme
{
    public function __construct(
        private float $largeur,
        private float $hauteur
    ) {}

    public function aire(): float
    {
        return $this->largeur * $this->hauteur;
    }
}

class Cercle extends Forme
{
    public function __construct(private float $rayon) {}

    public function aire(): float
    {
        return pi() * $this->rayon * $this->rayon;
    }
}

$formes = [
    new Rectangle(2, 5),
    new Cercle(1.5),
    new Rectangle(3, 3)
];

foreach ($formes as $f) {
    echo "Aire : " . $f->aire() . "<br>";
}

