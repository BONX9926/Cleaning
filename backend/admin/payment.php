<?php
	session_start();
	include_once '../../connect.php';
	$status_id = array(
		"true" => "ชำระเงินเรียบร้อยแล้ว",
		"false" => "รอการชำระเงิน"

	);
?>
<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading">แจ้งชำระเงิน</header>
		<div class="panel-body">
			<section id="unseen">
				<table class="table table-bordered table-striped table-condensed" id="pay">
					<thead>
						<tr>
							<th>เลขที่บิล</th>
							<th>ชื่อ-นามสกุล</th>
							<th class="numeric">เบอร์โทรศัพท์</th>
							<th class="numeric">email</th>
							<th class="numeric">วันที่แจ้งชำระ</th>
							<th class="numeric">หลักฐาน</th>
							<th class="numeric">สถานะ</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "SELECT * FROM `payment` ORDER BY `num_bin` DESC";
							$data = mysqli_query($conn,$sql);
							while($show = mysqli_fetch_assoc($data)){
						?>
						<tr>
							<td><?=$show['num_bin']?></td>
							<td><?=$show['name']?></td>
							<td class="numeric"><?=$show['phone']?></td>
							<td class="numeric"><?=$show['email']?></td>
							<td class="numeric"><?=$show['created_at']?></td>
							<td class="numeric"><a style="cursor: pointer;" class="img-credit" img-cr="<?=$show['num_bin']?>">Click</a></td>
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
		<div class="modal-body" align="center" id="md-body">

		

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
			var status = info.substring(10, 11);
			if (status == "t") {
				var status_up ="ชำระเงินเรียบร้อยแล้ว";
			}else if(status == "f") {
				var status_up ="รอการชำระเงิน";
			} else {
				var status_up ="error";
			}
			swal({
				title: "คุณต้องการเปลี่ยนแปลงสถานะเป็น\n"+status_up,
				text: "กรุณากรอก password เพื่อทำการยืนยัน",
				type: "input",
				inputType: "password",
				showCancelButton: true,
				closeOnConfirm: false,
			}, function (inputValue) {
				if (inputValue === false) return false;
				if (inputValue === "") {
					swal.showInputError("กรุณากรอก password ");
					return false
				}
				$.post('service_update_status_payment.php', {password:inputValue, info:info , event:"update_stauts_payment", }, function() {
					/*optional stuff to do after success */
				}).done(function(data){
					swal(data);
					// if (data == "true") {}
				});
			});
		});
		$(".img-credit").click(function(event) {
			var numbin = $(this).attr('img-cr');
			// alert(numbin);
			$.post('get_img_credit.php', {numbin: numbin}, function() {
				/*optional stuff to do after success */
			}).done(function(data){
				// alert(data);
				$("#md-body").html("<img src='../../image/payment/"+data+"' style='width:500px;height: 500px;'>");
				$("#myModal").modal("toggle");
			})
		});
	 	$('#pay').DataTable( {
	        "pageLength": 10
	    } );

	});
</script>