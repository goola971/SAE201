<?php
session_start();
require_once "../PHPpure/connexion.php";

if (isset($_POST['pseudo']) && isset($_POST['password'])) {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE pseudo = :pseudo AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $user['id'];
        $_SESSION['pseudo'] = $user['pseudo'];
        $_SESSION['avatar'] = $user['avatar'];
        $_SESSION['role'] = $user['role'];

        header("Location: ../index.php");
        exit();
    } else {
        header("Location: ../PHP/connexion.html");
        exit();
    }
}
?>