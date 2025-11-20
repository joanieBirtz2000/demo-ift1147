<?php
// ex10_statique_solution.php

class Compteur
{
    private static int $nbInstances = 0;

    public function __construct()
    {
        self::$nbInstances++;
    }

    public static function getNbInstances(): int
    {
        return self::$nbInstances;
    }
}

$c1 = new Compteur();
$c2 = new Compteur();
$c3 = new Compteur();

echo "Nombre d'instances de Compteur : " . Compteur::getNbInstances();

