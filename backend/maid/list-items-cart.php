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
			<td><img src="../img/items/<?=$row['img']?>" width="100" height="100" id="md-img"></td>
			<td><?=$row['item_name']?></td>
			<td><?=$amount?></td>
		</tr>
	<?php } ?>
	</table>
	<div class="col-md-12" align="center">
		
	<button type="button" class="btn btn-success" id="confirm-borrow">ยืนยัน</button>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("#confirm-borrow").click(function(event) {
			// alert();
			$.post('borrow_save.php', {event: 'send'}, function(data, textStatus, xhr) {
				/*optional stuff to do after success */
			}).done(function(data){
				alert(data);
			});
		});
	});
</script>

