<?php include("../PHPpure/entete.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/profil.css" />
    <link rel="stylesheet" href="../CSS/header.css" />
    <!-- bootstrap -->
    <title>Profil</title>
</head>

<body>
    <?php
    include("header.php");
    include("aside.php");
    ?>
    <main>
        <section class="profil">
            <h3>Vous êtes <?php echo $_SESSION['user']['role']; ?></h3>
            <div class="profilimg">
                <div class="imgProfilContainer" id="imgProfilContainerMain" onclick="displayUploadForm()">
                    <img class="imgProfil" src="
                        <?php
                        if (isset($_SESSION['user']['profil'])) {
                            if ($_SESSION['user']['profil'] != "") {
                                echo $_SESSION['user']['profil'];
                            } else {
                                echo "../uploads/default.png";
                            }
                        }
                        ?>" alt="">
                    <img class="edit" src="../res/Edit_Pencil_02.svg" alt="">
                </div>
                <form id="uploadForm" class="uploadForm" action="../PHPpure/upload_profile_pic.php" method="post"
                    enctype="multipart/form-data">
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
            <div class="details">
                <p>Détails <img src="../res/edition.svg" alt=""></p>
                <form class="form nomPrenom" action="../PHPpure/profilModification.php" method="post">
                    <div class="nomPrenomInput">
                        <div>
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" value="<?php echo $_SESSION['user']['nom'] ?>">
                        </div>
                        <div>
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" name="prenom" value="<?php echo $_SESSION['user']['prenom'] ?>">
                        </div>
                    </div>
                    <button type="submit" name="modifier_nomPrenom">Modifier</button>

                </form>
                <form class="form email" action="../PHPpure/profilModification.php" method="post">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
                    <button type="submit" name="modifier_email">Modifier</button>
                </form>

                <form class="form tel" action="../PHPpure/profilModification.php" method="post">
                    <label for="tel">Téléphone</label>
                    <input type="tel" id="tel" name="tel" value="+33  <?php echo $_SESSION['user']['telephone'] ?>">
                    <button type="submit" name="modifier_tel">Modifier</button>
                </form>
            </div>
            <form action="../PHPpure/profilModification.php" method="post" class="form password">
                <p>Mot de passe</p>
                <p>Modifier mon mot de passe</p>
                <div>
                    <label for="password">Mot de passe actuel</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <label for="newPassword">Nouveau mot de passe</label>
                    <input type="password" id="newPassword" name="newPassword" required>
                </div>
                <button type="submit" name="modifier_password">Modifier</button>
            </form>
            <form action="../PHPpure/profilModification.php" method="post" class="form other">
                <h1>Autres</h1>
                <div>
                    <label for="adresse">Adresse postale</label>
                    <input type="text" id="adresse" name="adresse" value="<?php echo $_SESSION['user']['adresse'] ?>">
                </div>
                <?php
                if ($_SESSION['user']['role'] == "Etudiant(e)") {
                ?>
                    <div>
                        <label for="numeroEtudiant ">Numéro étudiant</label>
                        <input type="text" id="numeroEtudiant" name="numeroEtudiant" value="<?php echo $_SESSION['user']['numeroEtudiant'] ?>">
                    </div>
                <?php
                }
                ?>
                <button type="submit" name="modifier_other">Modifier</button>
            </form>
        </section>
    </main>
    <script src="../JS/sideBarre.js"></script>
    <script src="../JS/profilchange.js"></script>
</body>

</html>