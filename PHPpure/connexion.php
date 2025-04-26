<?php
// en tete de connexion a la base de donnees

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sae201";

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);


function getUserRole($idUser, $pdo)
{
    // vérifie si l'id present dans table administrateur
    $query = $pdo->prepare('SELECT id FROM administrateur WHERE id = ?');
    $query->execute([$idUser]);
    if ($query->fetch()) {
        return 'administrateur';
    }

    // vérifie si l'id present dans table enseignant
    $query = $pdo->prepare('SELECT id FROM enseignant WHERE id = ?');
    $query->execute([$idUser]);
    if ($query->fetch()) {
        return 'enseignant';
    }

    // vérifie si l'id present dans table étudiant
    $query = $pdo->prepare('SELECT id FROM etudiant WHERE id = ?');
    $query->execute([$idUser]);
    if ($query->fetch()) {
        return 'etudiant';
    }

    // vérifie si l'id present dans table agent
    $query = $pdo->prepare('SELECT id FROM agent WHERE id = ?');
    $query->execute([$idUser]);
    if ($query->fetch()) {
        return 'agent';
    }

    return 'Non Defini'; // aucun rôle trouvé
}
