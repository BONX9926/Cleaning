<?php

	include_once '../../connect.php';
	session_start();
	$return = array();
	$id = $_POST['id'];
	$avatar = $_FILES['avatar']['name'];
// var_dump($_POST);
// var_dump($_FILES);
//  die();
$temp_user = "../img/avatar_profile/";
if(isset($_FILES)) {
	// var_dump($_FILES);
	if ($_FILES["avatar"]['type'] == 'image/png' || $_FILES["avatar"]['type'] == 'image/jpeg') {
		// echo "True";
		if(move_uploaded_file($_FILES["avatar"]["tmp_name"],$temp_user.$_FILES["avatar"]["name"])) {
			// header("location:../index.php");
			$sql = "UPDATE `user_backend` SET `avatar`='{$avatar}' WHERE `id`='{$id}'";
			// echo "True";
			if (mysqli_query($conn,$sql)) {
				$sql = "SELECT * FROM `user_backend` WHERE `id`='{$id}'";
				if ($res = mysqli_query($conn,$sql)) {
					if ($res->num_rows > 0) {
						$row = mysqli_fetch_assoc($res);
						$_SESSION['avatar'] = $row['avatar'];
						$return['status'] = true;
						$return['message'] = "update รูปเรียบร้อยแล้ว";
					} else {
						$return['status'] = false;
						$return['message'] = "Error";
					}
				} else {
					$return['status'] = false;
					$return['message'] = "ไม่สามารถ Update รูปได้";
				}
			} else {

			}
		} else {
			$return['status'] = false;
			$return['message'] = "ย้ายไฟล์ไม่สำเร็จ";
		}

	} else {
		$return['status'] = false;
		$return['message'] = "ไม่มีไฟล์ส่งมา หรือ ชนิดของไฟลืไม่ถุกต้อง";
		// $return['message'] = "ไม่มีไฟล์ส่งมา กรุณาเลือกไฟล์";
	}
} else {
	$return['status'] = false;
	// $return['message'] = "ชนิดของ File ไม่ถูกต้อง";
	$return['message'] = "ไม่มีไฟล์ส่งมา กรุณาเลือกไฟล์";
}

echo json_encode($return);

?>

