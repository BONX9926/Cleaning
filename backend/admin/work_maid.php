<?php
	session_start();
?>
<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading">ตารางงานแม่บ้าน</header>
		<div class="panel-body">
			<section id="unseen">
				<table class="table table-bordered table-striped table-condensed">
					<thead>
						<tr>
							<th>ลำดับ</th>
							<th>ชื่อ-นามสกุล</th>
							<th class="numeric">เบอร์โทรศัพท์</th>
							<th class="numeric">ที่อยู่</th>
							<th class="numeric">วันเกิด</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							include_once '../../connect.php';
							$sql = "SELECT * FROM `user_backend` WHERE `status`= 'M'";
							$data = mysqli_query($conn,$sql);
							$count = 0;
							while($show = mysqli_fetch_assoc($data)){
							$count++;
						?>
						<tr>
							<td><?=$count?></td>
							<td><?=$show['fname']." ".$show['lname']?></td>
							<td class="numeric"><?=$show['phone']?></td>
							<td class="numeric"><?=$show['address']?></td>
							<td class="numeric"><?=$show['birthday']?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</section>
		</div>
	</section>
</div>