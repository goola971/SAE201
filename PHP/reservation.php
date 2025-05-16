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
    <link rel="stylesheet" href="../CSS/reservation.css" />
    <link rel="stylesheet" href="../CSS/header.css" />

    <title>Document</title>
</head>

<body>
    <!-- width 100%-->
    <?php
    include("header.php");
    include("aside.php");
    ?>
    <main>
        <section class="calendarHeader">
            <article class="left">
                <p>Avril 2025</p>
                <div class="buttoncontainer">
                    <button class="left">
                        <img src="../res/left.svg" alt="" /></button><button class="right">
                        <img src="../res/right.svg" alt="" />
                    </button>
                </div>
            </article>
            <button class="reserve">Réserver</button>
        </section>
        <div class="calendarContainer">
            <div class="calendarheader">
                <button onclick="prev()">
                    <img src="../res/chevronleftcalen.svg" alt="" />
                </button>
                <p id="dates"></p>
                <button onclick="next()">
                    <img src="../res/chevronrightcalen.svg" alt="" />
                </button>
            </div>
            <div class="calendar" id="calendar"></div>
        </div>

    </main>

    <!-- JS -->
    <script src="
        https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js
        "></script>
    <script></script>
    <script src="../JS/calendar.js"></script>
    <script src="../JS/sideBarre.js"></script>
</body>

</html>