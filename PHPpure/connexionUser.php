<?php
session_start();
// ajout de l'entete de connexion a la base de donnees
require_once('connexion.php');

// verifier si une requete de type POST est reçue
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // récupérer les données du formulaire de connexion
    $pseudo = trim($_POST['pseudo']);
    $mdp = trim($_POST['mdp']);

    // vérifier que le pseudo et le mot de passe ne sont pas vides
    if (empty($pseudo) || empty($mdp)) {
        die('Veuillez remplir tous les champs.');
    }

    // préparer la requête SQL pour récupérer l'utilisateur avec le pseudo
    $stmt = $pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($user) {
        // comparer le mot de passe saisi avec celui de la base de données (!!!!!!!!!!! utiliserons password_verify pour un mot de passe haché a la place de === !!!!!!!)
        if ($mdp === $user['mot_de_passe']) {
            // si le mot de passe est correct ajouter les données de l'utilisateur dans la session user
            $_SESSION['user'] = [
                'id' => $user['id'],
                'pseudo' => $user['pseudo'],
                'nom' => $user['nom'],        // ajouter le nom de l'utilisateur
                'prenom' => $user['prenom'],  // ajouter le prénom de l'utilisateur
                'email' => $user['email'],    // ajouter l'email de l'utilisateur
                'role' => $user['role'],
                'profil' => $user['avatar'],
                'session_token' => bin2hex(random_bytes(32))
            ];


            // rediriger l'utilisateur vers la page d'accueil ou dashboard si la connection est reussie
            header('Location: ../PHP/index.php');
            exit();
        } else {
            // si le mot de passe est incorrect
            die('Mot de passe incorrect.');
        }
    } else {
        // si l'utilisateur n'existe pas
        die('Aucun utilisateur trouvé avec ce pseudo.');
    }
}
