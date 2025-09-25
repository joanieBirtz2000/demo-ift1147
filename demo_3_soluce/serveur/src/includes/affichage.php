<?php

function creerLigne($id, $titre, $annee, $categ)
{
    return "
    <tr>
        <td>$id</td>
        <td>$titre</td>
        <td>$annee</td>
        <td>$categ</td>
    </tr>";
}

function creerTableau($tabFilms)
{
    $table = '<table class="table table-striped table-bordered">';
    $table .= "<thead><tr><th>ID</th><th>Titre</th><th>Année</th><th>Catégorie</th></tr></thead><tbody>";
    foreach ($tabFilms as $film) {
        $table .= creerLigne($film['idf'], $film['titre'], $film['annee'], $film['categ']);
    }
    $table .= "</tbody></table>";
    return $table;
}
