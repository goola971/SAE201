function nextStep() {
	const nom = document.getElementById("nom").value;
	const prenom = document.getElementById("prenom").value;
	const pseudo = document.getElementById("pseudo").value;
	if (nom && prenom && pseudo) {
		document.getElementById("step1").style.display = "none";
		document.getElementById("step2").style.display = "block";
		document.getElementById("progressBar").style.width = "50%";
	} else {
		alert("Veuillez remplir tous les champs");
	}
}

function nextStep2() {
	const dateNaissance = document.getElementById("date_naissance").value;
	const adresse = document.getElementById("adresse").value;
	const email = document.getElementById("email").value;
	if (dateNaissance && adresse && email) {
		document.getElementById("step2").style.display = "none";
		document.getElementById("step3").style.display = "block";
		document.getElementById("progressBar").style.width = "75%";
	} else {
		alert("Veuillez remplir tous les champs de l'étape 2");
	}
}

function prevStep() {
	document.getElementById("step2").style.display = "none";
	document.getElementById("step1").style.display = "block";
	document.getElementById("progressBar").style.width = "25%";
}

document.getElementById("inscriptionForm").addEventListener("submit", function (e) {
	e.preventDefault();
	// Ici, tu peux ajouter la logique d'envoi ou de validation finale
	alert("Formulaire soumis !");
});
