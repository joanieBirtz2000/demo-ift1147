<?php

function creerLigne($id, $titre, $annee, $categ)
{
    // TODO: retourner une <tr> contenant les données dans des <td>
}

function creerTableau($tabFilms)
{
    $table = '<table class="table table-striped table-bordered">';
    $table .= "<thead><tr><th>ID</th><th>Titre</th><th>Année</th><th>Catégorie</th></tr></thead><tbody>";
    // TODO: parcourir $tabFilms et ajouter (.=) a $table ligne des films en utilisant creerLigne()
    $table .= "</tbody></table>";
    return $table;
}
