<?php
// ex9_enum_solution.php

enum RoleUtilisateur: string
{
    case ADMIN  = 'admin';
    case CLIENT = 'client';
}

class Utilisateur
{
    public function __construct(
        private string $nom,
        private RoleUtilisateur $role
    ) {}

    public function estAdmin(): bool
    {
        return $this->role === RoleUtilisateur::ADMIN;
    }

    public function getNom(): string
    {
        return $this->nom;
    }
}

$u1 = new Utilisateur("Joanie", RoleUtilisateur::ADMIN);
$u2 = new Utilisateur("Maxime", RoleUtilisateur::CLIENT);

foreach ([$u1, $u2] as $u) {
    echo $u->getNom() . " est admin ? " . ($u->estAdmin() ? "oui" : "non") . "<br>";
}

