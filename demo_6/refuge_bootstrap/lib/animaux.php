<?php
// refuge_bootstrap/lib/animaux.php
require_once __DIR__ . '/db.php';

function get_animaux() {
    $mysqli = db();
    $sql = 'SELECT id, nom, espece, age, arrivee, created_at
            FROM animaux
            ORDER BY id DESC';
    $res = $mysqli->query($sql);

    $out = [];
    while ($row = $res->fetch_assoc()) {
        $out[] = $row;
    }
    return $out;
}


function get_animal_by_id_obj(int $id): object|null {
    $mysqli = db(); // connexion

    $stmt = $mysqli->prepare(
        'SELECT id, nom, espece, age, arrivee, created_at
         FROM animaux
         WHERE id = ?'
    );
    $stmt->bind_param('i', $id); // 'i' = integer
    $stmt->execute();

    $res = $stmt->get_result();
    // fetch_object($className) → stdClass par défaut, ou une classe perso si fournie
    $obj = $res->fetch_object();

    return $obj ?: null; // null si pas trouvé
}

?>
