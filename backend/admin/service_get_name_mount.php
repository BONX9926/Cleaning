<?php
// array(1) {
//   ["data"]=>
//   array(2) {
//     [0]=>
//     array(2) {
//       ["name"]=>
//       string(9) "startDate"
//       ["value"]=>
//       string(0) ""
//     }
//     [1]=>
//     array(2) {
//       ["name"]=>
//       string(7) "endDate"
//       ["value"]=>
//       string(0) ""
//     }
//   }
// }
	// var_dump($_POST['data'][0]);
$return = array();
if ($_POST['data'][0]['value'] !="" && $_POST['data'][1]['value'] !="") {
	include_once '../../lib/php/public_function.php';
	$startDate = revert_date($_POST['data'][0]['value']);
	$endDate = revert_date($_POST['data'][1]['value']);
	include_once '../../connect.php';
	$sql_sel_name = "SELECT DISTINCT concat(`user_backend`.`fname`, ' ',`user_backend`.`fname`) as maidname , concat(`user_backend`.`id`) as maid_id , `user_backend`.`avatar` FROM `booking_table`INNER JOIN `booking_detail`ON booking_table.booking_id = booking_detail.booking_id INNER JOIN `user_backend`ON booking_detail.ref_maid = user_backend.id WHERE booking_table.work_status ='true' AND `end_work` >='{$startDate}' AND `end_work` <= '{$endDate}'";
	if ($res = mysqli_query($conn,$sql_sel_name)) {
		if ($res->num_rows > 0) {
			$data = array();
			while ($row = mysqli_fetch_assoc($res)) {
				$data[] = $row;
					
			}
			$return['startDate'] = $startDate;
			$return['endDate'] = $endDate;
			// array_push($data[startDate], "startDate" => $startDate);
			// array_push($data, "endDate" => $endDate);
			$return['status'] = true;
			$return['message'] = "OK";
			$return['data'] = $data;
		} else {
			$return['status'] = false;
			$return['message'] = "ไม่พบ";
		}

	} else {
		$return['status'] = false;
		$return['message'] = "SQL ERROR";
	}
} else {
	$return['status'] = false;
	$return['message'] = "กรุณากรอกข้อมูลให้ครบ";
}
echo json_encode($return);
?>