<?php
	$return = array();
	include_once '../connect.php';
	$sql = "SELECT `size_id`, `size_name` FROM `size_area`";
	if($res = mysqli_query($conn,$sql)) {
		$return['status'] = true;
		while($row = mysqli_fetch_assoc($res)){
			$return['data'][] = $row;			
		}
	} else {
		$return['status'] = false;
		$return['message'] = "ไม่สามารถเรียกข้อมูลมาได้";
	}

	echo json_encode($return);
?>