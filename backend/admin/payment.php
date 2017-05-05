<?php
	session_start();
	include_once '../../connect.php';
	$status_id = array(
		"true" => "ชำระเงินเรียบร้อยแล้ว",
		"false" => "รอการชำระเงิน"

	);
	// $sql1 ="SELECT `booking_id`,`status_id` FROM `booking_table`";
	// if ($res = mysqli_query($conn,$sql1)) {
	// 	while ($row = mysqli_fetch_assoc($res)) {
	// 		$status_array[] = $row;
	// 	}
	// }
	// 		var_dump($status_array);
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
								<select class="form-control m-bot15 myStatus" >
									<?php 
										foreach ($status_id as $status => $value) {
											# code...
											if($status == $show1["status_id"]){
												$selected = "selected";
											}else{
												$selected = "";
											}
										
									?>
									<option value="status_id:<?=$status ?>,borrow_id:<?=$show['num_bin']?>" <?=$selected ?>  > <?=$value?></option>

									<?php 
										}
									 ?>
	                            </select>
							<?php
								}
							?>
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
		$(".myStatus").change(function(event) {
			var info = $(this).val();
			
			

			$.post('service_update_status_payment.php', {info:info , event:"update_stauts_payment", }, function() {
				/*optional stuff to do after success */
			}).done(function(data){
				alert(data);
			});
		});
	});
</script>