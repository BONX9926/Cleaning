<?php
	$return = array();
	if(count($_POST) == 1) {
		include_once '../../connect.php';
		$sql ="DELETE FROM `item` WHERE `item`.`item_id` = {$_POST['item_id']}";
		$return['status'] = true;
		$return['message'] = "ลบข้อมูลเรียบร้อยแล้ว";
	} else {
		$return['status'] = false;
		$return['message'] = "ข้อมูลที่ส่งมาไม่ถูกต้อง";
	}

	echo json_encode($return);
?>