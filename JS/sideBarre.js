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
const pageName = lastPart.split(".")[0];

// mettre la class active sur le lien correspondant
const links = document.querySelectorAll(".menu a");
const imglinks = document.querySelectorAll(".menu a img");
links.forEach((link) => {
	link.classList.remove("active");
	if (link.id === pageName) {
		link.classList.add("active");
	}
});
