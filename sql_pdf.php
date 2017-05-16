<?php
session_start();
	include_once 'connect.php';
	include_once 'lib/php/public_function.php';
	// var_dump($_GET);
	// var_dump($_SESSION);
	// print $_GET['num'];
	// print $_SESSION['uid'];
	$sql = "SELECT * FROM `booking_table` WHERE `booking_id`='{$_GET['num']}' AND `ref_booking_uid`='{$_SESSION['uid']}' limit 1";
	if($res = mysqli_query($conn,$sql)) {
		if($res->num_rows > 0) {
			$data = mysqli_fetch_assoc($res);
			// var_dump($data);
			// $sql = "";
			$sql1 = "SELECT * FROM `booking_detail` WHERE `booking_id`= '{$data['booking_id']}' ";
			// $sql1 = "SELECT * FROM `booking_detail` INNER JOIN `user_backend` ON booking_detail.ref_maid = user_backend.id WHERE `id`= '{$data['booking_id']}'";
			if ($res1 = mysqli_query($conn,$sql1)) {
				//loop
				while ($data1 = mysqli_fetch_assoc($res1)) {
					$arr_maid[] = $data1['ref_maid'];
				}
				// var_dump($arr_maid);die();

				foreach ($arr_maid as $key => $value) {
					$sql2 = "SELECT `fname`, `lname` FROM `booking_detail` INNER JOIN `user_backend` ON booking_detail.ref_maid = user_backend.id WHERE `id`= '{$value}' ";
					if($res2 = mysqli_query($conn,$sql2)) {
						//loop
						$data2 = mysqli_fetch_assoc($res2);
							// var_dump($data2);
						$arr_Nmaid[] = $data2;
						// var_dump($arr_Nmaid);die();
					} else {
						echo "SQL2 ERROR";
					}
				}
				// var_dump(($row));

			} else {
				echo "SQL1 ERROR";
			}
			//SQL3 
			$sql3 = "SELECT `size_id`, `size_name`, `size_pirce` FROM `size_area` INNER JOIN `booking_table`ON (size_area.size_id = booking_table.area_size) WHERE `size_id`='{$data['area_size']}'";
			if ($res3 = mysqli_query($conn,$sql3) ) {
				$arr_size = mysqli_fetch_assoc($res3);
				// var_dump($data3);
				// $arr_size คือ บนาดพื้นที่
			} else {
				echo "SQL3 ERROR";
			}

			$sql4 = "SELECT items.item_name,booking_items.item_price FROM `booking_table` INNER JOIN booking_items ON(booking_table.booking_id=booking_items.booking_id) INNER JOIN items ON booking_items.item_name = items.item_id WHERE booking_table.booking_id ='{$data['booking_id']}' ";
			if ($res4 = mysqli_query($conn,$sql4)) {
				while ($data4 = mysqli_fetch_assoc($res4)) {
					$arr_item[] = $data4;
				}
				// $arr_item[] คือ อุปกรณ์
				// var_dump($arr_item);
				// echo implode(" ", $arr_item);
			} else {
				echo "SQL4 ERROR";
			}

		} else {
			header("Location:error.php");
		}
	} else {
		echo "SQL ERROR";
	}
?>