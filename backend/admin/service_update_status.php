<?php
// var_dump($_POST['event']);
//echo $_POST['info'];
//"status_id:2,borrow_id:000001 "

//update status borrow
if ($_POST['event'] = "update_status") {
	$info = $_POST['info'];
	$status = explode(":", explode(",",$info)[0])[1];
	$borrow_id = explode(":", explode(",", $info)[1])[1];
	include_once '../../connect.php';
	$sql = "UPDATE `borrow_table` SET `status`='{$status}' WHERE `borrow_id`='{$borrow_id}' ";
	// echo $sql;
	if (mysqli_query($conn,$sql)) {
		echo "true";
	}
} else {
	echo "ERROR";
}
?>