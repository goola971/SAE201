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

function prevStep() {
	document.getElementById("step2").style.display = "none";
	document.getElementById("step1").style.display = "block";
	document.getElementById("progressBar").style.width = "25%";
}

document.getElementById("testForm").addEventListener("submit", function (e) {
	e.preventDefault();
	// Ici, tu peux ajouter la logique d'envoi ou de validation finale
	alert("Formulaire soumis !");
});
