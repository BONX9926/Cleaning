<?php
	var_dump($_POST);
	if(isset($_POST['uid']) && isset($_POST['maid_id']) && isset($_POST['point']) && isset($_POST['comment'])) {
		include_once 'connect.php';
		$sql="INSERT INTO `comment_point`(`uid`, `maid_id`, `point`, `comment`) VALUES ('{$_POST['uid']}','{$_POST['maid_id']}','{$_POST['point']}','{$_POST['comment']}')";
		if (mysqli_query($conn,$sql)) {
			header("location:jong_detail.php");
		} else {
			echo "SQL ERROR";
		}
	} else {
		echo "ข้อมูลไม่ถูกต้อง";
	}
?>