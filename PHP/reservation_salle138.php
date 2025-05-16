<?php include("../PHPpure/entete.php"); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Réservation salle 138</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles -->
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/reservation_salle.css">
    <style>
        .calendar {
            background: #fdecee;
            padding: 1rem;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 20px;
        }

        .calendar header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .calendar table {
            width: 100%;
            border-collapse: collapse;
        }

        .calendar th,
        .calendar td {
            padding: 8px;
            cursor: pointer;
        }

        .calendar td:hover {
            background: #f0cbd1;
        }

        .calendar td.selected {
            background: #e4587d;
            color: white;
            border-radius: 6px;
        }

        .signature-box canvas {
            border: 1px dashed #ccc;
            background: #f9f9f9;
            border-radius: 10px;
            cursor: crosshair;
        }
    </style>
</head>

<body>

    <?php
    include("header.php");
    include("aside.php");
    ?>

    <main class="reservation-container">
        <form action="../PHPpure/reservation_salle.php" method="post">
            <h1>Procédures de réservations</h1>

            <section class="reservation-content">
                <!-- Colonne de gauche : caméra -->
                <div class="equipment">
                    <img src="../IMG/image.png" alt="">
                    <h2>Salle 138</h2>

                    <label for="horaire">Choisir un créneau horaire</label>
                    <input type="text" id="horaire" name="horaire" placeholder="14h - 15h">

                    <label for="motif">Motif de la réservation</label>
                    <textarea id="motif" name="motif" placeholder="Bonjour ,...."></textarea>
                </div>

                <!-- Colonne de droite : calendrier et infos utilisateur -->
                <div class="reservation-details">
                    <div class="calendar">
                        <header>
                            <button onclick="changeMonth(-1)">❮</button>
                            <span id="month-year"></span>
                            <button onclick="changeMonth(1)">❯</button>
                        </header>
                        <table>
                            <thead>
                                <tr>
                                    <th>Lu</th>
                                    <th>Ma</th>
                                    <th>Me</th>
                                    <th>Je</th>
                                    <th>Ve</th>
                                    <th>Sa</th>
                                    <th>Di</th>
                                </tr>
                            </thead>
                            <tbody id="days"></tbody>
                        </table>
                        <input type="hidden" id="selected-date" name="selected-date">
                    </div>

                    <div class="who">
                        <h3>Qui réserve ?</h3>
                        <div class="avatars">
                            <!-- <img src="../images/avatar1.jpg" class="avatar">
                        <img src="../images/avatar2.jpg" class="avatar"> -->
                            <?php
                            require_once("../PHPpure/connexion.php");
                            // recuperer l'id de l'utilisateur connecté

                            $id_utilisateur = $_SESSION["user"]["id"];
                            // trouver role de l'utilisateur
                            if ($_SESSION["user"]["role"] == "Etudiant(e)") {
                                // requete pour recuperer les informations de l'utilisateur avec pdo
                                $requete = $pdo->prepare("SELECT * FROM user_ WHERE id = ?");
                                $requete->execute([$id_utilisateur]);
                                $utilisateur = $requete->fetch();

                                // recuperer l'avatar de l'utilisateur
                                $avatar = $utilisateur["avatar"];
                                echo "<img src='$avatar' class='avatar' name='id'>";
                            }
                            ?>


                            <button class="add-avatar" type="button">+</button>
                        </div>
                    </div>

                    <div class="signature-section">
                        <h3>Je signe</h3>
                        <!-- <div class="signature-box"> -->
                        <canvas id="signature-canvas" width="630" height="100"></canvas>
                        <!-- </div> -->
                        <button class="clear-signature" onclick="clearCanvas()" type="button">Effacer</button>
                        <input type="hidden" name="signature" id="signature-data">

                        <label>
                            <input type="checkbox" name="acceptation">
                            En cas de perte, de détérioration ou d'utilisation non autorisée, je m'engage à en assumer les
                            conséquences.
                        </label>
                    </div>

                    <button class="submit-button" type="submit" name="submit">Soumettre</button>
                </div>
            </section>
        </form>
    </main>
    <script src="../JS/sideBarre.js"></script>
    <script src="../JS/reservation_salle.js"></script>
</body>

</html>