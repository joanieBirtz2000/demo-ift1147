<?php
// personne_poo.php

class Personne {
    private string $prenom;
    private string $nom;
    private int $age;

    public function __construct(string $prenom, string $nom, int $age) {
        $this->prenom = $prenom;
        $this->nom    = $nom;
        $this->age    = $age;
    }

    public function identite(): string {
        return "$this->prenom $this->nom, $this->age ans";
    }
}

$p1 = new Personne("Paul", "Langevin", 48);
$p2 = new Personne("Marie", "Dubois", 34);

echo $p1->identite();
echo "<br>";
echo $p2->identite();

