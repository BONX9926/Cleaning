<?php
	if (isset($_GET['maid_id']) && isset($_GET['salary_id'])) {
		include_once '../../connect.php';
		$data = array();
		$sql = "SELECT * FROM `salary` WHERE `ref_maid_id`='{$_GET['maid_id']}' AND `salary_id`='{$_GET['salary_id']}' ";
		echo $sql;
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
	} else {
		
	}
?>