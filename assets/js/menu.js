const form = document.getElementById("form");
const menu = [...document.querySelectorAll(".navLinks-container li")];
const home = document.getElementById("home");
const about = document.getElementById("about");
const connexion = document.getElementById("login");
const inscription = document.getElementById("sign-in");
const reset = document.getElementById("reset");
const resetLink = document.querySelector(".reset_link");


$(document).ready(function () {
	$(home).hide();
	$(about).hide();
	$(form).hide();


	const showId = function (e) {
		let menuId = menu.indexOf(e.target)
		if (menuId === 0) {
			$(home).fadeIn(500);
			$(about).hide();
			$(form).hide();
		} else if (menuId === 1) {
			$(about).fadeIn(500);
			$(home).hide();
			$(form).hide();
		} else if (menuId === 2) {
			$(connexion).fadeIn(500);
			$(form).fadeIn(500);
			$(home).hide();
			$(about).hide();
			$(inscription).hide();
			$(reset).hide();
		} else {
			$(inscription).fadeIn(500);
			$(form).fadeIn(500);
			$(home).hide();
			$(connexion).hide();
			$(about).hide();
			$(reset).hide();
		}
	}

	menu.forEach((li) => {
		li.addEventListener("click", showId);
	});

	resetLink.addEventListener("click", function() {
		$(reset).fadeIn(500);
			$(form).fadeIn(500);
			$(home).hide();
			$(connexion).hide();
			$(about).hide();
			$(inscription).hide();
	});
});