<?php
// model/Livre.php (solution)

class Livre
{
    public string $titre;
    public string $auteur;

    public function __construct(string $titre, string $auteur)
    {
        $this->titre  = $titre;
        $this->auteur = $auteur;
    }

    public function getDescription(): string
    {
        return $this->titre . " — " . $this->auteur;
    }
}

