<?php
	if($_POST['maid_id']) {
		include_once '../../connect.php';
		include_once '../../lib/php/public_function.php';
		$sql = "SELECT booking_table.booking_id,booking_table.ref_booking_uid,booking_table.start_work,user_detail.fname,user_detail.lname,user_detail.lat,user_detail.lng,user_detail.phone FROM `booking_detail` INNER JOIN booking_table on (booking_detail.booking_id=booking_table.booking_id) INNER JOIN user_detail on (booking_table.ref_booking_uid = user_detail.uid) WHERE `ref_maid` = '{$_POST['maid_id']}' AND `booking_table`.`status_id` ='true' ";
		if ($res = mysqli_query($conn,$sql)) {

		?>
		<table class="table table-bordered">
			<tr>
				<td>เลขที่บิล</td>
				<td>ผู้จ้าง</td>
				<td>วันที่จ้าง</td>
			</tr>
		<?php
			while ($row = mysqli_fetch_assoc($res)) {
		?>
		<tr>
			<td><?=$row['booking_id']?></td>
			<td><?=$row['fname']?> <?=$row['lname']?></td>
			<td><?=date_thai($row['start_work'])?></td>
		</tr>
		
		<?php		
			}
		}
		?>
		</table>
		<?php
	}
?>