<?php
	include_once '../../connect.php';
	session_start();
	// var_dump($_POST);exit();
	$return = array();
	$user = $_POST['data'][0]['value'];
	$pass = md5($_POST['data'][1]['value']);
	$fname = $_POST['data'][2]['value'];
	$lname = $_POST['data'][3]['value'];
	$address = $_POST['data'][4]['value'];
	$email = $_POST['data'][5]['value'];
	$phone = $_POST['data'][6]['value'];
	$birthday = $_POST['data'][7]['value'];
	$show_detail = $_POST['data'][8]['value'];

	if(isset($user) && isset($pass) && isset($fname) && isset($lname) && isset($email) && isset($phone) && isset($birthday) && isset($show_detail)) {

		$sql ="INSERT INTO `user_backend`(`user`, `pass`, `email`, `fname`, `birthday`, `lname`, `address`, `show_detail`, `phone`) VALUES ('{$user}','{$pass}','{$email}','{$fname}','{$birthday}','{$lname}','{$address}','{$show_detail}','{$phone}')";
	
		if(mysqli_query($conn,$sql)) {
			$return['status'] = true;
			$return['message'] = "เพิ่มข้อมูลเรียบร้อยแล้ว!!!";
		} else {
			$return['status'] = false;
			$return['message'] = "ไม่สามาถเพิ่มข้อมูลได้";
		}

	} else {
		$return['status'] = false;
		$return['message'] = "ข้อมูลที่ถูกส่งมาไม่ครบ";
	}

	echo json_encode($return);
?>