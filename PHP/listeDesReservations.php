<?php
include("../PHPpure/entete.php");
?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/index.css" />
    <link rel="stylesheet" href="../CSS/header.css" />
    <title>Document</title>
</head>

<body>
    <?php
    include("header.php");
    include("aside.php");
    ?>
    <main>
        <h1>Reservations</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Numéro de la reservation</h5>
                            <p class="card-text">Pour quelle salle ou quelle matériel</p>
                            <p class="card-text">Date de la reservation</p>
                            <p class="card-text">heure de la reservation</p>

                        </div>
                        <form class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Reservation 1</h5>
                            <p class="card-text">Description de la reservation</p>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-primary">Accepter</a>
                                <a href="#" class="btn btn-danger">Refuser</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../JS/sideBarre.js"></script>
    <script src="../JS/index.js"></script>
</body>

</html>