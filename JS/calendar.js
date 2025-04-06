function prev() {
	// recuper fc-prev-button fc-button fc-button-primary
	const fcPrevButton = document.querySelector(
		".fc-prev-button.fc-button.fc-button-primary"
	);
	fcPrevButton.click();
	updateCustomHeader();
}

function next() {
	// recuper fc-next-button fc-button fc-button-primary
	const fcNextButton = document.querySelector(
		".fc-next-button.fc-button.fc-button-primary"
	);
	fcNextButton.click();
	updateCustomHeader();
}
let tel = false;

document.addEventListener("DOMContentLoaded", function () {
	const calendarEl = document.getElementById("calendar");
	const calendar = new FullCalendar.Calendar(calendarEl, {
		initialView: "timeGridWeek",
		themeSystem: "standard",
		locale: "fr",
		headerToolbar: {
			left: "prev,next",
			center: "title",
			right: "dayGridMonth,dayGridWeek,dayGridDay"
		},
		events: [
			{
				title: "Réservation Salle 101",
				start: "2025-04-07T10:00:00",
				end: "2025-04-07T20:00:00",
				location: "Salle 101"
			},
			{
				title: "Réservation Centre",
				start: "2025-04-08T11:00:00",
				end: "2025-04-08T12:00:00",
				location: "Centre sportif"
			},
			{
				title: "Double réservation",
				start: "2025-04-11T11:00:00",
				end: "2025-04-11T13:30:00",
				location: "Salle 101"
			}
		]
	});
	calendar.render();
	updateCustomHeader();
	modifyCalendar();
	window.addEventListener("resize", function () {
		modifyCalendar();
	});
});

function modifyCalendar() {
	if (window.innerWidth < 1000) {
		const dayBtn = document.querySelector(
			".fc-dayGridDay-button.fc-button.fc-button-primary"
		);
		if (dayBtn) dayBtn.click();
		tel = true;
	} else {
		if (tel === true) {
			location.reload(); // on était en mobile, on repasse en grand écran => reload
		}
		tel = false;
	}
}

function updateCustomHeader() {
	const actual = document.querySelector(".fc-toolbar-title");
	const dates = document.getElementById("dates");
	if (actual && dates) {
		dates.innerText = actual.innerText;
	}
}
