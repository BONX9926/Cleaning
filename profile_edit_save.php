<?php
	include_once 'connect.php';
	session_start();
	$return = array();
	$uid = $_POST['data'][0]['value'];
	$fname = $_POST['data'][1]['value'];
	$lname = $_POST['data'][2]['value'];
	$phone = $_POST['data'][3]['value'];
	// print $uid.$fname.$lname.$phone;
	if(isset($uid) && isset($fname) && isset($lname) && isset($phone)) {
		$sql = "UPDATE `user_detail` SET `fname`='{$fname}',`lname`='{$lname}',`phone`='{$phone}' WHERE `uid`='{$uid}'";
		// echo $sql;exit;
		
		if(mysqli_query($conn,$sql)) {

			$sql = "SELECT * FROM `user_detail` WHERE `uid`='{$uid}'";
			if ($res = mysqli_query($conn,$sql)) {
				if ($res->num_rows > 0) {
					$row = mysqli_fetch_assoc($res);
					$_SESSION['fname'] = $row['fname'];
					$_SESSION['lname'] = $row['lname'];
					$_SESSION['phone'] = $row['phone'];
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