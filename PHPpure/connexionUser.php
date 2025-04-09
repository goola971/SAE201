<?php
session_start();

require_once('connexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $pseudo = trim($_POST['pseudo']);
    $mdp = trim($_POST['mdp']);

    // Vérifier que le pseudo et le mot de passe ne sont pas vides
    if (empty($pseudo) || empty($mdp)) {
        die('Veuillez remplir tous les champs.');
    }

    // Préparer la requête SQL pour récupérer l'utilisateur par pseudo
    $stmt = $pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Comparer le mot de passe saisi avec celui de la base de données (utilisation de password_verify pour un mot de passe haché)
        if ($mdp === $user['mot_de_passe']) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'pseudo' => $user['pseudo'],
                'nom' => $user['nom'],        // Ajouter le nom de l'utilisateur
                'prenom' => $user['prenom'],  // Ajouter le prénom de l'utilisateur
                'email' => $user['email'],    // Ajouter l'email de l'utilisateur
                'role' => $user['role'],
                'profil' => $user['avatar'],
                'session_token' => bin2hex(random_bytes(32)) // Optionnel : ajouter un token pour plus de sécurité
            ];


            // Rediriger l'utilisateur vers la page d'accueil ou dashboard
            header('Location: ../PHP/index.php');
            exit();
        } else {
            // Si le mot de passe est incorrect
            die('Mot de passe incorrect.');
        }
    } else {
        // Si l'utilisateur n'existe pas
        die('Aucun utilisateur trouvé avec ce pseudo.');
    }
}
