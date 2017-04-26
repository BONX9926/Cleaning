<?php
	session_start();
?>
<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading">แจ้งชำระเงิน</header>
		<div class="panel-body">
			<section id="unseen">
				<table class="table table-bordered table-striped table-condensed">
					<thead>
						<tr>
							<th>เลขที่บิล</th>
							<th>ชื่อ-นามสกุล</th>
							<th class="numeric">เบอร์โทรศัพท์</th>
							<th class="numeric">email</th>
							<th class="numeric">จำนวนเงินที่แจ้ง</th>
							<th class="numeric">วันที่แจ้งชำระ</th>
							<th class="numeric">หลักฐานการโอนเงิน</th>
							<th class="numeric">สถานะ</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							include_once '../../connect.php';
							$sql = "SELECT * FROM `payment`";
							$data = mysqli_query($conn,$sql);
							while($show = mysqli_fetch_assoc($data)){
						?>
						<tr>
							<td><?=$show['num_bin']?></td>
							<td><?=$show['name']?></td>
							<td class="numeric"><?=$show['phone']?></td>
							<td class="numeric"><?=$show['email']?></td>
							<td class="numeric"><?=number_format($show['money'])?></td>
							<td class="numeric"><?=$show['created_at']?></td>
							<td class="numeric"><a href="#myModal" data-toggle="modal"><?=$show['file']?></a></td>
							<td class="numeric">
							<?php 
								$sql1 = "SELECT `status_id` FROM `booking_table` WHERE `booking_id`='{$show['num_bin']}' ";
								// echo $sql1; 
								$data1 = mysqli_query($conn,$sql1);
								while($show1 = mysqli_fetch_assoc($data1)){
									// var_dump($show1["status_id"]);
									?>

							<input type="hidden" id="status_id" value="<?php echo $show1["status_id"]?>">
							<?php
								}
							?>
								<div class="switch has-switch" id_bin="<?=$show['num_bin']?>" id="bin">
									<div class="switch-off">
									<input type="checkbox" name="status_id" checked="" data-toggle="switch">
									<span class="switch-left">ON</span>
									<label>&nbsp;</label><span class="switch-right">OFF</span>
									</div>
								</div>
							</td>
						</tr>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">หลักฐานการชำระเงิน</h4>
		</div>
		<div class="modal-body">

		<img src="../../image/payment/<?=$show['file']?>" style="width:500;height: 500px;">

		</div>
		</div>
		</div>
		</div>
						<?php } ?>
					</tbody>
				</table>
			</section>
		</div>

	</section>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		var status_id = $("#status_id").val();
		// console.log(status_id);
		if(status_id == "true") {
			$('.switch-off').attr('class', 'switch-on');
		} else if (status_id == "false") {
			$('.switch-on').attr('class', 'switch-off');
		}
	});
</script>