<?php
	$return = array();
	
	if (isset($_POST['date']) && isset($_POST['package'])) {
		include_once '../connect.php';
		include_once '../lib/php/public_function.php';
		if($_POST['package'] == 'day'){
				$work_date 	= $_POST['date'];
				$package 	= $_POST['package'];

				$work_date = revert_date($work_date);
				$timestsmpone_day = 84600;

				$sql = "SELECT booking_detail.ref_maid FROM `booking_table` INNER JOIN booking_detail ON (booking_table.booking_id=booking_detail.booking_id) WHERE `start_work` BETWEEN {$work_date} AND ({$work_date}+({$timestsmpone_day}-1))";
				// echo $sql;
				if($res = mysqli_query($conn,$sql)) {
					while ($row = mysqli_fetch_assoc($res))	{
						$maid_id[] = $row['ref_maid'];
					}
						//var_dump($maid_id);

					$sql_showmaid = "SELECT `fname`,`lname`,`avatar`,`phone`,`show_detail` FROM `user_backend` WHERE `status` ='M' AND ";

					foreach ($maid_id as $key => $value) {
						$patt[] = "`id` != '{$value}'";
					}
					$pattFull = implode(' AND ', $patt);
					$sql_showmaid .= $pattFull;
					if ($res2 = mysqli_query($conn,$sql_showmaid)) {
						$return['status'] = true;
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
		} elseif($_POST['package'] == 'week') {
			echo "Week";
		} else {
			$return['status'] = false;
		}


	} else {
		$return['status'] = false;
	}

	echo json_encode($return);
?>