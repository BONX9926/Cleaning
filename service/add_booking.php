<?php
	// var_dump($_POST);
	$return = array();

	if (isset($_POST['arr_maid']) && isset($_POST['user_id']) && isset($_POST['date'])) {
			include_once '../connect.php';
			include_once '../lib/php/public_function.php';
			$date = revert_date($_POST['date']);
			$one_day = ($date*1) + (86400-1);

		$sql ="SELECT * FROM `booking_table` WHERE `ref_booking_uid` = '{$_POST['user_id']}' AND `status_id` ='false' ";
		if ($res = mysqli_query($conn,$sql)) {
			if($res->num_rows > 0) {
				$return['status'] = false;
				$return['message'] = "คุณมีรายการจองที่ค้างชำระอยู่";
			} else {
				//pass
				$sql = "";
				$sql = "INSERT INTO `booking_table`(`ref_booking_uid`, `start_work`, `end_work`) VALUES ('{$_POST['user_id']}','{$date}','{$one_day}')";
				if(mysqli_query($conn,$sql)) {
					$sql = "";
					$sql ="SELECT `booking_id` FROM `booking_table` WHERE `ref_booking_uid` = '{$_POST['user_id']}' AND `status_id` ='false' limit 1";
					$res = null;
					if ($res = mysqli_query($conn,$sql)) {
						$booking_id = mysqli_fetch_assoc($res)['booking_id'];
						// echo $booking_id;
						foreach ($_POST['arr_maid'] as $key => $value) {
							$arr_row[] = "('{$booking_id}','{$value}')";
						}
						
						$sql = "";
						$sql = "INSERT INTO `booking_detail`(`booking_id`, `ref_maid`) VALUES ".implode(' , ',$arr_row);
						if (mysqli_query($conn,$sql)) {
							$return['status'] = true;
							$return['message'] = "ยืนยันการจองเสร็จเรียบร้อยแล้ว กรุณาชำระเงิน ภายใน 24 ชม.";
						} else {
							$sql_del ="DELETE FROM `booking_table` WHERE `booking_table`.`booking_id` = '{$booking_id}'";
							if(mysqli_query($conn,$sql_del)) {
								$return['status'] = false;
								$return['message'] = "ไม่สามาถทำการจองได้ และระบบทำการยกเลิก หมายเลขการจองเรียบร้อย";
							}
						}
					} else {
						$sql_del ="DELETE FROM `booking_table` WHERE `booking_table`.`booking_id` = '{$booking_id}'";
						if(mysqli_query($conn,$sql_del)) {
							$return['status'] = false;
							$return['message'] = "ไม่สามาถทำการจองได้ และระบบทำการยกเลิก หมายเลขการจองเรียบร้อย";
						}
					}
				} else {
					$return['status'] = false;
					$return['message'] = "ไม่สามาถสร้างหมายเลขการจองได้";

				}
			}
		} else {
			$return['status'] = false;
			$return['message'] = "ไม่สามาถสร้างหมายเลขการจองได้";
		}

	} else {
		$return['status'] = false;
		$return['message'] = "รูปแบบข้อมูลไม่ถูกต้อง";
	}

	echo json_encode($return);
?>