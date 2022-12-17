$(document).ready(function () {
	recupMessages();

	/*************** Login ********************/
	$(".login").submit(function () {

		var nom = $(".nom-login").val();
		var mdp = $(".mdp-login").val();

		$.post("./php/login.php", { nom: nom, mdp: mdp }, function (donnees) {
			$('.messages-php').html(donnees).slideDown(function () {
				var temps = 3;
				var interval = setInterval(function () {
					temps = temps - 1;
					if (temps == 0) {
						setInterval(interval);
						$('.messages-php').html(donnees).slideUp();
					}
				}, 1000);
			});

			if (donnees.indexOf("success") >= 0) {
				let temps = 2
				let interval = setInterval(() => {
					temps = temps - 1;
					if (temps == 0) {
						setInterval(interval);
						window.location = "template.php";
					}
				}, 1000);
			}
			$('.nom-login').val('');
			$('.mdp-login').val('');
		});
		return false;

	});

	/*************** sign-in ********************/
	$(".sign-in").submit(function () {

		var nom = $(".nom-singin").val();
		var mdp = $(".mdp-singin").val();
		var confirme = $(".confirm-singin").val();

		$.post("./php/inscription.php", { nom: nom, mdp: mdp, confirme: confirme }, function (donnees) {
			$('.messages-php').html(donnees).slideDown(function () {
				var temps = 3;
				var interval = setInterval(function () {
					temps = temps - 1;
					if (temps == 0) {
						setInterval(interval);
						$('.messages-php').html(donnees).slideUp();
					}
				}, 1000);
			});

			if (donnees.indexOf("success") >= 0) {
				let temps = 2
				let interval = setInterval(() => {
					temps = temps - 1;
					if (temps == 0) {
						setInterval(interval);
						window.location = "template.php";
					}
				}, 1000);
			}
			$('.nom-singin').val('');
			$('.mdp-singin').val('');
			$(".confirm-singin").val('');
		});
		return false;

	});

	/*************** reset********************/
	$(".reset").submit(function () {

		var nom = $(".nom-reset").val();
		var mdp = $(".mdp-reset").val();
		var confirme = $(".confirm-reset").val();

		$.post("./php/reset.php", { nom: nom, mdp: mdp, confirme: confirme }, function (donnees) {
			$('.messages-php').html(donnees).slideDown(function () {
				var temps = 3;
				var interval = setInterval(function () {
					temps = temps - 1;
					if (temps == 0) {
						setInterval(interval);
						$('.messages-php').html(donnees).slideUp();
					}
				}, 1000);
			});

			if (donnees.indexOf("success") >= 0) {
				let temps = 2
				let interval = setInterval(() => {
					temps = temps - 1;
					if (temps == 0) {
						setInterval(interval);
						window.location = "template.php";
					}
				}, 1000);
			}
			$('.nom-reset').val('');
			$('.mdp-reset').val('');
			$(".confirm-reset").val('');
		});
		return false;

	});


	/************************ Messages **********************/
	$(".form-messages").submit(function () {
		var messages = $(".message").val();

		$.post("./php/send.php", { message: messages }, function (data) {
			recupMessages();
		});
		$(".message").val("");
		return false;
	});

	function recupMessages() {
		$.post("./php/recup.php", function (data) {
			$(".afficher").html(data);
		});
	}

	setInterval(recupMessages, 1000);
});