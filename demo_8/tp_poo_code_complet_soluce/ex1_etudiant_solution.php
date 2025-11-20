<?php
// ex1_etudiant_solution.php

class Etudiant
{
    private string $prenom;
    private string $nom;
    private string $programme;

    public function __construct(string $prenom, string $nom, string $programme)
    {
        $this->prenom    = $prenom;
        $this->nom       = $nom;
        $this->programme = $programme;
    }

    public function presentation(): string
    {
        return "$this->prenom $this->nom — $this->programme";
    }
    // public function __toString(): string
    // {
    //     return "$this->prenom $this->nom — $this->programme";
    // }
}

$e1 = new Etudiant("Sarah", "Gagnon", "Informatique");
$e2 = new Etudiant("Lucas", "Tremblay", "Mathématiques");

echo $e1->presentation() . "<br>";
echo $e2->presentation() . "<br>";

// echo $e1 . "<br>";
// echo $e2 . "<br>";