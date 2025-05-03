var buttonSearch = document.getElementById("buttonSearch");
var inputSearch = document.getElementById("inputSearch");
const line = document.querySelector(".line");
var btnModif = document.getElementsByClassName("modifier");
var modifPopup = document.getElementById("modifPopup");
var validation = document.getElementById("validation");
const closeModifPopup = document.getElementById("closeModifPopup");

buttonSearch.addEventListener("click", function () {
	const value = inputSearch.value.toLowerCase();
	const lines = document.querySelectorAll(".line");
	lines.forEach((line) => {
		const text = line.textContent.toLowerCase();
		if (text.includes(value)) {
			line.style.display = "";
		} else {
			line.style.display = "none";
		}
	});
});

closeModifPopup.addEventListener("click", function () {
	modifPopup.classList.toggle("active");
});

function openModifPopup(nb, nom, prenom, email, tel, role, valable) {
	modifPopup.classList.add("active");
	modifPopup.id = nb;

	document.getElementById("id").value = nb;
	document.getElementById("nom").value = nom;
	document.getElementById("prenom").value = prenom;
	document.getElementById("email").value = email;
	document.getElementById("tel").value = tel;
	document.getElementById("role").value = role;
	if (valable == 0) {
		validation.style.backgroundColor = "green";
		console.log(valable);
	} else {
		validation.style.backgroundColor = "gray";
	}
}

// enregistrer l'id
function id() {
	return modifPopup.id;
}
