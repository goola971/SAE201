<?php
include("../PHPpure/entete.php");
?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/index.css" />
    <link rel="stylesheet" href="../CSS/header.css" />
    <title>Document</title>
</head>

<body>
    <?php
    include("header.php");
    include("aside.html");
    ?>
    <main>
        <?php
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] == "Etudiant(e)") {
                include("index_etudiant.php");
            } else if ($_SESSION['user']['role'] == "Enseignant") {
                include("index_enseignant.php");
            } else if ($_SESSION['user']['role'] == "Agent") {
                include("index_agent.php");
            } else if ($_SESSION['user']['role'] == "Administrateur") {
                include("index_admin.php");
            }
        }
        ?>
    </main>
    <script src="../JS/sideBarre.js"></script>
    <script src="../JS/index.js"></script>
</body>

</html>