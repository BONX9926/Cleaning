<?php
	include_once '../../../connect.php';

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

$array_jay = array();
$array_jay['name'] = "รายจ่าย";
	foreach ($array_m as $key => $m) {
		$start = strtotime("01-{$m}-2017");

		$end = strtotime("last day of this month",strtotime("01-{$m}-2017"));
		$sql_jay ="SELECT SUM(`salary`) - SUM(`vat`) as jay FROM `salary` WHERE `startMonth`>='{$start}' AND `endMonth`<='{$end}' ;";
		if ($res = mysqli_query($conn,$sql_jay)) {
			$row = mysqli_fetch_assoc($res);
			$array_jay['data'][] = ($row['jay']!== null) ? $row['jay']*1 : 0;
		}
	}

echo json_encode($array_jay);

?>