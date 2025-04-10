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
    <link rel="stylesheet" href="../CSS/index.css" />
    <link rel="stylesheet" href="../CSS/header.css" />
    <!-- bootstrap -->
    <title>Document</title>
</head>

<body>
    <!-- width 100%-->
    <?php 
        include("header.php"); 
        include("aside.html"); 
    ?>
    <main>
        <section class="top">
            <p>Bienvenue dans votre espace personnel</p>
            <p>Soumiyya</p>
            <div class="cards">
                <div class="card"></div>
                <div class="card"></div>
            </div>
        </section>
        <section class="reservation">
            <h2>Liste de réservation</h2>
            <div>
                <p>Consulter l'historique</p>
                <div class="searchContainer">
                    <input type="search" name="search" id="inputSearch" placeholder="Chercher..." />
                    <button id="buttonSearch">
                        <img src="../res/search.svg" alt="" />
                    </button>
                </div>
            </div>
            <section class="table">
                <article class="header_Table">
                    <p>type de reservation</p>
                    <p>Date de la réservation</p>
                    <p>Créneau de réservation</p>
                    <p>Status</p>
                </article>
                <article class="body_Table">
                    <!-- <div class="line">
                        <p>Réservation de caméra</p>
                        <p>04/04/2025</p>
                        <p>12h45 - 13h45</p>

                        <button class="attente"></button>
                    </div>
                    <div class="line">
                        <p>Réservation de caméra</p>
                        <p>04/04/2025</p>
                        <p>12h45 - 13h45</p>
                        <button class="accepté"></button>
                    </div>
                    <div class="line">
                        <p>Réservation salle</p>
                        <p>04/04/2025</p>
                        <p>12h45 - 13h45</p>
                        <button class="réfusé"></button>
                    </div>
                    <div class="line">
                        <p>Réservation de caméra</p>
                        <p>04/04/2025</p>
                        <p>12h45 - 13h45</p>
                        <button class="terminé"></button>
                    </div> -->
                    <?php
                        // Assurez-vous que l'utilisateur est connecté et que son ID est disponible dans la session
                        if (isset($_SESSION['user']['id'])) {
                            $userId = $_SESSION['user']['id']; // Récupérer l'ID de l'utilisateur connecté
                        }
                        require_once "../PHPpure/connexion.php";
                        $sql = "
                            SELECT 
                                r.date_debut,
                                r.date_fin,
                                r.valide,
                                m.designation AS materiel
                            FROM reservations r
                            JOIN materiels m ON r.id_materiel = m.id
                            JOIN reservation_users ru ON r.id = ru.id_reservation
                            WHERE ru.id_user = :user_id
                            ORDER BY r.date_debut DESC
                        ";

                        // Prépare la requête
                        $stmt = $pdo->prepare($sql);

                        // Lie l'ID de l'utilisateur à la requête SQL
                        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);

                        // Exécute la requête
                        $stmt->execute();

                        // Affichage des résultats
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $date = date("d/m/Y", strtotime($row['date_debut']));
                            $startHour = date("H\hi", strtotime($row['date_debut']));
                            $endHour = date("H\hi", strtotime($row['date_fin']));

                            // Détermine le statut pour le bouton
                            $now = new DateTime();
                            $end = new DateTime($row['date_fin']);
                            if ($row['valide'] == 0) {
                                $status = "attente";
                            } elseif ($end < $now) {
                                $status = "terminé";
                            } else if ($row['valide'] == 1) {
                                $status = "accepté";
                            } else if ($row['valide'] == 2) {
                                $status = "réfusé";
                            }

                            // Affichage des informations de réservation
                            echo "
                                <div class='line'>
                                    <p>Réservation de {$row['materiel']}</p>
                                    <p>$date</p>
                                    <p>$startHour - $endHour</p>
                                    <button class='$status'></button>
                                </div>
                            ";
                        }
                    ?>
                </article>
            </section>
        </section>
    </main>
    <script src="../JS/sideBarre.js"></script>
</body>

</html>