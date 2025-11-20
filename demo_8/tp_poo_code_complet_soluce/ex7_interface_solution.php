<?php
// ex7_interface_solution.php

interface Affichable
{
    public function afficher(): string;
}

class Article implements Affichable
{
    public function __construct(
        private string $titre,
        private string $contenu
    ) {}

    public function afficher(): string
    {
        return "Article: {$this->titre}";
    }
}

class Video implements Affichable
{
    public function __construct(
        private string $titre,
        private int $dureeMinutes
    ) {}

    public function afficher(): string
    {
        return "Vidéo: {$this->titre} ({$this->dureeMinutes} min)";
    }
}

$elements = [
    new Article("POO en PHP", "Introduction à la POO"),
    new Video("Cours 6", 45)
];

foreach ($elements as $e) {
    echo $e->afficher() . "<br>";
}

