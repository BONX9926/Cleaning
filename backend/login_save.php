<?php
	include_once '../connect.php';
	session_start();
	$return = array();
	$user = $_POST['data'][0]['value'];
	$pass = md5($_POST['data'][1]['value']);
	// print $user.$pass;exit;
	if (isset($user) && isset($pass)) {
		$sql = "SELECT * FROM `user_backend` WHERE `user`='{$user}' AND `pass`='{$pass}'";
		if ($res = mysqli_query($conn,$sql)) {
			if ($res->num_rows > 0) {
				$row = mysqli_fetch_assoc($res);
					$_SESSION['login'] = true;
					$_SESSION['id'] = $row['id'];
					$_SESSION['fname'] = $row['fname'];
					$_SESSION['lname'] = $row['lname'];
					$_SESSION['pass'] = $row['pass'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['birthday'] = $row['birthday'];
					$_SESSION['avatar'] = $row['avatar'];
					$_SESSION['phone'] = $row['phone'];
					$_SESSION['address'] = $row['address'];
					$_SESSION['show_detail'] = $row['show_detail'];
					$_SESSION['status'] = $row['status'];
					$_SESSION['items_cart'] = array();
				$return['status'] = true;
				$return['message'] = "login";
				$return['access'] = $row['status'];
			} else {
				$return['status'] = false;
				$return['message'] = "No user pass";
			}
		} else {
			$return['status'] = false;
			$return['message'] = "No user pass";
		}
		
	} else {
		$return['status'] = false;
		$return['message'] = "Isset data";
	}
	echo json_encode($return);
?>