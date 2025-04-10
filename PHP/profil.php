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
        <form id="uploadForm" action="../PHPpure/upload_profile_pic.php" method="post" enctype="multipart/form-data">
            <div class="upload-box" id="dropZone">
                <p>Glissez votre photo de profil ici ou cliquez</p>
                <input type="file" name="avatar" id="fileInput" accept="image/*" style="display: none;">
                <div id="preview"></div>
            </div>
            <button type="submit">Uploader</button>
        </form>
    </main>

    <script src="../JS/profilchange.js"></script>
</body>

</html>