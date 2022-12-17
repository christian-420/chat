<?php

session_start();

$conn = new mysqli("localhost", "root", "code123456", "mydata");

if (isset($_POST["nom"], $_POST["mdp"]) && !empty($_POST["nom"]) && !empty($_POST["mdp"])) {
	$nom = htmlspecialchars($_POST["nom"]);
	$mdp = htmlspecialchars($_POST["mdp"]);
	$_SESSION["mdp"] = $_POST["mdp"];
	$_SESSION["nom"] = $_POST["nom"];


	$select = "SELECT * FROM user WHERE nom= '$nom' AND mdp= '$mdp'";
	$result = $conn->query($select);

	if ($result->num_rows > 0) {
		while ($users = $result->fetch_assoc()) {
			echo "<span class=' messages-php messages-success'>Succèes</span>";
		}
	} elseif (isset($_SESSION["mdp"]) !== $mdp) {
		echo "<span class=' messages-php messages-error'>Mot de passe incorrect</span>";
	}
} elseif (empty($_POST["nom"])) {
	echo "<span class=' messages-php messages-error'>Saisisser votre nom d'utilisateur </span>";
} elseif (empty($_POST["mdp"])) {
	echo "<span class=' messages-php messages-error'>Saisisser votre mot de passe </span>";
}
