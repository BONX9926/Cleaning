<?php
session_start();
// var_dump($_POST);
if (check_pass($_POST['password'])) {
	if ($_POST['event'] = "update_status_work") {
		// echo "string";
		$info = $_POST['info'];
		$status = explode(":", explode(",",$info)[0])[1];
		$numbin = explode(":", explode(",", $info)[1])[1];
		include_once '../../connect.php';
		$sql = "UPDATE `booking_table` SET `work_status`='{$status}' WHERE `booking_id`='{$numbin}' ";
		// echo $sql;
		if (mysqli_query($conn,$sql)) {
			echo "เปลี่ยนสถานะเรียบร้อยแล้ว";
		}
	} else {
		echo "ERROR";
	}
} else {
	echo "Password ไม่ถูกต้อง";
}

function check_pass($password){
	if(md5($password) === $_SESSION['pass']){
			return  true;
	}else{
			return  false;
	}
}
?>