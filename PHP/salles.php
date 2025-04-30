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
    <title>Document</title>
</head>

<body>
    <?php
    include("header.php");
    include("aside.html");
    ?>

    <main>
        <p>Cliquer sur une image pour entrer en mode VR 360°.</p>

        <!-- Image 1 -->
        <div id="imageContainer1" style="margin-bottom: 20px;">
            <img id="imageToClick1" src="../IMG/image.png" alt="Salle 138" style="width: 60%; cursor: pointer;">
            <h3>Réservation de la salle 138</h3>
            <a href="reservationSalle138.php">
                <button style="background-color: #c44e63; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
                    Réserver
                </button>
            </a>
        </div>

        <!-- Image 2 -->
        <div id="imageContainer2">
            <img id="imageToClick2" src="../IMG/image2.jpg" alt="Salle 212" style="width: 60%; cursor: pointer;">
            <h3>Réservation de la salle 212</h3>
            <a href="reservationSalle212.php">
                <button style="background-color: #c44e63; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
                    Réserver
                </button>
            </a>
        </div>

        <!-- Scène VR cachée au début -->
        <a-scene id="vrScene" style="display: none; height: 100vh;">
            <a-sky id="sky" rotation="0 -90 0"></a-sky>
        </a-scene>
    </main>

    <script src="../JS/sideBarre.js"></script>

    <script>
        const vrScene = document.getElementById('vrScene');
        const sky = document.getElementById('sky');

        // Fonction pour lancer la scène avec une image donnée
        function showVR(imageSrc) {
            document.getElementById('imageContainer1').style.display = 'none';
            document.getElementById('imageContainer2').style.display = 'none';
            sky.setAttribute('src', imageSrc);
            vrScene.style.display = 'block';
        }

        // Clic sur image 1
        document.getElementById('imageToClick1').addEventListener('click', function () {
            showVR('../IMG/image.png');
        });

        // Clic sur image 2
        document.getElementById('imageToClick2').addEventListener('click', function () {
            showVR('../IMG/image2.jpg');
        });
    </script>

</body>

</html>
