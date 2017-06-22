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
			<table class="table table-bordered" id="myTable">
	        <thead>
		        <tr>
		            <th>เลขที่บิล</th>
		            <th>ผู้จ้าง</th>
		            <th>วันที่จ้าง</th>
		            <th>พนักงาน</th>
		            <th>สถานะบิล</th>
		            <th>ลบ</th>
		        </tr>
		    </thead>
		    <tfoot>
		        <tr>
		            <th>เลขที่บิล</th>
		            <th>ผู้จ้าง</th>
		            <th>วันที่จ้าง</th>
		            <th>พนักงาน</th>
		            <th>สถานะบิล</th>
		            <th>ลบ</th>
		        </tr>
		    </tfoot>
        <tbody>
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
					<td><?=$row['status_id'] ?></td>
					<td><button class="btn btn-danger del-bin" bin-id="<?=$row['booking_id']?>">ลบ</button></td>

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
	$(document).ready(function() {
		$(".del-bin").click(function(event) {
			var bin_id = $(this).attr('bin-id');
				swal({
				title: "คุณแน่ใจใช่ไหม?",
				text: "จะลบรายการบิลที่ "+bin_id,
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel plx!",
				closeOnConfirm: false,
				closeOnCancel: false
				},
				function(isConfirm) {
				if (isConfirm) {
				$.post('del_bin.php', {num_bin: bin_id}, function(data, textStatus, xhr) {
					/*optional stuff to do after success */
				}).done(function(data){
					// swal(data);
					var json_res = jQuery.parseJSON(data);
					if(json_res.status == true) {
						swal("Deleted!", json_res.message, "success");
						maid_table();
					} else {
						swal("Deleted!", json_res.message, "error");
					}
				});
				} else {
				swal("Cancelled", "ยกเลิกการทำรายการ", "error");
				}
				});

			// alert(bin_id);
			// alert(5555);
		});
		$('#myTable').DataTable( {
	        "pageLength": 10,
	        "order":[[0,"desc"]]
    	} );
	});
</script>