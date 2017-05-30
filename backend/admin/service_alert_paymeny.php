<?php 
include_once '../../connect.php';
	$sql = "SELECT * FROM `payment`LEFT JOIN `booking_table`ON payment.num_bin = booking_table.booking_id WHERE booking_table.status_id ='false'";
	if ($res = mysqli_query($conn,$sql)) {
		// var_dump($res);
		if ($res->num_rows > 0) {
?>
<span class="badge btn btn-warning btn-xs"><?=$res->num_rows?></span></a></li>

<?php
		} else {

		}
	}
?>