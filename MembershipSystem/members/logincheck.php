<?php
	session_start();

	if (!isset($_SESSION["email"]) || !isset($_SESSION["loggedIn"])) {
			header("Location: login.php");
			exit();
	}
?>      