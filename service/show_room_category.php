<?php
	$return = array();
	include_once '../connect.php';
	$sql = "SELECT * FROM `room_category`";

	if ($res = mysqli_query($conn,$sql)) {
		$return['status'] = true;
		while ($row = mysqli_fetch_assoc($res)) {
			$return['data'][] = $row;
		}
	} else {
		$return['status'] = false;
		$return['message'] = "ไม่สามารถเรียกข้อมูลได้";
	}

	echo json_encode($return);
?>