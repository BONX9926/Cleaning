<?php
 // var_dump($_POST);
 if (isset($_POST['numbin'])) {
 	include_once '../../connect.php';
 	$sql = "SELECT  `file` FROM `payment` WHERE `num_bin`='{$_POST['numbin']}' LIMIT 1 ";
 	if ($res = mysqli_query($conn,$sql)) {
 		$row = mysqli_fetch_assoc($res);
 		echo $row['file'];
 	}
 } else {
 	echo "Data no correct";
 }
?>