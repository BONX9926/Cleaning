<?php
	session_start();
	include_once '../../connect.php';
	include_once '../../lib/php/public_function.php';
	function name_maid($booking_id,$connect) {
		$home = array();
		$arrName = array();
		$sql1 = "SELECT user_backend.fname, user_backend.lname FROM `booking_table` INNER JOIN `booking_detail` ON booking_table.booking_id = booking_detail.booking_id INNER JOIN `user_backend`ON booking_detail.ref_maid = user_backend.id WHERE booking_table.booking_id ='{$booking_id}'";
		// $sql1 = "SELECT user_backend.fname, user_backend.lname FROM `booking_table` INNER JOIN `booking_detail` ON booking_table.booking_id = booking_detail.booking_id INNER JOIN `user_backend`ON booking_detail.ref_maid = user_backend.id WHERE booking_table.booking_id ='000005'";
		if ($res = mysqli_query($connect,$sql1)) {
			while ($row = mysqli_fetch_assoc($res)) {
				$home[] = $row; 
			}
				// var_dump($home);
			foreach ($home as $key => $value) {
				$arrName[] = implode(' ', $value);
			}
			echo implode(",", $arrName);
		}
	}
?>
<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading">การจองบริการ</header>
		<div class="panel-body">
			<section id="unseen">
			<!-- <pre> -->
			<table class="table table-bordered">
			<tr>
				<td>เลขที่บิล</td>
				<td>ผู้จ้าง</td>
				<td>วันที่จ้าง</td>
				<td>พนักงาน</td>
				<td>ลบ</td>
			</tr>
			<?php
				$sql ="SELECT * FROM `booking_table` INNER JOIN `user_detail` ON booking_table.ref_booking_uid = user_detail.uid ORDER BY booking_table.booking_id DESC";
				if ($res = mysqli_query($conn,$sql)) {
					while ($row = mysqli_fetch_assoc($res)) {
						// var_dump($row);
			?>
				<tr>
					<td><?=$row['booking_id']?></td>
					<td><?=$row['fname']?> <?=$row['lname']?></td>
					<td><?=date_thai($row['start_work'])?></td>
					<td><?php name_maid($row['booking_id'],$conn) ?></td>
					<td><button class="btn btn-danger del-bin" bin-id="<?=$row['booking_id']?>">ลบ</button></td>

				</tr>
			<?php
					}
				}
			?>
			</table>
			</section>
		</div>
	</section>
</div>