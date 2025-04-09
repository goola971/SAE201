<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../PHP/connexion.html");
    exit();
}
