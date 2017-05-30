<?php
	if (isset($_POST['maid_id']) && isset($_POST['startDate']) && isset($_POST['endDate'])) {
		include_once '../../connect.php';
		include_once '../../lib/php/public_function.php';
		$sD = revert_date($_POST['startDate']);
		$eD = revert_date($_POST['endDate']);
		$data = array();
		$sql = "SELECT * FROM `salary` WHERE `ref_maid_id`='{$_POST['maid_id']}' AND `startMonth`>='{$sD}' AND `endMonth`<='{$eD}' ";
		if($res = mysqli_query($conn,$sql)){
			if ($res->num_rows > 0) {
				while ($row = mysqli_fetch_assoc($res)) {
					$data[] = $row;
				}
			} else {
				echo "string";
			}
		} else {
			echo "SQL ERROR";
		}
	}
?>