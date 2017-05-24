<?php 
	// var_dump($_POST);
	$return = array();
	if(isset($_POST['num_bin'])) {	
		include_once '../../connect.php';
		//ลบเลขที่บิล
		$sql="DELETE FROM `booking_table` WHERE `booking_table`.`booking_id` ='{$_POST['num_bin']}' ";
		if (mysqli_query($conn,$sql)) {
			//ลบรายการแม่บ้าน
			$sql1="DELETE FROM `booking_detail` WHERE `booking_id`='{$_POST['num_bin']}' ";
			if (mysqli_query($conn,$sql1)) {
				//ลบรายการห้อง
				$sql2="DELETE FROM `booking_rooms` WHERE `booking_id`='{$_POST['num_bin']}' ";
				if (mysqli_query($conn,$sql2)) {
					//ลบอุปกรณ์
					$sql3="DELETE FROM `booking_items` WHERE `booking_id`='{$_POST['num_bin']}'";
					if (mysqli_query($conn,$sql3)) {
						//ลบเน้นจุดที่ทำความสะอาด
						$sql4="DELETE FROM `booking_comment` WHERE `booking_id`='{$_POST['num_bin']}'";
						if (mysqli_query($conn,$sql4)) {
							$return['status'] = true;
							$return['message'] = "ลบบิลเรียบร้อยแล้ว";
						} else {
							$return['status'] = false;
							$return['message'] = "ลบรายการเน้นจุดที่ทำความสะอาดไม่ได้";							
						}
					} else {
						$return['status'] = false;
						$return['message'] = "ลบรายการอุปกร์ไม่ได้";
					}
				} else {
					$return['status'] = false;
					$return['message'] = "ลบรายการห้องไม่ได้";
				}
			} else {
				$return['status'] = false;
				$return['message'] = "ลบรายการแม่บ้านไม่ได้";
			}
		} else {
			$return['status'] = false;
			$return['message'] = "ลบบิลไม่ได้";
		}
		// $return['status'] = true;
		// $return['message'] = "ลบบิลเรียบร้อยแล้ว";
	} else {
		$return['status'] = false;
		$return['message'] = "การส่งข้อมูลไม่ถูกต้อง";

	}
	echo json_encode($return);
?>