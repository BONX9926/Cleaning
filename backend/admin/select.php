<?php
	session_start();
	include_once '../../connect.php';
?>
<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading">หาค้นหาบิล</header>
		<div class="panel-body">
			<section id="unseen">
			<select class="form-control" id="myMaid">
			<?php 
				$sql = "SELECT id,fname,lname FROM `user_backend` WHERE `status`='M'";
				if ($res =mysqli_query($conn,$sql)) {
					while($row = mysqli_fetch_assoc($res)) {
			?>
			<option value="<?=$row['id']?>"><?=$row['fname']?> <?=$row['lname']?></option>
			<?php
				}
			}
			?>
				
			</select>
			<div id="content-bin"></div>
			</section>
		</div>
	</section>
</div>
<script type="text/javascript">
	$("#myMaid").change(function(event) {
		var maid_id = $(this).val();
		// alert(maid_id);
		$.post('content-bin.php', {maid_id: maid_id}, function() {

		}).done(function(data) {
			$("#content-bin").html(data);
		});
	});
</script>