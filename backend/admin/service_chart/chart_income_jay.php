<?php
	include_once '../../../connect.php';
	$config = parse_ini_file("../../config/config.ini");

	$array_m = array(
		'01',
		'02',
		'03',
		'04',
		'05',
		'06',
		'07',
		'08',
		'09',
		'10',
		'11',
		'12'
	);

$json_box = array();

$array_income = array();
$array_jay = array();
$array_income['name'] = "รายรับ";
$array_jay['name'] = "รายจ่าย";
	$price_maid = $config['price_maid'];
foreach ($array_m as $key => $m) {
	$start = strtotime("01-{$m}-2017");

	$end = strtotime("last day of this month",strtotime("01-{$m}-2017"));
	
	// echo ($key+1)." ".$start." ".$end."<br>";

	$sql_income = "SELECT 
	
		COUNT(`booking_detail`.`ref_maid`)*{$price_maid} +
		SUM(`booking_rooms`.`room_price`) +
		SUM(`price_area`) +
		SUM(`booking_items`.`item_price`) as sums 
	
	FROM `booking_table` 
	INNER JOIN `booking_detail` ON booking_table.booking_id = booking_detail.booking_id
	INNER JOIN `booking_rooms`ON `booking_table`.`booking_id` = `booking_rooms`.`booking_id`
	LEFT JOIN `booking_items`ON `booking_table`.`booking_id` = `booking_items`.`booking_id`
	WHERE booking_table.status_id ='true' AND `booking_table`.`start_work` >='{$start}' AND `booking_table`.`end_work`<='{$end}'; ";
	
	if($res = mysqli_query($conn,$sql_income)){
		$row = mysqli_fetch_assoc($res);
		$array_income['data'][] = ($row['sums']!== null) ? $row['sums']*1 : 0;
	}

	$sql_jay ="SELECT SUM(`salary`) - SUM(`vat`) as jay FROM `salary` WHERE `startMonth`>='{$start}' AND `endMonth`<='{$end}' ;";
	if ($res = mysqli_query($conn,$sql_jay)) {
			$row = mysqli_fetch_assoc($res);
			$array_jay['data'][] = ($row['jay']!== null) ? $row['jay']*1 : 0;
		}
}

$json_box[]= $array_income;
$json_box[]= $array_jay;


echo json_encode($json_box);


?>

