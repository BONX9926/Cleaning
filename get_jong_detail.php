<table class="table">
	<thead>
		<tr>
			<td>หมายเลขการจอง</td>
			<td>วันที่ทำความสะอาด</td>
			<td>วันที่จอง</td>
			<td>สถานะการเงิน</td>
			<td>สถานะการทำงาน</td>
		</tr>
	</thead>
	<tbody>
	<?php
	// var_dump($_POST);
		include_once 'connect.php';
		include_once 'lib/php/public_function.php';
		$sql = "SELECT `booking_id`, `ref_booking_uid`, `area_size`, `start_work`, `end_work`, `created_at`, `status_id` FROM `booking_table` WHERE `ref_booking_uid` = '{$_POST['uid']}'";
		// echo $sql;
		if ($res = mysqli_query($conn,$sql)) {
			while($row = mysqli_fetch_assoc($res)) {
	?>	
		<tr>
			<td><a href="invoice.php?num=<?=$row['booking_id']?>"><?=$row['booking_id']?></a></td>
			<td><?=date_thai($row['start_work'])?></td>
			<td><?=date_thai(revert_date($row['created_at']))?></td>
			<td><?php if($row['status_id'] == "true") {
						echo "ชำระเงินแล้ว";
				} else {
						echo "รอการชำระเงิน";
					} ?>
				
			</td>
		</tr>
	<?php 
				}

		}
	?>
	</tbody>
</table>