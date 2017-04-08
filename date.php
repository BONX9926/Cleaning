<?php
	include_once 'lib/php/public_function.php';
	// error_reporting(0);
	echo convert_date($_GET['f1']);
	echo "<br>";
	echo revert_date($_GET['f2']);
	echo "<br>";
	echo date_thai(time());
?>