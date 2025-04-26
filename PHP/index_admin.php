<section class="top">
    <p>Bienvenue <?php echo $_SESSION['user']['role'] ?></p>
    <p><?php echo $_SESSION['user']['prenom'] ?></p>
</section>
<section class="reservation">
    <h2>Liste des Utilisateurs</h2>
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
            <p>Nom d'utilisateur</p>
            <p>date d'inscription</p>
            <p>Status</p>

        </article>
        <article class="body_Table">
            <!-- <div class="line">
                <p>Nom d'utilisateur inscrit</p>
                <p>07/02/2025</p>
                <p>Non défini</p>
                <button class="modifier"></button>
            </div>
            <div class="line">
                <p>Nom d'utilisateur inscrit</p>
                <p>07/02/2025</p>
                <p>Non défini</p>
                <button class="modifier"></button>
            </div>
            <div class="line">
                <p>Nom d'utilisateur inscrit</p>
                <p>07/02/2025</p>
                <p>Non défini</p>
                <button class="modifier"></button>
            </div>
            <div class="line">
                <p>Nom d'utilisateur inscrit</p>
                <p>07/02/2025</p>
                <p>Non défini</p>
                <button class="modifier"></button>
            </div> -->
            <?php
            require_once('../PHPpure/connexion.php');

            $sql = "SELECT * FROM user_";
            $stmt = $pdo->query($sql);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="line">
                    <p>' . htmlspecialchars($row['nom']) . ' ' . htmlspecialchars($row['prenom']) . '</p>
                    <p>' . htmlspecialchars($row['date_inscription']) . '</p>
                    <p>' . getUserRole($row['id'], $pdo) . '</p>
                    <button popovertarget="modif" class="modifier"></button>
                    </div>';
            }
            ?>
        </article>
        <button class="add"><img src="../res/add.svg" alt="plus"></button>
    </section>

    <div popover id="modif" class="modif">
    </div>
</section>