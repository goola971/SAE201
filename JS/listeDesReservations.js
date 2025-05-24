document.addEventListener("DOMContentLoaded", function () {
	const popup = document.querySelector(".modifPopupReservation");
	const closeButton = document.querySelector(".close_modifPopupReservation");
	const modifierButtons = document.querySelectorAll(".modifier");

	// Fonction pour gérer les erreurs de chargement d'image
	function handleImageError(img) {
		img.src = "../uploads/default.png";
		img.onerror = null; // Évite les boucles infinies
	}

	// Fonction pour ouvrir le popup
	function openPopup(button) {
		const id = button.dataset.id;
		const motif = button.dataset.motif;
		const dateDebut = button.dataset.dateDebut;
		const dateFin = button.dataset.dateFin;
		const status = button.dataset.status;
		const materiels = button.dataset.materiels;
		const salles = button.dataset.salles;
		const users = JSON.parse(button.dataset.users);

		// Remplir les champs du formulaire
		document.getElementById("motif").value = motif;
		document.getElementById("date_debut").value = dateDebut;
		document.getElementById("date_fin").value = dateFin;
		document.getElementById("status").value = status;
		document.getElementById("materiels").value = materiels;
		document.getElementById("salles").value = salles;

		// Mettre à jour les avatars
		const avatarContainer = document.querySelector(".avatar-container_img");
		avatarContainer.innerHTML = ""; // Vider le conteneur

		users.forEach((user) => {
			const avatarDiv = document.createElement("div");
			avatarDiv.className = "user-avatar";

			const img = document.createElement("img");
			img.src = user.avatar;
			img.alt = `${user.prenom} ${user.nom}`;
			img.title = `${user.prenom} ${user.nom}`;
			img.onerror = () => handleImageError(img);

			avatarDiv.appendChild(img);
			avatarContainer.appendChild(avatarDiv);
		});

		// Afficher le popup
		popup.classList.add("active");
	}

	// Fonction pour fermer le popup
	function closePopup() {
		popup.classList.remove("active");
	}

	// Ajouter les écouteurs d'événements
	modifierButtons.forEach((button) => {
		button.addEventListener("click", () => openPopup(button));
	});

	closeButton.addEventListener("click", closePopup);

	// Fermer le popup si on clique en dehors
	popup.addEventListener("click", (e) => {
		if (e.target === popup) {
			closePopup();
		}
	});
});
