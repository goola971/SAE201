function toggleSidebar() {
	const sidebar = document.querySelector(".sidebar");
	const menuimg = document.getElementById("menuimg");
	if (sidebar.classList.contains("active")) {
		sidebar.classList.remove("active");
		menuimg.src = "../res/menu.svg";
	} else {
		sidebar.classList.add("active");
		menuimg.src = "../res/x.svg";
	}
}

// recuperer le dernier / sans le .html ou .php
const url = window.location.href;
const lastSlashIndex = url.lastIndexOf("/");
const lastPart = url.substring(lastSlashIndex + 1);
const pageName = lastPart.split(".php")[0];

// mettre la class active sur le lien correspondant
const links = document.querySelectorAll(".menu a");
const imglinks = document.querySelectorAll(".menu a img");
links.forEach((link) => {
	link.classList.remove("active");
	if (link.id === pageName) {
		link.classList.add("active");
	} else if (pageName === "index") {
		links[0].classList.add("active");
	}
});

var buttonSearch = document.getElementById("buttonSearch");
var inputSearch = document.getElementById("inputSearch");
const line = document.querySelector(".line");

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
