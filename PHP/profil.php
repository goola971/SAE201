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
    <!-- bootstrap -->
    <title>Document</title>
</head>

<body>
    <?php
    include("header.php");
    include("aside.html");
    ?>
    <main>
        <section class="profil">
            <h3>Vous êtes <?php echo $_SESSION['user']['role']; ?></h3>
            <div class="profilimg">
                <div class="imgProfilContainer" id="imgProfilContainerMain" onclick="displayUploadForm()">
                    <img class="imgProfil" src="<?php echo $_SESSION['user']['profil'] ?>" alt="">
                    <img class="edit" src="../res/Edit_Pencil_02.svg" alt="">
                </div>
                <form id="uploadForm" class="uploadForm" action="../PHPpure/upload_profile_pic.php" method="post" enctype="multipart/form-data">
                    <div class="upload-box" id="dropZone">
                        <img src="../res/+.svg" alt="" class="upload-icon">
                        <input type="file" name="avatar" id="fileInput" accept="image/*" style="display: none;">
                        <div id="preview"></div>
                    </div>
                    <button type="submit" class="upload-button">Uploader</button>
                </form>
            </div>
            <!-- <p>Ajouter une photo de profil </p> -->
            <hr>
            <div>
                <p>Détails</p>
                <div class="nomPrenom">
                    <div>
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" value="<?php echo $_SESSION['user']['nom'] ?>">
                    </div>
                    <div>
                        <label for="prenom">Prrenom</label>
                        <input type="text" id="prenom" name="prenom" value="<?php echo $_SESSION['user']['prenom'] ?>">
                    </div>
                </div>
                <div></div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
            </div>
            <div>
                <label for="tel">Téléphone</label>
                <input type="tel" id="tel" name="tel" value="<?php echo $_SESSION['user']['tel'] ?>">
            </div>
            <form action="" method="post">
                <h1>Mot de passe</h1>
                <p>Modifier qon mot de passe</p>
                <div>
                    <label for="password">Mot de passe actuelle</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <label for="newPassword">Nouveau mot de passe</label>
                    <input type="password" id="newPassword" name="newPassword" required>
                </div>
                <button type="submit">Modifier</button>
            </form>
        </section>
    </main>
    <script src="../JS/sideBarre.js"></script>
    <script src="../JS/profilchange.js"></script>
</body>

</html>