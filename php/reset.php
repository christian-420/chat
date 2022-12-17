<?php
session_start();

$conn = new mysqli("localhost", "root", "code123456", "mydata");



if (isset($_POST["nom"], $_POST["mdp"], $_POST["confirme"]) && !empty($_POST["nom"])) {
  $nom = htmlspecialchars($_POST["nom"]);
  $_SESSION["nom"] = $nom;

  $select = "SELECT * FROM user WHERE nom= '$nom'";
  $result = $conn->query($select);

  if ($result->num_rows > 0) {
    while ($user = $result->fetch_assoc()) {

      if (!empty($_POST["mdp"]) && !empty($_POST["confirme"])) {
        $newmdp = $_POST["mdp"];
        $newconfirme = $_POST["confirme"];

        if (strlen($_POST["mdp"]) < 6) {
          echo "<span class=' messages-php messages-error'>Mot de passe doit être supérieur à 6 caractères </span>";
        } else {
          $mdf = "UPDATE user SET mdp= '$newmdp', confirme= '$newconfirme' WHERE nom= '$nom'";
          if ($newmdp == $newconfirme && $conn->query($mdf) === TRUE) {
            $_SESSION["mdp"] = $newmdp;
            echo "<span class=' messages-php messages-success'>Succèes</span>";
          } else {
            echo "<span class=' messages-php messages-error'>Mot de passe invalide</span>";
          }
        }
      } elseif (empty($_POST["mdp"])) {
        echo "<span class=' messages-php messages-error'>Saisisser votre mot de passe </span>";
      } elseif (empty($_POST["confirme"])) {
        echo "<span class=' messages-php messages-error'>Veuillez connfirmer le mot de passe </span>";
      }
    }
  } else {
    echo "<span class=' messages-php messages-error'>Aucun compte trouvé </span>";
  }
} else {
  echo "<span class=' messages-php messages-error'>Veuillez compléter le Nom d'utilisateur </span>";
}
