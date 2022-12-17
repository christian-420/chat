<?php

session_start();

$conn = new mysqli("localhost", "root", "code123456", "mydata");

if (isset($_SESSION["nom"]) !== "" && (isset($_SESSION["mdp"]) == true)) {
	$nom = $_SESSION["nom"];
} else {
	header("location: index.html");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./assets/css/style.css">
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
	<title>Bombochat</title>
</head>

<body>
	<div class="container-fluid" id="container">
		<div class="row">
			<nav>
				<div class="nav-icon-D">
					<h2 class="demo"></h2>
				</div>
				<div class="main-navlinks">
					<div class="navlinks-container-D">
						<span class="pseudo"> <i class="fas fa-user icon"></i> <?= $nom ?> </span>
						<a href="logout.php" class="deconnexion"> <i class="fas fa-sign-out icon"></i> Deconnexion</a>
					</div>
				</div>
			</nav>
			<div class="content">
				<div class="column">
					<div class="user-table">
						<div class="user-info">
							<div class="user-icon">
								<i class="fas fa-user icons"></i>
							</div>
						</div>
						<div class="user-name">
							<h3 class="info-user"><?= $nom ?></h3>
						</div>
					</div>

					<div class="chat-popup">
						<div class="form-container">
							<form method="post" class="form-messages">
								<h2 class="nav-icon-D">BomboChat</h2>

								<label><b>Message</b></label>
								<textarea placeholder="Ecriver..." class="message"></textarea>

								<button type="submit" class="button">Envoyer</button>
							</form>
						</div>
					</div>
					<button class="open-button">Message</button>
				</div>
				<div class="column-right">
					<div class="contenu" align="center">
						<div class="messages-titre">
							<h3>Messages</h3>
						</div>
						<div class="messages">
							<div>
								<p class="afficher"></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="./assets/js/jquery-3.6.1.min.js"></script>
	<script src="./assets/js/all.js"></script>
	<script src="./assets/js/brands.js"></script>
	<script src="./assets/js/auth.js"></script>
	<script src="./assets/js/chat.js"></script>
</body>

</html>