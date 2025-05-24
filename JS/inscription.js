// Progression bar
const stepIndex = { step1: 33, step2: 66, step3: 100, step4: 100 };

function nextStep(currentStep, nextStep, requiredFields = []) {
	let valid = true;
	let firstInvalid = null;

	for (let field of requiredFields) {
		const input = document.getElementById(field);
		if (input) {
			const value = input.value.trim();

			if (!value) {
				valid = false;
				firstInvalid = input;
				break;
			}

			if (field === "email") {
				const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
				if (!emailRegex.test(value)) {
					valid = false;
					firstInvalid = input;
					break;
				}
			}
		}
	}

	// Validation spécifique des mots de passe (pour step3 → step4)
	if (currentStep === "step3" && nextStep === "step4") {
		const mdp = document.getElementById("mdp").value.trim();
		const confirme_mdp = document
			.getElementById("confirme_mdp")
			.value.trim();
		const mdpRegex =
			/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}$/;

		if (!mdp || !confirme_mdp) {
			alert("Veuillez remplir tous les champs obligatoires.");
			return;
		}
		if (!mdpRegex.test(mdp)) {
			alert(
				"Le mot de passe doit faire au moins 8 caractères et contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial."
			);
			return;
		}
		if (mdp !== confirme_mdp) {
			alert("Les mots de passe ne correspondent pas.");
			return;
		}
		// Valide = Soumission du formulaire
		document.getElementById("inscriptionForm").submit();
		return;
	}

	if (!valid) {
		if (firstInvalid) firstInvalid.focus();
		if (requiredFields.includes("email")) {
			alert("Veuillez entrer un email valide.");
		} else {
			alert("Veuillez remplir tous les champs obligatoires.");
		}
		return;
	}

	document.getElementById(currentStep).style.display = "none";
	document.getElementById(nextStep).style.display = "block";

	if (nextStep === "step4") {
		document.querySelector(".progress").style.display = "none";
		document.getElementById("formTitle").style.display = "none";
	} else {
		document.querySelector(".progress").style.display = "";
		document.getElementById("formTitle").style.display = "";
		document.getElementById("progressBar").style.width =
			stepIndex[nextStep] + "%";
	}
}

function prevStep(currentStep, prevStep) {
	document.getElementById(currentStep).style.display = "none";
	document.getElementById(prevStep).style.display = "block";

	if (prevStep === "step4") {
		document.querySelector(".progress").style.display = "none";
		document.getElementById("formTitle").style.display = "none";
	} else {
		document.querySelector(".progress").style.display = "";
		document.getElementById("formTitle").style.display = "";
		document.getElementById("progressBar").style.width =
			stepIndex[prevStep] + "%";
	}
}

// Auto-remplissage pseudo : prenom.nom
const prenomInput = document.getElementById("prenom");
const nomInput = document.getElementById("nom");
const pseudoInput = document.getElementById("pseudo");

function updatePseudo() {
	const prenom = prenomInput.value.trim().toLowerCase();
	const nom = nomInput.value.trim().toLowerCase();
	if (nom && prenom) {
		pseudoInput.value = `${prenom}.${nom}`;
	}
}

// MAJ pseudo à chaque saisie dans nom ou prénom
prenomInput.addEventListener("input", updatePseudo);
nomInput.addEventListener("input", updatePseudo);

// Gestion du bouton Se connecter : REVOIR BOUTON
window.addEventListener("DOMContentLoaded", function () {
	const btnConnect = document.getElementById("btnConnect");
	if (btnConnect) {
		btnConnect.addEventListener("click", function () {
			window.location.href = "../PHP/connexion.html";
		});
	}
});
