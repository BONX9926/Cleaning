<?php
// array(4) {
//   ["item_id"]=>
//   string(6) "000001"
//   ["item_name"]=>
//   string(75) "เครื่องดูดฝุ่นอเนกประสงค์"
//   ["quantity_all"]=>
//   string(2) "30"
//   ["item_price"]=>
//   string(2) "30"
// }
// array(1) {
//   ["img"]=>
//   array(5) {
//     ["name"]=>
//     string(0) ""
//     ["type"]=>
//     string(0) ""
//     ["tmp_name"]=>
//     string(0) ""
//     ["error"]=>
//     int(4)
//     ["size"]=>
//     int(0)
//   }
// }
$return = array();
$temp_files = "../img/items/";
	if(count($_POST) == 4) {
		$status = false;
		include_once '../../connect.php';
		// $sql = "SELECT  `quantity_all` FROM `items` WHERE `item_id`='{$_POST['item_id']}' ";

		// if ($res = mysqli_query($conn,$sql)) {
		// 	$quantity_all = mysqli_fetch_assoc($res)['quantity_all'];
		// }
		if ($_FILES['img']['size'] > 0) {
			if(move_uploaded_file($_FILES["img"]["tmp_name"],$temp_files.$_FILES["img"]["name"])) {
				$status = true;
				$sql = "UPDATE `item` SET `img`='{$_FILES['img']['name']}',`item_name`='{$_POST['item_name']}',`quantity_remain`=`quantity_remain`+'{$_POST['quantity_new']}',`quantity_all`=`quantity_all`+'{$_POST['quantity_new']}',`item_price`='{$_POST['item_price']}' WHERE `item_id`='{$_POST['item_id']}' ";
				// if(check_remain($_POST['quantity_all'],$quantity_all)) {
					if (mysqli_query($conn,$sql)) {

						$return['status'] = true;
						$return['message'] = "แก้ไขข้อมูลเรียบร้อยแล้ว";
					} else {
						$return['status'] = false;
						$return['message'] = "ผิดพลาด ไม่สามารถแก้ไขข้อมูลได้";
					}
				// } else {
				// 	$return['status'] = false;
				// 	$return['message'] = "จำนวนทั้งหมดน้อยกว่าคงเหลือ";
				// }
			// }
			} 
		}else {
			$sql = "UPDATE `items` SET `item_name`='{$_POST['item_name']}',`quantity_remain`=`quantity_remain`+'{$_POST['quantity_new']}',`quantity_all`=`quantity_all`+'{$_POST['quantity_new']}',`item_price`='{$_POST['item_price']}' WHERE `item_id`='{$_POST['item_id']}' ";
			// if(check_remain($_POST['quantity_all'],$quantity_remain)) {
				if (mysqli_query($conn,$sql)) {

					$return['status'] = true;
					$return['message'] = "แก้ไขข้อมูลเรียบร้อยแล้ว";
				} else {
					$return['status'] = false;
					$return['message'] = "ผิดพลาด ไม่สามารถแก้ไขข้อมูลได้";
				}
			// } else {
			// 	$return['status'] = false;
			// 	$return['message'] = "จำนวนทั้งหมดน้อยกว่าคงเหลือ";
			// }
		}
}
echo json_encode($return);


	// function check_remain($quantity_all, $quantity_remain) {
	// 	if (($quantity_all*1) < ($quantity_remain*1)) {
	// 		return false;
	// 	} else {
	// 		return true;
	// 	}
	// }
?>