<?php
// ex3_compte_solution.php

class Compte
{
    private float $solde;

    public function __construct(float $soldeInitial = 0)
    {
        $this->solde = $soldeInitial;
    }

    public function depot(float $montant): void
    {
        if ($montant <= 0) {
            echo "Montant de dépôt invalide<br>";
            return;
        }
        $this->solde += $montant;
    }

    public function retrait(float $montant): void
    {
        if ($montant <= 0) {
            echo "Montant de retrait invalide<br>";
            return;
        }

        if ($montant > $this->solde) {
            echo "Fonds insuffisants<br>";
            return;
        }

        $this->solde -= $montant;
    }

    public function getSolde(): float
    {
        return $this->solde;
    }
}

$c = new Compte();
$c->depot(100);
$c->retrait(30);
echo "Solde final : " . $c->getSolde() . "<br>";

