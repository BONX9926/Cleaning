<?php
// var_dump($_POST);
if ($_POST['event'] = "update_status_payment") {
	// echo "string";
	$info = $_POST['info'];
	$status = explode(":", explode(",",$info)[0])[1];
	$numbin = explode(":", explode(",", $info)[1])[1];
	include_once '../../connect.php';
	$sql = "UPDATE `booking_table` SET `status_id`='{$status}' WHERE `booking_id`='{$numbin}' ";
	// echo $sql;
	if (mysqli_query($conn,$sql)) {
		echo "true";
	}
} else {
	echo "ERROR";
}
?>