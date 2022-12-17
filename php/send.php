<?php

session_start();

$nom = $_SESSION["nom"];

$conn = new mysqli("localhost", "root", "code123456", "mydata");

if (isset($_POST["message"]) && !empty($_POST["message"])) {
	$message = $_POST["message"];

	$insert = "INSERT INTO message(nom,messages) VALUES ('$nom', '$message')";
	$conn->query($insert);
}
