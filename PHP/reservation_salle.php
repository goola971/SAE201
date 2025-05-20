<?php include("../PHPpure/entete.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation de salle</title>
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

        .salle-selector {
            margin-bottom: 20px;
            text-align: center;
        }

        .salle-selector button {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 5px;
            background-color: #f0cbd1;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .salle-selector button.active {
            background-color: #e4587d;
            color: white;
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

            <div class="salle-selector">
                <button type="button" class="active" data-salle="138">Salle 138</button>
                <button type="button" data-salle="212">Salle 212</button>
                <input type="hidden" name="salle" id="selected-salle" value="138">
            </div>

            <section class="reservation-content">
                <!-- Colonne de gauche : caméra -->
                <div class="equipment">
                    <img src="../IMG/image.png" alt="" id="salle-image">
                    <h2 id="salle-title">Salle 138</h2>

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
                            <?php
                            require_once("../PHPpure/connexion.php");
                            $id_utilisateur = $_SESSION["user"]["id"];
                            if ($_SESSION["user"]["role"] == "Etudiant(e)") {
                                $requete = $pdo->prepare("SELECT * FROM user_ WHERE id = ?");
                                $requete->execute([$id_utilisateur]);
                                $utilisateur = $requete->fetch();
                                $avatar = $utilisateur["avatar"];
                                echo "<img src='$avatar' class='avatar' name='id'>";
                            }
                            ?>
                            <button class="add-avatar" type="button">+</button>
                        </div>
                    </div>

                    <div class="signature-section">
                        <h3>Je signe</h3>
                        <canvas id="signature-canvas" width="630" height="100"></canvas>
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
    <script>
        // Gestion du sélecteur de salle
        const salleButtons = document.querySelectorAll('.salle-selector button');
        const salleInput = document.getElementById('selected-salle');
        const salleImage = document.getElementById('salle-image');
        const salleTitle = document.getElementById('salle-title');

        // Fonction pour mettre à jour l'interface en fonction de la salle sélectionnée
        function updateSalleInterface(salle) {
            salleButtons.forEach(btn => {
                btn.classList.toggle('active', btn.dataset.salle === salle);
            });
            salleInput.value = salle;
            salleTitle.textContent = `Salle ${salle}`;
            salleImage.src = salle === '138' ? '../IMG/image.png' : '../IMG/image2.jpg';
        }

        // Gestion des clics sur les boutons
        salleButtons.forEach(button => {
            button.addEventListener('click', () => {
                updateSalleInterface(button.dataset.salle);
            });
        });

        // Sélection initiale basée sur l'URL
        const urlParams = new URLSearchParams(window.location.search);
        const initialSalle = urlParams.get('salle');
        if (initialSalle && (initialSalle === '138' || initialSalle === '212')) {
            updateSalleInterface(initialSalle);
        }

        // Affichage du message de succès si présent
        if (urlParams.get('success') === '1') {
            alert('Réservation effectuée avec succès !');
        }
    </script>
</body>
</html> 