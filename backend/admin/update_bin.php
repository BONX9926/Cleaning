<?php
	// var_dump($_POST);
	$return = array();
	if(isset($_POST['status_id']) && isset($_POST['id'])) {
		include_once '../../connect.php';
		$sql = "UPDATE `booking_table` SET `status_id`='{$_POST['status_id']}' WHERE `booking_id`='{$_POST['id']}' ";
		// echo $sql;
		if (mysqli_query($conn,$sql)) {
			$return['status'] = true;
			$return['message'] = "เปลี่ยนสถานะเรียบร้อยแล้ว";
		} else {
			$return['status'] = false;
			$return['message'] = "ไม่สามารถเปลี่ยนสถานะได้";
		}
	} else {
		$return['status'] = false;
		$return['message'] = "ข้อมูลไม่ถูกต้อง";
	}

	echo json_encode($return);
?>