<?php
// var_dump($_POST);
	include_once 'connect.php';
	session_start();
	$return = array();
	$uid = $_POST['data'][0]['value'];
	$lat = $_POST['data'][1]['value'];
	$lng = $_POST['data'][2]['value'];
	$fname = $_POST['data'][3]['value'];
	$lname = $_POST['data'][4]['value'];
	$phone = $_POST['data'][5]['value'];
	// print $phone;exit;
	$address = $_POST['data'][6];

	if(isset($uid) && isset($lat) && isset($lng) && isset($fname) && isset($lname) && isset($phone) && isset($address)) {

		$sql = "INSERT INTO `user_detail`(`uid`, `fname`, `lname`, `phone`, `address`, `lat`, `lng`) VALUES ('{$uid}','{$fname}','{$lname}','{$phone}','{$address}','{$lat}','{$lng}')";
		if(mysqli_query($conn,$sql)) {
			$sql = "SELECT * FROM user_detail WHERE uid='{$uid}' ";
			if($res = mysqli_query($conn,$sql)) {
				if($res->num_rows > 0) {
					$row = mysqli_fetch_assoc($res);
					$_SESSION['fname'] = $row['fname'];
					$_SESSION['lname'] = $row['lname'];
					$_SESSION['phone'] = $row['phone'];
					$_SESSION['address'] = $row['address'];
					$_SESSION['lat'] = $row['lat'];
					$_SESSION['lng'] = $row['lng'];
				}
			}
			$return['status'] = true;
			$return['message'] = "update data Success!";
		} else {
			$return['status'] = false;
			$return['message'] = "update data Error!";
		}
		
	} else {
		$return['status'] = false;
		$return['message'] = "Not Isset data!";
	}

	echo json_encode($return);
?>