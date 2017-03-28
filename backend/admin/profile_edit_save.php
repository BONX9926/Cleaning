<?php
	include_once '../../connect.php';
	session_start();
	$return = array();
	$show_detail = $_POST['data'][0]['value'];
	$fname = $_POST['data'][1]['value'];
	$lname = $_POST['data'][2]['value'];
	$address = $_POST['data'][3]['value'];
	$birthday = $_POST['data'][4]['value'];
	$email = $_POST['data'][5]['value'];
	$phone = $_POST['data'][6]['value'];
	$id = $_POST['data'][7]['value'];
	// echo $show_detail.$fname.$lname.$address.$birthday.$email.$phone;
	if(isset($show_detail) && isset($fname) && isset($lname) && isset($address) && isset($birthday) && isset($email) && isset($phone) && isset($id)) {
		$sql ="UPDATE `user_backend` SET `email`='{$email}',`fname`='{$fname}',`birthday`='{$birthday}',`lname`='{$lname}',`address`='{$address}',`show_detail`='{$show_detail}',`phone`='{$phone}' WHERE `id`='{$id}'";

		if(mysqli_query($conn,$sql)) {

			$sql = "SELECT * FROM `user_backend` WHERE `id`='{$id}'";
			if ($res = mysqli_query($conn,$sql)) {
				if ($res->num_rows > 0) {
					$row = mysqli_fetch_assoc($res);
					$_SESSION['id'] = $row['id'];
					$_SESSION['fname'] = $row['fname'];
					$_SESSION['lname'] = $row['lname'];
					$_SESSION['show_detail'] = $row['show_detail'];
					$_SESSION['address'] = $row['address'];
					$_SESSION['birthday'] = $row['birthday'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['phone'] = $row['phone'];
				}
			}
		}
		$return['status'] = true;
		$return['message'] = 'Update data Success!!!';
	} else {
		$return['status'] = false;
		$return['message'] = 'Isset data';
	}

	echo json_encode($return);
?>