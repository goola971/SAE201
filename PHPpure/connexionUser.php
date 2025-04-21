<?php
session_start();
// ajout de l'entete de connexion à la base de données
require_once('connexion.php');

// vérifier si une requête de type POST est reçue
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // récupérer les données du formulaire de connexion
    $pseudo = trim($_POST['pseudo']);
    $mdp = trim($_POST['mdp']);

    // vérifier que les champs ne sont pas vides
    if (empty($pseudo) || empty($mdp)) {
        die('Veuillez remplir tous les champs.');
    }

    // préparation de la requête pour récupérer l'utilisateur par pseudo
    $stmt = $pdo->prepare("SELECT * FROM user_ WHERE pseudo = :pseudo");
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // comparer le mot de passe (ici comparaison directe, mais à sécuriser avec password_verify si besoin)
        if ($mdp === $user['mot_de_passe']) {
            // récupérer le rôle (si besoin, on peut aussi tester s'il est dans agent / admin / enseignant)
            $role = 'Etudiant(e)';

            // vérifier dans les autres tables si un rôle existe
            $id = $user['id'];
            if (checkRole($pdo, 'administrateur', $id)) $role = 'Administrateur';
            elseif (checkRole($pdo, 'agent', $id)) $role = 'Agent';
            elseif (checkRole($pdo, 'enseignant', $id)) $role = 'Enseignant';

            // stocker les infos dans la session
            $_SESSION['user'] = [
                'id' => $user['id'],
                'pseudo' => $user['pseudo'],
                'nom' => $user['nom'],
                'prenom' => $user['prenom'],
                'email' => $user['email'],
                'role' => $role,
                'profil' => $user['avatar'],
                'session_token' => bin2hex(random_bytes(32))
            ];

            // redirection
            header('Location: ../PHP/index.php');
            exit();
        } else {
            die('Mot de passe incorrect.');
        }
    } else {
        die('Aucun utilisateur trouvé avec ce pseudo.');
    }
}

// fonction pour vérifier si un id existe dans une table (admin, agent, enseignant)
function checkRole($pdo, $table, $id)
{
    $stmt = $pdo->prepare("SELECT id FROM $table WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
}
