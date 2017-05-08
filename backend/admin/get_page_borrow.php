<?php
	session_start();
	include_once '../../connect.php';
	include_once '../../lib/php/public_function.php';
	include_once 'get_items_borrow.php';
	$status_array = array();
	$sql1 ="SELECT * FROM `status`";
	if ($res = mysqli_query($conn,$sql1)) {
		while ($row = mysqli_fetch_assoc($res)) {
			$status_array[] = $row;
		}
	}
								
?>
<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading">แจ้งยืมอุปกรณ์</header>
		<div class="panel-body">
			<section id="unseen">
				<table class="table table-bordered table-striped table-condensed">
					<thead>
						<tr>
							<th>เลขที่บิล</th>
							<th>วันที่แจ้งยืม</th>
							<th>ชื่อ-นามสกุล</th>
							<th class="numeric">รายละเอียด</th>
							<th class="numeric">สถานะ</th>
						</tr>
					</thead>
					<tbody>
					<?php
						
						$sql = "SELECT `borrow_table`.`borrow_id`,`borrow_table`.`status`,`borrow_table`.`borrow_date`,`borrow_table`.`status`,`user_backend`.`fname`,`user_backend`.`lname` FROM `borrow_table`INNER JOIN `user_backend` ON borrow_table.ref_maid_id = user_backend.id";
						// echo $sql;
						if ($res = mysqli_query($conn,$sql)) {
							while ($row = mysqli_fetch_assoc($res)) {
								// var_dump($row);
								?>
						<tr>
							<td class="borrow_id"><?=$row['borrow_id']?></td>
							<td><?=date_thai(revert_date($row['borrow_date']))?></td>
							<td><?=$row['fname']?> <?=$row['lname']?></td>
							<td class="numeric"><?php echo get_items_borrow($row['borrow_id'],$conn); ?></td>
							<td class="numeric">
								<select class="form-control m-bot15 myStatus" borrow_id="<?=$row['borrow_id']?>">
								<?php 
									$selected = "";
									foreach ($status_array as $key => $value) {
										if($value['id'] == $row['status']){
											$selected = "selected";
										}else{
											$selected = "";
										}
								?>		
									<option  value="status_id:<?=$value['id'] ?>,borrow_id:<?=$row['borrow_id']?>" <?=$selected ?> ><?=$value['name'] ?></option>
								<?php 

									}
								?>
                                </select>
                             </td>
						</tr>
								<?php
							}
						}
					?>
					</tbody>
				</table>
			</section>
		</div>
	</section>
</div>
<script type="text/javascript">
	
		$(".myStatus").change(function(event) {
			var info = $(this).val();
			var status = info.substring(10, 11);
			if (status == "1") {
				var status_up ="กำลังตรวจสอบ";
			}else if(status == "2") {
				var status_up ="รอรับของ";
			}else if(status == "3") {
				var status_up ="ยังไม่คืน";
			}else if(status == "4") {
				var status_up ="คืนเรียบร้อย";
			}
			// var borrow_id = $(this).attr('borrow_id');
			// var status_id = $(this).attr('borrow_id');
			// alert(info);
			//update amout items
			// $.post('service_update_items.php', {borrow_id: borrow_id}, function() {
			// 	// optional stuff to do after success 
			// }).done(function(data){
			// 	alert(data);
			// 	// console.log(data);
			// });
			//update Status
swal({
  	title: "คุณต้องการเปลี่ยนแปลงสถานะเป็น\n<u style='color:red'>"+status_up+"</u>",

  	html:
    'You can use <b>bold text</b>, ' +
    '<a href="//github.com">links</a> ' +
    'and other HTML tags',
	text: 'กรุณากรอก password เพื่อทำการยืนยัน',
	type: 'input',
	inputType: "password",
	showCancelButton: true,
	closeOnConfirm: false,
}, function (inputValue) {
	if (inputValue === false) return false;
	if (inputValue === "") {
		swal.showInputError("กรุณากรอก password ");
		return false
	}
	$.post('service_update_status.php', {password:inputValue, info:info, event:"update_stauts" }, function() {
		/*optional stuff to do after success */
	}).done(function(data){
		swal(data);
		// if (data == "true") {}
	});
});




// swal({
// 	title: 'คุณต้องการเปลี่ยนแปลงสถานะเป็น\n'+status_up,
// 	text: 'กรุณากรอก password เพื่อทำการยืนยัน',
// 	type: 'input',
// 	inputType: "password",
// 	showCancelButton: true,
// 	closeOnConfirm: false,
// }, function (inputValue) {
// 	if (inputValue === false) return false;
// 	if (inputValue === "") {
// 		swal.showInputError("กรุณากรอก password ");
// 		return false
// 	}
// 	$.post('service_update_status.php', {password:inputValue, info:info, event:"update_stauts" }, function() {
// 		/*optional stuff to do after success */
// 	}).done(function(data){
// 		swal(data);
// 		// if (data == "true") {}
// 	});
// });





			// $.post('service_update_status.php', {info:info , event:"update_stauts" }, function() {
			// 	/*optional stuff to do after success */
			// }).done(function(data){
			// 	alert(data);
			// });
		});
	
</script>