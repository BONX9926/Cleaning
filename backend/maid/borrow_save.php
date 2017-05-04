<?php
	session_start();
	// var_dump($_POST);
	// var_dump($_SESSION);
	include_once '../../connect.php';
	if ($_POST['event'] == "send") {
		echo "Send";
	} else {
		echo "string";
	}
?>