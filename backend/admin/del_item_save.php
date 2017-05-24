<?php
	$return = array();
	if(count($_POST) == 1) {
		include_once '../../connect.php';
		$sql ="DELETE FROM `items` WHERE `item_id` = '{$_POST['item_id']}' ";
		if (mysqli_query($conn,$sql)) {
			$return['status'] = true;
			$return['message'] = "ลบข้อมูลเรียบร้อยแล้ว";
		} else {
			$return['status'] = false;
			$return['message'] = "ไม่สามารถลบข้อมูลได้";
		}
			// $return['status'] = true;
			// $return['message'] = "ลบข้อมูลเรียบร้อยแล้ว";
		
	} else {
		$return['status'] = false;
		$return['message'] = "ข้อมูลที่ส่งมาไม่ถูกต้อง";
	}

	echo json_encode($return);
?>