<?php session_start(); ?>
<table class="table">
	<thead>
		<tr>
			<td>หมายเลขการจอง</td>
			<td>วันที่ทำความสะอาด</td>
			<td>วันที่จอง</td>
			<td>สถานะการเงิน</td>
			<td>แจ้งชำระ</td>
			<td>ความพึงพอใจ</td>
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
			<td><a href="invoice.php?num=<?=$row['booking_id']?>" target="_blank"><?=$row['booking_id']?></a></td>
			<td><?=date_thai($row['start_work'])?></td>
			<td><?=date_thai(revert_date($row['created_at']))?></td>
			<td>
			<?php 
				if($row['status_id'] == "true") {
						echo "ชำระเงินแล้ว";
				} else {
						echo "รอการชำระเงิน";
				}
			?>
				
			</td>
			<td>
				<?php
					if($row['status_id'] == "true") {
							echo "ผ่าน";
					} else {
				?>
				<a href="payment.php?numbin=<?=$row['booking_id']?>">แจ้งชำระเงิน</a>
				<?php
					}
				?>
			</td>
			<td><a href="rating.php?bin=<?=$row['booking_id']?>">ให้คะแนนทำความสะอาด</a></td>
		</tr>
	<?php 
				}

		}
	?>
	</tbody>
</table>