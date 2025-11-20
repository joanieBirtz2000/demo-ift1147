<?php
// ex4_heritage_solution.php

class Personne
{
    protected string $prenom;
    protected string $nom;

    public function __construct(string $prenom, string $nom)
    {
        $this->prenom = $prenom;
        $this->nom    = $nom;
    }

    public function identite(): string
    {
        return "$this->prenom $this->nom";
    }
}

class Enseignant extends Personne
{
    private string $matiere;

    public function __construct(string $prenom, string $nom, string $matiere)
    {
        parent::__construct($prenom, $nom);
        $this->matiere = $matiere;
    }

    public function identite(): string
    {
        return parent::identite() . " — Enseignant en $this->matiere";
    }
}

$prof = new Enseignant("Kamel", "Benali", "PHP");
echo $prof->identite();

