<?php
// array(1) {
//   ["img"]=>
//   array(5) {
//     ["name"]=>
//     string(9) "item1.jpg"
//     ["type"]=>
//     string(10) "image/jpeg"
//     ["tmp_name"]=>
//     string(24) "C:\xampp\tmp\php5F83.tmp"
//     ["error"]=>
//     int(0)
//     ["size"]=>
//     int(9336)
//   }
// }
// array(3) {
//   ["item_name"]=>
//   string(75) "เครื่องดูดฝุ่นอเนกประสงค์"
//   ["quantity_all"]=>
//   string(2) "10"
//   ["item_price"]=>
//   string(2) "30"
// }
	include_once '../../connect.php';
	session_start();
	$return = array();
	$temp_user = "../img/items/";

	if(isset($_POST) && isset($_FILES)) {
		if($_FILES['img']['size'] > 0 ) {
			if ($_POST['item_name'] != '' && $_POST['quantity_all'] != '' && $_POST['item_price'] != '') {
				
				if(move_uploaded_file($_FILES["img"]["tmp_name"],$temp_user.$_FILES["img"]["name"])) {

					$sql = "SELECT `item_name` FROM `item` WHERE `item_name` ='{$_POST['item_name']}' ";
					if ($res = mysqli_query($conn,$sql)) {
						if($res->num_rows > 0) {
							$return['status'] = false;
							$return['message'] = "มีอุปกรณ์นี้ในระบบแล้ว";
						} else {
							$sql = "";
							$sql = "INSERT INTO `item`(`img`, `item_name`, `quantity_all`, `quantity_remain`, `item_price`) VALUES ('{$_FILES['img']['name']}','{$_POST['item_name']}','{$_POST['quantity_all']}','{$_POST['quantity_all']}','{$_POST['item_price']}')";
							if (mysqli_query($conn,$sql)) {
								$return['status'] = true;
								$return['message'] = "เพิ่มข้อมูลเรียบร้อยแล้ว";
							} else {
								$return['status'] = false;
								$return['message'] = "ไม่สามารถเพิ่มข้อมูลได้ กรุณาลองใหม่!!";
								unlink($temp_user.$_FILES["img"]["name"]);
							}
						}
					} else {
						$return['status'] = false;
						$return['message'] = "เกิดความผิดพลาดของระบบ กรุณาลองใหม่!!";
						unlink($temp_user.$_FILES["img"]["name"]);
					}

					
				} else {
					$return['status'] = false;
					$return['message'] = "Upload Fail!!";
				}

			} else {
				$return['status'] = false;
				$return['message'] = "กรุณาตรวจสอบข้อมูล";
			}

		} else {
			$return['status'] = false;
			$return['message'] = "ไม่มีไฟล์รูป";
		}
	} else {
		$return['status'] = false;
		$return['message'] = "รูปแบบข้อมูลไม่ถูกต้อง";
	}

	echo json_encode($return);
?>