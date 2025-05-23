const canvas = document.getElementById("signature-canvas");
const ctx = canvas.getContext("2d");
const signatureDataInput = document.getElementById("signature-data");
let drawing = false;

function startDraw(e) {
	drawing = true;
	ctx.beginPath();
	ctx.moveTo(getX(e), getY(e));
}

function draw(e) {
	if (!drawing) return;
	ctx.lineTo(getX(e), getY(e));
	ctx.strokeStyle = "#000";
	ctx.lineWidth = 2;
	ctx.stroke();
}

function endDraw() {
	drawing = false;
	signatureDataInput.value = canvas.toDataURL(); // Base64 image
}

function getX(e) {
	return e.clientX
		? e.clientX - canvas.getBoundingClientRect().left
		: e.touches[0].clientX - canvas.getBoundingClientRect().left;
}

function getY(e) {
	return e.clientY
		? e.clientY - canvas.getBoundingClientRect().top
		: e.touches[0].clientY - canvas.getBoundingClientRect().top;
}

function clearCanvas() {
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	signatureDataInput.value = "";
}

// Souris
canvas.addEventListener("mousedown", startDraw);
canvas.addEventListener("mousemove", draw);
canvas.addEventListener("mouseup", endDraw);
canvas.addEventListener("mouseout", endDraw);

// Tactile
canvas.addEventListener("touchstart", startDraw);
canvas.addEventListener("touchmove", draw);
canvas.addEventListener("touchend", endDraw);

let current = new Date();
const daysEl = document.getElementById("days");
const monthYearEl = document.getElementById("month-year");
const hiddenInput = document.getElementById("selected-date");

function renderCalendar() {
	const year = current.getFullYear();
	const month = current.getMonth();
	const first = new Date(year, month, 1);
	const last = new Date(year, month + 1, 0);
	const start = (first.getDay() + 6) % 7;
	const total = last.getDate();

	monthYearEl.textContent = `${first.toLocaleString("fr-FR", {
		month: "long"
	})} ${year}`;
	daysEl.innerHTML = "";

	let row = document.createElement("tr");
	for (let i = 0; i < start; i++)
		row.appendChild(document.createElement("td"));

	for (let d = 1; d <= total; d++) {
		const td = document.createElement("td");
		td.textContent = d;
		td.dataset.day = d;
		td.addEventListener("click", () => {
			document
				.querySelectorAll(".calendar td")
				.forEach((cell) => cell.classList.remove("selected"));
			td.classList.add("selected");

			const fullDate = `${year}-${String(month + 1).padStart(
				2,
				"0"
			)}-${String(d).padStart(2, "0")}`;
			hiddenInput.value = fullDate;
			console.log("Date sélectionnée :", fullDate);
		});
		row.appendChild(td);

		if ((start + d) % 7 === 0 || d === total) {
			daysEl.appendChild(row);
			row = document.createElement("tr");
		}
	}
}

function changeMonth(offset) {
	current.setMonth(current.getMonth() + offset);
	renderCalendar();
}

document.addEventListener("DOMContentLoaded", renderCalendar);

const addAvatar = document.getElementById("add-avatar");
const whoListUser = document.getElementById("who-list-user");
const closeUserList = document.getElementById("close-user-list");
addAvatar.addEventListener("click", () => {
	whoListUser.classList.add("active");
});
closeUserList.addEventListener("click", () => {
	whoListUser.classList.remove("active");
});
const avatarContainer = document.getElementById("avatar-container");
const ajouterUserButton = document.getElementsByClassName("ajouterUserButton");
const whoListUserItem = document.getElementsByClassName("who-list-user-item");

for (let i = 0; i < ajouterUserButton.length; i++) {
	ajouterUserButton[i].addEventListener("click", () => {
		const item = whoListUserItem[i];
		const avatarSrc = item.querySelector("img").src;
		const userId = item.id;

		// Vérifier si un avatar avec ce userId existe déjà dans avatarContainer
		if (avatarContainer.querySelector(`img[data-user-id="${userId}"]`)) {
			// L'avatar existe déjà, on ne fait rien (ou tu peux afficher un message)
			alert("Cet utilisateur est déjà ajouté !");
			return;
		}

		// Créer un nouvel élément img
		const newAvatar = document.createElement("img");
		newAvatar.src = avatarSrc;
		newAvatar.classList.add("avatar");
		newAvatar.setAttribute("data-user-id", userId);

		// Ajouter le nouvel avatar dans le container
		avatarContainer.appendChild(newAvatar);

		// Créer un input caché pour envoyer l'id dans le formulaire
		const input = document.createElement("input");
		input.type = "hidden";
		input.name = "user_ids[]";
		input.value = userId;
		input.setAttribute("data-user-id", userId);
		avatarContainer.appendChild(input);
	});
}
