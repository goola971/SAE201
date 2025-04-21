<?php
session_start();
require_once "connexion.php";

// assurer que l'utilisateur est connecté et que son ID est disponible dans la session
if (isset($_SESSION['user']['id'])) {
    // récupérer l'ID de l'utilisateur connecté
    $userId = $_SESSION['user']['id'];
    // verifier si un file est upload et si il n'y a pas d'erreur de chargement
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        // recuperer les informations du fichier upload
        $fileTmpPath = $_FILES['avatar']['tmp_name'];
        $fileName = $_FILES['avatar']['name'];
        $fileSize = $_FILES['avatar']['size'];
        $fileType = $_FILES['avatar']['type'];
        // extraire l'extension du fichier
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // type d'extension autorisé
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

        // verifier si l'extension du fichier est autorisée 
        if (in_array($fileExt, $allowedExts)) {
            // verifier la taille du fichier (40Mo parce que XAMPP ne permet pas d'uploader des fichiers plus gros dans la configuration de base de XAMPP)
            if ($fileSize < 40 * 1024 * 1024) {
                // uploader le fichier dans le dossier uploads avec un nom unique en utilisant l'ID de l'utilisateur
                $uploadDir = '../uploads/avatars/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $newFileName = $userId . '.' . $fileExt;
                $uploadPath = $uploadDir . $newFileName;
                // si le fichier est uploade, et est dans le dossier uploads avatars
                if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                    // mettre a jour le chemin de l'image dans la base de données avec l'ID de l'utilisateur
                    $sql = "UPDATE users SET avatar = :avatar WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':avatar' => $uploadPath,
                        ':id' => $userId
                    ]);
                    // recharger la session de l'utilisateur pour le profil por mettre automatiquement la nouvelle image dans le profil
                    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
                    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
                    $stmt->execute();
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    $user['profil'] = $user['avatar'];
                    $_SESSION['user'] = $user;
                    header("Location: ../PHP/index.php");
                    exit();
                } else {
                    echo "Erreur lors du déplacement du fichier.";
                }
            } else {
                echo "Fichier trop lourd (max 40Mo).";
            }
        } else {
            echo "Format non autorisé (jpg, jpeg, png, gif).";
        }
    } else {
        echo "Aucun fichier reçu.";
    }
} else {
    // sa sa n'arrivera normalement jamais puisque on redirige vers la page de connexion si l'utilisateur n'est pas connecté mais en cas de bug
    echo "Vous devez être connecté.";
    header("Location: ../PHP/connexion.html");
}
