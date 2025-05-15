function nextStep() {
	// Vérification des champs de la première étape
	const nom = document.getElementById("nom").value;
	const prenom = document.getElementById("prenom").value;
	const role = document.getElementById("role").value;

	if (nom && prenom && role) {
		document.getElementById("step1").style.display = "none";
		document.getElementById("step2").style.display = "block";
	} else {
		alert("Veuillez remplir tous les champs");
	}
}

function prevStep() {
	document.getElementById("step2").style.display = "none";
	document.getElementById("step1").style.display = "block";
}
