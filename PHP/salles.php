<?php include("../PHPpure/entete.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/profil.css" />
    <link rel="stylesheet" href="../CSS/header.css" />
    <script src="https://aframe.io/releases/1.7.0/aframe.min.js"></script>
    <!-- bootstrap -->
    <title>Document</title>
</head>

<body>
    <?php
    include("header.php");
    include("aside.html");
    ?>
    <main>
        <p></p>
        <a-scene>
            <!-- Ajouter une sphère avec l'image 360° comme texture -->
            <a-sky src="../IMG/image.png" rotation="0 -90 0"></a-sky>
        </a-scene>
    </main>
    <script src="../JS/sideBarre.js"></script>
</body>

</html>