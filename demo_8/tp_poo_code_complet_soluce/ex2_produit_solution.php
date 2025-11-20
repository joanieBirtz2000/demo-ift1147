<?php
// ex2_produit_solution.php

class Produit
{
    private string $nom;
    private float $prix;
    private int $quantite;

    public function __construct(string $nom, float $prix, int $quantite)
    {
        $this->nom      = $nom;
        $this->prix     = $prix;
        $this->quantite = $quantite;
    }

    public function total(): float
    {
        return $this->prix * $this->quantite;
    }
}

$p1 = new Produit("Pomme", 1.50, 10);
$p2 = new Produit("Orange", 2.00, 3);

echo "Total Pomme : " . $p1->total() . "<br>";
echo "Total Orange : " . $p2->total() . "<br>";

