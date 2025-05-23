<?php
session_start();
require_once('connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $pseudo = trim($_POST['pseudo']);
    $date_naissance = trim($_POST['date_naissance']);
    $adresse = trim($_POST['adresse']);
    $email = trim($_POST['email']);
    $mdp = trim($_POST['mdp']);
    $confirme_mdp = trim($_POST['confirme_mdp']);
    
    // // Création du pseudo (prénom.nom)
    // $pseudo = strtolower($prenom . '.' . $nom);
    
    // Date d'inscription
    $date_inscription = date('Y-m-d');
    
    // Par défaut, le compte n'est pas validé (valable = 0)
    $valable = 0;

    // Vérification que tous les champs sont remplis
    if (empty($nom) || empty($prenom) || empty($pseudo) || empty($date_naissance) || empty($email) || empty($mdp) || empty($confirme_mdp)) {
        die('Veuillez remplir tous les champs.');
    }

    // Vérification si l'email existe déjà
    $stmt = $pdo->prepare("SELECT * FROM user_ WHERE email = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->fetch()) {
        die('Cette adresse email est déjà utilisée.');
    }

    // Vérification si le pseudo existe déjà
    $stmt = $pdo->prepare("SELECT * FROM user_ WHERE pseudo = :pseudo");
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->fetch()) {
        die('Ce pseudo est déjà utilisé.');
    }

    try {
        // Début de la transaction
        $pdo->beginTransaction();

        // Insertion dans la table user_
        $sql = "INSERT INTO user_ (nom, prenom, pseudo, email, mdp, confirme_mdp, date_inscription, valable, date_naissance, adresse) 
                VALUES (:nom, :prenom, :pseudo, :email, :mdp, :confirme_mdp, :date_inscription, :valable, :date_naissance, :adresse)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'pseudo' => $pseudo,
            'email' => $email,
            'mdp' => $mdp, // HASHER LE MDP
            'confirme_mdp' => $confirme_mdp, // HASHER LE MDP
            'date_inscription' => $date_inscription,
            'valable' => $valable,
            'date_naissance' => $date_naissance,
            'adresse' => $adresse
        ]);

        // Récupération de l'ID de l'utilisateur nouvellement créé
        $userId = $pdo->lastInsertId();

        // // Insertion dans la table de rôle correspondante
        // $sql = "INSERT INTO $role (id) VALUES (:id)";
        // $stmt = $pdo->prepare($sql);
        // $stmt->execute(['id' => $userId]);

        // Validation de la transaction
        $pdo->commit();

        // Redirection vers la page de connexion avec un message de succès
        header('Location: ../PHP/connexion.html?inscription=success');
        exit();

    } catch (Exception $e) {
        // En cas d'erreur, annulation de la transaction
        $pdo->rollBack();
        die('Une erreur est survenue lors de l\'inscription : ' . $e->getMessage());
    }
}
?> 