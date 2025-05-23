<?php
include("../PHPpure/entete.php");
?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/materiels.css" />
    <link rel="stylesheet" href="../CSS/header.css" />
    <title>Matériels</title>
</head>

<body>
    <?php
    include("header.php");
    include("aside.php");
    ?>
    <main>
        <section class="container-fluid d-flex flex-column gap-5">
            <div>
                <h3 class="fs-1 fw-bold">Favoris</h3>
            </div>
            <div class="row justify-content-start align-items-center">
                <div class="col-4 d-flex justify-content-center align-items-center flex-column position-relative w-25">

                    <div
                        class="position-absolute top-0 end-0 d-flex justify-content-between align-items-center gap-3 p-4">
                        <button class="btn bg-transparent border-0">
                            <img src="../res/heartVide.svg" alt="favory">
                        </button>

                    </div>
                    <img src="../IMG/co.png" alt="co" class="w-100 rounded-5">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <p class="text-center fs-auto fw-bold w-100">Micro - HyperX HX-MICQC-BK QuadCast</p>
                        <button class="btn btn-danger text-white w-50 p-3 ">Réserver</button>
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid d-flex flex-column gap-5">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="fs-1 fw-bold">Tous</h3>
                <div class="d-flex justify-content-between align-items-center gap-3 w-50">
                    <input type="search" placeholder="Rechercher" class="form-control p-3 search-input">
                    <button class="search-btn btn p-3"><img src="../res/search.svg" alt="search"></button>
                </div>
            </div>
            <!-- flex wrap qui change de 3 en 2 en 1 en dessous de 768px -->
            <div class="row justify-content-start align-items-center g-5 ">
                <!-- position relative -->
                <!-- <div class="col-4 d-flex justify-content-center align-items-center flex-column position-relative w-25">
                   
                    <div
                        class="position-absolute top-0 end-0 d-flex justify-content-between align-items-center gap-3 p-4">
                        <button class="btn bg-transparent border-0">
                            <img src="../res/heartVide.svg" alt="favory">
                        </button>

                    </div>
                    <img src="../IMG/co.png" alt="co" class="w-100 rounded-5">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <p class="text-center fs-auto fw-bold w-100">Micro - HyperX HX-MICQC-BK QuadCast</p>
                        <button class="btn btn-danger text-white w-50 p-3 ">Réserver</button>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center align-items-center flex-column position-relative w-25">
                   
                    <div
                        class="position-absolute top-0 end-0 d-flex justify-content-between align-items-center gap-3 p-4">
                        <button class="btn bg-transparent border-0">
                            <img src="../res/heartVide.svg" alt="favory">
                        </button>

                    </div>
                    <img src="../IMG/co.png" alt="co" class="w-100 rounded-5">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <p class="text-center fs-auto fw-bold w-100">Micro - HyperX HX-MICQC-BK QuadCast</p>
                        <button class="btn btn-danger text-white w-50 p-3 ">Réserver</button>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center align-items-center flex-column position-relative w-25">
                   
                    <div
                        class="position-absolute top-0 end-0 d-flex justify-content-between align-items-center gap-3 p-4">
                        <button class="btn bg-transparent border-0">
                            <img src="../res/heartVide.svg" alt="favory">
                        </button>

                    </div>
                    <img src="../IMG/co.png" alt="co" class="w-100 rounded-5">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <p class="text-center fs-auto fw-bold w-100">Micro - HyperX HX-MICQC-BK QuadCast</p>
                        <button class="btn btn-danger text-white w-50 p-3 ">Réserver</button>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center align-items-center flex-column position-relative w-25">
                   
                    <div
                        class="position-absolute top-0 end-0 d-flex justify-content-between align-items-center gap-3 p-4">
                        <button class="btn bg-transparent border-0">
                            <img src="../res/heartVide.svg" alt="favory">
                        </button>

                    </div>
                    <img src="../IMG/co.png" alt="co" class="w-100 rounded-5">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <p class="text-center fs-auto fw-bold w-100">Micro - HyperX HX-MICQC-BK QuadCast</p>
                        <button class="btn btn-danger text-white w-50 p-3 ">Réserver</button>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center align-items-center flex-column position-relative w-25">
                   
                    <div
                        class="position-absolute top-0 end-0 d-flex justify-content-between align-items-center gap-3 p-4">
                        <button class="btn bg-transparent border-0">
                            <img src="../res/heartVide.svg" alt="favory">
                        </button>

                    </div>
                    <img src="../IMG/co.png" alt="co" class="w-100 rounded-5">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <p class="text-center fs-auto fw-bold w-100">Micro - HyperX HX-MICQC-BK QuadCast</p>
                        <button class="btn btn-danger text-white w-50 p-3 ">Réserver</button>
                    </div>
                </div> -->
                <?php
                require_once("../PHPpure/connexion.php");
                // requperer les img dans https://glistening-sunburst-222dae.netlify.app/materiel/[photop]
                $sql = "SELECT * FROM materiel";
                $result = $pdo->query($sql);
                while ($row = $result->fetch()) {
                    echo "<div class='col-4 d-flex justify-content-center align-items-center flex-column position-relative'>";
                    echo "<div class='position-absolute top-0 end-0 d-flex justify-content-between align-items-center gap-3 p-4'>";
                    echo "<button class='btn bg-transparent border-0'>";
                    echo "<img src='../res/heartVide.svg' alt='favory'>";
                    echo "</button>";
                    echo "</div>";
                    // img meme taille que la div
                    echo "<img src='https://glistening-sunburst-222dae.netlify.app/materiel/" . $row['photo'] . "' alt='materiel' class='w-100 rounded-5 materiel-image'>";
                    echo "<div class='d-flex justify-content-center align-items-center flex-column w-100'>";
                    echo "<p class='text-center fs-auto fw-bold w-100'>" . $row['designation'] . "</p>";
                    echo "<button class='btn btn-danger text-white w-50 p-3' onclick='reserverMateriel(" . $row['idM'] . ")'>Réserver</button>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>
    </main>
    <script src="../JS/sideBarre.js"></script>
    <script src="../JS/index.js"></script>
    <script>
        function reserverMateriel(idM) {
            window.location.href = "reservation_materiel.php?idM=" + idM;
        }
    </script>
</body>

</html>