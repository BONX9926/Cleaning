<?php
	session_start();
?>
<aside class="profile-info col-lg-12">
	<section class="panel">
		<div class="panel-body bio-graph-info">
			<h1>ตารางงานทั้งหมด</h1>
			<?php 
				include_once '../../connect.php';
				$sql = "SELECT * FROM `booking_table`INNER JOIN `booking_detail`ON booking_table.booking_id = booking_detail.booking_id INNER JOIN `size_area`ON booking_table.area_size = size_area.size_id INNER JOIN `booking_rooms`ON booking_table.booking_id = booking_rooms.booking_id INNER JOIN `room_category` ON room_category.room_id = booking_rooms.room_name WHERE booking_detail.ref_maid = '{$_SESSION['id']}' ";
				// echo $sql;
				if($res = mysqli_query($conn,$sql)) {
					while ($row = mysqli_fetch_assoc($res)) {
						// print "<pre>";
						// print_r($row);
					}
					// echo $sql;
				}
				// echo "<pre>";
				// var_dump($_SESSION);
			?>
			<table class="table">
				<tr>
					<td>วันที่ทำงาน</td>
					<td>ชื่อผู้จ้างงาน</td>
					<td>สิ่งที่ต้องเตรียมไปด้วย</td>
					<td>พิกัด</td>
					<td>เน้น</td>
				</tr>
				<?php

				?>
			</table>
		</div>
	</section>
</aside>