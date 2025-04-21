<?php

require_once('connexion.php');

// Récupère toutes les réservations validées avec les infos utilisateurs
$sql = "
    SELECT 
        r.date_debut AS start,
        r.date_fin AS end,
        m.designation AS title,
        u.avatar
    FROM reservations r
    JOIN concerne c ON r.idR = c.idR
    JOIN materiel m ON c.idM = m.idM
    JOIN reservation_users ru ON r.idR = ru.idR
    JOIN user_ u ON ru.id = u.id
    WHERE r.valide = 1
    ORDER BY r.date_debut
";

$stmt = $pdo->query($sql);

$events = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // Génère une clé unique (par ex date+titre) pour grouper les avatars
    $key = $row['start'] . $row['title'];

    if (!isset($events[$key])) {
        $events[$key] = [
            'title' => $row['title'],
            'start' => $row['start'],
            'end' => $row['end'],
            'avatars' => []
        ];
    }

    // Ajoute l'avatar de l'utilisateur à la réservation
    $events[$key]['avatars'][] = $row['avatar'] ?: "/img/default-avatar.png";
}

// Réindexe les events pour renvoyer un tableau propre
echo json_encode(array_values($events));
