<?php include("../PHPpure/entete.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation salle 212</title>
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
        .calendar th, .calendar td {
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
    </style>
</head>
<body>

<?php 
    include("header.php");
    include("aside.php");
?>

<main class="reservation-container">
    <h1>Procédures de réservations</h1>
    
    <section class="reservation-content">
        <!-- Colonne de gauche : caméra -->
        <div class="equipment">
            <img src="../IMG/image2.jpg" alt="">
            <h2>Salle 212</h2>

            <label for="horaire">Choisir un créneau horaire</label>
            <input type="text" id="horaire" placeholder="14h - 15h">

            <label for="motif">Motif de la réservation</label>
            <textarea id="motif" placeholder="Bonjour ,...."></textarea>
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
                        <tr><th>Lu</th><th>Ma</th><th>Me</th><th>Je</th><th>Ve</th><th>Sa</th><th>Di</th></tr>
                    </thead>
                    <tbody id="days"></tbody>
                </table>
                <input type="hidden" id="selected-date" name="selected-date">
            </div>

            <div class="who">
                <h3>Qui réserve ?</h3>
                <div class="avatars">
                    <img src="../images/avatar1.jpg" class="avatar">
                    <img src="../images/avatar2.jpg" class="avatar">
                    <button class="add-avatar">+</button>
                </div>
            </div>

            <div class="signature-section">
                <h3>Je signe</h3>
                <div class="signature-box">
                    <img src="../images/signature.png" alt="Signature">
                </div>
                <label>
                    <input type="checkbox">
                    En cas de perte, de détérioration ou d'utilisation non autorisée, je m'engage à en assumer les conséquences.
                </label>
                <button class="clear-signature">Clear</button>
            </div>

            <button class="submit-button">Soumettre</button>
        </div>
    </section>

    <!-- Script calendrier -->
    <script>
        let current = new Date();
        const daysEl = document.getElementById("days");
        const monthYearEl = document.getElementById("month-year");
        const hiddenInput = document.getElementById("selected-date");

        function renderCalendar() {
            const year = current.getFullYear();
            const month = current.getMonth();
            const first = new Date(year, month, 1);
            const last = new Date(year, month + 1, 0);
            const start = (first.getDay() + 6) % 7;
            const total = last.getDate();

            monthYearEl.textContent = `${first.toLocaleString("fr-FR", { month: "long" })} ${year}`;
            daysEl.innerHTML = "";

            let row = document.createElement("tr");
            for (let i = 0; i < start; i++) row.appendChild(document.createElement("td"));

            for (let d = 1; d <= total; d++) {
                const td = document.createElement("td");
                td.textContent = d;
                td.dataset.day = d;
                td.addEventListener("click", () => {
                    document.querySelectorAll(".calendar td").forEach(cell => cell.classList.remove("selected"));
                    td.classList.add("selected");

                    const fullDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(d).padStart(2, '0')}`;
                    hiddenInput.value = fullDate;
                    console.log("Date sélectionnée :", fullDate);
                });
                row.appendChild(td);

                if ((start + d) % 7 === 0 || d === total) {
                    daysEl.appendChild(row);
                    row = document.createElement("tr");
                }
            }
        }

        function changeMonth(offset) {
            current.setMonth(current.getMonth() + offset);
            renderCalendar();
        }

        document.addEventListener("DOMContentLoaded", renderCalendar);
    </script>
</main>

</body>
</html>
