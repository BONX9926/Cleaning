<?php
	// $word = $_POST['word'];
	// var_dump($_POST);
// print "555";
	include_once '../../connect.php';
	$sql_autocomplate = "SELECT * FROM `user_backend` WHERE `status`='M'";
	// $sql_autocomplate = "SELECT * FROM `user_backend` WHERE `status`='M' AND `fname` LIKE '{$word}%'";
	// echo $sql_autocomplate;
	if ($res = mysqli_query($conn,$sql_autocomplate)) {
		if ($res->num_rows > 0) {
			while ($row = mysqli_fetch_assoc($res)) {
				$data[] = $row['fname']." ".$row['lname']." ".$row['id'];
			}
		} else {
			echo "ไม่พบ";
		}
	}
	echo json_encode($data);
?>