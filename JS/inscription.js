// Progression bar
const stepIndex = { step1: 33, step2: 66, step3: 100, step4: 100 };

function nextStep(currentStep, nextStep, requiredFields = []) {
	// Validation des champs requis
	let valid = true;
	let firstInvalid = null;
	for (let field of requiredFields) {
		const input = document.getElementById(field);
		if (input) {
			if (field === "email") {
				// Validation stricte de l'email
				const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
				if (!emailRegex.test(input.value.trim())) {
					valid = false;
					firstInvalid = input;
					break;
				}
			} else if (field === "mdp" || field === "confirme_mdp") {
				// Vérification de l'égalité et de la force du mdp
				if (currentStep === "step3" && nextStep === "step4") {
					const mdp = document.getElementById("mdp").value;
					const confirme_mdp =
						document.getElementById("confirme_mdp").value;
					const mdpRegex =
						/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}$/;
					if (!mdpRegex.test(mdp)) {
						alert(
							"Le mot de passe doit faire au moins 8 caractères et contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial."
						);
						return;
					}
					if (mdp !== confirme_mdp) {
						alert("Les mots de passe ne sont pas identiques.");
						return;
					}
				}
				if (!input.value.trim()) {
					valid = false;
					firstInvalid = input;
					break;
				}
			} else if (!input.value.trim()) {
				valid = false;
				firstInvalid = input;
				break;
			}
		}
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
	} else {
		document.querySelector(".progress").style.display = "";
		document.getElementById("progressBar").style.width =
			stepIndex[nextStep] + "%";
	}
}

function prevStep(currentStep, prevStep) {
	document.getElementById(currentStep).style.display = "none";
	document.getElementById(prevStep).style.display = "block";
	if (prevStep === "step4") {
		document.querySelector(".progress").style.display = "none";
	} else {
		document.querySelector(".progress").style.display = "";
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

function nextStep3() {
	// Validation du step 3 (mot de passe déjà validé dans le submit)
	document.getElementById("step3").style.display = "none";
	document.getElementById("step4").style.display = "block";
	document.getElementById("progressBar").style.width = "100%";
}

// Gestion du bouton Se connecter
window.addEventListener("DOMContentLoaded", function () {
	const btnConnect = document.getElementById("btnConnect");
	if (btnConnect) {
		btnConnect.addEventListener("click", function () {
			// On soumet le formulaire à ce moment
			document.getElementById("inscriptionForm").submit();
		});
	}
});

// Validation des mots de passe à la soumission
// (on ne soumet pas, on passe au step 4)
document
	.getElementById("inscriptionForm")
	.addEventListener("submit", function (e) {
		e.preventDefault();

		const mdp = document.getElementById("mdp").value;
		const confirme_mdp = document.getElementById("confirme_mdp").value;
		const mdpRegex =
			/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}$/;

		if (!mdpRegex.test(mdp)) {
			alert(
				"Le mot de passe doit faire au moins 8 caractères et contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial."
			);
			return;
		}

		if (mdp !== confirme_mdp) {
			alert("Les mots de passe ne correspondent pas");
			return;
		}

		// On passe au step 4 (confirmation)
		document.getElementById("step3").style.display = "none";
		document.getElementById("step4").style.display = "block";
		document.querySelector(".progress").style.display = "none";
	});
