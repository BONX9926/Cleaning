<?php
	include_once 'connect.php';
	session_start();
	$return = array();
	$uid = $_POST['data'][0]['value'];
	$lat = $_POST['data'][1]['value'];
	$lng = $_POST['data'][2]['value'];
	$address = $_POST['data'][3]['value'];
	if(isset($uid) && isset($lat) && isset($lng) && isset($address)) {
		$sql = "UPDATE `user_detail` SET `lat`='{$lat}',`lng`='{$lng}',`address`='{$address}' WHERE `uid`='{$uid}'";
		// echo $sql;exit;
		
		if(mysqli_query($conn,$sql)) {

			$sql = "SELECT * FROM `user_detail` WHERE `uid`='{$uid}'";
			if ($res = mysqli_query($conn,$sql)) {
				if ($res->num_rows > 0) {
					$row = mysqli_fetch_assoc($res);
					$_SESSION['lat'] = $row['lat'];
					$_SESSION['lag'] = $row['lng'];
					$_SESSION['address'] = $row['address'];
				}
			}
		}
			$return['status'] = true;
			$return['message'] = "Update data";
	} else {
		$return['status'] = false;
		$return['message'] = "Error";
	}
	
	echo json_encode($return);
?>