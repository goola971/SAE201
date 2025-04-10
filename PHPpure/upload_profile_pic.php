<?php
session_start();
require_once "connexion.php";

if (isset($_SESSION['user']['id'])) {
    $userId = $_SESSION['user']['id'];

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['avatar']['tmp_name'];
        $fileName = $_FILES['avatar']['name'];
        $fileSize = $_FILES['avatar']['size'];
        $fileType = $_FILES['avatar']['type'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExt, $allowedExts)) {
            if ($fileSize < 40 * 1024 * 1024) {
                $uploadDir = '../uploads/avatars/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $newFileName = $userId . '.' . $fileExt;
                $uploadPath = $uploadDir . $newFileName;

                if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                    $sql = "UPDATE users SET avatar = :avatar WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':avatar' => $uploadPath,
                        ':id' => $userId
                    ]);
                    header("Location: ../PHP/index.php"); // ou la page que tu veux
                    exit();
                } else {
                    echo "Erreur lors du déplacement du fichier.";
                }
            } else {
                echo "Fichier trop lourd (max 2Mo).";
            }
        } else {
            echo "Format non autorisé (jpg, jpeg, png, gif).";
        }
    } else {
        echo "Aucun fichier reçu.";
    }
} else {
    echo "Vous devez être connecté.";
}