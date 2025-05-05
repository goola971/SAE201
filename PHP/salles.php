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
    <title>Réservation VR</title>
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

        <!-- Scène VR affichée en haut de page -->
        <div id="vrContainer" style="display: none; width: 100%; height: 100vh;">
            <a-scene id="vrScene" embedded style="width: 100%; height: 100%;">
                <a-sky id="sky" rotation="0 -90 0"></a-sky>
            </a-scene>

            <!-- Bouton retour dans la scène -->
            <button id="backButton" style="
                position: absolute;
                bottom: 30px;
                right: 30px;
                z-index: 9999;
                padding: 10px 20px;
                background-color: #c44e63;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                display: none;
            ">
                Retour
            </button>
        </div>
    </main>

    <script src="../JS/sideBarre.js"></script>

    <script>
        const vrContainer = document.getElementById('vrContainer');
        const sky = document.getElementById('sky');
        const backButton = document.getElementById('backButton');

        function showVR(imageSrc) {
            // Masquer les images de la page principale et afficher la scène VR
            document.getElementById('imageContainer1').style.display = 'none';
            document.getElementById('imageContainer2').style.display = 'none';
            
            // Changer l'image de la scène VR
            sky.setAttribute('src', imageSrc);
            vrContainer.style.display = 'block';
            backButton.style.display = 'block';

            // Activer le défilement pendant le mode VR
            document.body.style.overflow = 'auto'; 
        }

        function exitVR() {
            vrContainer.style.display = 'none';
            document.getElementById('imageContainer1').style.display = 'block';
            document.getElementById('imageContainer2').style.display = 'block';
            backButton.style.display = 'none';

            // Restaurer l'affichage du défilement une fois que VR est quitté
            document.body.style.overflow = 'auto'; // Permet de scroller
        }

        document.getElementById('imageToClick1').addEventListener('click', function () {
            showVR('../IMG/image.png');
        });

        document.getElementById('imageToClick2').addEventListener('click', function () {
            showVR('../IMG/image2.jpg');
        });

        backButton.addEventListener('click', exitVR);
    </script>
</body>

</html>
