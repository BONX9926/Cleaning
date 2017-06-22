<?php 
include_once '../../connect.php';
	$sql = "SELECT * FROM `booking_table` WHERE status_id ='false'";
	if ($res = mysqli_query($conn,$sql)) {
		// var_dump($res);
		if ($res->num_rows > 0) {
			$color=array("btn-danger","btn-info","btn-success","btn-primary","btn-warning");
?>
<span class="badge btn <?php echo $color[array_rand($color)]; ?> btn-xs"><?=$res->num_rows?></span></a></li>

<?php
		} else {

		}
	}
?>