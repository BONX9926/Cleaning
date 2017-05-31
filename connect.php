<?php

	$conn = mysqli_connect('localhost','root','','project') or die(mysqli_error($conn));
	mysqli_query($conn,"SET CHARACTER SET utf8") or die(mysqli_error($conn));
?>