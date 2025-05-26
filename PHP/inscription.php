<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/inscription.css">
    <!-- <link rel="stylesheet" href="../CSS/header.css"> -->
    <title>Inscription</title>
</head>

<body>
    <main>
        <section>
            <div class="formContainer">
                <h1 id="formTitle">Créez votre compte</h1>
                <form id="inscriptionForm" action="../PHPpure/inscriptionUser.php" method="post">
                    <!-- Step 1 -->
                    <div class="step" id="step1">
                        <label for="nom">Nom *</label>
                        <input type="text" placeholder="Nom" name="nom" id="nom" required />
                        <label for="prenom">Prénom *</label>
                        <input type="text" placeholder="Prénom" name="prenom" id="prenom" required />
                        <label for="pseudo">Pseudo <span class="retenir">(à retenir)</span></label>
                        <input type="text" placeholder="prénom.nom" name="pseudo" id="pseudo" required readonly /> <br>
                        <br><button type="button" onclick="nextStep('step1', 'step2', ['nom', 'prenom'])">Continuer</button>
                    </div>
                    <!-- Step 2 -->
                    <div class="step" id="step2" style="display: none;">
                        <label for="date_naissance">Date de naissance *</label>
                        <div style="position:relative; width:100%;">
                            <input type="date" name="date_naissance" id="date_naissance" style="padding-right:2.5em;" required />
                            <span class="calendar">
                                <img src="../res/calendar.svg" alt="">
                            </span>
                        </div>
                        <label for="adresse">Adresse postale</label>
                        <input type="text" placeholder="Ex : 1 rue de la paix, 75000 Paris" name="adresse" id="adresse" />
                        <label for="email">Email *</label>
                        <input type="email" placeholder="mail@exemple.com" name="email" id="email" required /><br>
                        <br><button type="button" onclick="nextStep('step2', 'step3', ['date_naissance', 'email'])">Continuer</button>
                        <button type="button" onclick="prevStep('step2', 'step1')">Retour</button>
                    </div>
                    <!-- Step 3 -->
                    <div class="step" id="step3" style="display: none;">
                        <label for="mdp">Mot de passe *</label>
                        <input type="password" placeholder="Ex : Mot2passe!" name="mdp" id="mdp" required />
                        <label for="confirme_mdp">Confirmez un mot de passe *</label>
                        <input type="password" placeholder="" name="confirme_mdp" id="confirme_mdp" required /><br>
                        <br><button type="button" onclick="nextStep('step3', 'submit', ['mdp', 'confirme_mdp'])">Valider</button>
                        <button type="button" onclick="prevStep('step3', 'step2')">Retour</button>
                    </div>
                </form>
                <p>
					Pas encore de compte ?
					<a href="connexion.html">Connectez-vous</a>
					</p>
                <div class="progress">
    <div class="progress-bar" id="progressBar" role="progressbar"
        style="width: 25%; background-color:#E47390;"></div>
</div>
        </section>
    </main>
    <script src="../JS/inscription.js"></script>
</body>
</html>