<!DOCTYPE html>
<html>
<head>
	<title>คำนวณเงินเดือน</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" type="text/css"> -->
</head>
<body>
<div class="container">
<h1>คำนวณเงินเดือน ประจำวันที่ :<?php date_default_timezone_set('Asia/Bangkok');
echo $today = date('d-m-Y');?></h1>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">งานของแม่บ้าน</h4>
			</div>
			<div class="modal-body">
				<?php
					if($_GET['maid_id']) {
						include_once '../../connect.php';
						include_once '../../lib/php/public_function.php';
						$sql = "SELECT booking_table.booking_id,booking_table.ref_booking_uid,booking_table.start_work,booking_table.end_work,user_detail.fname,user_detail.lname,user_detail.lat,user_detail.lng,user_detail.phone FROM `booking_detail` INNER JOIN booking_table on (booking_detail.booking_id=booking_table.booking_id) INNER JOIN user_detail on (booking_table.ref_booking_uid = user_detail.uid) WHERE `ref_maid` = '{$_GET['maid_id']}' AND `booking_table`.`status_id` ='true' AND `end_work` >='{$_GET['startDate']}' AND `end_work` <= '{$_GET['endDate']}' ORDER BY booking_table.start_work ASC";
						if ($res = mysqli_query($conn,$sql)) {

						?>
						<table class="table table-bordered" id="myTable">
							<thead>
								<tr>
									<td>#</td>
									<td>เลขที่บิล</td>
									<td>ผู้จ้าง</td>
									<td>วันที่จ้าง</td>
								</tr>
							</thead>
						<?php
						$i = 0;
							while ($row = mysqli_fetch_assoc($res)) {
								$i++;
						?>
						<tbody>
							<tr>
								<td><?=$i?></td>
								<td><?=$row['booking_id']?></td>
								<td><?=$row['fname']?> <?=$row['lname']?></td>
								<td><?=date_thai($row['start_work'])?></td>
							</tr>
						</tbody>
						
						<?php		
							}
						}
						?>
						</table>
						<?php
					}
				?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
	<h3>จำนวนงานที่ทำ <?php echo $res->num_rows; ?> งาน <button class="btn btn-info" id="showBin">ดูบิล</button></h3>
	<h2>เป็นจำนวนเงิน <?php echo $res->num_rows*300 ?></h2>
</div>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript">
$(document).ready(function() {

	$("#showBin").click(function(event) {
		$('#myModal').modal('toggle');
		// alert(555);
	});
});
</script>
</body>
</html>
