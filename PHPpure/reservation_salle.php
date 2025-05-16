<?php
session_start();
require_once("../PHPpure/connexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $date = $_POST['selected-date'];
    $horaire = strtolower($_POST['horaire']);
    $motif = $_POST['motif'];
    $signature = $_POST['signature'];
    $userId = $_SESSION["user"]["id"];
    $commentaire = "rien";
    $document = "rien";
    echo $userId;
    echo "<br>";
    echo $date;
    echo "<br>";
    echo $horaire;
    echo "<br>";
    echo $motif;
    echo "<br>";
    echo $signature;

    // transformer le horaire en format date heure donc 14h - 15h devient 14:00 15:00 et creer date debut = date + horaire debut et date fin = date + horaire fin
    $horaire = explode("-", $horaire);
    $horaire = str_replace("h", ":", $horaire);
    $dateDebut = $date . " " . $horaire[0];
    $dateFin = $date . " " . $horaire[1];
    echo $dateDebut;
    echo "<br>";
    echo $dateFin;



    if (!isset($_POST['acceptation'])) {
        die("Veuillez accepter les conditions.");
    }

    // Vérifie que les champs ne sont pas vides
    if (empty($date) || empty($horaire) || empty($motif) || empty($signature)) {
        die("Tous les champs sont requis.");
    }

    // Insertion
    $requete = $pdo->prepare("INSERT INTO reservations (date_debut, date_fin,valide, motif, commentaires, signatureElectronique,documentAdministrateur) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $requete->execute([$dateDebut, $dateFin, 0, $motif, $commentaire, $signature, $document]);

    header("Location: ../HTML/reservation_salle138.php"); // page de succès
    exit();
}
