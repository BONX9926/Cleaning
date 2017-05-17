<?php
session_start();
// var_dump($_SESSION);
$room_id = '000003';
include_once '../../connect.php';
function room_name($room_id,$connect) {
$sql = "SELECT room_category.room_name FROM `booking_table`INNER JOIN `booking_rooms` ON booking_table.booking_id = booking_rooms.booking_id INNER JOIN `room_category` ON booking_rooms.room_name = room_category.room_id WHERE booking_table.booking_id ='{$room_id}' AND `booking_table`.`status_id` ='true' ";
$arr_room_name = array();
if($res = mysqli_query($connect,$sql)) {

	while ($row = mysqli_fetch_assoc($res)) {
		$arr_room_name[] = $row;
	}
	// var_dump($arr_room_name);
	foreach ($arr_room_name as $key => $value) {
		$arrayName[] = implode(' ',$value);
					
	}
	echo implode(",", $arrayName);
	}
}
room_name($room_id,$conn)
// echo "string";
?>