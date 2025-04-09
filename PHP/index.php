<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        header("Location: connexion.html");
        exit();
    }
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
    <header class="header">
        <div class="logo">
            <p>Logo + nom</p>
        </div>
        <button class="menuButton" onclick="toggleSidebar()">
            <img src="../res/menu.svg" alt="" id="menuimg" />
        </button>
        <div class="header_content">
            <h1>Tableau de bord</h1>
            <div class="profilXlogout">
                <div class="profil">
                    <img src="../IMG/jinx.png" alt="" class="imgProfil" />

                    <div class="nomRole">
                        <p>Gbadagni Soumiyya</p>
                        <p>Etudiant(e)</p>
                    </div>
                </div>
                <button class="logout">
                    <img src="../res/logout.svg" alt="" />
                </button>
            </div>
        </div>
    </header>
    <aside class="sidebar">
        <article class="menu">
            <p>Menu</p>
            <nav>
                <ul>
                    <li>
                        <a href="index.php">
                            <img src="../res/tableaudebord.svg" alt="" />
                            Tableau de bord
                        </a>
                    </li>
                    <li>
                        <a href="reservation.html">
                            <img src="../res/reservation.svg" alt="" />
                            Mes réservations
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="../res/materiel.svg" alt="" />
                            Materiels
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="../res/salles.svg" alt="" />
                            Salles
                        </a>
                    </li>
                </ul>
            </nav>
        </article>
        <article class="autre">
            <p>Autre</p>
            <nav>
                <ul>
                    <li>
                        <a href="">
                            <img src="../res/profil.svg" alt="" />
                            Mon profil
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="../res/univ.svg" alt="" />
                            Accéder à L'ent
                        </a>
                    </li>
                </ul>
            </nav>
        </article>
    </aside>
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
						require_once "../PHPpure/connexion.php";

						$sql = "
							SELECT 
								r.date_debut,
								r.date_fin,
								r.valide,
								m.designation AS materiel
							FROM reservations r
							JOIN materiels m ON r.id_materiel = m.id
							ORDER BY r.date_debut DESC
						";

						$stmt = $pdo->query($sql);
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