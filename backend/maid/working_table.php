<?php
	session_start();
?>
<aside class="profile-info col-lg-12">
	<section class="panel">
		<div class="panel-body bio-graph-info">
			<h1>ตารางงานทั้งหมด</h1>
			<?php 
				// include_once '../../connect.php';
				// $sql = "SELECT * FROM `booking_table` INNER JOIN `booking_detail` ON booking_table.booking_id = booking_detail.booking_id INNER JOIN `user_detail`ON user_detail.uid = booking_table.ref_booking_uid INNER JOIN `size_area` ON size_area.size_id = booking_table.area_size WHERE `ref_maid`='{$_SESSION['id']}' ";
				// // echo $sql;
				// if($res = mysqli_query($conn,$sql)) {
					
				// }
				// var_dump($_SESSION);
			?>
		</div>
	</section>
</aside>