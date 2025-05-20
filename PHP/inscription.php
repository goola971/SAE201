<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/TEST.css" />
    <link rel="stylesheet" href="../CSS/header.css" />
    <title>TEST Multi-step Form</title>
</head>
<body>
    <main>
        <section>
            <div class="formContainer">
                <h1>Créez votre compte</h1>
                <form id="testForm">
                    <!-- Step 1 -->
                    <div class="step" id="step1">
                        <label for="nom">Nom *</label>
                        <input type="text" placeholder="Nom" name="nom" id="nom" required />
                        <label for="prenom">Prénom *</label>
                        <input type="text" placeholder="Nom" name="prenom" id="prenom" required />
                        <label for="role">Vous êtes :</label>
                        <select name="role" id="role" required style="font-family: 'Absans', sans-serif;">
                            <option value="">Sélectionnez</option>
                            <option value="etudiant">Étudiant(e)</option>
                            <option value="enseignant">Enseignant(e)</option>
                            <option value="agent">Agent(e)</option>
                        </select>
                        <button type="button" onclick="nextStep()">Continuer</button>
                    </div>
                    <!-- Step 2 -->
                    <div class="step" id="step2" style="display: none;">
                        <label for="date_naissance">Date de naissance</label>
                        <div style="position:relative; width:100%;">
                            <input type="date" name="date_naissance" id="date_naissance" style="padding-right:2.5em;" />
                            <span style="position:absolute; right:1em; top:50%; transform:translateY(-50%); pointer-events:none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><rect x="3" y="4" width="18" height="18" rx="2" fill="#ebebeb" stroke="#7b7b7b" stroke-width="1.5"/><path d="M8 2v4M16 2v4M3 10h18" stroke="#7b7b7b" stroke-width="1.5"/></svg>
                            </span>
                        </div>
                        <label for="adresse">Adresse postale *</label>
                        <input type="text" placeholder="Ex : 75000" name="adresse" id="adresse" required />
                        <label for="email">Email *</label>
                        <input type="email" placeholder="Nom" name="email" id="email" required />
                        <button type="button" onclick="prevStep()">Retour</button>
                        <button type="submit">Continuer</button>
                    </div>
                    <!-- Step 3 -->
                    <div class="step" id="step3" style="display: none;">
                        <label for="date_naissance">Date de naissance</label>
                        <div style="position:relative; width:100%;">
                            <input type="date" name="date_naissance" id="date_naissance" style="padding-right:2.5em;" />
                            <span style="position:absolute; right:1em; top:50%; transform:translateY(-50%); pointer-events:none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><rect x="3" y="4" width="18" height="18" rx="2" fill="#ebebeb" stroke="#7b7b7b" stroke-width="1.5"/><path d="M8 2v4M16 2v4M3 10h18" stroke="#7b7b7b" stroke-width="1.5"/></svg>
                            </span>
                        </div>
                        <label for="adresse">Adresse postale *</label>
                        <input type="text" placeholder="Ex : 75000" name="adresse" id="adresse" required />
                        <label for="email">Email *</label>
                        <input type="email" placeholder="Nom" name="email" id="email" required />
                        <button type="button" onclick="prevStep()">Retour</button>
                        <button type="submit">Continuer</button>
                    </div>
                </form>
                <p>
                    Déjà un compte? <a href="connexion.html">Connectez-vous</a>
                </p>
            </div>
            <div class="progress">
                <div class="progress-bar" id="progressBar" role="progressbar" style="width: 25%; background-color:#E47390;"></div>
            </div>
        </section>
    </main>
    <script src="../JS/TEST.js"></script>
</body>
</html> 