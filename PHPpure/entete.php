<?php
// creation de la session de l'utilisateur
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../PHP/connexion.html");
    exit();
}

// detruire la session si l'utilisateur n'a pas interagis avec le site depuis 30 secondes
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 30)) {
    session_destroy();
    header("Location: ../PHP/connexion.html");
    exit();
}

$_SESSION['last_activity'] = time();
