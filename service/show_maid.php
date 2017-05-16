<?php
	$return = array();
	sleep(1);
	if (isset($_POST['date'])) {
		include_once '../connect.php';
		include_once '../lib/php/public_function.php';
		// if($_POST['package'] == 'day'){
				$work_date 	= $_POST['date'];
				// $package 	= $_POST['package'];

				$work_date = revert_date($work_date);
				$timestsmpone_day = 84600;
				$maid_id = array();
				$sql = "SELECT booking_detail.ref_maid FROM `booking_table` INNER JOIN booking_detail ON (booking_table.booking_id=booking_detail.booking_id) WHERE `start_work` BETWEEN {$work_date} AND ({$work_date}+({$timestsmpone_day}-1))";
				// echo $sql;
				if($res = mysqli_query($conn,$sql)) {

					if(mysqli_num_rows($res) > 0 ){
						while ($row = mysqli_fetch_assoc($res))	{
							$maid_id[] = $row['ref_maid'];
						}
						$sql_showmaid = "SELECT `id`,`fname`,`lname`,`avatar`,`phone`,`show_detail` FROM `user_backend` WHERE `status` ='M'  AND";
						foreach ($maid_id as $key => $value) {
							$patt[] = "`id` != '{$value}'";
						}
						$pattFull = implode(' AND ', $patt);
						$sql_showmaid .= $pattFull;
					} else {
						$sql_showmaid = "SELECT `id`,`fname`,`lname`,`avatar`,`phone`,`show_detail` FROM `user_backend` WHERE `status` ='M' ";
					}
					

					if ($res2 = mysqli_query($conn,$sql_showmaid)) {
						$return['status'] = true;
						$return['date_th'] = date_thai($work_date);
						$return['date_time'] = $work_date;
						while ($data = mysqli_fetch_assoc($res2)) {
							$return['data'][] = $data;
						}
						// $data_maid = mysqli_fetch_assoc($res2);
					} else {
						$return['status'] = false;
					}

				} else {
					$return['status'] = false;
				}
		// } else if($_POST['package'] == 'week') {
			// echo "Week";
		// } else {
		// 	$return['status'] = false;
		// }


	} else {
		$return['status'] = false;
	}

	echo json_encode($return);
?>