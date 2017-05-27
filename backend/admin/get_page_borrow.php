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
				<table class="table">
					<thead>
						<tr>
							<th>เลขที่บิล</th>
							<th>วันที่แจ้งยืม</th>
							<th>ชื่อ-นามสกุล</th>
							<th class="numeric">รายละเอียด</th>
							<th class="numeric">สถานะ</th>
							<th class="numeric">หมายเหตุ</th>
						</tr>
					</thead>
					<tbody>
					<?php
						
						$sql = "SELECT `borrow_table`.`borrow_id`,`borrow_table`.`status`,`borrow_table`.`borrow_date`,`borrow_table`.`status`,`user_backend`.`fname`,`user_backend`.`lname` FROM `borrow_table`INNER JOIN `user_backend` ON borrow_table.ref_maid_id = user_backend.id WHERE `borrow_table`.`status` !='4' ORDER BY `borrow_table`.`borrow_id` DESC";
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
										if ($value['id'] >= $row['status']) {
								?>	
									<option  value="status_id:<?=$value['id'] ?>,borrow_id:<?=$row['borrow_id']?>" <?=$selected ?> ><?=$value['name'] ?></option>
								<?php 
										}
									}
								?>
                                </select>
                             </td>
                             <td><?php echo ($row['status'] == "3" || $row['status'] == "5") ? "<button type='button' class='btn btn-primary my-Br' br-id='".$row['borrow_id']."'>คืน</button>" : ""; ?></td>
						</tr>
								<?php
							}
						}
					?>
					</tbody>
				</table>
				<!-- Modal -->
<div class="modal fade" id="return-modal-list" role="dialog">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">รายการยืมอุปกรณ์</h4>
    </div>
    <div class="modal-body">
      <p>This is a large modal.</p>
    </div>
    <div class="modal-footer">
    	
      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
    </div>
  </div>
</div>
</div>
<!-- Modal -->
			</section>
		</div>
	</section>
</div>
<script type="text/javascript">

	function get_page_borrow(){
		$.get('get_page_borrow.php', function() {
			// optional stuff to do after success 
		}).done(function(data){
			$("#content").html(data);
		});
	}
	$(".myStatus").change(function(event) {
		var info = $(this).val();
		var status = info.substring(10, 11);
		if (status == "1") {
			var status_up ="กำลังตรวจสอบ";
		}else if(status == "2") {
			var status_up ="รอรับของ";
		}else if(status == "3") {
			var status_up ="ยืมของแล้ว";
		}else if(status == "4") {
			var status_up ="คืนเรียบร้อย";
		}
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
			cancelButtonClass: 'btn btn-info canC',
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
				get_page_borrow();

				// if (data == "true") {}
			});
		});
	});

	$(".my-Br").click(function(event) {
		var id = $(this).attr('br-id');
		$.post('GetItemsListReturn.php', {id: id}, function(data, textStatus, xhr) {
			/*optional stuff to do after success */
		}).done(function(data){
			$(".modal-body").html(data);
			$("#return-modal-list").modal('show');
		});
	});
	
</script>