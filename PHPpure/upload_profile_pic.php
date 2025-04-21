<?php
session_start();
require_once "connexion.php";

// Vérifier si l'utilisateur est connecté et que son ID est disponible dans la session
if (isset($_SESSION['user']['id'])) {
    // Récupérer l'ID de l'utilisateur connecté
    $userId = $_SESSION['user']['id'];

    // Vérifier si un fichier est uploadé et si aucune erreur n'a eu lieu
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        // Récupérer les informations du fichier uploadé
        $fileTmpPath = $_FILES['avatar']['tmp_name'];
        $fileName = $_FILES['avatar']['name'];
        $fileSize = $_FILES['avatar']['size'];
        $fileType = $_FILES['avatar']['type'];

        // Extraire l'extension du fichier
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Types d'extensions autorisées
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

        // Vérifier si l'extension du fichier est autorisée
        if (in_array($fileExt, $allowedExts)) {
            // Vérifier la taille du fichier (limité à 40Mo)
            if ($fileSize < 40 * 1024 * 1024) {
                // Créer un répertoire d'upload si nécessaire
                $uploadDir = '../uploads/avatars/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                // Générer un nom de fichier basé uniquement sur l'ID de l'utilisateur
                $newFileName = $userId . '.' . $fileExt;  // Utilise seulement l'ID de l'utilisateur
                $uploadPath = $uploadDir . $newFileName;

                // Si le fichier est correctement uploadé
                if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                    // Mettre à jour le chemin de l'avatar dans la base de données
                    $sql = "UPDATE user_ SET avatar = :avatar WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':avatar' => $uploadPath,
                        ':id' => $userId
                    ]);

                    // Recharger les données de l'utilisateur pour mettre à jour la session
                    $stmt = $pdo->prepare("SELECT * FROM user_ WHERE id = :id");
                    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
                    $stmt->execute();
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    $user['profil'] = $user['avatar'];
                    $_SESSION['user'] = $user;

                    // Rediriger vers la page d'accueil avec la nouvelle image
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
    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
    echo "Vous devez être connecté.";
    header("Location: ../PHP/connexion.html");
}
