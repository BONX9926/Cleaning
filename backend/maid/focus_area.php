<?php
	// var_dump($_POST);
	$return = array();
	if(isset($_POST["book_id"])) {
		include_once '../../connect.php';
		$sql = "SELECT * FROM `booking_comment` WHERE `booking_id` ='{$_POST["book_id"]}' limit 1 ";
		if ($res = mysqli_query($conn,$sql)) {
			if (mysqli_num_rows($res) > 0) {
				$row = mysqli_fetch_assoc($res);
				$return['data'] =$row;
				echo json_encode($return);
			} else {
				echo "null";
			}
			// var_dump($row);
		} else {
			echo "SQL ERROR";
		}
	} else {
		echo "false";
	}

?>