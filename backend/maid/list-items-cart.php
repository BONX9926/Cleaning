<?php
	session_start();
	include_once '../../connect.php';
?>


<div class="contaner">
	<table class="table table-hover">
	<?php 
		foreach ($_SESSION['items_cart'] as $item_id => $amount) {
			$sql = "SELECT * FROM `items` WHERE `item_id`= '{$item_id}' LIMIT 1";
			$res = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($res);
	?>
		<tr>
			<td><img src="../img/items/<?=$row['img']?>" width="50" height="50" id="md-img"></td>
			<td><?=$row['item_name']?></td>
			<td><?=$amount?></td>
		</tr>
	<?php } ?>
	</table>
	<div class="col-md-12" align="center">
	<?php if(count($_SESSION['items_cart']) <= 0){echo "<h1>ไม่มีรายการ</h1>"; } ?>
	<?php if(isset($row)) { ?>	
	<button type="button" class="btn btn-success" id="confirm-borrow">ยืนยัน</button>
	<?php } ?>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("#confirm-borrow").click(function(event) {
			// alert();
			$.post('borrow_save.php', {event: 'send'}, function(data, textStatus, xhr) {
				/*optional stuff to do after success */
			}).done(function(data){
				// alert(data);
				// if (data == "true") {
					get_count_items();
				// }
				$("#modal").modal("toggle");
				alert("แจ้งการยืมเสร็จสิ้น กรุณาสามารถรับของได้วันถัดไป");
			});
		});

		function get_count_items() {
		$.post('borrow.php', {event: 'get_count_item'}, function() {
			/*optional stuff to do after success */
		}).done(function(data) {
			//alert(data);
			$(".myCount").html(data);
		});
	}
	});
</script>

