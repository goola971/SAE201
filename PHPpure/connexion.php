<?php
// en tete de connexion a la base de donnees

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "sae201";

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
