<?php
require_once('connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idR = $_POST['idR'] ?? null;
    $status = $_POST['status'] ?? 0;

    if (!$idR) {
        die('ID réservation manquant');
    }

    $sql = "UPDATE reservations SET valide = :status WHERE idR = :idR";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':status' => $status,
        ':idR' => $idR
    ]);

    header('Location: ../PHP/listeDesReservations.php');
    exit;
}
