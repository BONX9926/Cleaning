<?php
	$return = array();
	if (isset($_POST['item_id'])) {
	include_once '../../connect.php';
		$sql = "SELECT `item_id`, `item_name`, `quantity_all`, `item_price` FROM `items` WHERE `item_id` = '{$_POST['item_id']}' ";
		if ($res = mysqli_query($conn,$sql)) {
			if ($res->num_rows > 0) {
				$row = mysqli_fetch_assoc($res);
				$return['data'] = $row;

				$return['status'] = true;
			}
		} else {
			$return['status'] = false;
			$return['message'] = "ไม่สามารถดึงข้อมูลมาได้";	
			// $return['message'] = $sql;	
		}
	} else {
		$return['status'] = false;
		$return['message'] = "error";
	}

	echo json_encode($return);
?>