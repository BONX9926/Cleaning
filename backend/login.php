<?php
session_start();
	// var_dump($_POST);
	if ($_POST['user'] != "" && $_POST['pass'] != "")  {
		$pass = md5($_POST['pass']);
		include_once '../connect.php';
		$sql = "SELECT * FROM `user_backend` WHERE `user`='{$_POST['user']}' AND `pass`='{$pass}'";
		// echo $sql;die();
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
					// var_dump($row);
					if($_SESSION['status'] =="A"){
						header("Location:admin/index.php");
					} else if($_SESSION['status'] =="M") {
						header("Location:maid/index.php");
					}
				} else {
					header("Location:index.php?err=2");
				}
			} else {
				echo "SQL ERROR";
			}
				// $return['status'] = true;
				// $return['message'] = "login";
				// $return['access'] = $row['status'];
	} else {
		header("Location:index.php?err=1");
	}
?>