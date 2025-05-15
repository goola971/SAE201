<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/inscription.css" />
    <link rel="stylesheet" href="../CSS/header.css" />

    <title>Inscription</title>
</head>

<body>
    <main>
        <section>

            <div class="formContainer">
                <div class="progress fixed-bottom" style="height: 10px;">
                    <div class="progress-bar" role="progressbar" style="width: 25%; background-color:#E47390;"></div>
                </div>
                <h1>Créez votre compte</h1>
                <form action="../PHPpure/inscriptionUser.php" method="POST" id="inscriptionForm">
                    <!-- Première étape -->
                    <div class="step" id="step1">
                        <input type="text" placeholder="Nom" name="nom" id="nom" required />
                        <input type="text" placeholder="Prénom" name="prenom" id="prenom" required />
                        <select name="role" id="role" required>
                            <option value="">Vous êtes :</option>
                            <option value="etudiant">Étudiant(e)</option>
                            <option value="enseignant">Enseignant(e)</option>
                            <option value="agent">Agent(e)</option>
                        </select>
                        <button type="button" onclick="nextStep()">Continuer</button>
                    </div>

                    <!-- Deuxième étape -->
                    <div class="step" id="step2" style="display: none;">
                        <input type="date" placeholder="Date de naissance" name="date_naissance" id="date_naissance"
                            required />
                        <input type="text" placeholder="Adresse postale" name="adresse" id="adresse" required />
                        <input type="email" placeholder="Email" name="email" id="email" required />
                        <input type="password" placeholder="Mot de passe" name="mot_de_passe" id="mot_de_passe"
                            required />
                        <button type="button" onclick="prevStep()">Retour</button>
                        <button type="submit">S'inscrire</button>
                    </div>
                </form>
                <p>
                    Déjà un compte? <a href="connexion.html">Connectez-vous</a>
                </p>
            </div>
        </section>
    </main>
    <script src="../JS/inscription.js"></script>
</body>

</html>