<?php

$conn = new mysqli("localhost", "root", "code123456", "mydata");

$recup_messages = ("SELECT * FROM message ORDER by id DESC");

$result = $conn->query($recup_messages);

if ($result->num_rows > 0) {
	while ($all = $result->fetch_assoc()) {
?>
		<span> <b><?php echo $all["nom"]; ?></b> </span> <br>
		<span> <?php echo $all["messages"]; ?> </span> <br>
		<hr>
<?php
	}
}
