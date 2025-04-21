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
