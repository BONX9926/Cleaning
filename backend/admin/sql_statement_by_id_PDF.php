<?php
	if (isset($_POST['maid_id']) && isset($_POST['salary_id'])) {
		include_once '../../connect.php';
		$data1 = array();
		$data2 = array();
		$sql = "SELECT * FROM `salary` WHERE `ref_maid_id`='{$_POST['maid_id']}' AND `salary_id`='{$_POST['salary_id']}' ";
		// echo $sql;
		if($res = mysqli_query($conn,$sql)){
			if ($res->num_rows > 0) {
				while ($row = mysqli_fetch_assoc($res)) {
					$data1[] = $row;
				}
				$sql_detailMaid = "SELECT `fname`, `lname`, `address`, `phone` FROM `user_backend` WHERE  `id`='{$_POST['maid_id']}'";
				if ($res1 = mysqli_query($conn,$sql_detailMaid)) {
					if ($res1->num_rows >0) {
						while ($row1 = mysqli_fetch_assoc($res1)) {
							$data2[] = $row1;
						}
					}else {
						echo "ไม่พบข้อมูล";
					}
				} else {
					echo "sql_detailMaid error";
				}
			} else {
				echo "ไม่พบข้อมูล";
			}
		} else {
			echo "SQL ERROR";
		}
	} else {

	}
?>