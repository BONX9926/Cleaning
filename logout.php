<?php
	session_start();
	session_destroy();
	// echo "Log out Success";
	header("Location: login.php");

?>