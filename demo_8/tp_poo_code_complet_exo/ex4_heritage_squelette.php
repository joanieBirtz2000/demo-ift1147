<?php
// ex4_heritage_squelette.php

// Classe de base
class Personne
{
    // TODO: attributs protégés (protected) :
    // - prenom
    // - nom

    // TODO: constructeur($prenom, $nom)

    // TODO: méthode identite()
    // retourne "Prénom Nom"
}

// Classe dérivée
class Enseignant extends Personne
{
    // TODO: attribut privé :
    // - matiere

    // TODO: constructeur($prenom, $nom, $matiere)
    // doit appeler le constructeur de Personne avec parent::__construct()

    // TODO: redéfinir identite()
    // retourne "Prénom Nom — Enseignant en Matiere"
}

// TODO: créer un Enseignant "Kamel, PHP"
// et afficher son identité

