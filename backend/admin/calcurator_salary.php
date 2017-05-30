<!DOCTYPE html>
<html>
<head>
	<title>คำนวณเงินเดือน</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" type="text/css">
</head>
<body style="background-image:linear-gradient(to top, #c1dfc4 0%, #deecdd 100%);">
<div class="container">
<h1>คำนวณเงินเดือน ประจำวันที่ :<?php date_default_timezone_set('Asia/Bangkok');
echo $today = date('d-m-Y');?></h1>
<h3>รหัสพนักงาน : <?php echo $_GET['maid_id']; ?></h3>
<?php
	if($_GET['maid_id']) {
		include_once '../../connect.php';
		include_once '../../lib/php/public_function.php';
		$sql = "SELECT booking_table.price_area,booking_table.booking_id,booking_table.ref_booking_uid,booking_table.start_work,booking_table.end_work,user_detail.fname,user_detail.lname,user_detail.lat,user_detail.lng,user_detail.phone FROM `booking_detail` INNER JOIN booking_table on (booking_detail.booking_id=booking_table.booking_id) INNER JOIN user_detail on (booking_table.ref_booking_uid = user_detail.uid) WHERE `ref_maid` = '{$_GET['maid_id']}' AND `booking_table`.`status_id` ='true' AND `end_work` >='{$_GET['startDate']}' AND `end_work` <= '{$_GET['endDate']}' ORDER BY booking_table.start_work ASC";
		$sql_2 = "SELECT SUM(`booking_table`.`price_area`) as price_area FROM `booking_detail` INNER JOIN booking_table on (booking_detail.booking_id=booking_table.booking_id) INNER JOIN user_detail on (booking_table.ref_booking_uid = user_detail.uid) WHERE `ref_maid` = '{$_GET['maid_id']}' AND `booking_table`.`status_id` ='true' AND `end_work` >='{$_GET['startDate']}' AND `end_work` <= '{$_GET['endDate']}'";
		
		// echo $sql_2;
		if ($res = mysqli_query($conn,$sql)) {
			if ($res_2 =mysqli_query($conn,$sql_2)) {
				$row_2 = mysqli_fetch_assoc($res_2);
				// var_dump($row_2);
			}
		?>
	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>เลขที่บิล</th>
                <th>ผู้จ้าง</th>
                <th>วันที่จ้าง</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
               	<th>#</th>
                <th>เลขที่บิล</th>
                <th>ผู้จ้าง</th>
                <th>วันที่จ้าง</th>
            </tr>
        </tfoot>
        <tbody>
        <?php
			$i = 0;
				while ($row = mysqli_fetch_assoc($res)) {
					$i++;
			?>
				<tr>
					<td><?=$i?></td>
					<td><?=$row['booking_id']?></td>
					<td><?=$row['fname']?> <?=$row['lname']?></td>
					<td><?=date_thai($row['start_work'])?></td>
				</tr>
			
		<?php		
				}
			}
		}
		?>
        </tbody>
    </table>
	<h3 align="left">จำนวนงานที่ทำทั้งหมด : <?php echo $res->num_rows; ?> งาน</h3>
	<h4 align="left">เป็นจำนวนเงิน : <?php $money =$res->num_rows*300+($row_2['price_area']*50/100);echo number_format($money); ?> บาท</h4>
	<h4 align="left">หักภาษี 7% : <?php $vat=$money*7/100;echo $vat_real= number_format($vat); ?> บาท</h4>
	<h4 align="left">เงินรับสุทธิ : <?php $total = $money - $vat_real;echo number_format($total); ?> บาท</h4>

<form action="salary_save.php" method="post">
<input type="hidden" class="form-control" name="id" value="<?=$_GET['maid_id']?>">
<input type="hidden" class="form-control myNum" name="salary" value="<?=$money?>">
<input type="hidden" class="form-control myNum" name="vat" value="<?=$vat_real?>">
<input type="hidden" class="form-control myNum" name="startMonth" value="<?=$_GET['startDate']?>">
<input type="hidden" class="form-control myNum" name="endMonth" value="<?=$_GET['endDate']?>">
<button type="submit" class="btn btn-danger" style="float: right;">บันทึก</button>
</form>
<br><br><br><br>
</div>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script> -->
<script type="text/javascript">
$(document).ready(function() {
 	$('#example').DataTable( {
        "searching": false,
        "pageLength": 5
    } );
	$("#showBin").click(function(event) {
		$('#myModal').modal('toggle');
		// alert(555);
	});
	// $(".myNum").mask('0,000,000.00');
});
</script>
</body>
</html>
