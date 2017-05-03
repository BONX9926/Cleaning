<?php
	// var_dump($_POST);
	session_start();
	// $return = array();
	if (isset($_POST['data'][0]['value']) != "") {
		include_once '../../connect.php';
		$sql = "SELECT * FROM `items` WHERE `item_id`='{$_POST['data'][0]['value']}' ";
		if ($res = mysqli_query($conn,$sql)) {
			$row = mysqli_fetch_assoc($res);
			echo "555";
			// $_SESSION[''] =
		} else {
			// SQL ERROR
			echo "SQL ERROR";
		}
	} else {
		$return['status'] = false;
		$return['message'] = "ข้อมูลไม่ถูกต้อง";
	}
	// echo json_encode($return);
?>